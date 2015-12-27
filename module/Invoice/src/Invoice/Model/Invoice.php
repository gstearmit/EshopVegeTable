<?php

namespace Invoice\Model;

class Invoice {
    public $id;
    public $tracking_id;
    public $total;
    public $visa_id;
    public $date_creat;
    public $status_pay;
  
    
    
   
 
    function exchangeArray($data) 
    {
        $this->id = (isset($data['id'])) ? $data['id'] : null;
        $this->tracking_id = (isset($data['tracking_id'])) ? $data['tracking_id'] : null;
        $this->total = (isset($data['total'])) ? $data['total'] : null;
        $this->visa_id = (isset($data['visa_id'])) ? $data['visa_id'] : null;
        $this->date_creat = (isset($data['date_creat'])) ? $data['date_creat'] : null;
        $this->status_pay = (isset($data['status_pay'])) ? $data['status_pay'] : null;
       
    }

    public function getArrayCopy() {
        return get_object_vars($this);
    }

}
