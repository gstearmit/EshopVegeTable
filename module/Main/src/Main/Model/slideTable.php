<?php
namespace Main\Model;

 use Zend\Db\TableGateway\TableGateway;

 class slideTable
 {
     protected $tableGateway;

     public function __construct(TableGateway $tableGateway)
     {
         $this->tableGateway = $tableGateway;
     }

     public function fetchAll()
     {
         $resultSet = $this->tableGateway->select();
         return $resultSet;
     }

     public function getslide($vid)
     {
         //$vid  = (int) $id;
         $rowset = $this->tableGateway->select(array('vid' => $vid));
         $row = $rowset->current();
         if (!$row) {
             //throw new \Exception("Could not find row $vid");
             return false;
         }
         return $row;
     }
     public function saveVideo($vid)
     {
        //date_default_timezone_set("UTC");
            
            $data = array(
             'vid'       =>$vid,

         );
        
         //$id = (int) $vid->id;
            //if ($vid == 0) {
             //$this->tableGateway->insert($data);
         //} else {
             if ($this->getslide($vid)) {
                return false;
                 //$this->tableGateway->update($data, array('vid' => $id));
             } else {
                $this->tableGateway->insert($data);
                return true;
                 
             }
         
        }
     

 }
 ?>