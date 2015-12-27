<?php
namespace Manufacture\Model;
class Manufacture{
    public $id;
    public $manu_name;
    public $alias;
    public $description;   
    public $status;
    public $img;   
    public $date;
    
   
    public function exchangeArray($data){
        $this->id=(isset($data['id']))? $data['id']:null;
        $this->manu_name=(isset($data['manu_name']))? $data['manu_name']:null; 
        $this->alias=(isset($data['alias']))? $data['alias']:null;        
        $this->description=(isset($data['description']))? $data['description']:null;
        $this->status=(isset($data['status']))? $data['status']:null;
        $this->img=(isset($data['img']))? $data['img']:null;        
        $this->date=(isset($data['date']))? $data['date']:null;       
       
        
    }
    public function datamanu(){
        $data=array();
        $date=date('Y-M-d');
        $data['manu_name']=  $this->manu_name; 
        $data['alias']=  $this->alias; 
        $data['description']=  $this->description;
        $data['status']= $this->status;        
        $data['img']=  $this->img;
        $data['date']=  $date;     
        return $data;
    }
    public function status(){
        $data=array();        
        $data['status']= $this->status;              
        return $data;
    }
}

