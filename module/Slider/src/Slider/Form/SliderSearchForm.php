<?php
namespace Slider\Form;

use Zend\Form\Form;
use \Zend\Form\Element;

class SliderueSearchForm extends Form
{
    public function __construct($name = null)
    {
        parent::__construct('catalogue');
        $this->setAttribute('class', 'form-horizontal');
        $this->setAttribute('method', 'post');


        $title = new Element\Text('title');
        $title->setLabel('Name')
        ->setAttribute('class', 'required')
        ->setAttribute('placeholder', 'Name Slider');
	
        $description = new Element\Text('descriptionkey');
        $description->setLabel('Description')
                ->setAttribute('class', 'required')
                ->setAttribute('placeholder', 'description');
        


        $submit = new Element\Submit('submit');
        $submit->setValue('Search')
                ->setAttribute('class', 'btn btn-primary');


        $this->add($description);
	    $this->add($title);
	
        $this->add($submit);

    }
}


    