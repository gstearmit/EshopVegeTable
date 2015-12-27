<?php
/**
* Normal worker
*/
class PooledWorker extends Worker {
    public function run(){}
}


/**
* Don't descend from pthreads, normal objects should be used for pools
*/
class Pool {
    protected $size;
    protected $workers;

    /**
    * Construct a worker pool of the given size
    * @param integer $size
    */  
    public function __construct($size) {
        $this->size = $size;
    }

    /**
    * Start worker threads
    */
    public function start() {
        while (@$worker++ < $this->size) {
            $this->workers[$worker] = new PooledWorker();
            $this->workers[$worker]->start();
        }
        return count($this->workers);
    }

    /**
    * Submit a task to pool
    */
    public function submit(Stackable $task) {
        $this->workers[array_rand($this->workers)]
            ->stack($task);
        return $task;
    }

    /**
    * Shutdown worker threads
    */
    public function shutdown() {
        foreach ($this->workers as $worker)
            $worker->shutdown();
    }
}


class StageTwo extends Stackable {
    /**
    * Construct StageTwo from a part of StageOne data
    * @param int $data
    */
    public function __construct($data) {
        $this->data = $data;
    }

    public function run(){
        printf(
            "Thread %lu got data: %d\n", 
            $this->worker->getThreadId(), $this->data);
    }
}

class StageOne extends Stackable {
    protected $done;

    /**
    * Construct StageOne with suitable storage for data
    * @param StagingData $data
    */
    public function __construct(StagingData $data) {
        $this->data = $data;
    }

    public function run() {
        /* create dummy data array */
        while (@$i++ < 100) {
            $this->data[] = mt_rand(
                20, 1000);
        }
        $this->done = true;
    }
}

/**
* StagingData to hold data from StageOne
*/
class StagingData extends Stackable {
    public function run() {}
}

/* stage and data reference arrays */
$one = [];
$two = [];
$data = [];

$pool = new Pool(8);
$pool->start();

/* construct stage one */
while (count($one) < 10) {
    $staging = new StagingData();
    /* maintain reference counts by storing return value in normal array in local scope */
    $one[] = $pool
        ->submit(new StageOne($staging));
    /* maintain reference counts */
    $data[] = $staging;
}

/* construct stage two */
while (count($one)) {

    /* find completed StageOne objects */
    foreach ($one as $id => $job) {
        /* if done is set, the data from this StageOne can be used */
        if ($job->done) {
            /* use each element of data to create new tasks for StageTwo */
            foreach ($job->data as $chunk) {
                /* submit stage two */
                $two[] = $pool
                    ->submit(new StageTwo($chunk));
            }

            /* no longer required */
            unset($one[$id]);
        }
    }

    /* in the real world, it is unecessary to keep polling the array */
    /* you probably have some work you want to do ... do it :) */
    if (count($one)) {
        /* everyone likes sleep ... */
        usleep(1000000);
    }
}

/* all tasks stacked, the pool can be shutdown */
$pool->shutdown();
?>