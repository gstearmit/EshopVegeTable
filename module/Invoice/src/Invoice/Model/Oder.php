<?php

namespace Invoice\Model;

class Oder {
    public $id;
    public $creatnamecampaign;
    public $date_creat;
    public $date_mod;
    public $id_user;
    public $status;
    public $status_oder;
    public $type;
    public $DolarTotal;
    public $Cpmrate;
    public $TotaVistor;
    public $customer;
    public $email;
    public $address;
    public $phone;
    public $time;
    public $totalprice;
    
   
 
    function exchangeArray($data) 
    {
        $this->id = (isset($data['id'])) ? $data['id'] : null;
        $this->creatnamecampaign = (isset($data['creatnamecampaign'])) ? $data['creatnamecampaign'] : null;
        $this->date_creat = (isset($data['date_creat'])) ? $data['date_creat'] : null;
        $this->date_mod = (isset($data['date_mod'])) ? $data['date_mod'] : null;
        $this->id_user = (isset($data['id_user'])) ? $data['id_user'] : null;
        $this->status = (isset($data['status'])) ? $data['status'] : null;
       $this->status_oder = (isset($data['status_oder'])) ? $data['status_oder'] : null;
        $this->type = (isset($data['type'])) ? $data['type'] : null;
        $this->DolarTotal = (isset($data['DolarTotal'])) ? $data['DolarTotal'] : null;
        $this->Cpmrate = (isset($data['Cpmrate'])) ? $data['Cpmrate'] : null;
        $this->TotaVistor = (isset($data['TotaVistor'])) ? $data['TotaVistor'] : null;
        $this->customer = (isset($data['customer'])) ? $data['customer'] : null;
        $this->email = (isset($data['email'])) ? $data['email'] : null;
        $this->address = (isset($data['address'])) ? $data['address'] : null;
        $this->phone = (isset($data['phone'])) ? $data['phone'] : null;
        $this->time = (isset($data['time'])) ? $data['time'] : null;
        $this->totalprice = (isset($data['totalprice'])) ? $data['totalprice'] : null;
    }
     public function getdata() {
        $data = array();
        $date = date('Y-m-d');
        $data['id_user'] = $this->id_user;
        $data['customer'] = $this->customer;
        $data['email'] = $this->email;
        $data['address'] = $this->address;
        $data['phone'] = $this->phone;
        $data['time'] = $this->time;
        $data['status_oder'] = 0;
        $data['type'] = $this->type;
        $data['totalprice'] = $this->totalprice;       
        $data['date_creat'] = $date;  
        $data['date_mod'] = $date;  
        return $data;
    }
    public function status(){
       $data = array();  
       $data['status_oder'] = $this->status_oder;
       return $data;
    }
}