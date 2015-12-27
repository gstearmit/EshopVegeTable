<?php
namespace Crowler\Model;
//use Crowler\Model\Thread;
class Async extends Thread { //
	
	/**
	* Provide a passthrough to call_user_func_array
	**/
	public $method;
	public $params;
	public $result;
	public $joined;
	
	public function __construct($method, $params){
		$this->method = $method;
		$this->params = $params;
		$this->result = null;
		$this->joined = false;
	}

	/**
	* The smallest thread in the world
	**/
	public function run(){
		if (($this->result=call_user_func_array($this->method, $this->params))) {
			return true;
		} else return false;
	}

	/**
	* Static method to create your threads from functions ...
	**/
	public static function call(){
		
		return 'hoang call';die;
		
// 		$thread = new Async($this->method, $this->params);
// 		if($thread->start()){
// 			return $thread;
// 		} /** else throw Nastyness **/
	}

	/**
	* Do whatever, result stored in $this->result, don't try to join twice
	**/
	public function __toString(){
		if(!$this->joined) {
			$this->joined = true;
			$this->join();
		}

		return $this->result;
	}

}


?>