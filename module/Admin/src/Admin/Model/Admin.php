<?php
 namespace Admin\Model;

 // Add these import statements
 use Zend\InputFilter\InputFilter;
 use Zend\InputFilter\InputFilterAwareInterface;
 use Zend\InputFilter\InputFilterInterface;

 class Admin implements InputFilterAwareInterface
 {
     public $id;
     public $username;
     public $password;
     public $avatar;
     public $email;
     public $group;
	 public $channel_code;
	 public $playlist_id;
	 public $datetime;
	 public $birthday;
	 public $externalsv_id;
	 public $folder_key;
	 public $folder_name;
	 public $lastname;
	 public $firstname;
	 
	 public $company;
	 public $telephone;
	 public $fax;
	 public $street_1;
	 public $street_2;
	 public $city;
	 public $region;
	 public $postcode;
	 public $country;
	 public $default_shipping;
	 public $default_billing;
	 
	 
     protected $inputFilter;                       // <-- Add this variable

     public function exchangeArray($data)
     {
         $this->id     = (isset($data['id']))     ? $data['id']     : null;
         $this->username = (isset($data['username'])) ? $data['username'] : null;
         $this->password  = (isset($data['password']))  ? $data['password']  : null;
         $this->avatar  = (isset($data['avatar']))  ? $data['avatar']  : null;
         $this->email  = (isset($data['email']))  ? $data['email']  : null;
         $this->group  = (isset($data['group']))  ? $data['group']  : null;
		 $this->channel_code  = (isset($data['channel_code']))  ? $data['channel_code']  : null;
		 $this->playlist_id  = (isset($data['playlist_id']))  ? $data['playlist_id']  : null;
		 $this->datetime = (isset($data['datetime']))  ? $data['datetime']  : null;
		 $this->birthday = (isset($data['birthday']))  ? $data['birthday']  : null;
		 $this->externalsv_id  = (isset($data['externalsv_id']))  ? $data['externalsv_id']  : null;
		 $this->folder_key  = (isset($data['folder_key']))  ? $data['folder_key']  : null;
		 $this->folder_name = (isset($data['folder_name']))  ? $data['folder_name']  : null;
		 
		 $this->lastname  = (isset($data['lastname']))  ? $data['lastname']  : null;
		 $this->firstname = (isset($data['firstname']))  ? $data['firstname']  : null;
		 
		 $this->company  = (isset($data['company']))  ? $data['company']  : null;
		 $this->telephone  = (isset($data['telephone']))  ? $data['telephone']  : null;
		 $this->fax  = (isset($data['fax']))  ? $data['fax']  : null;
		 $this->street_1 = (isset($data['street_1']))  ? $data['street_1']  : null;
		 $this->street_2 = (isset($data['street_2']))  ? $data['street_2']  : null;
		 $this->city  = (isset($data['city']))  ? $data['city']  : null;
		 $this->region  = (isset($data['region']))  ? $data['region']  : null;
		 $this->postcode = (isset($data['postcode']))  ? $data['postcode']  : null;
		 $this->country  = (isset($data['country']))  ? $data['country']  : null;
		 
		 $this->default_billing = (isset($data['default_billing']))  ? $data['default_billing']  : null;
		 $this->default_shipping  = (isset($data['default_shipping']))  ? $data['default_shipping']  : null;
		 	
		 
     }
  

     // Add content to these methods:
     public function setInputFilter(InputFilterInterface $inputFilter)
     {
         throw new \Exception("Not used");
     }
     // Add the following method:
     public function getArrayCopy()
     {
         return get_object_vars($this);
     }
     public function getInputFilter()
     {
         if (!$this->inputFilter) {
             $inputFilter = new InputFilter();

             $inputFilter->add(array(
                 'name'     => 'id',
                 'required' => true,
                 'filters'  => array(
                     array('name' => 'Int'),
                 ),
             ));

             $inputFilter->add(array(
                 'name'     => 'username',
                 'required' => true,
                 'filters'  => array(
                     array('name' => 'StripTags'),
                     array('name' => 'StringTrim'),
                 ),
                 'validators' => array(
                     array(
                         'name'    => 'StringLength',
                         'options' => array(
                             'encoding' => 'UTF-8',
                             'min'      => 1,
                             'max'      => 100,
                         ),
                     ),
                 ),
             ));

             $inputFilter->add(array(
                 'name'     => 'password',
                 'required' => true,
                 'filters'  => array(
                     array('name' => 'StripTags'),
                     array('name' => 'StringTrim'),
                 ),
                 'validators' => array(
                     array(
                         'name'    => 'StringLength',
                         'options' => array(
                             'encoding' => 'UTF-8',
                             'min'      => 1,
                             'max'      => 100,
                         ),
                     ),
                 ),
             ));
             $inputFilter->add(array(
                 'name'     => 'email',
                 'required' => true,
                 'filters'  => array(
                     array('name' => 'StripTags'),
                     array('name' => 'StringTrim'),
                 ),
                 'validators' => array(
                     array(
                         'name'    => 'StringLength',
                         'options' => array(
                             'encoding' => 'UTF-8',
                             'min'      => 1,
                             'max'      => 100,
                         ),
                     ),
                 ),
             ));

             $this->inputFilter = $inputFilter;
         }

         return $this->inputFilter;
     }
      public function getInputFilterSpecification()
     {
         if (!$this->inputFilter) {
             $inputFilter = new InputFilter();

             $inputFilter->add(array(
                 'name'     => 'id',
                 'required' => true,
                 'filters'  => array(
                     array('name' => 'Int'),
                 ),
             ));

             $inputFilter->add(array(
                 'name'     => 'username',
                 'required' => true,
                 'filters'  => array(
                     array('name' => 'StripTags'),
                     array('name' => 'StringTrim'),
                 ),
                 'validators' => array(
                     array(
                         'name'    => 'StringLength',
                         'options' => array(
                             'encoding' => 'UTF-8',
                             'min'      => 1,
                             'max'      => 100,
                         ),
                     ),
                 ),
             ));

             $inputFilter->add(array(
                 'name'     => 'password',
                 'required' => true,
                 'filters'  => array(
                     array('name' => 'StripTags'),
                     array('name' => 'StringTrim'),
                 ),
                 'validators' => array(
                     array(
                         'name'    => 'StringLength',
                         'options' => array(
                             'encoding' => 'UTF-8',
                             'min'      => 1,
                             'max'      => 100,
                         ),
                     ),
                 ),
             ));
            
             $this->inputFilter = $inputFilter;
         }

         return $this->inputFilter;
     }
 }
 ?>