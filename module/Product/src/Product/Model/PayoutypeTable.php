<?php

namespace Product\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;

class PayoutypeTable {

    protected $tableGateway;

    public function __construct(TableGateway $tableGateway) {
        $this->tableGateway = $tableGateway;
    }

    public function save(Payoutype $news) {
        $data = array(
            'nametype' => $news->nametype,
            'date_creat' => date ( 'Y-m-d H:i:s' ),
        	'date_mod' => date ( 'Y-m-d H:i:s' ),
        	'id_user' => $news->id_user,
        	
        		
        );
        $id = (int) $news->id;

        if ($id == 0) {
            $this->tableGateway->insert($data);
        } else {
           
            if ($this->getById($id)) {
                $this->tableGateway->update($data, array('id' => $id));
            } else {
                throw new \Exception('ID does not exist');
            }
        }
    }
    
    public function delete($id) {
       // $news = $this->getById($id);
        $result = $this->tableGateway->delete(array('id' => $id));
        return $result;
    }

    public function getById($id) {
        $id = (int) $id;
        $rowset = $this->tableGateway->select(array('id' => $id));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row $id");
        }
        return $row;
    }

    public function fetchAll() {
        $resultSet = $this->tableGateway->select();
        $array = array();
        foreach ($resultSet as $value) {
            array_push($array, $value);
        }
        return $array;
    }
    
    public function countAll() {
        $resultSet = $this->tableGateway->select()->count();
        return $resultSet;
    }

    public function getList($offset, $limit) {
        $resultSet = $this->tableGateway->select(function(Select $select) use ($limit, $offset) {
            $select->order('id DESC')->limit($limit)->offset($offset);
        });
        $array = array();
        foreach ($resultSet as $value) {
            array_push($array, $value);
        }
        return $array;
    }
    
    
    public function gettype() {
    	$row = $this->tableGateway->select ();
//     	$where = new \Zend\Db\Sql\Where();
//     	$pred_url      = new \Zend\Db\Sql\Predicate\Like('group','publisher');
//     	$pred_notes    = new \Zend\Db\Sql\Predicate\Like('group', 'supperadmin');
    
//     	$where->orPredicate($pred_url)->orPredicate($pred_notes);
    
//     	$row = $this->tableGateway->select($where);
    
    
    	$res = array ();
    	foreach($row as $val=>$Vlaue)
    	{
    		foreach ($Vlaue as $key=>$kvlue)
    		{
    			//$res[0] = Null;
    			$res[$Vlaue->id] = $Vlaue->nametype;
    			
    		}
    	}
    	return $res;
    }
    
    public function getlistnews($limit) {
    	
    	$select = new Select ( 'payoutype' );
    	$select->order ( 'id DESC' );
    	$select->limit($limit);
    	
    	$resultSet = $this->tableGateway->selectWith ( $select );
    	
    	
    	$array = array();
         foreach ($resultSet as $value) {
            array_push($array, $value);
        }
    	return $array;
    }

}
