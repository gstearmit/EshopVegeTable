<?php

namespace Customer\Model;

use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\Sql\Sql; //join
use Customer\Model\Customer;
use Zend\Db\Sql\Select;
use Zend\Session\Container;

class CustomerTable extends AbstractTableGateway {

    protected $table = "tbl_customer";
    public $sql;

    public function __construct(Adapter $adapter) {
        $this->adapter = $adapter;
        $this->resultSetPrototype = new ResultSet();
        $this->resultSetPrototype->setArrayObjectPrototype(new Customer());
        $this->initialize();
        $this->sql = new Sql($this->adapter);
    }
    public function listcustomer(Select $select = null) {       
        if (null === $select)
        $select = new Select();
        $select->from($this->table);       
        $select->order('id DESC');
        $resultSet = $this->selectWith($select);
        $resultSet->buffer();
        return $resultSet;
    }
    public function get_acount_new() {
        $sqlEx = $this->sql->select();
        $sqlEx->from($this->table);
        $sqlEx->order('ID DESC');
        $sqlEx->limit(1);
        $pst = $this->sql->prepareStatementForSqlObject($sqlEx);
        $resultset = $pst->execute();
        $data = $resultset->current();       
        return $data;
    }
    public function acountdetail($id){
        $sqlEx=  $this->sql->select();
        $sqlEx->from($this->table);
        $sqlEx->where(array('id'=>$id));
        $pst=  $this->sql->prepareStatementForSqlObject($sqlEx);
        $result=$pst->execute();
        $data=$result->current();
        return $data;
    }
     
    public function addacount(Customer $obj) {
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
     public function add_address($id,Customer $obj) {
        $data = $obj->address();
        $sqlEx=  $this->sql->update();
        $sqlEx->table($this->table);
        $sqlEx->set($data);
        $sqlEx->where(array('id'=>$id));
        $pst = $this->sql->prepareStatementForSqlObject($sqlEx);
        $result = $pst->execute();
        if ($result != null) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    public function update_acount($id, Acount $obj){
        $data=$obj->getdata_info();
        $sqlEx=  $this->sql->update();
        $sqlEx->table($this->table);
        $sqlEx->set($data);
        $sqlEx->where(array('ID'=>$id));
        $pst=  $this->sql->prepareStatementForSqlObject($sqlEx);
        $result=$pst->execute();
        if($result != null){
            return TRUE;
        }  else {
            return FALSE;
        }
    }

    public function checkacount($email) {
        $sqlEx = $this->sql->select();
        $sqlEx->from($this->table);
        $sqlEx->columns(array('email' => 'email'));
        $sqlEx->where(array('email' => $email));
        $pst = $this->sql->prepareStatementForSqlObject($sqlEx);
        $result = $pst->execute();
        $data = $result->current();
        if ($data == null) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function checkpass($password) {
        $sqlEx = $this->sql->select();
        $sqlEx->from($this->table);
        $sqlEx->columns(array('password' => 'password'));
        $sqlEx->where(array('password' => $password));
        $pst = $this->sql->prepareStatementForSqlObject($sqlEx);
        $result = $pst->execute();
        $data = $result->current();
        if ($data != null) {
            return true;
        } else {
            return FALSE;
        }
    }

    public function updatepass_user($id, Acount $obj) {
        $data = $obj->datapass();
        $sqlEx = $this->sql->update();
        $sqlEx->table($this->table);
        $sqlEx->set($data);
        $sqlEx->where(array('ID' => $id));
        $pst = $this->sql->prepareStatementForSqlObject($sqlEx);
        $result = $pst->execute();        
        if ($result != null) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function checklogin($email, $password) {
        $sqlss = $this->sql->select();
        $sqlss->from($this->table);
        $sqlss->where(array("email" => $email, "password" => $password));
        $pst = $this->sql->prepareStatementForSqlObject($sqlss);
        $result = $pst->execute();
        $data = $result->current();
        if ($data != null) {
            $session_user = new Container('userlogin');
            $session_user->username = $data['email'];
            $session_user->fullname = $data['fullname'];
            $session_user->address = $data['address'];
            $session_user->phone = $data['phone'];
            $session_user->idus = $data['id'];
            return true;
        } else {
            return FALSE;
        }
    }

    

    public function updatepass($email, Customer $obj) {
        $data = $obj->datapass();
        $sqlEx = $this->sql->update();
        $sqlEx->table($this->table);
        $sqlEx->where(array('email' => $email));
        $sqlEx->set($data);
        $pst = $this->sql->prepareStatementForSqlObject($sqlEx);
        $result = $pst->execute();
        if ($result != null) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
     public function update_email($id, Customer $obj) {
        $data = $obj->dataemail();
        $sqlEx = $this->sql->update();
        $sqlEx->table($this->table);
        $sqlEx->where(array('id' => $id));
        $sqlEx->set($data);
        $pst = $this->sql->prepareStatementForSqlObject($sqlEx);
        $result = $pst->execute();
        if ($result != null) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    public function delete_acount($id){
        $sqlEx=  $this->sql->delete();
        $sqlEx->from($this->table);
        $sqlEx->where(array('id'=>$id));
        $pst=  $this->sql->prepareStatementForSqlObject($sqlEx);
        $result=$pst->execute();
        if($result !=null){
            return TRUE;
        }  else {
            return FALSE;
        }
    }

}
