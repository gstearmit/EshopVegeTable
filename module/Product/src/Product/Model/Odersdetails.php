<?php

namespace Payoutrates\Model;

class Odersdetails {
    public $id;
    public $description;
    public $oder_id;
    public $date_creat;
    public $date_mod;
    public $id_user;
    public $status;
    
    public $quantity;
    public $cpmRate;
    public $amount;
    public $type;
 
    
    public $AdobeFlashEnabled;
    public $MaxDailyBudget;
    public $MobileTargeting;
    public $PreviousWebsite;
    public $payment_select;
    public $trafficsources;
   
    
 
    function exchangeArray($data) 
    {
        $this->id = (isset($data['id'])) ? $data['id'] : null;
        $this->description = (isset($data['description'])) ? $data['description'] : null;
        $this->oder_id = (isset($data['oder_id'])) ? $data['oder_id'] : null;
        $this->date_creat = (isset($data['date_creat'])) ? $data['date_creat'] : null;
        $this->date_mod = (isset($data['date_mod'])) ? $data['date_mod'] : null;
        $this->id_user = (isset($data['id_user'])) ? $data['id_user'] : null;
        $this->status = (isset($data['status'])) ? $data['status'] : null;
        
        $this->quantity = (isset($data['quantity'])) ? $data['quantity'] : null;
        $this->cpmRate = (isset($data['cpmRate'])) ? $data['cpmRate'] : null;
        $this->amount = (isset($data['amount'])) ? $data['amount'] : null;
        $this->type = (isset($data['type'])) ? $data['type'] : null;
        
        
        $this->AdobeFlashEnabled = (isset($data['AdobeFlashEnabled'])) ? $data['AdobeFlashEnabled'] : null;
        $this->MaxDailyBudget = (isset($data['MaxDailyBudget'])) ? $data['MaxDailyBudget'] : null;
        $this->MobileTargeting = (isset($data['MobileTargeting'])) ? $data['MobileTargeting'] : null;
        $this->PreviousWebsite = (isset($data['PreviousWebsite'])) ? $data['PreviousWebsite'] : null;
        
        $this->payment_select = (isset($data['payment_select'])) ? $data['payment_select'] : null;
      
        $this->trafficsources = (isset($data['trafficsources'])) ? $data['trafficsources'] : null;
       
      
    }

    public function getArrayCopy() {
        return get_object_vars($this);
    }

}
