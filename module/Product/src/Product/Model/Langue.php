<?php

namespace Payoutrates\Model;

class Langue {
    public $id;
    public $countrycode;
    public $namecountry;
    public $code;
    public $capital;
   
   
 
    function exchangeArray($data) 
    {
        $this->id = (isset($data['id'])) ? $data['id'] : null;
        $this->countrycode = (isset($data['countrycode'])) ? $data['countrycode'] : null;
        $this->namecountry = (isset($data['namecountry'])) ? $data['namecountry'] : null;
        $this->code = (isset($data['code'])) ? $data['code'] : null;
        $this->capital = (isset($data['capital'])) ? $data['capital'] : null;
       
       
    }

    public function getArrayCopy() {
        return get_object_vars($this);
    }

}
