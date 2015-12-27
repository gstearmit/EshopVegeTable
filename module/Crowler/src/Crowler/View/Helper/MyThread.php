<?php
namespace Crowler\View\Helper;
//use Crowler\Model\Thread;

class Async extends Thread {
	/**
	 * Provide a passthrough to call_user_func_array
	 **/
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
	public static function call($method, $params){
		$thread = new Async($method, $params);
		if($thread->start()){
			return $thread;
		} /** else throw Nastyness **/
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

$future = Async::call("file_get_contents", array("https://www.rohlik.cz/c75533-napoje?paginator-page=14&do=paginator-loadMore"));
/* here's us counting the bytes out, note, __toString() magic joined so no need to join explicitly */
printf("Got %d bytes from php.net\n", strlen((string)$future));
/* you can reference again as a string because you cached the result, YOU CANNOT JOIN TWICE */
printf("First 16 chars: %s\n", substr((string)$future, 0, 16));
/* if you have no __toString(): */


$response = $future->result;
var_dump($response);