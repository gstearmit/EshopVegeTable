<?php
 namespace Main\Model;

 // Add these import statements
 use Zend\InputFilter\InputFilter;
 use Zend\InputFilter\InputFilterAwareInterface;
 use Zend\InputFilter\InputFilterInterface;

 class bot implements InputFilterAwareInterface
 {
     public $id;
     public $title;
     public $adscode;
     public $time;
     protected $inputFilter;                       // <-- Add this variable

     public function exchangeArray($data)
     {
         $this->id     = (isset($data['id']))     ? $data['id']     : null;
         $this->title = (isset($data['title'])) ? $data['title'] : null;
         $this->adscode  = (isset($data['ads']))  ? $data['ads']  : null;
         $this->time  = (isset($data['time']))  ? $data['time']  : null;
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