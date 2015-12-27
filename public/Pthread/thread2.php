<?php
 class AsyncOperation extends Thread {
  public function __construct($arg){
   $this->arg = $arg;
  }

  public function run(){
   if($this->arg){
    for($i = 0; $i < 5; $i++) {
     echo "-> " . $this->arg . "\n";
     sleep(1);
    }
   }
  }
 }
 
 flush();
 $thread = new AsyncOperation("Thread 1");
 $thread2 = new AsyncOperation("Thread 2");
 $thread->start();
 $thread2->start();
 $thread->join();
 $thread2->join();
?>