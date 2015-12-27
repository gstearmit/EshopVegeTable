<?php

namespace Slider\Model;

// Add these import statements
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class Slider implements InputFilterAwareInterface {
	public $id;
	public $link;
	public $img;
	public $status;
	public $text;
	protected $inputFilter;
	
	public function exchangeArray($data) {
		$this->id = (isset ( $data ['id'] )) ? $data ['id'] : null;
		$this->status = (isset ( $data ['status'] )) ? $data ['status'] : null;
		$this->link = (isset ( $data ['link'] )) ? $data ['link'] : null;
		$this->img = (isset ( $data ['img'] )) ? $data ['img'] : null;
		$this->text = (isset ( $data ['text'] )) ? $data ['text'] : null;
	}
	public function dataArraySwap($data, $Renamefile) {
		$this->id = (isset ( $data ['id'] )) ? $data ['id'] : null;
		$this->status = (isset ( $data ['status'] )) ? $data ['status'] : null;
		$this->link = (isset ( $data ['link'] )) ? $data ['link'] : null;
		$this->img = $Renamefile;
		$this->text = (isset ( $data ['text'] )) ? $data ['text'] : null;
		}
	
	// Add content to these methods:
	public function setInputFilter(InputFilterInterface $inputFilter) {
		throw new \Exception ( "Not used" );
	}
	// Add the following method:
	public function getArrayCopy() {
		return get_object_vars ( $this );
	}
	public function getInputFilter() {
		if (! $this->inputFilter) {
			$inputFilter = new InputFilter ();
			
			$factory = new InputFactory ();
			
			$inputFilter->add ( $factory->createInput ( array (
					'name' => 'id',
					'required' => false,
					'filters' => array (
							array (
									'name' => 'Int' 
							) 
					) 
			) ) );
			
			
			$inputFilter->add ( $factory->createInput ( array (
					'name' => 'link',
					'required' => true,
					'filters' => array (
							array (
									'name' => 'StripTags' 
							),
							array (
									'name' => 'StringTrim' 
							) 
					),
					'validators' => array (
							array (
									'name' => 'StringLength',
									'options' => array (
											'encoding' => 'UTF-8',
											'min' => 1,
											'max' => 100
									) 
							) 
					) 
			) ) );
			
			$inputFilter->add ( $factory->createInput ( array (
					'name' => 'text',
					'required' => false,
					
					'filters' => array (
							array (
									'name' => 'StripTags' 
							),
							array (
									'name' => 'StringTrim' 
							) 
					),
					'validators' => array (
							array (
									'name' => 'StringLength',
									'options' => array (
											'encoding' => 'UTF-8',
											'min' => 1,
											'max' => 100
									) 
							) 
					) 
					
			) ) );
			
			$inputFilter->add ( $factory->createInput ( array (
					'name' => 'img',
					'required' => false,
					'validators' => array (
							array (
									'name' => 'FileExtension',
									'options' => array (
											'extension' => 'jpg, jpeg, JPG, JPEG' 
									)  // png, gif,, PNG , GIF
														),
							array (
									'name' => 'FileSize',
									'options' => array (
											'min' => 1,
											'max' => 10000000 
									),
									array (
											'name' => 'StringLength',
											'options' => array (
													'encoding' => 'UTF-8',
													'min' => 1,
													'max' => 10000 
											) 
									) 
							) 
					) 
			) ) );
			
			
			
			$this->inputFilter = $inputFilter;
		}
		
		return $this->inputFilter;
	}
}
?>