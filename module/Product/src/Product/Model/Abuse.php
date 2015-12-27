<?php

namespace Payoutrates\Model;

class Abuse {
    public $id;
    public $name;
    public $email;
    public $catalogue;
    public $linkads;
    public $url_reported;
    public $user_forum;
    public $abuse_description;
    public $human_check;
    
    public $date_create;
   
    public $status;
   
    
    
   
 
    function exchangeArray($data) 
    {
        $this->id = (isset($data['id'])) ? $data['id'] : null;
        $this->email = (isset($data['email'])) ? $data['email'] : null;
        $this->name = (isset($data['name'])) ? $data['name'] : null;
        $this->catalogue = (isset($data['catalogue'])) ? $data['catalogue'] : null;
        $this->linkads = (isset($data['linkads'])) ? $data['linkads'] : null;
        $this->date_create = (isset($data['date_create'])) ? $data['date_create'] : null;
        $this->url_reported = (isset($data['url_reported'])) ? $data['url_reported'] : null;
        $this->user_forum = (isset($data['user_forum'])) ? $data['user_forum'] : 0;
        $this->abuse_description = (isset($data['abuse_description'])) ? $data['abuse_description'] : null;
        $this->human_check = (isset($data['human_check'])) ? $data['human_check'] : null;
        $this->status = (isset($data['status'])) ? $data['status'] : null;
       
    }

    public function getArrayCopy() {
        return get_object_vars($this);
    }

}
