<?php
 namespace Main\Model;

 // Add these import statements
 use Zend\InputFilter\InputFilter;
 use Zend\InputFilter\InputFilterAwareInterface;
 use Zend\InputFilter\InputFilterInterface;

 class Local implements InputFilterAwareInterface
 {
     public $id;
     public $svname;
     public $ip;
     public $ftpusername;
     public $ftppass;
     public $link;
	 public $path;
	 public $status;
     protected $inputFilter;                       // <-- Add this variable

     public function exchangeArray($data)
     {
         $this->id     = (isset($data['id']))     ? $data['id']     : null;
         $this->svname = (isset($data['svname'])) ? $data['svname'] : null;
         $this->ip  = (isset($data['ip']))  ? $data['ip']  : null;
         $this->ftpusername  = (isset($data['ftpusername']))  ? $data['ftpusername']  : null;
         $this->ftppass  = (isset($data['ftppass']))  ? $data['ftppass']  : null;
         $this->link  = (isset($data['link']))  ? $data['link']  : null;
		 $this->path  = (isset($data['path']))  ? $data['path']  : null;
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