<?php
namespace Main\Model;

 use Zend\Db\TableGateway\TableGateway;

 class BannerTable
 {
     protected $tableGateway;

     public function __construct(TableGateway $tableGateway)
     {
         $this->tableGateway = $tableGateway;
     }

     
     
     public function getads($id)
     {
    
     	$id  = (int) $id;
     	$rowset = $this->tableGateway->select(array('id' => $id));
     	$row = $rowset->current();
     	if (!$row) {
     		return false;
     	}
     	return $row;
     }

 public function getarrayspiecal() {
		$resultSet = $this->tableGateway->select ();
		$data = array ();
		$data->id = $resultSet->id;
		$data->catalog = $resultSet->catalog;
		return $data;
	}
	public function getadsbanner($id) {
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
	public function save(Banner $cata) {
		// var_dump($cata);
		$session_user = new Container ( 'user' );
		$user = $session_user->username;
		$data = array (
				'title' => $cata->title,
				'adscode' => $cata->adscode,
				'time' => $cata->time,
				'status' => 1,
				'date' => date ( 'Y-m-d H:i:s' ),
				'user' => $user 
		);
		// echo $cata->adscode;
		
		$id = ( int ) $cata->id;
		if ($id == 0) {
			return $this->tableGateway->insert ( $data );
		} else {
			if ($this->getadsbanner ( $id )) {
				return $this->tableGateway->update ( $data, array (
						'id' => $id 
				) );
			} else {
				return 0;
			}
		}
	}
// 	public function fetchAll($user = '', $paginated = false) {
		
		
		
// 		if ($paginated) {
			
// 			// create a new Select object for the table album
// 			$select = new Select ( 'banner_ads' );
// 			if ($user) {
// 				$select->where ( array (
// 						'user' => $user 
// 				) );
// 			}
// 			// $select->where(array('catelog'=>$id));
// 			$select->order ( 'id ASC' );
// 			// create a new result set based on the Album entity
// 			$resultSetPrototype = new ResultSet ();
// 			$resultSetPrototype->setArrayObjectPrototype ( new Adspre () );
// 			// create a new pagination adapter object
// 			$paginatorAdapter = new DbSelect ( 
// 					// our configured select object
// 					$select, 
// 					// the adapter to run it against
// 					$this->tableGateway->getAdapter (), 
// 					// the result set to hydrate
// 					$resultSetPrototype );
// 			$paginator = new Paginator ( $paginatorAdapter );
// 			return $paginator;
// 		}
// 		$resultSet = $this->tableGateway->select();
//          return $resultSet;
//      }
     
	public function fetchAll()
	{
		$resultSet = $this->tableGateway->select();
		return $resultSet;
	}
	public function delete($id,$check=false)
	 {
		if($check){
		     return $this->tableGateway->delete(array('id' =>  $id));
		}
		else return 0;
		
		
	 }

 }
 ?>