<?php

namespace Apotravinycz\Model;

use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\Sql\Sql; //join
use Zend\Db\Sql\Select;
use Zend\Session\Container;

class ApotravinyczproductTable extends AbstractTableGateway {

    protected $table = "product";
    public $sql;

    public function __construct(Adapter $adapter) {
        $this->adapter = $adapter;
        $this->resultSetPrototype = new ResultSet();
        $this->resultSetPrototype->setArrayObjectPrototype(new Apotravinyczproduct());
        $this->initialize();
        $this->sql = new Sql($this->adapter);
    }     
    public function listall_product(){
        $sqlEx = $this->sql->select();
        $sqlEx->from($this->table);  
        $sqlEx->where(array('status'=>1));        
        $pst = $this->sql->prepareStatementForSqlObject($sqlEx);
        $result = $pst->execute();
        $data = array();
        foreach ($result as $rs) {
            $data[] = $rs;
        }
        return $data;
    }

    public function producthot() {
        $sqlEx = $this->sql->select();
        $sqlEx->from($this->table);  
        $sqlEx->where(array('hot'=>1, 'status'=>1));
        // $sqlEx->where(array('parent'=>'0'));
        $pst = $this->sql->prepareStatementForSqlObject($sqlEx);
        $result = $pst->execute();
        $data = array();
        foreach ($result as $rs) {
            $data[] = $rs;
        }
        return $data;
    }
    public function product_detail($id){ // dùng ca lazada
        $sqlEx = $this->sql->select();
        $sqlEx->from($this->table);  
        $sqlEx->where(array( 'id'=>$id));       
        $pst = $this->sql->prepareStatementForSqlObject($sqlEx);
        $result = $pst->execute();
        $data = $result->current();        
        return $data;
    }

    public function productcat($cat_id){
        $sqlEx = $this->sql->select();
        $sqlEx->from($this->table);  
        $sqlEx->where(array('cat_id'=>$cat_id, 'status'=>1));
        // $sqlEx->where(array('parent'=>'0'));
        $pst = $this->sql->prepareStatementForSqlObject($sqlEx);
        $result = $pst->execute();
        $data = array();
        foreach ($result as $rs) {
            $data[] = $rs;
        }
        return $data;
    }
    public function loadproduct($cat_id, $order, $limit, $offset) {
        $limit = (int)$limit;
        $offset = (int)$offset;       
        $sqlEx = $this->sql->select();
        $sqlEx->from($this->table);        
        $sqlEx->where(array(
            'status' => 1,
            'cat_id' => $cat_id,
        ));
        $sqlEx->order($order);
        $sqlEx->limit($limit);
        $sqlEx->offset($offset);
        $pst = $this->sql->prepareStatementForSqlObject($sqlEx);
        $resultset = $pst->execute();
        $data = array();
        foreach ($resultset as $result) {
            $data[] = $result;
        }
        return $data;
    }
    public function product_priceAsc($cat_id, $oder){
        $sqlEx = $this->sql->select();
        $sqlEx->from($this->table);  
        $sqlEx->where(array('cat_id'=>$cat_id, 'status'=>1));
        $sqlEx->order($oder);
        $pst = $this->sql->prepareStatementForSqlObject($sqlEx);
        $result = $pst->execute();
        $data = array();
        foreach ($result as $rs) {
            $data[] = $rs;
        }
        return $data;
    }

    public function product_same($cat_id){
        $rand = new \Zend\Db\Sql\Expression('RAND()');
        $sqlEx = $this->sql->select();
        $sqlEx->from($this->table);  
        $sqlEx->order($rand);
        $sqlEx->limit(4);
        $sqlEx->where(array('cat_id'=>$cat_id, 'status'=>1));
        // $sqlEx->where(array('parent'=>'0'));
        $pst = $this->sql->prepareStatementForSqlObject($sqlEx);
        $result = $pst->execute();
        $data = array();
        foreach ($result as $rs) {
            $data[] = $rs;
        }
        return $data;
    }
     public function product_viewcart($id_product){
        $sqlEx = $this->sql->select();
        $sqlEx->from($this->table);  
        $sqlEx->where(array('id'=>$id_product));        
        $pst = $this->sql->prepareStatementForSqlObject($sqlEx);
        $result = $pst->execute();
        $data = array();
        foreach ($result as $rs) {
            $data[] = $rs;
        }
        return $data;
    }
    
