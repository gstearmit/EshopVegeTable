<?php

namespace Payoutrates\Form;

use Zend\Form\Form;
use Zend\InputFilter;
use Zend\Form\Element;
use Zend\Session\Container;

class AbuseForm extends Form {

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
        parent::__construct('abuse-form');
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
        		    'name' => 'id',
		        	'id' => 'id',
		            'type' => 'number',
		            'attributes' => array(
		                'class' => 'form-control',
		            	'required' => 'true',
		            ),
		            'options' => array(
		                'label' => 'id',
		            		
		            )
        ));
        

        $this->add(array(
            'name' => 'email',
        	'id' => 'email',
            'type' => 'email',
            'attributes' => array(
                'class' => 'form-control',
            	'required' => 'true',
            ),
            'options' => array(
                'label' => 'email',
            		
            )
        ));

        
        $this->add(array(
        		'name' => 'catalogue',
        		'id' => 'catalogue',
        		 'type' => 'text',
        		'attributes' => array(
        				'class' => 'form-control',
        				//'required' => 'true',
        		),
        		'options' => array(
        				'label' => 'catalogue'
        		)
        ));
        
        
        $this->add(array(
        		'name' => 'linkads',
        		'id' => 'linkads',
        		 'type' => 'url',
        		'attributes' => array(
        				'class' => 'form-control',
        				//'required' => 'true',
        		),
        		'options' => array(
        				'label' => 'linkads'
        		)
        ));
        
        $this->add(array(
        		'name' => 'status',
        		'id' => 'status',
        		'type' => 'number',
        		'attributes' => array(
        				'class' => 'form-control',
        				//'required' => 'true',
        		),
        		'options' => array(
        				'label' => 'status',
        
        		)
        ));
        
        $this->add(array(
        		'name' => 'date_create',
        		'id' => 'date_create',
        		'type' => 'date',
        		'attributes' => array(
        				'class' => 'form-control',
        				//'required' => 'true',
        		),
        		'options' => array(
        				'label' => 'Date Create',
        
        		)
        ));
        
        $this->add(array(
        		'name' => 'url_reported',
        		'id' => 'url_reported',
        		'type' => 'url',
        		'attributes' => array(
        				'class' => 'form-control',
        				//'required' => 'true',
        		),
        		'options' => array(
        				'label' => 'Url reported',
        
        		)
        ));
        
        
        
        
        $this->add(array(
        		'name' => 'user_forum',
        		'id' => 'user_forum',
        		'type' => 'text',
        		'attributes' => array(
        				'class' => 'form-control',
        				//'required' => 'true',
        		),
        		'options' => array(
        				'label' => 'User Forum',
        
        		)
        ));
        
        $this->add(array(
        		'name' => 'abuse_description',
        		'id' => 'abuse_description',
        		'type' => 'text',
        		'attributes' => array(
        				'class' => 'form-control',
        				//'required' => 'true',
        		),
        		'options' => array(
        				'label' => 'Abuse Description',
        
        		)
        ));
        
        
        $this->add(array(
        		'name' => 'human_check',
        		'id' => 'human_check',
        		'type' => 'date',
        		'attributes' => array(
        				'class' => 'form-control',
        				//'required' => 'true',
        		),
        		'options' => array(
        				'label' => 'Human Check',
        
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
                'value' => 'Abuse Send',
                'class' => 'btn btn-primary',
            ),
        ));
    }
    

}
