<?php

namespace Settings\Form;

use Zend\Form\Form;
use Zend\InputFilter;
use Zend\Form\Element;
use Zend\Session\Container;

class SettingsForm extends Form {

	//set type
	public function settype($data ,$value=null)
	{
		$type= new Element\Select('type');
		$type->setLabel('Choice Type:')
		->setAttribute('class','form-control')
		->setAttribute('id','type')
		->setAttribute('onchange','gettypeval(this);')
		->setAttribute('required','true')
		->setValue($value)
		->setValueOptions($data);
		$this->add($type);
	}
    public function __construct($name = null) 
    {
        parent::__construct('contact-form');
        $this->addElements();
    }
        public function addElements()
        {
        
        $this->setAttribute('method', 'post');
        $this->setAttribute('enctype', 'multipart/form-data');

        $this->add(array(
            'name' => 'name',
            'attributes' => array(
                'type' => 'text',
                'maxlength' => 250,
                'class' => 'form-control',
                'required' => 'true',
            ),
            'options' => array(
                'label' => 'Name',
            ),
        ));



        $this->add(array(
            'name' => 'email',
        	'id' => 'email',
            'type' => 'text',
            'attributes' => array(
                'class' => 'form-control',
            	'required' => 'true',
            ),
            'options' => array(
                'label' => 'email',
            		
            )
        ));

        
        $this->add(array(
        		'name' => 'phone',
        		'id' => 'phone',
        		 'type' => 'text',
        		'attributes' => array(
        				'class' => 'form-control',
        				'required' => 'true',
        		),
        		'options' => array(
        				'label' => 'Phone'
        		)
        ));
        
        
        $this->add(array(
        		'name' => 'content',
        		'id' => 'content',
        		 'type' => 'text',
        		'attributes' => array(
        				'class' => 'form-control',
        				'required' => 'true',
        		),
        		'options' => array(
        				'label' => 'content'
        		)
        ));
        
        $this->add(array(
        		'name' => 'status',
        		'id' => 'status',
        		'type' => 'text',
        		'attributes' => array(
        				'class' => 'form-control',
        				'required' => 'true',
        		),
        		'options' => array(
        				'label' => 'status',
        
        		)
        ));
        
        $this->add(array(
        		'name' => 'subject_contact',
        		'id' => 'subject_contact',
        		'type' => 'text',
        		'attributes' => array(
        				'class' => 'form-control',
        				'required' => 'true',
        		),
        		'options' => array(
        				'label' => 'Subject Contact',
        
        		)
        ));
        
        
        
        
       
        
      

        $this->add(array(
        		'type' => 'Zend\Form\Element\Csrf',
        		'name' => 'security',
        		'options' => array(
        				'csrf_options' => array(
        						'timeout' => 600
        				)
        		)
        ));
        
        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type' => 'submit',
                'value' => 'Edit Contact',
                'class' => 'btn btn-primary',
            ),
        ));
    }
    

}
