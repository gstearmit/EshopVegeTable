<?php

namespace Newsletter\Model;

class Newsletter {
    public $id;
    public $id_user;
    public $email;
    public $date_creat;
    public $status;
    public $is_subscribed;
    
    
   
 
    function exchangeArray($data) 
    {
        $this->id = (isset($data['id'])) ? $data['id'] : null;
        $this->id_user = (isset($data['id_user'])) ? $data['id_user'] : null;
        $this->email = (isset($data['email'])) ? $data['email'] : null;
        $this->date_creat = (isset($data['date_creat'])) ? $data['date_creat'] : null;
        $this->status = (isset($data['status'])) ? $data['status'] : 0;
        $this->is_subscribed = (isset($data['is_subscribed'])) ? $data['is_subscribed'] : 0;
        
    }

    public function getArrayCopy() {
        return get_object_vars($this);
    }

}
