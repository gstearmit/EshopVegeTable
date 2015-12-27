<?php

namespace Apotravinycz\Model;

use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\Sql\Sql; // join
use Zend\Db\Sql\Select;
use Zend\Session\Container;

class CatalogTable extends AbstractTableGateway {

    protected $table = "catelog";
    public $sql;

    public function __construct(Adapter $adapter) {
        $this->adapter = $adapter;
        $this->resultSetPrototype = new ResultSet ();
        $this->resultSetPrototype->setArrayObjectPrototype(new Catalog());
        $this->initialize();
        $this->sql = new Sql($this->adapter);
    }

    private function getsubmenu($id, $list) {
        $data = $this->loadparent($id);
       $l = "";
        foreach ($data as $key => $vl) {
            $id = $vl['id'];
            $l .= $l . "," . $id;
            $this->getsubmenu($id, $list);
        }
        return $list . $l;
    }

//Tam thoi fix bang 58
    public function getallMenu($id) {
        $f_id=$id;
        $data = $this->loadparent($f_id);
        
        $list = "";
        foreach ($data as $key => $vl) {
            
            $id = $vl['id'];         
            $list .= $list . "," . $id;           
            //$list = $list . "," . $this->getsubmenu($id, $list); //d? nhu n�y n?u s? lu?ng danh m?c con >9 s? b? die
            $list = $this->getsubmenu($id, $list);
            
        }       
        $arr_tmp = explode(",", $list);        
        $arr_tmp_2 = array_unique($arr_tmp);       
       $arr_tmp_2[0] = $f_id;       
       $arr=array();
        $index=0;
        foreach($arr_tmp_2 as $v){
            $arr[$index]=$v;
            $index++;
           
        }
       
        return $arr;
    }
    public function loadparent($id) {
        $sqlEx = $this->sql->select();
        $sqlEx->from($this->table);
        $sqlEx->where(array('parent' => $id));
        $pst = $this->sql->prepareStatementForSqlObject($sqlEx);
        $result = $pst->execute();
        return $result;
    }
    
    //---------------------------------------------------------------
   public function listcatalog() {
        $sqlEx = $this->sql->select();
        $sqlEx->from($this->table);
        $sqlEx->where(array(
            'parent' => NULL,
            'status' => 1
        ));
        // $sqlEx->where(array('parent'=>'0'));
        $pst = $this->sql->prepareStatementForSqlObject($sqlEx);
        $result = $pst->execute();        
        $data = array();
        foreach ($result as $rs) {
            $data[] = $rs;
        }
        return $data;
    }

    public function catalogdetail($id) {
        $sqlEx = $this->sql->select();
        $sqlEx->from($this->table);
        $sqlEx->where(array(
            'id' => $id
        ));
        $pst = $this->sql->prepareStatementForSqlObject($sqlEx);
        $result = $pst->execute();
        $data = $result->current();
        return $data;
    }

    public function submenu($parent) {
        $sqlEx = $this->sql->select();
        $sqlEx->from($this->table);
        $sqlEx->where(array(
            'parent' => $parent,
            'status' => 1
        ));
        $pst = $this->sql->prepareStatementForSqlObject($sqlEx);
        $result = $pst->execute();
        $data = array();
        foreach ($result as $rs) {
            $data[] = $rs;
        }
        return $data;
    }
// -------------------------------------- LAZADA----------------------------
    public function loadall_catalog(){
        $sqlEx = $this->sql->select();
        $sqlEx->from($this->table);
        $sqlEx->where(array(            
            'status' => 1,            
        ));
        // $sqlEx->where(array('parent'=>'0'));
        $pst = $this->sql->prepareStatementForSqlObject($sqlEx);
        $result = $pst->execute();       
         $data = array();
        foreach ($result as $rs) {
            $data [] = $rs;
        }
        return $data;
    }
    public function lazada_listcatalog() {
        $sqlEx = $this->sql->select();
        $sqlEx->from($this->table);
        $sqlEx->where(array(
            'parent' => NULL,
            'status' => 1,
            'show_index'=>1,
        ));
        // $sqlEx->where(array('parent'=>'0'));
        $pst = $this->sql->prepareStatementForSqlObject($sqlEx);
        $result = $pst->execute();
        $data = array();
        foreach ($result as $rs) {
            $data [] = $rs;
        }
        return $data;
    }
}
