<?php

namespace Product\Form;

use Zend\InputFilter\InputFilter;

class ProductFilter extends InputFilter {

    public function __construct($name = null) {
        $this->add(array(
            'name' => 'name',
            'required' => true,
            'filters' => array(
                array(
                    'name' => 'StripTags',
                    'name' => 'StringTrim'
                )
            ),
            'validators' => array(
                array(
                    'name' => 'StringLength',
                    'options' => array(
                        'min' => 6,
                        'max' => 200,
                        'messages' => array(
                            \Zend\Validator\StringLength::TOO_SHORT => 'Title must be at least 6 characters',
                            \Zend\Validator\StringLength::TOO_LONG => 'Title maximum of 200 characters'
                        )
                    )
                ),
                array(
                    'name' => 'NotEmpty',
                    'options' => array(
                        'messages' => array(
                            \Zend\Validator\NotEmpty::IS_EMPTY => 'Title can not be empty'
                        )
                    )
                )
            )
        ));

        $this->add(array(
            'name' => 'alias',
            'required' => true,
            'filters' => array(
                array(
                    'name' => 'StripTags',
                    'name' => 'StringTrim'
                )
            ),
            'validators' => array(
                array(
                    'name' => 'StringLength',
                    'options' => array(
                        'min' => 6,
                        'max' => 200,
                        'messages' => array(
                            \Zend\Validator\StringLength::TOO_SHORT => 'Title must be at least 6 characters',
                            \Zend\Validator\StringLength::TOO_LONG => 'Title maximum of 200 characters'
                        )
                    )
                ),
                array(
                    'name' => 'NotEmpty',
                    'options' => array(
                        'messages' => array(
                            \Zend\Validator\NotEmpty::IS_EMPTY => 'Title can not be empty'
                        )
                    )
                )
            )
        ));

        /*

          $inputFilter->add(array(
          'name' => 'availability',
          'required' => false,
          'allow_empty' => true,
          'validators' => array(
          array(
          'name' => 'Digits',
          )
          ),
          'filters' => array(
          array(
          'name' => 'Int',
          ),
          array(
          'name' => 'Null',
          'options' => array(
          'type' => 'all'
          ),
          ),
          ),
          ) );



          $inputFilter->add(array(
          'name' => 'rating',
          'required' => false,
          'allow_empty' => true,
          'validators' => array(
          array(
          'name' => 'Digits',
          )
          ),
          'filters' => array(
          array(
          'name' => 'Int',
          ),
          array(
          'name' => 'Null',
          'options' => array(
          'min' => 0,
          'max' => 4,
          ),
          ),
          ),
          ) );

          $inputFilter->add(array(
          'name' => 'hot',
          'required' => false,
          'allow_empty' => true,
          'validators' => array(
          array(
          'name' => 'Digits',
          )
          ),
          'filters' => array(
          array(
          'name' => 'Int',
          ),
          array(
          'name' => 'Null',
          'options' => array(
          'type' => 'all'
          ),
          ),
          ),
          ) );


          $inputFilter->add(array(
          'name' => 'availability',
          'required' => false,
          'allow_empty' => true,
          'validators' => array(
          array(
          'name' => 'Digits',
          )
          ),
          'filters' => array(
          array(
          'name' => 'Int',
          ),
          array(
          'name' => 'Null',
          'options' => array(
          'type' => 'all'
          ),
          ),
          ),
          ) );


          $inputFilter->add(array(
          'name' => 'promotions',
          'required' => false,
          'allow_empty' => true,
          'validators' => array(
          array(
          'name' => 'Digits',
          )
          ),
          'filters' => array(
          array(
          'name' => 'Int',
          ),
          array(
          'name' => 'Null',
          'options' => array(
          'type' => 'all'
          ),
          ),
          ),
          ) );


          $inputFilter->add(array(
          'name' => 'status',
          'required' => false,
          'allow_empty' => true,
          'validators' => array(
          array(
          'name' => 'Digits',
          )
          ),
          'filters' => array(
          array(
          'name' => 'Int',
          ),
          array(
          'name' => 'Null',
          'options' => array(
          'type' => 'all'
          ),
          ),
          ),
          ) );

         */

        $this->add(array(
            'name' => 'description',
            'validators' => array(
                array(
                    'name' => 'StringLength',
                    'options' => array(
                        'encoding' => 'UTF-8',
                        'max' => 500000,
                        'messages' => array(
                            \Zend\Validator\StringLength::TOO_LONG => 'Content maximum of 500,000 characters'
                        )
                    )
                )
            )
        ));

        $this->add(array(
            'name' => 'detail_product',
            'validators' => array(
                array(
                    'name' => 'StringLength',
                    'options' => array(
                        'encoding' => 'UTF-8',
                        'max' => 500000,
                        'messages' => array(
                            \Zend\Validator\StringLength::TOO_LONG => 'Content maximum of 500,000 characters'
                        )
                    )
                )
            )
        ));

        $this->add(array(
            'type' => 'Zend\InputFilter\FileInput',
            'name' => 'img',
            'required' => false,
            'validators' => array(
                array(
                    'name' => 'File/Extension',
                    'options' => array(
                        'extension' => array(
                            'jpg',
                            'jpeg',
                            'JPG',
                            'JPEG'
                        ), //'gif','GIF', 'PNG', 'png',
                        'messages' => array(
                            \Zend\Validator\File\Extension::FALSE_EXTENSION => 'Please select the correct image format'
                        )
                    )
                )
            )
        ));


        $this->add(array(
            'type' => 'Zend\InputFilter\FileInput',
            'name' => 'img1',
            'required' => false,
            'validators' => array(
                array(
                    'name' => 'File/Extension',
                    'options' => array(
                        'extension' => array(
                            'jpg',
                            'jpeg',
                            'JPG',
                            'JPEG'
                        ), //'gif','GIF', 'PNG', 'png',
                        'messages' => array(
                            \Zend\Validator\File\Extension::FALSE_EXTENSION => 'Please select the correct image format'
                        )
                    )
                )
            )
        ));


        $this->add(array(
            'type' => 'Zend\InputFilter\FileInput',
            'name' => 'img2',
            'required' => false,
            'validators' => array(
                array(
                    'name' => 'File/Extension',
                    'options' => array(
                        'extension' => array(
                            'jpg',
                            'jpeg',
                            'JPG',
                            'JPEG'
                        ), //'gif','GIF', 'PNG', 'png',
                        'messages' => array(
                            \Zend\Validator\File\Extension::FALSE_EXTENSION => 'Please select the correct image format'
                        )
                    )
                )
            )
        ));


        $this->add(array(
            'type' => 'Zend\InputFilter\FileInput',
            'name' => 'img3',
            'required' => false,
            'validators' => array(
                array(
                    'name' => 'File/Extension',
                    'options' => array(
                        'extension' => array(
                            'jpg',
                            'jpeg',
                            'JPG',
                            'JPEG'
                        ), //'gif','GIF', 'PNG', 'png',
                        'messages' => array(
                            \Zend\Validator\File\Extension::FALSE_EXTENSION => 'Please select the correct image format'
                        )
                    )
                )
            )
        ));

        $this->add(array(
            'type' => 'Zend\InputFilter\FileInput',
            'name' => 'img4',
            'required' => false,
            'validators' => array(
                array(
                    'name' => 'File/Extension',
                    'options' => array(
                        'extension' => array(
                            'jpg',
                            'jpeg',
                            'JPG',
                            'JPEG'
                        ), //'gif','GIF', 'PNG', 'png',
                        'messages' => array(
                            \Zend\Validator\File\Extension::FALSE_EXTENSION => 'Please select the correct image format'
                        )
                    )
                )
            )
        ));


        $this->add(array(
            'type' => 'Zend\InputFilter\FileInput',
            'name' => 'img5',
            'required' => false,
            'validators' => array(
                array(
                    'name' => 'File/Extension',
                    'options' => array(
                        'extension' => array(
                            'jpg',
                            'jpeg',
                            'JPG',
                            'JPEG'
                        ), //'gif','GIF', 'PNG', 'png',
                        'messages' => array(
                            \Zend\Validator\File\Extension::FALSE_EXTENSION => 'Please select the correct image format'
                        )
                    )
                )
            )
        ));

        $this->add(array(
            'type' => 'Zend\InputFilter\FileInput',
            'name' => 'img6',
            'required' => false,
            'validators' => array(
                array(
                    'name' => 'File/Extension',
                    'options' => array(
                        'extension' => array(
                            'jpg',
                            'jpeg',
                            'JPG',
                            'JPEG'
                        ), //'gif','GIF', 'PNG', 'png',
                        'messages' => array(
                            \Zend\Validator\File\Extension::FALSE_EXTENSION => 'Please select the correct image format'
                        )
                    )
                )
            )
        ));


        $this->add(array(
            'type' => 'Zend\InputFilter\FileInput',
            'name' => 'img7',
            'required' => false,
            'validators' => array(
                array(
                    'name' => 'File/Extension',
                    'options' => array(
                        'extension' => array(
                            'jpg',
                            'jpeg',
                            'JPG',
                            'JPEG'
                        ), //'gif','GIF', 'PNG', 'png',
                        'messages' => array(
                            \Zend\Validator\File\Extension::FALSE_EXTENSION => 'Please select the correct image format'
                        )
                    )
                )
            )
        ));


        $this->add(array(
            'type' => 'Zend\InputFilter\FileInput',
            'name' => 'img8',
            'required' => false,
            'validators' => array(
                array(
                    'name' => 'File/Extension',
                    'options' => array(
                        'extension' => array(
                            'jpg',
                            'jpeg',
                            'JPG',
                            'JPEG'
                        ), //'gif','GIF', 'PNG', 'png',
                        'messages' => array(
                            \Zend\Validator\File\Extension::FALSE_EXTENSION => 'Please select the correct image format'
                        )
                    )
                )
            )
        ));

        $this->add(array(
            'type' => 'Zend\InputFilter\FileInput',
            'name' => 'img9',
            'required' => false,
            'validators' => array(
                array(
                    'name' => 'File/Extension',
                    'options' => array(
                        'extension' => array(
                            'jpg',
                            'jpeg',
                            'JPG',
                            'JPEG'
                        ), //'gif','GIF', 'PNG', 'png',
                        'messages' => array(
                            \Zend\Validator\File\Extension::FALSE_EXTENSION => 'Please select the correct image format'
                        )
                    )
                )
            )
        ));


        $this->add(array(
            'type' => 'Zend\InputFilter\FileInput',
            'name' => 'img10',
            'required' => false,
            'validators' => array(
                array(
                    'name' => 'File/Extension',
                    'options' => array(
                        'extension' => array(
                            'jpg',
                            'jpeg',
                            'JPG',
                            'JPEG'
                        ), //'gif','GIF', 'PNG', 'png',
                        'messages' => array(
                            \Zend\Validator\File\Extension::FALSE_EXTENSION => 'Please select the correct image format'
                        )
                    )
                )
            )
        ));
    }

}
