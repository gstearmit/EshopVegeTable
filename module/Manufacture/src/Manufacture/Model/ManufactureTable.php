<?php

namespace Manufacture\Model;

use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\Sql\Sql; //join
use Manufacture\Model\Manufacture;
use Zend\Db\Sql\Select;
use Zend\Session\Container;

class ManufactureTable extends AbstractTableGateway {

    protected $table = "tbl_manufacture";
    public $sql;

    public function __construct(Adapter $adapter) {
        $this->adapter = $adapter;
        $this->resultSetPrototype = new ResultSet();
        $this->resultSetPrototype->setArrayObjectPrototype(new Manufacture());
        $this->initialize();
        $this->sql = new Sql($this->adapter);
    }

   public function listmanu(Select $select = null) {       
        if (null === $select)
        $select = new Select();
        $select->from($this->table);       
        $select->order('id DESC');
        $resultSet = $this->selectWith($select);
        $resultSet->buffer();
        return $resultSet;
    }
  public function load_select() {
        $sqlEx = $this->sql->select();
        $sqlEx->from($this->table);
        $sqlEx->order('id DESC');
        $sqlEx->where(array('status'=>1));
        $pst = $this->sql->prepareStatementForSqlObject($sqlEx);
        $result = $pst->execute();
        $data = array();
        foreach ($result as $rs) {
            $data[] = $rs;
        }
        return $data;
    }
   
    public function mannu_detail($id) {
        $sqlEx = $this->sql->select();
        $sqlEx->from($this->table);
        $sqlEx->where(array('id' => $id));
        $pst = $this->sql->prepareStatementForSqlObject($sqlEx);
        $result = $pst->execute();
        $data = $result->current();
        return $data;
    }
    
    public function addmanu(Manufacture $objuser) {      
            $data = $objuser->datamanu();
            $sqlEx = $this->sql->insert();
            $sqlEx->into($this->table);
            $sqlEx->values($data);
            $pst = $this->sql->prepareStatementForSqlObject($sqlEx);
            $result = $pst->execute();
            if ($result != null) {
                return true;
            } else {
                return false;
            }
      
    }

    public function checkname($name) {
        $sqlEx = $this->sql->select();
        $sqlEx->from($this->table);
        $sqlEx->columns(array('manu_name' => 'manu_name'));
        $sqlEx->where(array('manu_name' => $name));
        $pst = $this->sql->prepareStatementForSqlObject($sqlEx);
        $result = $pst->execute();
        $data = $result->current();
        if($data == null){
            return true;
        }  else {
            return false;
        }        
    }
   

    public function update_manu($id, Manufacture $objuser) {
        $data = $objuser->datamanu();
        $sqlEx = $this->sql->update();
        $sqlEx->table($this->table);
        $sqlEx->set($data);
        $sqlEx->where(array('id' => $id));
        $pst = $this->sql->prepareStatementForSqlObject($sqlEx);
        $result = $pst->execute();
        if ($result != null) {
            return true;
        } else {

            return false;
        }
    }
     public function changestatus($id, Manufacture $objuser) {
        $data = $objuser->status();
        $sqlEx = $this->sql->update();
        $sqlEx->table($this->table);
        $sqlEx->set($data);
        $sqlEx->where(array('id' => $id));
        $pst = $this->sql->prepareStatementForSqlObject($sqlEx);
        $result = $pst->execute();
        if ($result != null) {
            return true;
        } else {

            return false;
        }
    }

    public function delete_manu($id) {
        $sqlEx = $this->sql->delete();
        $sqlEx->from($this->table);
        $sqlEx->where(array('id' => $id));
        $pst = $this->sql->prepareStatementForSqlObject($sqlEx);
        $result = $pst->execute();
        if ($result != null) {
            return true;
        } else {
            return false;
        }
    }

   //------------------------------------------Frontend----------------------------------
    
   public function show_manu(){
       $sqlEx=$this->sql->select();
       $sqlEx->from($this->table);
       $sqlEx->where(array('status'=>1));
       $pst=  $this->sql->prepareStatementForSqlObject($sqlEx);
       $result=$pst->execute();
       $data=array();
       foreach ($result as $rs){
           $data[]=$rs;
       }
       return $data;
   }
    
}
