<?php
namespace Main\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Session\Container;
 class ChannelTable
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

     public function getads($id)
     {
         $id  = (int) $id;
         $rowset = $this->tableGateway->select(array('id' => $id));
         $row = $rowset->current();
         if (!$row) {
             throw new \Exception("Could not find row $id");
         }
         return $row;
     }
	 public function getrow($channel_code)
	 {
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
	 public function updateplaylist($playlist_id){
			$session_user = new Container('user');
            $user=$session_user->username;	
			if(isset($user)){
			$row=$this->getbyuser($user);
			$data=array(
		'playlist'  =>$row->playlist.$playlist_id.',',
	 );
	 
		
		$this->tableGateway->update($data, array('user_name' => $user));
     		return 1;
			}
			return 0;
	 
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
	 	 public function getbyuser($user)
	 {
		$rowset = $this->tableGateway->select(array('user_name' => $user));
         $row = $rowset->current();
         if (!$row) {
             return false;
         }
         return $row;
	 
	 }
	      public function updateava($form,$getuser)
     {
		 $allowedExts = array("gif", "jpeg", "jpg", "png");
		$temp = explode(".", $form["imagefile"]["name"]);
		$extension = strtolower(end($temp));
		if ((($form["imagefile"]["type"] == "image/gif")
		|| ($form["imagefile"]["type"] == "image/jpeg")
		|| ($form["imagefile"]["type"] == "image/jpg")
		|| ($form["imagefile"]["type"] == "image/pjpeg")
		|| ($form["imagefile"]["type"] == "image/x-png")
		|| ($form["imagefile"]["type"] == "image/png"))
		&& (($form["imagefile"]["size"]/1000000) < 5)
		&& in_array($extension, $allowedExts))
		{
			if ($form["imagefile"]["error"] > 0)
				{
					return 1;
				}
			 else
				{
			$filename=$form["imagefile"]["name"];

				//echo "Upload: " . $form["imagefile"]["name"] . "<br>";
				//echo "Type: " . $form["imagefile"]["type"] . "<br>";
			// echo "Size: " . ($form["imagefile"]["size"] / 1024) . " kB<br>";
				//echo "Temp file: " . $form["imagefile"]["tmp_name"] . "<br>";
				$hhh=md5($getuser->id);
				$row=$this->getname($getuser->channel_code);
				 if (!file_exists('public_html/data/uploads/user/'.$hhh)) 
				{
					 mkdir('public_html/data/uploads/user/'.$hhh, 0777, true);
				}

				move_uploaded_file($form["imagefile"]["tmp_name"],"public_html/data/uploads/user/".$hhh."/image.".$extension);
				  $data = array(
				 
					'image'  => "http://eclip.tv/data/uploads/user/".$hhh."/image.".$extension,
				
					 );
				 if(!file_exists("eclip.tv/data/uploads/user/".$hhh."/image.".$extension)){return 2;}
				else
					{
						$this->tableGateway->update($data, array('id' =>$row->id));
						return 3;
			
					}
				
				

				
		  }}else return 4;
			
     }


 }
 ?>