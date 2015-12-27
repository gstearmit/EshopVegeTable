<?php

namespace Catalog\Model;

use Zend\Db\TableGateway\TableGateway;
//use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\Sql\Select;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Where;

class CatalogTable {
	protected $tableGateway;
	public function __construct(TableGateway $tableGateway) {
		$this->tableGateway = $tableGateway;
	}
	public function fetchAll() {
		$resultSet = $this->tableGateway->select ( array (
				//'parent' => NULL,
            	'status'=>1	
		) );
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
	public function get_parent($parent){
            $parent = ( int ) $parent;
            $result = $this->tableGateway->select ( array (
				'parent' => $parent,
            	'status'=>1	
		) );
             return $result;
        }

    public function fetchAll_SELECT(Select $select = null) {
		 if (null === $select)
       // $select = new Select('catelog');
       // $select->order('id ASC');
        $resultSet = $this->tableGateway->select ();
		$array = array ();
		foreach ( $resultSet as $value ) {
			array_push ( $array, $value );
		}
		return $array;
	}
	
	public function getCatalog_arr($id) {
        $id = (int) $id;
        $resultSet = $this->tableGateway->select(array(
            'parent' => $id
        ));
         $array = array();
        foreach ($resultSet as $value) {
            array_push($array, $value);
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
		$select = new Select ( 'catelog' );
		$select->order ( 'id DESC' );
		$select->limit ( $limit );
	
		$resultSet = $this->tableGateway->selectWith ( $select );
	
		$array = array ();
		foreach ( $resultSet as $value ) {
			array_push ( $array, $value );
		}
		return $array;
	}
	
	
	
	public function getarrayspiecal() {
		$resultSet = $this->tableGateway->select ();
		$data = array ();
		$data->id = $resultSet->id;
		$data->name = $resultSet->name;
		return $data;
	}
	public function getCatalog($id) {
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
	public function getbyname($title) {
		$rowset = $this->tableGateway->select ( array (
				'catalog' => $title 
		) );
		$row = $rowset->current ();
		if (! $row) {
			throw new \Exception ( "Could not find row $id" );
		}
		return $row->id;
	}
	
	public function savestatus(catalog $catalog) {
		$data = array (
				'status' => $catalog->status,
		);
		$id = ( int ) $catalog->id;
	
		if ($this->getById ( $id )) {
			return $this->tableGateway->update ( $data, array (
					'id' => $id
			) );
		} else {
			return 0;
	
		}
	
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
	
	public function saveCatalog(catalog $cata) {
		$data = array (
				'name' => $cata->name,
				'parent' => $cata->parent,
				'child' => $cata->child,
				'date_creat' => date ( 'Y-m-d H:i:s' ),
				'date_modified' => date ( 'Y-m-d H:i:s' ),
				'hot' => $cata->hot,
				'status' => $cata->status,
				'new' => $cata->new,
				'alias' => $cata->alias,
				'img' => $cata->img,
				'description' => $cata->description,
                'show_index' => $cata->show_index 
                        
		);
		
               //print_r($data);die();
		$id = ( int ) $cata->id; 
		if ($id == 0) {
			//return $data;
			 $this->tableGateway->insert ( $data );
			 return $this->tableGateway->lastInsertValue;
		} else {
			if ($this->getCatalog ( $id )) {
				return $this->tableGateway->update ( $data, array (
						'id' => $id 
				) );
			} else {
				return 0;
			}
		}
	}
	public function delete($id) {
		if ($this->getCatalog ( $id )) {
			$this->tableGateway->delete ( array (
					'id' => ( int ) $id 
			) );
			return 1;
		} else
			return 0;
	}
}
?>