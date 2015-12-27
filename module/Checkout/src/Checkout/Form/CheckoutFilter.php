<?php

namespace Checkout\Form;

use Zend\InputFilter\InputFilter;

class CheckoutFilter extends InputFilter {

    public function __construct($name = null) {
    	
        $this->add(array(
            'name' => 'name',
            'required' => true,
            'filters' => array(
                array(
                    'name' => 'StripTags',
                    'name' => 'StringTrim',
                ),
            ),
            'validators' => array(
                array(
                    'name' => 'StringLength',
                    'options' => array(
          
                        'min' => 6,
                        'max' => 200,
                        'messages' => array(
                            \Zend\Validator\StringLength::TOO_SHORT => 'Title must be at least 6 characters',
                            \Zend\Validator\StringLength::TOO_LONG => 'Title maximum of 200 characters',
                        )
                    ),
                ),
                array(
                    'name' => 'NotEmpty',
                    'options' => array(
                        'messages' => array(
                            \Zend\Validator\NotEmpty::IS_EMPTY => 'Title can not be empty',
                        ),
                    ),
                ),
            ),
        ));

       
    }

}
