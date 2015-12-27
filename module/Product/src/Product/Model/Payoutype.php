<?php

namespace Product\Model;

class Payoutype {
    public $id;
    public $nametype;
  
    public $date_creat;
    public $date_mod;
    public $id_user;
    public $status;
    
 
    function exchangeArray($data) {
        $this->id = (isset($data['id'])) ? $data['id'] : null;
        $this->nametype = (isset($data['nametype'])) ? $data['nametype'] : null;
       
        $this->date_creat = (isset($data['date_creat'])) ? $data['date_creat'] : null;
        $this->date_mod = (isset($data['date_mod'])) ? $data['date_mod'] : null;
        $this->id_user = (isset($data['id_user'])) ? $data['id_user'] : null;
        $this->status = (isset($data['status'])) ? $data['status'] : null;
      
    }

    public function getArrayCopy() {
        return get_object_vars($this);
    }

}
