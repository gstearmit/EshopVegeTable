<?php
 namespace Main\Model;

 // Add these import statements
 use Zend\InputFilter\InputFilter;
 use Zend\InputFilter\InputFilterAwareInterface;
 use Zend\InputFilter\InputFilterInterface;

 class Banner implements InputFilterAwareInterface
 {
     public $id;
     public $title;
     public $adscode;
     public $time;
     public $status;
     public $date;
     public $user;
     
     
     
     protected $inputFilter;                       // <-- Add this variable

     public function exchangeArray($data)
     {
         $this->id     = (isset($data['id']))     ? $data['id']     : null;
         $this->title = (isset($data['title'])) ? $data['title'] : null;
         $this->adscode  = (isset($data['adscode']))  ? $data['adscode']  : null;
         $this->time  = (isset($data['time']))  ? $data['time']  : null;
         
         $this->status = (isset($data['status'])) ? $data['status'] : null;
         $this->date  = (isset($data['date']))  ? $data['date']  : null;
         $this->user  = (isset($data['user']))  ? $data['user']  : null;
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