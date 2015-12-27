<?php
namespace Channels\Model;

 use Zend\Db\TableGateway\TableGateway;
use Zend\Session\Container;
 class ChannelsTable
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

     public function get_channel_by_code($channel_code)
     {
         //$id  = (int) $id;
         $rowset = $this->tableGateway->select(array('channel_code' => $channel_code));
         $row = $rowset->current();
         if (!$row) {
            return false;
         }
         return $row;
     }
	 
	 public function saveChannel(Channel $channel)
     {
        //date_default_timezone_set("UTC");       
			$session_user = new Container('user');
            $user=$session_user->username;		
            $data = array(
             'channel_cat'       =>$channel->channel_cat,
             'name'              => $channel->name,
			 'channel_code'      =>$channel->channel_code,  
			 
             'user_name'   =>$user,
             'date_creat'    => date('Y-m-d H:i:s'),
 
         );
        
         $id = (int) $channel->id;
            if ($id == 0) {
             $this->tableGateway->insert($data);
         } else {
             //if ($this->getAdmin($id)) {
                 //$this->tableGateway->update($data, array('id' => $id));
             //} else {
                 throw new \Exception('Album id does not exist');
             }
         
     }
	 public function getname($channel)
	 {
		$rowset = $this->tableGateway->select(array('channel_code' => $channel));
         $row = $rowset->current();
         if (!$row) {
             return false;
         }
         return $row;
	 
	 }


 }
 ?>