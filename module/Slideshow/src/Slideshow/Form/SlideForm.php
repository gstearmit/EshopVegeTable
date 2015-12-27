<?php
namespace Slideshow\Form;

use Slideshow\Controller\IndexController;
use Zend\InputFilter;
use Zend\Form\Element;
use Zend\Form\Form;
//adapter
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\Adapter\Adapter;

class SlideForm extends Form {
	protected $adapter;
    public function __construct(AdapterInterface $dbAdapter, $id = Null) 
    {
    	$this->adapter = $dbAdapter;
        parent::__construct('slideform');
        $this->setAttribute('method', 'post');
        $this->setAttribute('class', 'form-horizontal');
        $this->setAttribute('enctype', 'multipart/form-data');
		
      
        //text
        $this->add(array(
            'name' => 'text',
            'attributes' => array(
                'type' => 'textarea',
                'maxlength' => 250,
                'class' => 'form-control',
            	'id'	=> 'descripts',
            	//'required'	=>'required',
            ),
            'options' => array(
                'label' => 'Text',
            ),
        ));
        
      
        //link
        $this->add(array(
        		'name' => 'link',
        		'attributes' => array(
	        		'type' => 'text',
	        		'maxlength' => 250,
	        		'class' => 'form-control',
        			//'required'	=>'required',
        		),
        		'options' => array(
        				'label' => 'Link',
        		),
        ));
        
		//images
        $this->add(array(
            'name' => 'img',
            'attributes' => array(
                'type' => 'file',
                'accept' => '.jpg, .png, .gif, .jpeg, .JPG, .PNG, .GIF, .JPEG',
            	'class' => 'form-control',
            	//'required'	=>'required',
            ),
            'options' => array(
                'label' => 'Images',
            ),
        ));
        //status
        
        $this->add(array(
        		'type' => 'Zend\Form\Element\Radio',
        		'name' => 'status',
        		'options' => array(
        				'label' => 'Status',
        				'value_options' => array(
        						array('label' =>'Active', 'value'=>1),
        						array('label'=>'Pause', 'value'=>0),
        				),
        		),
        		'attributes' => array(
        				'value' => '1' //set checked to '1',
        				//'required'	=>'required',
        		)
        ));
      
        
        //submit
        $this->add(array(
       		'name' => 'btn_submit',
        	'attributes' => array(
        	'type' => 'submit',
        	'id'	=>'submitbutton',
        	'value' => 'Add Slide',
        	'class' => 'btn btn-primary',
        		),
        ));
        
       
        
        
    }//and func

}//and class


