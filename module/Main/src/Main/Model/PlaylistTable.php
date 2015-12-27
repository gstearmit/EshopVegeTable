<?php
namespace Main\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;
use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;
 use Zend\Paginator\Adapter\DbSelect;
 use Zend\Paginator\Paginator;
 use Zend\Db\Sql\Where;
use Zend\Session\Container;
 class PlaylistTable
 {
     protected $tableGateway;

     public function __construct(TableGateway $tableGateway)
     {
         $this->tableGateway = $tableGateway;
     }

     public function fetchAll()
     {
         $resultSet = $this->tableGateway->select();
         return $resultSet;
     }


	 public function getrow($playlist_id)
	 {
		$rowset = $this->tableGateway->select(array('id' => $playlist_id));
         $row = $rowset->current();
         if (!$row) {
             return false;
         }
         return $row;
	 }
	 	 public function getrowbycode($playlist)
	 {
		$rowset = $this->tableGateway->select(array('listcode' => $playlist));
         $row = $rowset->current();
         if (!$row) {
             return false;
         }
         return $row;
	 }
	 
	 public function saveplaylist(Playlist $playlist)
     {
        //date_default_timezone_set("UTC");       
			$session_user = new Container('user');
            $user=$session_user->username;		
			//echo md5($playlist->name.microtime(true).$user);
            $data = array(             
             'name'              => $playlist->name,
			 'listcode'      =>substr(base64_encode(md5($playlist->name.microtime(true).$user)),0,20), 
			 
             'user_name'   =>$user,
             'date_creat'    => date('Y-m-d H:i:s'),
 
         );
        
         $id = (int) $playlist->id;
            if ($id == 0) {
             $this->tableGateway->insert($data);
			 return $this->tableGateway->lastInsertValue;
         } else {
             //if ($this->getAdmin($id)) {
                 //$this->tableGateway->update($data, array('id' => $id));
             //} else {
                 throw new \Exception('Album id does not exist');
             }
         
     
	 }
	 public function updateplaylist($listcode,$videoid)
	 {
		//var_dump($row);
		$session_user = new Container('user');
        $user=$session_user->username;
		
		$row=$this->getrowbycode($listcode);
		
		if($row){
			if($row->user_name!=$user||!($videoid)){return 0;}
			else{
				$data=array(
							'video_id'  =>$row->video_id.$videoid.',',
						);
	 
		
				$this->tableGateway->update($data, array('listcode' => $listcode));
				return 1;
				}
		}
		return 0;
		
	 }
	 	 public function deletevideo($listcode,$videoid)
	 {
		//var_dump($row);
		$session_user = new Container('user');
        $user=$session_user->username;
		
		$row=$this->getrowbycode($listcode);
		
		if($row){
			if($row->user_name!=$user||!($videoid)){return 0;}
			else{
				$data=array(
							'video_id'  =>str_replace($videoid.',','',$row->video_id),
						);
	 
		
				$this->tableGateway->update($data, array('listcode' => $listcode));
				return 1;
				}
		}
		return 0;
		
	 }
	public function fetbyuser($user_name,$paginated=false)
     {
        if ($paginated) {
             // create a new Select object for the table album
             $select = new Select('playlist');
             $select->where(array('user_name'=>$user_name));
             	    //->or(array('catelog'=>'29'));
             
            
             $select->order('id DESC');
             // create a new result set based on the Album entity
             $resultSetPrototype = new ResultSet();
             $resultSetPrototype->setArrayObjectPrototype(new Playlist());
             // create a new pagination adapter object
             $paginatorAdapter = new DbSelect(
                 // our configured select object
                 $select,
                 // the adapter to run it against
                 $this->tableGateway->getAdapter(),
                 // the result set to hydrate
                 $resultSetPrototype
             );
             $paginator = new Paginator($paginatorAdapter);
             return $paginator;
         }
         $resultSet = $this->tableGateway->select();
         return $resultSet;
     }
	 public function fetbyid($list_id,$paginated=false)
     {
        if ($paginated) {
             // create a new Select object for the table album
             $select = new Select('playlist');
             foreach($list_id as $pa){
              if($pa)$select->where->OR->equalTo('id',$pa);
             }
            $select->where->OR->equalTo('id',-1);
             $select->order('id DESC');
            
           
             // create a new result set based on the Album entity
             $resultSetPrototype = new ResultSet();
             $resultSetPrototype->setArrayObjectPrototype(new Playlist());
             // create a new pagination adapter object
             $paginatorAdapter = new DbSelect(
                 // our configured select object
                 $select,
                 // the adapter to run it against
                 $this->tableGateway->getAdapter(),
                 // the result set to hydrate
                 $resultSetPrototype
             );
             $paginator = new Paginator($paginatorAdapter);
             return $paginator;
         }
         $resultSet = $this->tableGateway->select();
         return $resultSet;
     }



 }
 ?>