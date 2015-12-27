<?php

namespace Payoutrates\Model;

class Buyer {
    public $id;
    public $BuyerName;
    public $BuyerEmail;
    public $ItemName;
    public $ItemNumber;
    public $ItemAmount;
    public $ItemQTY;
    
   
 
    function exchangeArray($data) 
    {
        $this->id = (isset($data['id'])) ? $data['id'] : null;
        $this->BuyerName = (isset($data['BuyerName'])) ? $data['BuyerName'] : null;
        $this->BuyerEmail = (isset($data['BuyerEmail'])) ? $data['BuyerEmail'] : null;
        $this->ItemName = (isset($data['ItemName'])) ? $data['ItemName'] : null;
        $this->ItemNumber = (isset($data['ItemNumber'])) ? $data['ItemNumber'] : null;
        $this->ItemAmount = (isset($data['ItemAmount'])) ? $data['ItemAmount'] : null;
        $this->ItemQTY = (isset($data['ItemQTY'])) ? $data['ItemQTY'] : null;
        
        
      
    }

    public function getArrayCopy() {
        return get_object_vars($this);
    }

}
