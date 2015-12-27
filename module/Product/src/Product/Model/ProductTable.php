<?php

namespace Product\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;

class ProductTable {
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
	
	public function update_array_img_insert(Product $Product)
	{
		$data = array (
				'array_img' => $Product->array_img,
		);
		$id = ( int ) $Product->id;
	
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
	public function update_img1(Product $Product) {
		$data = array (
				'img1' => $Product->img1,
		);
	
		//return $data;
		$id = ( int ) $Product->id;
	
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
	
	public function save(Product $Product) {
		$data = array (
				'name' => $Product->name,
                                'alias' => $Product->alias,
				'descripts' => $Product->descripts,
				'detail_product' => $Product->detail_product,
				'cat_id' => $Product->cat_id,
				'new' => $Product->new,
				'hot' => $Product->hot,
				'promotions' => $Product->promotions,
				'price' => $Product->price,
				'rating' => $Product->rating,
				'availability' => $Product->availability,
				'tag_id' => $Product->tag_id,
				'manufacturer_id' => $Product->manufacturer_id,
				'date_creat' =>  date ( 'Y-m-d H:i:s' ),
				'date_change' => date ( 'Y-m-d H:i:s' ),
				'user_id' => $Product->user_id,
				'status' => $Product->status,
				'about_price' => $Product->about_price,
				'weekly_featured' => $Product->weekly_featured,
				'featured_products' => $Product->featured_products,
				'new_products' => $Product->new_products,
				'sale_products' => $Product->sale_products,
				
				'most_viewed' => $Product->most_viewed,
				'lastest_products' => $Product->lastest_products,
				'array_img'=>$Product->array_img,
				'img' => $Product->img,
				'img1' => $Product->img1,
				'img2' => $Product->img2,
				'img3' => $Product->img3,
				'img4' => $Product->img4,
				'img5' => $Product->img5,
				'img6' => $Product->img6,
				'img7' => $Product->img7,
				'img8' => $Product->img8,
				'img9' => $Product->img9,
				'img0' => $Product->img0,	
		);
		
		//return $data;
		$id = ( int ) $Product->id;
		
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
	
	public function savestatus(Product $Product) {
		$data = array (
				'status' => $Product->status,
		);
		$id = ( int ) $Product->id;
	
			if ($this->getById ( $id )) {
				return $this->tableGateway->update ( $data, array (
						'id' => $id
				) );
			} else {
				return 0;
				
			}
		
	}
	
	public function delete($id) {
		$Product = $this->getById ( $id );
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
