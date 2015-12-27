<?php
namespace Favorite\Model;

use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\Sql\Sql; //join
use Favorite\Model\Favorite;
use Zend\Db\Sql\Select;
use Zend\Session\Container;


class FavoriteTable extends AbstractTableGateway {

    protected $table = "tbl_favorite";
    public $sql;

    public function __construct(Adapter $adapter) {
        $this->adapter = $adapter;
        $this->resultSetPrototype = new ResultSet();
        $this->resultSetPrototype->setArrayObjectPrototype(new Favorite());
        $this->initialize();
        $this->sql = new Sql($this->adapter);
    }
     public function listfavorite_user($id_us){         
        $sqlEx = $this->sql->select();
        $sqlEx->from($this->table);       
        $sqlEx->where(array('customer_ID'=>$id_us));
        $pst = $this->sql->prepareStatementForSqlObject($sqlEx);
        $resultset = $pst->execute();
        $data = array();
        foreach ($resultset as $result) {
            $data[] = $result;
        }
        return $data;
    } 
    /* public function product_wishlist($id_us, Select $select = null) {       
        if (null === $select)
        $select = new Select();
        $select->from($this->table);       
        $select->order('ID DESC');
        $select->where(array('customer_ID'=>$id_us));
        $select->join("product","product.id = tbl_favorite.product_ID",array(
            "name"=>"name",
            'alias'=>'alias',
            'price'=>'price',
            'img'=>'img',
            ));
       // $select->where(array('customer_ID'=>$id_us));
        $resultSet = $this->selectWith($select);
        $resultSet->buffer();
        return $resultSet;
    }*/
    public function product_wishlist($id_us){         
        $sqlEx = $this->sql->select();
        $sqlEx->from($this->table);       
        $sqlEx->where(array('customer_ID'=>$id_us));
        $sqlEx->join("product","product.id = tbl_favorite.product_ID",array(
            "name"=>"name",
            'alias'=>'alias',
            'price'=>'price',
            'availability'=>'availability',
            'img'=>'img',
            ));
        $pst = $this->sql->prepareStatementForSqlObject($sqlEx);
        $resultset = $pst->execute();
        $data = array();
        foreach ($resultset as $result) {
            $data[] = $result;
        }
        return $data;
    } 
    public function get_wish_detail($id_product){         
        $sqlEx = $this->sql->select();
        $sqlEx->from($this->table);       
        $sqlEx->where(array('product_ID'=>$id_product));       
        $pst = $this->sql->prepareStatementForSqlObject($sqlEx);
        $resultset = $pst->execute();
        $data = $resultset->current();
        return $data;
    } 
    public function addfavorite(Favorite $obj){
        $data=$obj->data_favorite();
        $sqlEx=  $this->sql->insert();
        $sqlEx->into($this->table);
        $sqlEx->values($data);
        $pst=  $this->sql->prepareStatementForSqlObject($sqlEx);
        $result=$pst->execute();
        if($result != null){
            return TRUE;
        }  else {
            return FALSE;
        }
    }
    public function checkfavorite($id_custom, $id_pro){
        $sqlEx= $this->sql->select();
        $sqlEx->from($this->table);
        $sqlEx->columns(array('customer_ID'=>'customer_ID','product_ID'=>'product_ID'));
        $sqlEx->where(array('customer_ID'=>$id_custom,'product_ID'=>$id_pro));
        $pst=  $this->sql->prepareStatementForSqlObject($sqlEx);
        $result=$pst->execute();
        $data=$result->current();
        if($data == null){
            return TRUE;
        }  else {
            return FALSE;
        }
    }
    public function deletefavorite($id){
        $sqlEX=  $this->sql->delete();
        $sqlEX->from($this->table);
        $sqlEX->where(array('product_ID'=>$id));
        $pst=  $this->sql->prepareStatementForSqlObject($sqlEX);
        $result=$pst->execute();
        if($result !=null){
            return TRUE;
        }  else {
            return FALSE;
        }
    }
    public function clearall($id){
        $sqlEX=  $this->sql->delete();
        $sqlEX->from($this->table);
        $sqlEX->where(array('customer_ID'=>$id));
        $pst=  $this->sql->prepareStatementForSqlObject($sqlEX);
        $result=$pst->execute();
        if($result !=null){
            return TRUE;
        }  else {
            return FALSE;
        }
    }
}