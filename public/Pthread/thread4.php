<?php
class JoxooThread extends Thread {
	public $addresses;
	public function __construct($addresses) {
		$this->addresses = $addresses;
		$this->done = array ();
	}
	public function createWorkers() {
		for(; $worker < count ( $this->addresses ) - 1; $worker ++) 	$this->stack ( $this );
		if (! $this->isStarted ()) $this->start ();
	}
	public function run() {
		if (++ $this->init) {
			$this->done [$this->init - 1] = $this->addresses [$this->init - 1];
		}
	}
}


$worker = new JoxooThread ( array (
		'google.com',
		'joxoo.com',
		'php.net',
		'holidaycheck.de' 
) );
//$worker->createWorkers ();
$worker->join ();
print_r ( $worker );
?>