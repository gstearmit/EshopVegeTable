<?php

namespace Visa\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;

class VisaTable {
	protected $tableGateway;
	public function __construct(TableGateway $tableGateway) {
		$this->tableGateway = $tableGateway;
	}
	
	
	public function save(Visa $Visa) 
	{
		$data = array (
				'visa_type' => $Visa->visa_type,
				'text_visatype' => $Visa->text_visatype,
				'is_emb' => $Visa->is_emb,
				'is_urgently' =>$Visa->is_urgently,
				'date_arrival' => $Visa->date_arrival,
				'date_exit' => $Visa->date_exit,
				'arrival_time' => $Visa->arrival_time,
				'flight_number' => $Visa->flight_number,
				'private_letter' =>$Visa->private_letter,
				'fasttrack' => $Visa->fasttrack,
				'pickup' => $Visa->pickup,
				'purpose' => $Visa->purpose,
				'arrival_port' => $Visa->arrival_port,
				'location' =>$Visa->location,
				'text_location' => $Visa->text_location,
				'text_express' => $Visa->text_express,
				'promotion_discount' => $Visa->promotion_discount,
				'discount_value' => $Visa->discount_value,
				'discount_amount' =>$Visa->discount_amount,
				'express' => $Visa->express,
				'service' => $Visa->service,
				'email_discount' => $Visa->email_discount,
				'number_of' => $Visa->number_of,
				'promotion_code'=>$Visa->promotion_code,
		);
		$id = ( int ) $Visa->id;
		
		if ($id == 0) {
			$this->tableGateway->insert ( $data );
			return $this->tableGateway->lastInsertValue;
		} else {
			
			if ($this->getById ( $id )) {
				return $this->tableGateway->update ( $data, array ( 'id' => $id  	) );
			} else {
				return 0;
			}
		}
	}
	public function delete($id) {
		// $Visa = $this->getById($id);
		$result = $this->tableGateway->delete ( array (
				'id' => $id 
		) );
		return $result;
	}
	
	public function savestatus(Visa $Visa) {
		$data = array (
				'status' => $Visa->status,
		);
		$id = ( int ) $Visa->id;
	
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
		$select = new Select ( 'visa' );
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
