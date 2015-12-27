<?php
namespace Adminmaterialize\Form;

 use Zend\Form\Form;

 class LoginForm extends Form
 {
     public function __construct($name = null)
     {
         // we want to ignore the name passed
         parent::__construct('Adminmaterialize');

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