<?php
 namespace Main\Model;

 // Add these import statements
 use Zend\InputFilter\InputFilter;
 use Zend\InputFilter\InputFilterAwareInterface;
 use Zend\InputFilter\InputFilterInterface;

 class Ex implements InputFilterAwareInterface
 {
     public $id;
     public $svname;
     public $user;
     public $passwd;
     public $appid;
     public $appkey;	 
	 public $root_folder;
	 public $root_folder_key;
	 public $status;
     protected $inputFilter;                       // <-- Add this variable

     public function exchangeArray($data)
    {
         $this->id     = (isset($data['id']))     ? $data['id']     : null;
         $this->svname = (isset($data['svname'])) ? $data['svname'] : null;
         $this->user  = (isset($data['user']))  ? $data['user']  : null;
         $this->passwd  = (isset($data['passwd']))  ? $data['passwd']  : null;
         $this->appid  = (isset($data['appid']))  ? $data['appid']  : null;
         $this->appkey = (isset($data['appkey']))  ? $data['appkey']  : null;
		 $this->root_folder  = (isset($data['root_folder']))  ? $data['root_folder']  : null;
		 $this->root_folder_key  = (isset($data['root_folder_key']))  ? $data['root_folder_key']  : null;
		 $this->status  = (isset($data['status']))  ? $data['status']  : null;
    }
  

     // Add content to these methods:
     public function setInputFilter(InputFilterInterface $inputFilter)
     {
         throw new \Exception("Not used");
     }
     // Add the following method:
     public function getArrayCopy()
     {
         return get_object_vars($this);
     }
     public function getInputFilter()
     {

     }
 }
 ?>