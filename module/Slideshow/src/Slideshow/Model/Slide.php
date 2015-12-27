<?php

namespace Slideshow\Model;

// Add these import statements
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class Slide implements InputFilterAwareInterface {

    public $id;
	public $img;
	public $text;
	public $link;	
	public $status;
	protected $inputFilter;
	public function exchangeArray($data) {
		$this->id = (isset ( $data ['id'] )) ? $data ['id'] : null;
		$this->img = (isset ( $data ['img'] )) ? $data ['img'] : null;		
		$this->text = (isset ( $data ['text'] )) ? $data ['text'] : null;
		$this->link = (isset ( $data ['link'] )) ? $data ['link'] : null;
		$this->status = (isset ( $data ['status'] )) ? $data ['status'] : null;
		
	}
	public function dataArraySwap($data, $Renamefile) {
		$this->id = (isset ( $data ['id'] )) ? $data ['id'] : null;		
		$this->text = (isset ( $data ['text'] )) ? $data ['text'] : null;
		$this->link = (isset ( $data ['link'] )) ? $data ['link'] : null;
		$this->status = (isset ( $data ['status'] )) ? $data ['status'] : null;
		$this->img = $Renamefile;
		
	}
	
    // Add content to these methods:
    public function setInputFilter(InputFilterInterface $inputFilter) {
        throw new \Exception("Not used");
    }

    // Add the following method:
    public function getArrayCopy() {
        return get_object_vars($this);
    }

    public function getInputFilter() {
    	
        if (!$this->inputFilter) {
            $inputFilter = new InputFilter ();
            
            $factory = new InputFactory ();

            $inputFilter->add($factory->createInput(array(
                        'name' => 'id',
                        'required' => false,
                        'filters' => array(
                            array(
                                'name' => 'Int'
                            )
                        )
            )));

            $inputFilter->add($factory->createInput(array(
                        'name' => 'text',
                        'required' => true,
                        'filters' => array(
                            array(
                                'name' => 'StripTags'
                            ),
                            array(
                                'name' => 'StringTrim'
                            )
                        ),
                        'validators' => array(
                            array(
                                'name' => 'StringLength',
                                'options' => array(
                                    'encoding' => 'UTF-8',
                                    'min' => 1,
                                    'max' => 2500000
                                )
                            )
                        )
            )));

            $inputFilter->add($factory->createInput(array(
                        'name' => 'link',
                        'required' => true,
                        'filters' => array(
                            array(
                                'name' => 'StripTags'
                            ),
                            array(
                                'name' => 'StringTrim'
                            )
                        ),
                        'validators' => array(
                            array(
                                'name' => 'StringLength',
                                'options' => array(
                                    'encoding' => 'UTF-8',
                                    'min' => 1,
                                    'max' => 25000
                                )
                            )
                        )
            )));

           

            $inputFilter->add($factory->createInput(array(
                        'type' => 'Zend\InputFilter\FileInput',
	            'name' => 'img',
	           // 'required' => true,
	            'validators' => array(
            		array(
            				'name' => 'File/Extension',
            				'options' => array(
            						'extension' => array('jpg'),
            						'messages' => array(
            								\Zend\Validator\File\Extension::FALSE_EXTENSION => 'Please select the correct image format (.jpg)',
            						)
            				),
            		),
                array(
                    'name' => 'File/Size',
                    'options' => array(
                        'min' => '5kb',
                        'max' => '500kb',
                        'messages' => array(
                            \Zend\Validator\File\Size::TOO_BIG => 'Please select the correct image format (Size < 500kb) ',
                            \Zend\Validator\File\Size::TOO_SMALL => 'Please select the correct image format (Size > 5kb)',
                        )
                    ),
                ),
	            
// 	            		array(
// 	            				'name' => 'File/UploadFile',
// 	            				'options' => array(
// 	            						'messages' => array(
// 	            								\Zend\Validator\File\UploadFile::NO_FILE => 'no file',
// 	            						)
// 	            				),
// 	            		),
            ),
            )));

            $this->inputFilter = $inputFilter;
            
           
        }

        return $this->inputFilter;
      
    }

}

?>