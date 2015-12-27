<?php

namespace Crowler\Model;

 use Zend\InputFilter\InputFilter;
 use Zend\InputFilter\Factory as InputFactory;
 use Zend\InputFilter\InputFilterAwareInterface;
 use Zend\InputFilter\InputFilterInterface;

class Name implements InputFilterAwareInterface {

	public $id;
	public $name;
	public $parent;
	public $child;
	public $date_creat;
	public $date_modified;
	public $hot;
	public $status;
	public $new;
	public $alias;
	public $img;
	public $description;
	protected $inputFilter;
	
	public function exchangeArray($data) {
		$this->id = (isset($data ['id'])) ? $data ['id'] : null;
		$this->name = (isset($data ['name'])) ? $data ['name'] : null;
		if ($data ['parent'] == '' || $data ['parent'] == 0) {
			$this->parent = null;
		} else
			$this->parent = (isset($data ['parent'])) ? $data ['parent'] : null;
		$this->child = (isset($data ['child'])) ? $data ['child'] : null;
	
		$this->date_creat = (isset($data ['date_creat'])) ? $data ['date_creat'] : null;
		$this->date_modified = (isset($data ['date_modified'])) ? $data ['date_modified'] : null;
		$this->hot = (isset($data ['hot'])) ? $data ['hot'] : null;
		$this->status = (isset($data ['status'])) ? $data ['status'] : null;
		$this->new = (isset($data ['new'])) ? $data ['new'] : null;
		$this->alias = (isset($data ['alias'])) ? $data ['alias'] : null;
		$this->img = (isset($data ['img'])) ? $data ['img'] : null;
		$this->description = (isset($data ['description'])) ? $data ['description'] : null;
	}
    

   
 public function setInputFilter(InputFilterInterface $inputFilter) {
        throw new \Exception("Not used");
    }
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
                        'name' => 'name',
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
                                    'max' => 100
                                )
                            )
                        )
            )));

            $inputFilter->add($factory->createInput(array(
                        'name' => 'alias',
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
                                    'max' => 100
                                )
                            )
                        )
            )));

            $inputFilter->add($factory->createInput(array(
                        'name' => 'Description',
                        'required' => false,
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
                                    'max' => 100
                                )
                            )
                        )
            )));

            $inputFilter->add($factory->createInput(array(
                        'name' => 'img',
                        'required' => false,
                        'validators' => array(
                            array(
                                'name' => 'FileExtension',
                                'options' => array(
                                    'extension' => 'jpg, jpeg, JPG, JPEG'
                                )  // png, gif,, PNG , GIF
                            ),
                            array(
                                'name' => 'FileSize',
                                'options' => array(
                                    'min' => 1,
                                    'max' => 4000000
                                ),
                                array(
                                    'name' => 'StringLength',
                                    'options' => array(
                                        'encoding' => 'UTF-8',
                                        'min' => 1,
                                        'max' => 100
                                    )
                                )
                            )
                        )
            )));

            $inputFilter->add($factory->createInput(array(
                        'name' => 'hot',
                        'required' => true,
                        'filters' => array(
                            array(
                                'name' => 'Int'
                            )
                        )
            )));

            $this->inputFilter = $inputFilter;
        }

        return $this->inputFilter;
    }
    

}
