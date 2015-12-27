<?php

namespace Crowler\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;

class NameTable {
	protected $tableGateway;
	public function __construct(TableGateway $tableGateway) {
		$this->tableGateway = $tableGateway;
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
	
	public function update_array_img_insert(Name $Name)
	{
		$data = array (
				'array_img' => $Name->array_img,
		);
		$id = ( int ) $Name->id;
	
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
	public function update_img1(Name $Name) {
		$data = array (
				'img1' => $Name->img1,
		);
	
		//return $data;
		$id = ( int ) $Name->id;
	
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
	
	public function save(Name $Name) {
		$data = array (
				'name' => $Name->name,
				'parent' => $Name->parent,
				'child' => $Name->child,
				'date_creat' => date ( 'Y-m-d H:i:s' ),
				'date_modified' => date ( 'Y-m-d H:i:s' ),
				'hot' => $Name->hot,
				'status' => $Name->status,
				'new' => $Name->new,
				'alias' => $Name->alias,
				'img' => $Name->img,
				'description' => $Name->description
		);
		
		// print_r($data);die();
		$id = ( int ) $Name->id;
		if ($id == 0) {
			//return $data;
			$this->tableGateway->insert ( $data );
			return $this->tableGateway->lastInsertValue;
		} else {
			if ($this->getName( $id )) {
				return $this->tableGateway->update ( $data, array (
						'id' => $id
				) );
			} else {
				return 0;
			}
		}
	}
	
	public function getName($id) {
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
	
	public function savestatus(Name $Name) {
		$data = array (
				'status' => $Name->status,
		);
		$id = ( int ) $Name->id;
	
			if ($this->getById ( $id )) {
				return $this->tableGateway->update ( $data, array (
						'id' => $id
				) );
			} else {
				return 0;
				
			}
		
	}
	
	public function delete($id) {
		$Name = $this->getById ( $id );
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
	//bestseller
	public function get_bestseller($limit_new) {
	
		if($limit_new == null)
		{
			$resultSet = $this->tableGateway->select (array(
					'hot' => 1,
					'status'=>1,
					'most_viewed'=>1
			));
			$array = array ();
			foreach ( $resultSet as $value ) {
				array_push ( $array, $value );
			}
			return $array;
		}
	
		if($limit_new !='' and is_numeric($limit_new))
		{
			$rand = new \Zend\Db\Sql\Expression('RAND()');
			$select = new Select ( 'product' );
			$select->where(array('weekly_featured' => 1));
			//$select->order ( 'id DESC' );
			$select->order ( $rand );
			$select->limit ( $limit_new );
	
			$resultSet = $this->tableGateway->selectWith ( $select );
	
			$array = array ();
			foreach ( $resultSet as $value ) {
				array_push ( $array, $value );
			}
			return $array;
		}
	
	}
	//sale_products
	public function get_sale_products($limit_new) {
	
		if($limit_new == null)
		{
			$resultSet = $this->tableGateway->select (array('sale_products' => 1,'status'=>1));
			$array = array ();
			foreach ( $resultSet as $value ) {
				array_push ( $array, $value );
			}
			return $array;
		}
	
		if($limit_new !='' and is_numeric($limit_new))
		{
			$select = new Select ( 'product' );
			$select->where(array('sale_products' => 1,'status'=>1));
			$select->order ( 'id DESC' );
			$select->limit ( $limit_new );
	
			$resultSet = $this->tableGateway->selectWith ( $select );
	
			$array = array ();
			foreach ( $resultSet as $value ) {
				array_push ( $array, $value );
			}
			return $array;
		}
	
	}
	//get__NEW_PRODUCTS
	public function get_NEW_PRODUCTS($limit_new) {
	
		if($limit_new == null)
		{
			$resultSet = $this->tableGateway->select (array('new_products' => 1,'status'=>1));
			$array = array ();
			foreach ( $resultSet as $value ) {
				array_push ( $array, $value );
			}
			return $array;
		}
	
		if($limit_new !='' and is_numeric($limit_new))
		{
			$select = new Select ( 'product' );
			$select->where(array('new_products' => 1,'status'=>1));
			$select->order ( 'id DESC' );
			$select->limit ( $limit_new );
	
			$resultSet = $this->tableGateway->selectWith ( $select );
	
			$array = array ();
			foreach ( $resultSet as $value ) {
				array_push ( $array, $value );
			}
			return $array;
		}
	
	}
	
	//FEATURED PRODUCTS
	public function get_FEATURED_PRODUCTS($limit_new) {
		
		if($limit_new == null)
		{
			$resultSet = $this->tableGateway->select (array('featured_products' => 1,'status'=>1));
			$array = array ();
			foreach ( $resultSet as $value ) {
				array_push ( $array, $value );
			}
			return $array;
		}
	
		if($limit_new !='' and is_numeric($limit_new))
		{
			$select = new Select ( 'product' );
			$select->where(array('featured_products' => 1,'status'=>1));
			$select->order ( 'id DESC' );
			$select->limit ( $limit_new );
	
			$resultSet = $this->tableGateway->selectWith ( $select );
	
			$array = array ();
			foreach ( $resultSet as $value ) {
				array_push ( $array, $value );
			}
			return $array;
		}
	
	}
	
	//WEEKLY FEATURED
	public function get_WEEKLY_FEATURED($limit_new) {
		if($limit_new == null)
		{
			$resultSet = $this->tableGateway->select (array('weekly_featured' => 1,'status'=>1));
			$array = array ();
			foreach ( $resultSet as $value ) {
				array_push ( $array, $value );
			}
			return $array;
		}
		
		if($limit_new !='' and is_numeric($limit_new))
		{
		$select = new Select ( 'product' );
		$select->where(array('weekly_featured' => 1,'status'=>1));
		$select->order ( 'id DESC' );
		$select->limit ( $limit_new );
		
		$resultSet = $this->tableGateway->selectWith ( $select );
		
		$array = array ();
		foreach ( $resultSet as $value ) {
			array_push ( $array, $value );
		}
		return $array;
		}
		
	}
	
	public function getAll() {
		$resultSet = $this->tableGateway->select ();
		return $resultSet;
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
		$resultSet = $this->tableGateway->select ( 
				function (Select $select) use($limit, $offset) 
				{
			     $select->order ( 'id DESC' )->limit ( $limit )->offset ( $offset );
		        } 
		       );
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
	
	public function parent_find($parent) {
		$parent = ( int ) $parent; 
		$rowset = $this->tableGateway->select ( array (
				'id' => $parent
		) );
		$row = $rowset->current ();
		if (! $row) {
			return 0;
		}
		return $row->name;
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
