<?php
namespace Admin\Form;

 use Zend\Form\Form;

 class RegisterForm extends Form
 {
     public function __construct($name = null)
     {
         // we want to ignore the name passed
         parent::__construct('Admin');

         $this->add(array(
             'name' => 'id',
             'type' => 'Hidden',
         ));
         $this->add(array(
             'name' => 'username',
             'type' => 'Text',
             'options' => array(
                 'label' => 'username',
             ),
         ));
         $this->add(array(
             'name' => 'password',
             'type' => 'password',
             'options' => array(
                 'label' => 'password',
             ),
         ));
         $this->add(array(
             'name' => 'email',
             'type' => 'Zend\Form\Element\Email',
             'options' => array(
                 'label' => 'email',
                ),
         ));
              
      
          $this->add(array(
             'name' => 'submit',
             'type' => 'Submit',
             'attributes' => array(
                 'value' => 'Go',
                 'id' => 'submitbutton',
             ),
         ));
     }
 }
 ?>