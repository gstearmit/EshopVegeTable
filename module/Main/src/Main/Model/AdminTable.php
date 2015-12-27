<?php
namespace Main\Model;
use Zend\Crypt\Password\Bcrypt;
use Zend\Db\TableGateway\TableGateway;
//use Zend\Http\Cookies;
//use Zend\Http\Client;
use Zend\Session\Container;
 class AdminTable
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

     public function getAdmin($id)
     {
         $id  = (int) $id;
         $rowset = $this->tableGateway->select(array('id' => $id));
         $row = $rowset->current();
         if (!$row) {
             throw new \Exception("Could not find row $id");
         }
         return $row;
     }
    public function checkuser($username)
    {
        $rowset = $this->tableGateway->select(array('username' => $username));
         $row = $rowset->current();
         if (!$row) {
           return false;
         }
         echo $row->username.' ';
         return true;
    }
    public function checkemail($email)
    {
        $rowset = $this->tableGateway->select(array('email' => $email));
         $row = $rowset->current();
             if (!$row) {
           return false;
         }
         return true;
    }
	public function updateplaylist($playlist_id){
			$session_user = new Container('user');
            $user=$session_user->username;	
			if(isset($user)){
			$row=$this->getuser($user);
			$data=array(
		'playlist_id'  =>$row->playlist_id.$playlist_id.',',
	 );
	 
		
		$this->tableGateway->update($data, array('username' => $user));
     		return 1;
			}
			return 0;
	 
	 }
    public function getuser($username)
    {
        $rowset = $this->tableGateway->select(array('username' => $username));
         $row = $rowset->current();
         if (!$row) {
           return false;
         }
         //var_dump($row);
         return $row;
    }
   public function checkpass($pass)
    {
        $bcrypt = new Bcrypt();
        $secPass = $bcrypt->create('$pass');
        //$encrypt=md5(md5($pass));
        $rowset = $this->tableGateway->select(array('pass' => $secPass));
         $row = $rowset->current();
             if (!$row) {
           return false;
         }
         
         return true;
    }
    public function saveAdmin(Admin $admin)
     {
        $bcrypt = new Bcrypt();
         $data = array(
             'username' => $admin->username,
             'password'  => $bcrypt->create($admin->password),
             'email'=>$admin->email,
         );
        
         $id = (int) $admin->id;
         if($this->checkuser($admin->username)){
            echo 'user already exits';
            //echo 
         }else {if($this->checkemail($admin->email)){
            echo 'email already exits';
         }else
            {if ($id == 0) {
             $this->tableGateway->insert($data);
         } else {
             if ($this->getAdmin($id)) {
                 $this->tableGateway->update($data, array('id' => $id));
                 return true;
             } else {
                 throw new \Exception('Album id does not exist');
             }
         }
         }
         }
     }
	 public function update_exsv($exsv)
	{
		$data= array(
				'externalsv_id' =>$exsv['externalsv_id'],
				'folder_key'=> $exsv['folder_key'],
				'folder_name' =>$exsv['folder_name'],
		);
		$id=(int)$exsv['id'];
		if(!$id){
		return 0;}
		else{
			$this->tableGateway->update($data,array('id'=>$id));
			return 1;
		}
	}
     public function checklogin($admin)
     {
        $bcrypt = new Bcrypt();
       // echo $admin->password;
       // $secpass=$bcrypt->create($admin->password);
        //echo $secpass;
        // $data = array(
        //     'username' => $admin->username,
        //     'password'  => $bcrypt->create($admin->password),
            
       //  );
         $rowset = $this->tableGateway->select(array('username' => $admin->username));
         $row = $rowset->current();
         if(!$row){
            return 1;
            //echo 'User is not exits';
         }
         else{
            //echo $row->password;
            if ($bcrypt->verify($admin->password, $row->password))
            {
               
                $session_user = new Container('user');
                $session_user->username=$admin->username;
                $session_user->time=time()+14400;
                //$session_user->rememberMeSeconds=
                //echo "login success";
                return 0;
                
            }
            else {
                    // echo "The password is NOT correct.\n";
                     return 2;
            }
            
         }
     }
     public function changepass($form)
	 
     {
     	$bcrypt = new Bcrypt();
     	$data = array(
             
             'password'  => $bcrypt->create($form->passwordrepeat1),
            
         );
         if($form->passwordrepeat1!=$form->passwordrepeat2){return 2;}
     	if($bcrypt->verify($form->password,$getuser->password))
     	{
     		$this->tableGateway->update($data, array('id' => $user->id));
     		return 0;
     	
     	}
     	else return 1;
     	
     }
	 public function updatechannel($channel_code){
			$session_user = new Container('user');
            $user=$session_user->username;	
			$data=array(
		'channel_code'  =>$channel_code,
	 );
		$this->tableGateway->update($data, array('username' => $user));
     		return 0;
	 
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

       		 if (!file_exists('eclip.tv/data/uploads/user/'.$getuser->id)) 
        	{
           		 mkdir('eclip.tv/data/uploads/user/'.$getuser->id, 0777, true);
        	}

      		move_uploaded_file($form["imagefile"]["tmp_name"],"eclip.tv/data/uploads/user/".$getuser->id."/avatar.".$extension);
      		  $data = array(
             
             	'avatar'  => "http://eclip.tv/data/uploads/user/".$getuser->id."/avatar.".$extension,
            
        		 );
        	 if(!file_exists("eclip.tv/data/uploads/user/".$getuser->id."/avatar.".$extension)){return 2;}
     		else
     			{
     				$this->tableGateway->update($data, array('id' => $getuser->id));
     				return 3;
     	
     			}
     		
      		

     		
      }}else return 4;
     	
     }
     public function deleteAdmin($id)
     {
         $this->tableGateway->delete(array('id' => (int) $id));
     }
     public function cookieAdmin()
     {}
 }
 ?>