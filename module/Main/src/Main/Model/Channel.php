<?php
 namespace Main\Model;

 // Add these import statements
 use Zend\InputFilter\InputFilter;
 use Zend\InputFilter\InputFilterAwareInterface;
 use Zend\InputFilter\InputFilterInterface;

 class Channel implements InputFilterAwareInterface
 {
     public $id;
     public $name;
     public $playlist;
     public $video_id;
	 public $channel_code;
	 public $image;
	 public $date_creat;
	 public $user_name;
	 public $channel_cat;
	 
     protected $inputFilter;                       // <-- Add this variable

     public function exchangeArray($data)
     {
         $this->id     = (isset($data['id']))     ? $data['id']     : null;
         $this->name = (isset($data['name'])) ? $data['name'] : null;
         $this->playlist  = (isset($data['playlist']))  ? $data['playlist']  : null;
         $this->video_id  = (isset($data['video_id']))  ? $data['video_id']  : null;
		 $this->channel_code  = (isset($data['channel_code']))  ? $data['channel_code']  : null;
		 $this->image  = (isset($data['image']))  ? $data['image']  : null;
		 $this->date_creat  = (isset($data['date_creat']))  ? $data['date_creat']  : null;
		 $this->user_name = (isset($data['user_name']))  ? $data['user_name']  : null;
		 $this->channel_cat  = (isset($data['channel_cat']))  ? $data['channel_cat']  : null;
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