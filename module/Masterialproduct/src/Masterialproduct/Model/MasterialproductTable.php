<?php

namespace Masterialproduct\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;

class MasterialproductTable {
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
	
	public function update_array_img_insert(Masterialproduct $Masterialproduct)
	{
		$data = array (
				'array_img' => $Masterialproduct->array_img,
		);
		$id = ( int ) $Masterialproduct->id;
	
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
	public function update_img1(Masterialproduct $Masterialproduct) {
		$data = array (
				'img1' => $Masterialproduct->img1,
		);
	
		//return $data;
		$id = ( int ) $Masterialproduct->id;
	
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
	
	public function save(Masterialproduct $Masterialproduct) {
		$data = array (
				'name' => $Masterialproduct->name,
                                'alias' => $Masterialproduct->alias,
				'descripts' => $Masterialproduct->descripts,
				'detail_product' => $Masterialproduct->detail_product,
				'cat_id' => $Masterialproduct->cat_id,
				'new' => $Masterialproduct->new,
				'hot' => $Masterialproduct->hot,
				'promotions' => $Masterialproduct->promotions,
				'price' => $Masterialproduct->price,
				'rating' => $Masterialproduct->rating,
				'availability' => $Masterialproduct->availability,
				'tag_id' => $Masterialproduct->tag_id,
				'manufacturer_id' => $Masterialproduct->manufacturer_id,
				'date_creat' =>  date ( 'Y-m-d H:i:s' ),
				'date_change' => date ( 'Y-m-d H:i:s' ),
				'user_id' => $Masterialproduct->user_id,
				'status' => $Masterialproduct->status,
				'about_price' => $Masterialproduct->about_price,
				'weekly_featured' => $Masterialproduct->weekly_featured,
				'featured_products' => $Masterialproduct->featured_products,
				'new_products' => $Masterialproduct->new_products,
				'sale_products' => $Masterialproduct->sale_products,
				
				'most_viewed' => $Masterialproduct->most_viewed,
				'lastest_products' => $Masterialproduct->lastest_products,
                                'crowler' => '1',
                    
				'array_img'=>$Masterialproduct->array_img,
				'img' => $Masterialproduct->img,
				'img1' => $Masterialproduct->img1,
				'img2' => $Masterialproduct->img2,
				'img3' => $Masterialproduct->img3,
				'img4' => $Masterialproduct->img4,
				'img5' => $Masterialproduct->img5,
				'img6' => $Masterialproduct->img6,
				'img7' => $Masterialproduct->img7,
				'img8' => $Masterialproduct->img8,
				'img9' => $Masterialproduct->img9,
				'img0' => $Masterialproduct->img0,	
		);
		
		//return $data;
		$id = ( int ) $Masterialproduct->id;
		
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
	
	public function savestatus(Masterialproduct $Masterialproduct) {
		$data = array (
				'status' => $Masterialproduct->status,
		);
		$id = ( int ) $Masterialproduct->id;
	
			if ($this->getById ( $id )) {
				return $this->tableGateway->update ( $data, array (
						'id' => $id
				) );
			} else {
				return 0;
				
			}
		
	}
	
	public function delete($id) {
		$Masterialproduct = $this->getById ( $id );
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
