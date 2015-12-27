<?php

namespace Customer\Model;

use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\Sql\Sql; //join
use Customer\Model\Email;
use Zend\Db\Sql\Select;
use Zend\Session\Container;

class EmailTable extends AbstractTableGateway {

    protected $table = "email";
    public $sql;

    public function __construct(Adapter $adapter) {
        $this->adapter = $adapter;
        $this->resultSetPrototype = new ResultSet();
        $this->resultSetPrototype->setArrayObjectPrototype(new Email());
        $this->initialize();
        $this->sql = new Sql($this->adapter);
    }
    public function listemail(Select $select = null) {       
        if (null === $select)
        $select = new Select();
        $select->from($this->table);       
        $select->order('id DESC');
        $resultSet = $this->selectWith($select);
        $resultSet->buffer();
        return $resultSet;
    }
    public function list_sendall(){
        $sqlEx=$this->sql->select();
        $sqlEx->from($this->table);
        $pst= $this->sql->prepareStatementForSqlObject($sqlEx);
        $result= $pst->execute();
        $data= array();
        foreach ($result as $rs){
            $data[]=$rs;
        }
        return $data;
    }
    public function emaildetail($id){
        $sqlEx=  $this->sql->select();
        $sqlEx->from($this->table);
        $sqlEx->where(array('id'=>$id));
        $pst=  $this->sql->prepareStatementForSqlObject($sqlEx);
        $result=$pst->execute();
        $data=$result->current();
        return $data;
    }
    public function addemail(Email $obj) {
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
  
    public function checkemail($email) {
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


    public function delete_email($code){
        $sqlEx=  $this->sql->delete();
        $sqlEx->from($this->table);
        $sqlEx->where(array('code'=>$code));
        $pst=  $this->sql->prepareStatementForSqlObject($sqlEx);
        $result=$pst->execute();
        if($result !=null){
            return TRUE;
        }  else {
            return FALSE;
        }
    }
     public function del_mail($id){
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