     public  function search($key){
        $sqlEx = $this->sql->select()->from($this->table, array('id', 'name'))
        ->where("name LIKE '%$key%'");
         $pst = $this->sql->prepareStatementForSqlObject($sqlEx);
        $resultset = $pst->execute();
        $data = array();
        foreach ($resultset as $result) {
            $data[] = $result;
        }
        return $data;
    }
    //--------------------------------------- LAZADA-------------------------------------
    public function product_new(){
        $sqlEx = $this->sql->select();
        $sqlEx->from($this->table);  
        $sqlEx->order('id DESC');
        $sqlEx->limit(6);
        $sqlEx->where(array('status'=>1));
        $pst = $this->sql->prepareStatementForSqlObject($sqlEx);
        $result = $pst->execute();
        $data = array();
        foreach ($result as $rs) {
            $data[] = $rs;
        }
        return $data;
    }
    
     public function productcat_sales($cat_id){
        $sqlEx = $this->sql->select();
        $sqlEx->from($this->table);  
        $sqlEx->where(array(
            'cat_id'=>$cat_id,
            'sale_products'=>1,
            'status'=>1));
        $sqlEx->limit(4);
        $sqlEx->order('id DESC');
        // $sqlEx->where(array('parent'=>'0'));
        $pst = $this->sql->prepareStatementForSqlObject($sqlEx);
        $result = $pst->execute();
        $data = array();
        foreach ($result as $rs) {
            $data[] = $rs;
        }
        return $data;
    }
     public function productcat_featured($cat_id){
        $sqlEx = $this->sql->select();
        $sqlEx->from($this->table);  
        $sqlEx->where(array(
            'cat_id'=>$cat_id,
            'featured_products'=>1,
            'status'=>1));
        $sqlEx->limit(4);
        $sqlEx->order('id DESC');
        // $sqlEx->where(array('parent'=>'0'));
        $pst = $this->sql->prepareStatementForSqlObject($sqlEx);
        $result = $pst->execute();
        $data = array();
        foreach ($result as $rs) {
            $data[] = $rs;
        }
        return $data;
    }
    public function productcat_hot($cat_id){
        $sqlEx = $this->sql->select();
        $sqlEx->from($this->table);  
        $sqlEx->where(array(
            'cat_id'=>$cat_id,
            'hot'=>1,
            'status'=>1));
        $sqlEx->limit(2);
        $sqlEx->order('id DESC');
        // $sqlEx->where(array('parent'=>'0'));
        $pst = $this->sql->prepareStatementForSqlObject($sqlEx);
        $result = $pst->execute();
        $data = array();
        foreach ($result as $rs) {
            $data[] = $rs;
        }
        return $data;
    }
     public function productcat_index($cat_id){
        $sqlEx = $this->sql->select();
        $sqlEx->from($this->table);  
        $sqlEx->where(array('cat_id'=>$cat_id, 'status'=>1));
        $sqlEx->order('id DESC');
        $sqlEx->limit(16);
        /*$sqlEx->join('tbl_favorite', 'tbl_favorite.product_ID = product.id',array(
            'product_ID'=>'product_ID',
            'customer_ID'=>'customer_ID'
            ));*/
        $pst = $this->sql->prepareStatementForSqlObject($sqlEx);
        $result = $pst->execute();
        $data = array();
        foreach ($result as $rs) {
            $data[] = $rs;
        }
        return $data;
    }
    
     public function product_cat($order, $id_cat, Select $select = null) {       
        if (null === $select)
        $select = new Select();
        $select->from($this->table);       
        $select->order($order);
        $select->where->in('cat_id',$id_cat);
        $select->where(array('status'=>1 ));
        $resultSet = $this->selectWith($select);
        $resultSet->buffer();
        return $resultSet;
    }
     public  function search_lazada($key,$order){
        $sqlEx = $this->sql->select()->from($this->table, array('id', 'name'))
        ->where("name LIKE '%$key%'")
        ->order($order);
         $pst = $this->sql->prepareStatementForSqlObject($sqlEx);
        $resultset = $pst->execute();
        $data = array();
        foreach ($resultset as $result) {
            $data[] = $result;
        }
        return $data;
    }
}
