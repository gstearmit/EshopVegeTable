<?php

namespace Langdingpage\Model;

class Langdingpage {
    public $id;
    public $name;
    public $email;
    public $phone;
    public $date_creat;
    public $content;
    public $status;
    public $subject_contact;
    
    
   
 
    function exchangeArray($data) 
    {
        $this->id = (isset($data['id'])) ? $data['id'] : null;
        $this->name = (isset($data['name'])) ? $data['name'] : null;
        $this->email = (isset($data['email'])) ? $data['email'] : null;
        $this->phone = (isset($data['phone'])) ? $data['phone'] : null;
        $this->date_creat = (isset($data['date_creat'])) ? $data['date_creat'] : null;
        $this->content = (isset($data['content'])) ? $data['content'] : null;
        $this->status = (isset($data['status'])) ? $data['status'] : 0;
        $this->subject_contact = (isset($data['subject_contact'])) ? $data['subject_contact'] : null;
     
    }

    public function getArrayCopy() {
        return get_object_vars($this);
    }

}
