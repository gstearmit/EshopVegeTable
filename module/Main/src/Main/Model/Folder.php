<?php
 namespace Main\Model;

 // Add these import statements
 use Zend\InputFilter\InputFilter;
 use Zend\InputFilter\InputFilterAwareInterface;
 use Zend\InputFilter\InputFilterInterface;

 class Folder implements InputFilterAwareInterface
 {
     public $id;
     public $externalsv_id;
     public $folder_name;
     public $folder_key;
     public $role;
    
	 public $user_id;
	 public $status;
     protected $inputFilter;                       // <-- Add this variable
	protected $datecreat ;
     public function exchangeArray($data)
     {
         $this->id     = (isset($data['id']))     ? $data['id']     : null;
         $this->externalsv_id = (isset($data['externalsv_id'])) ? $data['externalsv_id'] : null;
         $this->folder_name  = (isset($data['folder_name']))  ? $data['folder_name']  : null;
         $this->folder_key  = (isset($data['folder_key']))  ? $data['folder_key']  : null;
         $this->role  = (isset($data['role']))  ? $data['role']  : null;   
		 $this->user_id  = (isset($data['user_id']))  ? $data['user_id']  : null;
		 $this->datecreat  = (isset($data['datecreat']))  ? $data['datecreat']  : null;
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