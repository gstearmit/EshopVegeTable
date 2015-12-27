<?php

namespace Invoice\Model;

use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\Sql\Sql; //join
use Invoice\Model\Oderdetail;
use Zend\Db\Sql\Select;
use Zend\Session\Container;

class OderdetailTable extends AbstractTableGateway {

    protected $table = "odersdetails";
    public $sql;

    public function __construct(Adapter $adapter) {
        $this->adapter = $adapter;
        $this->resultSetPrototype = new ResultSet();
        $this->resultSetPrototype->setArrayObjectPrototype(new Oderdetail());
        $this->initialize();
        $this->sql = new Sql($this->adapter);
    }

    
    public function addoder_detail(Oderdetail $obj) {
        $data = $obj->getdata();
        $sqlEx = $this->sql->insert();
        $sqlEx->into($this->table);
        $sqlEx->values($data);
        $pst = $this->sql->prepareStatementForSqlObject($sqlEx);
        $result = $pst->execute();
        if ($result != null) {
            return TRUE;
        } else {
            return FALSE;
        }
    }   
    public function get_array_order($id_order){
        $sqlEx=  $this->sql->select();
        $sqlEx->from($this->table);
        $sqlEx->where(array('oder_id'=>$id_order));
        $pst=  $this->sql->prepareStatementForSqlObject($sqlEx);
        $result=$pst->execute();
        $data=array();
        foreach ($result as $resultset){
            $data[]=$resultset;
        }
        return $data;
    }
    public function delete_oder_detail($id_oder){
        $sqlEx=  $this->sql->delete();
        $sqlEx->from($this->table);
        $sqlEx->where(array('oder_id'=>$id_oder));
        $pst = $this->sql->prepareStatementForSqlObject($sqlEx);
        $result = $pst->execute();
        if ($result != null) {
            return TRUE;
        } else {
            return FALSE;
        }   
    }
    public function get_list_oderdetail($id_order) {
        $sqlEx = $this->sql->select();
        $sqlEx->from($this->table);  
        $sqlEx->where(array('oder_id'=>$id_order));
        $sqlEx->join("product","odersdetails.id_product = product.id",array("name"=>"name",'img'=>'img'));
        $pst = $this->sql->prepareStatementForSqlObject($sqlEx);
        $resultset = $pst->execute();
        $data = array();
        foreach ($resultset as $result) {
            $data[] = $result;
        }
        return $data;
    }
}
