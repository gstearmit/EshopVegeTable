<?php

namespace Crowler\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;

class DeclarationTable {
	protected $tableGateway;
	public function __construct(TableGateway $tableGateway) {
		$this->tableGateway = $tableGateway;
	}
	
	
	public function feed_sql($sql=null)
	{
		if($sql== null)  return false;
		return  $this->tableGateway->getAdapter()->driver->getConnection()->execute($sql);
	}
	
	public function update_array_img($id)
	{
		$data = array (
				'array_img' => null,
		);
	   $id = ( int ) $id;
	
		if ($id == 0) {
			//$this->tableGateway->insert ( $data );
			//return $this->tableGateway->lastInsertValue;
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
	
	public function update_array_img_insert(Crowler $Declaration)
	{
		$data = array (
				'array_img' => $Declaration->array_img,
		);
		$id = ( int ) $Declaration->id;
	
		if ($id == 0) {
			//$this->tableGateway->insert ( $data );
			//return $this->tableGateway->lastInsertValue;
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
	public function update_img1(Crowler $Declaration) {
		$data = array (
				'img1' => $Declaration->img1,
		);
	
		//return $data;
		$id = ( int ) $Declaration->id;
	
		if ($id == 0) {
			//$this->tableGateway->insert ( $data );
			//return $this->tableGateway->lastInsertValue;
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
	
	public function saveimg($nameimg,$i,$id) {
		$i=(int)$i;
		$data = array (
				'img'.$i=> $nameimg,
		);
	
		
		
		$id = ( int )$id;
	
		if ($id == 0) {
			//$this->tableGateway->insert ( $data );
			//return $this->tableGateway->lastInsertValue;
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
	
	public function save(Declaration $Declaration) {
		$data = array (
				'product_code' => $Declaration->product_code,
				'name_id' => $Declaration->name_id,
				'host' => $Declaration->host,
				'url' => $Declaration->url,
				'page_taken' => $Declaration->page_taken,
				'avatar_images' => $Declaration->avatar_images,
				'directoryavatar' => $Declaration->directoryavatar,
				'product_name' => $Declaration->product_name,
				'product_price' => $Declaration->product_price,
				'product_images' => $Declaration->product_images,
				'product_descriptstion' => $Declaration->product_descriptstion,
				'detail_product_descriptstion' => $Declaration->detail_product_descriptstion,
				'product_promotion' => $Declaration->product_promotion,
				'countryoforigin'=>$Declaration->countryoforigin,
				'product_href_detail' => $Declaration->product_href_detail,
				
		);
		
		//return $data;
		$id = ( int ) $Declaration->id;
		
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
	
	public function savestatus(Crowler $Declaration) {
		$data = array (
				'status' => $Declaration->status,
		);
		$id = ( int ) $Declaration->id;
	
			if ($this->getById ( $id )) {
				return $this->tableGateway->update ( $data, array (
						'id' => $id
				) );
			} else {
				return 0;
				
			}
		
	}
	
	public function delete($id) {
		$Declaration = $this->getById ( $id );
		$result = $this->tableGateway->delete ( array (
				'id' => $id 
		) );
		
		return $result;
	}
	public function getById($id) {
		$id = ( int ) $id;
		$rowset = $this->tableGateway->select ( array (
				'id' => $id 
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
	public function getlistNew($limit) {
		$select = new Select ( 'product' );
		$select->order ( 'id DESC' );
		$select->limit ( $limit );
		
		$resultSet = $this->tableGateway->selectWith ( $select );
		
		$array = array ();
		foreach ( $resultSet as $value ) {
			array_push ( $array, $value );
		}
		return $array;
	}
	
	public function getListAll() {
		$resultSet = $this->tableGateway->select (array('status'=>1));
		$array = array ();
		foreach ( $resultSet as $value ) {
			array_push ( $array, $value );
		}
		return $array;
	}
	
	
	public function get($id) {
		$id = ( int ) $id;
		$rowset = $this->tableGateway->select ( array (
				'id' => $id
		) );
		$row = $rowset->current ();
		if (! $row) {
			return false;
		}
		return $row;
	}
	
	
	
}
