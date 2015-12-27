<?php
 namespace Main\Model;

 // Add these import statements
 use Zend\InputFilter\InputFilter;
 use Zend\InputFilter\InputFilterAwareInterface;
 use Zend\InputFilter\InputFilterInterface;

 class Playlist implements InputFilterAwareInterface
 {
     public $id;
     public $name;
     public $listcode;
     public $video_id;
	 public $date_creat;
	 public $user_name;
	 public $sum_video;
     protected $inputFilter;                       // <-- Add this variable

     public function exchangeArray($data)
     {
         $this->id     = (isset($data['id']))     ? $data['id']     : null;
         $this->name = (isset($data['name'])) ? $data['name'] : null;
         $this->listcode  = (isset($data['listcode']))  ? $data['listcode']  : null;
         $this->video_id  = (isset($data['video_id']))  ? $data['video_id']  : null;
		 $this->date_creat  = (isset($data['date_creat']))  ? $data['date_creat']  : null;
		 $this->user_name = (isset($data['user_name']))  ? $data['user_name']  : null;
		 $this->sum_video = (isset($data['sum_video']))  ? $data['sum_video']  : null;
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