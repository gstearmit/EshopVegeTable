<?php

namespace Customer\Model;

use Zend\Session\Container;
class Email {

    public $id;
    public $code;    
    public $email;
    public $date;

    public function exchangeArray($data) {
        $this->id = (isset($data['id'])) ? $data['id'] : null;
        $this->code = (isset($data['code'])) ? $data['code'] : null;        
        $this->email = (isset($data['email'])) ? $data['email'] : null;
        $this->date = (isset($data['date'])) ? $data['date'] : null;
       
    }

    public function getdata() {
        $data = array();         
        $date = date('Y-m-d');
        $data['code'] = $this->code;
        $data['email'] = $this->email; 
        $data['date']=$date;
        return $data;
    }
   
}
