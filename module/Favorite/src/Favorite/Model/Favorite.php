<?php

namespace Favorite\Model;

class Favorite {

    public $ID;
    public $customer_ID;
    public $product_ID;
    public $date_created;
    

    public function exchangeArray($data) {
        $this->ID = (isset($data['ID'])) ? $data['ID'] : null;
        $this->customer_ID = (isset($data['customer_ID'])) ? $data['customer_ID'] : null;
        $this->product_ID = (isset($data['product_ID'])) ? $data['product_ID'] : null;
        $this->date_created = (isset($data['date_created'])) ? $data['date_created'] : null;
      
    }
    public function data_favorite(){
        $data=array();
        $date = date('Y-m-d H:i:s');
        $data['customer_ID']= $this->customer_ID;
        $data['product_ID']=  $this->product_ID;
        $data['date_created']=$date;
        return $data;
    }
}
