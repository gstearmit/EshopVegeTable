<?php

namespace News\Form;

use Zend\InputFilter\InputFilter;

class NewsFilter extends InputFilter {

    public function __construct($name = null) {
        $this->add(array(
            'name' => 'news_name',
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

        $this->add(array(
            'type' => 'Zend\InputFilter\FileInput',
            'name' => 'news_thumbnail',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'File/Extension',
                    'options' => array(
                        'extension' => array('gif', 'png', 'jpg', 'jpeg', 'GIF', 'PNG', 'JPG', 'JPEG'),
                        'messages' => array(
                            \Zend\Validator\File\Extension::FALSE_EXTENSION => 'Please select the correct image format',
                        )
                    ),
                ),
            ),
        ));

        $this->add(array(
            'name' => 'news_content',
            'validators' => array(
                array(
                    'name' => 'StringLength',
                    'options' => array(
                        'encoding' => 'UTF-8',
                        'max' => 500000,
                        'messages' => array(
                            \Zend\Validator\StringLength::TOO_LONG => 'Content maximum of 500,000 characters',
                        )
                    ),
                ),
            ),
        ));
    }

}
