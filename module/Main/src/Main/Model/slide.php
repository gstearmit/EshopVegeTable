<?php
 namespace Main\Model;

 // Add these import statements
 use Zend\InputFilter\InputFilter;
 use Zend\InputFilter\InputFilterAwareInterface;
 use Zend\InputFilter\InputFilterInterface;

 class slide implements InputFilterAwareInterface
 {
     public $id;
     public $vid;

     protected $inputFilter;                       // <-- Add this variable

     public function exchangeArray($data)
     {
         $this->id     = (isset($data['id']))     ? $data['id']     : null;
         $this->vid = (isset($data['vid'])) ? $data['vid'] : null;

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