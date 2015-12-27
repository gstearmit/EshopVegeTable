<?php

namespace Payoutrates\Model;

class Oders {
    public $id;
    
    public $date_creat;
    public $date_mod;
    public $id_user;
    public $status;
  
    public $type;
    public $DolarTotal;
    public $TotaVistor;
    public $creatnamecampaign;
    public $Cpmrate;
    public $status_oder ;       // status oder pay 0: not pay ,1 : pay done

 
    function exchangeArray($data) 
    {
        $this->id = (isset($data['id'])) ? $data['id'] : null;
       
        $this->date_creat = (isset($data['date_creat'])) ? $data['date_creat'] : null;
        $this->date_mod = (isset($data['date_mod'])) ? $data['date_mod'] : null;
        $this->id_user = (isset($data['id_user'])) ? $data['id_user'] : null;
        $this->status = (isset($data['status'])) ? $data['status'] : null;
      
        $this->type = (isset($data['type'])) ? $data['type'] : null;
        
        $this->DolarTotal = (isset($data['DolarTotal'])) ? $data['DolarTotal'] : null;
        
        $this->TotaVistor = (isset($data['TotaVistor'])) ? $data['TotaVistor'] : null;
        $this->creatnamecampaign = (isset($data['creatnamecampaign'])) ? $data['creatnamecampaign'] : null;
        $this->status_oder = (isset($data['status_oder'])) ? $data['status_oder'] : 0;
        $this->Cpmrate = (isset($data['Cpmrate'])) ? $data['Cpmrate'] : 0;
        
    }

    public function getArrayCopy() {
        return get_object_vars($this);
    }

}
