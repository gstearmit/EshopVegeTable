<?php

namespace Persons\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;

class PersonsTable {
	protected $tableGateway;
	public function __construct(TableGateway $tableGateway) {
		$this->tableGateway = $tableGateway;
	}
	
	
	public function save(Persons $Persons) 
	{
		$data = array (
				'name' => $Persons->name,
				'gender' => $Persons->gender,
				'birthday' => $Persons->birthday,
				'national' =>$Persons->national,
				'passport' => $Persons->passport,
				'passport_exp' => $Persons->passport_exp,
				'user_id' => $Persons->user_id,
				'invoice_id' => $Persons->invoice_id,
				'primary_email' =>$Persons->primary_email,
				'secondary_email' => $Persons->secondary_email,
				'primary_pass' => $Persons->primary_pass,
				'visa_id' => $Persons->visa_id,
		);
		$id = ( int ) $Persons->id;
		
		if ($id == 0) {
			$this->tableGateway->insert ( $data );
			return $this->tableGateway->lastInsertValue;
		} else {
			
			if ($this->getById ( $id )) {
				return $this->tableGateway->update ( $data, array (
						'id' => $id 
				) );
			} else {
				return 0;
			}
		}
	}
	public function delete($id) {
		// $Persons = $this->getById($id);
		$result = $this->tableGateway->delete ( array (
				'id' => $id 
		) );
		return $result;
	}
	
	public function savestatus(Persons $Persons) {
		$data = array (
				'status' => $Persons->status,
		);
		$id = ( int ) $Persons->id;
	
		if ($this->getById ( $id )) {
			return $this->tableGateway->update ( $data, array (
					'id' => $id
			) );
		} else {
			return 0;
			//throw new \Exception ( 'ID does not exist' );
		}
	
	}
	
	public function getById($id) {
		$id = ( int ) $id;
		$rowset = $this->tableGateway->select ( array (
				'id' => $id 
		) );
		$row = $rowset->current ();
		if (! $row) {
			throw new \Exception ( "Could not find row $id" );
		}
		return $row;
	}
	public function fetchAll() {
		$resultSet = $this->tableGateway->select ();
		$array = array ();
		foreach ( $resultSet as $value ) {
			array_push ( $array, $value );
		}
		return $array;
	}
	public function countAll() {
		$resultSet = $this->tableGateway->select ()->count ();
		return $resultSet;
	}
	public function getList($offset, $limit) {
		$resultSet = $this->tableGateway->select ( function (Select $select) use($limit, $offset) {
			$select->order ( 'id DESC' )->limit ( $limit )->offset ( $offset );
		} );
		$array = array ();
		foreach ( $resultSet as $value ) {
			array_push ( $array, $value );
		}
		return $array;
	}
	public function gettype() {
		$row = $this->tableGateway->select ();
		// $where = new \Zend\Db\Sql\Where();
		// $pred_url = new \Zend\Db\Sql\Predicate\Like('group','publisher');
		// $pred_notes = new \Zend\Db\Sql\Predicate\Like('group', 'supperadmin');
		
		// $where->orPredicate($pred_url)->orPredicate($pred_notes);
		
		// $row = $this->tableGateway->select($where);
		
		$res = array ();
		foreach ( $row as $val => $Vlaue ) {
			foreach ( $Vlaue as $key => $kvlue ) {
				// $res[0] = Null;
				$res [$Vlaue->id] = $Vlaue->nametype;
			}
		}
		return $res;
	}
	public function getlistnews($limit) {
		$select = new Select ( 'persons' );
		$select->order ( 'id DESC' );
		$select->limit ( $limit );
		
		$resultSet = $this->tableGateway->selectWith ( $select );
		
		$array = array ();
		foreach ( $resultSet as $value ) {
			array_push ( $array, $value );
		}
		return $array;
    }

}
