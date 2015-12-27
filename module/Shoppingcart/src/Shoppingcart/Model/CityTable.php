<?php

namespace Shoppingcart\Model;

use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\Sql\Sql; //join
use Shoppingcart\Model\City;
use Zend\Db\Sql\Select;
use Zend\Session\Container;

class CityTable extends AbstractTableGateway {

    protected $table = "tinhthanh";
    public $sql;

    public function __construct(Adapter $adapter) {
        $this->adapter = $adapter;
        $this->resultSetPrototype = new ResultSet();
        $this->resultSetPrototype->setArrayObjectPrototype(new City());
        $this->initialize();
        $this->sql = new Sql($this->adapter);
    }
     public function listcity() {
        $sqlEx = $this->sql->select();
        $sqlEx->from($this->table);
        $sqlEx->order('ThuTu ASC');
        $pst = $this->sql->prepareStatementForSqlObject($sqlEx);
        $result = $pst->execute();
        $data = array();
        foreach ($result as $rs){
            $data[]=$rs;
        }
        return $data;
    }
   
   
}
