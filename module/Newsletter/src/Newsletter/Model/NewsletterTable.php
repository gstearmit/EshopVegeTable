<?php

namespace Newsletter\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;

class NewsletterTable {
	protected $tableGateway;
	public function __construct(TableGateway $tableGateway) {
		$this->tableGateway = $tableGateway;
	}
	
	
	public function is_subscribed(Newsletter $news)
	{
		$data = array (
				'id_user' => $news->id_user,
				'email' => $news->email,
				'is_subscribed' => 1,
				'status'=>0,
				'date_creat' =>date ( 'Y-m-d H:i:s' ),
	
		);
		$id = ( int ) $news->id;
		
		//return $this->getById_User($news->id_user);
	
		if ($id == 0 and $this->getById_User($news->id_user)== 0 ) {
			//return $news->id_user;
			$this->tableGateway->insert ( $data );
			return 1;
			//return $this->tableGateway->lastInsertValue;
		} else {
			// da ton tai trong bang newletter
			return 90;
			
// 			if ($this->getById_User($news->id_user)) {
// 				//return 99;
// 				return $this->tableGateway->update ( $data, array (
// 						'id_user' => $news->id_user
// 				) );
// 			} else {
// 				return 0;
// 			}
		}
	}
	
	public function getByEmail($email) {
		$email = ( string ) $email;
		$rowset = $this->tableGateway->select ( array (
				'email' => $email
		) );
		$row = $rowset->current ();
		if (! $row) {
			return 0;
		}
		return $row;
	}
	
	public function save(Newsletter $news) 
	{
		$data = array (
				'id_user' => $news->id_user,
				'email' => $news->email,
				'is_subscribed' =>1,
			    'status'=>1,
				'date_creat' =>date ( 'Y-m-d H:i:s' ),
				
		);
		$id = ( int ) $news->id;
		
		if ($id == 0 and $this->getByEmail($news->email) == 0) {
			$this->tableGateway->insert ( $data );
			return $this->tableGateway->lastInsertValue;
		} else {
			
			if ($this->getByEmail($news->email)) {
				return 99;
			} else {
				return 99;
			}
		}
	}
	public function delete($id) {
		// $news = $this->getById($id);
		$result = $this->tableGateway->delete ( array (
				'id' => $id 
		) );
		return $result;
	}
	
	public function savestatus(Newsletter $Newsletter) {
		$data = array (
				'status' => $Newsletter->status,
		);
		$id = ( int ) $Newsletter->id;
	
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
	
	public function getById_User($id) {
		$id = ( int ) $id;
		$rowset = $this->tableGateway->select ( array (
				'id_user' => $id
		) );
		$row = $rowset->current ();
		if (! $row) {
			return 0;
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
		$select = new Select ( 'buyer' );
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
