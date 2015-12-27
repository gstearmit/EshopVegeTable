<?php

namespace Persons\Model;

class Persons {
    public $id;
    public $name;
    public $gender;
    public $birthday;
    public $national;
    public $passport;
  
    public $passport_exp;
    public $user_id;
    public $invoice_id;
    public $primary_email;
    public $secondary_email;
    public $primary_pass;
    public $visa_id;
   
 
    function exchangeArray($data) 
    {
        $this->id = (isset($data['id'])) ? $data['id'] : null;
        $this->name = (isset($data['name'])) ? $data['name'] : null;
        $this->gender = (isset($data['gender'])) ? $data['gender'] : null;
        $this->birthday = (isset($data['birthday'])) ? $data['birthday'] : null;
        $this->national = (isset($data['national'])) ? $data['national'] : null;
        $this->passport = (isset($data['passport'])) ? $data['passport'] : null;
       
        $this->passport_exp = (isset($data['passport_exp'])) ? $data['passport_exp'] : null;
        $this->user_id = (isset($data['user_id'])) ? $data['user_id'] : null;
        $this->invoice_id = (isset($data['invoice_id'])) ? $data['invoice_id'] : null;
        $this->primary_email = (isset($data['primary_email'])) ? $data['primary_email'] : null;
        $this->secondary_email = (isset($data['secondary_email'])) ? $data['secondary_email'] : null;
        $this->primary_pass = (isset($data['primary_pass'])) ? $data['primary_pass'] : null;
        $this->visa_id = (isset($data['visa_id'])) ? $data['visa_id'] : null;
         
    }

    public function getArrayCopy() {
        return get_object_vars($this);
    }

}
