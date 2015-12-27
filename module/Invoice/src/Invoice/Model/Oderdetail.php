<?php

namespace Invoice\Model;

class Oderdetail {
    public $id;
    public $description;
    public $oder_id;
    public $date_creat;
    public $date_mod;
    public $id_user;
    public $status;    
    public $type;
    public $quantity;
    public $cpmRate;
    public $amount;
    public $AdobeFlashEnabled;
    public $MaxDailyBudget;
    public $MobileTargeting;
    public $trafficsources;
    public $PreviousWebsite;
    public $payment_select;
    public $id_product;
    public $price_product;
   
 
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
        $this->type = (isset($data['type'])) ? $data['type'] : null;
        $this->cpmRate = (isset($data['cpmRate'])) ? $data['cpmRate'] : null;
        $this->amount = (isset($data['amount'])) ? $data['amount'] : null;
        $this->AdobeFlashEnabled = (isset($data['AdobeFlashEnabled'])) ? $data['AdobeFlashEnabled'] : null;
        $this->MaxDailyBudget = (isset($data['MaxDailyBudget'])) ? $data['MaxDailyBudget'] : null;
        $this->MobileTargeting = (isset($data['MobileTargeting'])) ? $data['MobileTargeting'] : null;
        $this->trafficsources = (isset($data['trafficsources'])) ? $data['trafficsources'] : null;
        $this->PreviousWebsite = (isset($data['PreviousWebsite'])) ? $data['PreviousWebsite'] : null;
        $this->payment_select = (isset($data['payment_select'])) ? $data['payment_select'] : null;
        $this->id_product = (isset($data['id_product'])) ? $data['id_product'] : null;
        $this->price_product = (isset($data['price_product'])) ? $data['price_product'] : null;
    }
     public function getdata() {
        $data = array();
        $date = date('Y-m-d');
        $data['oder_id'] = $this->oder_id;
        $data['quantity'] = $this->quantity;
        $data['id_product'] = $this->id_product;
        $data['price_product'] = $this->price_product;            
        $data['date_creat'] = $date;  
        $data['date_mod'] = $date;  
        return $data;
    }
}