<?php

namespace Checkout\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;

class CheckoutTable {
	protected $tableGateway;
	public function __construct(TableGateway $tableGateway) {
		$this->tableGateway = $tableGateway;
	}
	
	public function update_tracking_id($check_invoice_id,$tracking_id)
	{
		$data = array(
				'tracking_id' => $tracking_id,
		);
		if ($this->getById ( $check_invoice_id )) {
			return $this->tableGateway->update ( $data, array (
					'id' => $check_invoice_id
			) );
		} else {
			return 0;
		}
	}
	
	public function Update_status_pay($Checkout_id)
	{
		$data = array(
				'status_pay' => 1,
		);
		if ($this->getById ( $check_invoice_id )) {
			return $this->tableGateway->update ( $data, array (
					'id' => $Checkout_id
			) );
		} else {
			return 0;
		}
	}
	
	public function save(Checkout $Checkout) 
	{
		$data = array (
				'tracking_id' => $Checkout->tracking_id,
				'total' => $Checkout->total,
				'visa_id' => $Checkout->visa_id,
				'date_creat' =>date ( 'Y-m-d H:i:s' ),
				'status_pay' => $Checkout->status_pay,
		);
		$id = ( int ) $Checkout->id;
		
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
		// $Checkout = $this->getById($id);
		$result = $this->tableGateway->delete ( array (
				'id' => $id 
		) );
		return $result;
	}
	
	public function savestatus(Checkout $Checkout) {
		$data = array (
				'status' => $Checkout->status,
		);
		$id = ( int ) $Checkout->id;
	
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
		$select = new Select ( 'invoice' );
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
