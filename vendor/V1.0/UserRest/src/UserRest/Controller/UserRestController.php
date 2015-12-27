<?php
namespace UserRest\Controller;
use Zend\Mvc\Controller\AbstractRestfulController; 
 
use Users\Model\UsersTable;
use Users\Model\UserRoleTable;
use Zend\Authentication\Adapter\DbTable as DbTableAuthAdapter;
use Zend\Authentication\AuthenticationService;
use Zend\Mvc\MvcEvent;
use Zend\Mvc\Router\RouteMatch;
use Users\Service\UserMailServices;
use Users\Service\UserEncryption;

use Zend\View\Model\JsonModel;
class UserRestController extends AbstractRestfulController
{
    protected $users;
    public function getList()
    { 
//     	$response = $this->getResponseWithHeader()
//     	           ->setContent( __METHOD__.' Not Supprot');
//     	return $response;
    	  
//         $results = $this->getAlbumTable()->fetchAll();
//         $data = array();
//         foreach($results as $result) {
//             $data[] = $result;
//         }
//         $Status ='';
//         if(!empty($data)) {
//         	$Status = 'Success';
//         }else { 
//         	$Status = 'Error';
//         }

    	$Status = 'Error';
        return new JsonModel(array(
        	'status'=>$Status,
            'data' => $data = NULL, 
        ));
    }
    public function get($id)
    {
//     	  $response = $this->getResponseWithHeader()
//     	    	           ->setContent( __METHOD__.'Id Data');
//     	  return $response;

    	
    	
    	$userTable = $this->getServiceLocator()->get('Users\Model\UsersTable');
        $User = $userTable->getUserById($id);
        $Status ='';
        if($User) {
        	$Status = 'Success';
        }else {
        	$Status = 'Error';
        }
        return new JsonModel(array(
        	'status'=>$Status,
            'data' => $User,
        ));
    }
    public function create($data)
    {
//     	 $response = $this->getResponseWithHeader()
//     	    	           ->setContent( __METHOD__.'  POST DATA');
//     	 return $response;
    
    	$id = (int)$data['id'];
 
    	$idsave = '';
    	if($id != 0)
    	{
    		return new JsonModel(array(
    		    	'data' => 'Update data Post',
    		   ));
    		// Update data 
    	}else if($id == 0) { 
    		// Insert data 
    		$config = $this->getServiceLocator()->get('Config');
    		$userPassword = $this->getServiceLocator()->get('Users\Service\UserEncryption');
    		 
    		$userTable = $this->getServiceLocator()->get('Users\Model\UsersTable');
    		$User_RoleTable = $this->getServiceLocator()->get('Users\Model\UserRoleTable');
    			
    		$userDetails = $userTable->getUserDetailByUsername($data['email']);
    		$User_Role_List_all = $User_RoleTable->getUsers_Role(array(),array(),'',false);
    		
    		if(empty($userDetails))
    		{
    			// User Name Is not exits
    			$encyptPass = $userPassword->create($data['password']);
    			//var_dump($encyptPass);
    			$_User_data = array(
    					'id'=> 0,
    					'email' => $data['email'],
    					'password'  => $encyptPass,
    					'first_name'=>$data['first_name'],
    					'last_name'=>$data['last_name'],
    					'AccountType'=>NULL,
    					// 'login_attempts'=>0,
    			        //     'login_attempt_time'=>0,
    			        //  'datetime'=>date("Y-m-d H:i:s"),
    			);
    		
    			$id_User = $userTable->saveUsers($_User_data);
    		
    			if($id_User)
    			{
    				//Set User Role 2 : Employee
    				//Check User Role
    				$check_User_Role = $User_RoleTable->getUser_Role($id_User);
    				if($check_User_Role)
    				{  // Error Exits
    				}else {
    					// User Not Exits
    					$status = $User_RoleTable->setUserRoleByUserId($id_User,$role_id = 2) ; // $role_id = 2 //Set User Role 2 : Employee
    					if($status == true) {  
    						$data_resphone = array(
    							         'status'=>'Register User Success',
    								     'id'=>$id_User
    						       );
    					}
    					else {  
    						 $data_resphone = array(
    						 		'status'=>'Register User Error', 
    						 );
    					}
    				}
    			}
    		
    		}else {
    			// User Name Is exits 
    			$data_resphone = array(
    					'status'=>'User or Email Is Exits in system , Error',
    			);
    		}
    		
    	}
    	 
    	return new JsonModel(array(
    			'data' => $data_resphone,  
    	));
    }
    public function update($id, $data)
    {
//     	$response = $this->getResponseWithHeader()
//     	->setContent( __METHOD__.'  UPDATE POST DATA');
//     	return $response;

    	return new JsonModel ( array (
    			'data' => 'Update data Post- not support'
    	) );
    	
          $data['id'] = $id; 
        $userTable = $this->getServiceLocator ()->get ( 'Users\Model\UsersTable' );
		$idsave = $userTable->saveUsers ( $data );
       
           if($idsave === 1){ $status ='Success!';}
           else { $status ='Error!'; }
           
           $data_resphone = array(
           		'status'=>$status,
           		'satus_update'=>$idsave,
           	    'id'=>$id,
           		
           );
           
        return new JsonModel(array(
            'data' => $data_resphone, 
        ));
    }
   public function delete($id) {
		$userTable = $this->getServiceLocator ()->get ( 'Users\Model\UsersTable' );
		$status_delete = $userTable->delete ( $id );
		return new JsonModel ( array (
				'data' => 'deleted',
				'Code_satus' => $status_delete 
		) );
	}
     
	protected $UsersTable;
	public function getUsersTable() {
		if (! $this->UsersTable) {
			$pst = $this->getServiceLocator ();
			$this->UsersTable = $pst->get ( 'Users\Model\UsersTable' );
		}
		return $this->UsersTable;
	}
    
    // configure response
    public function getResponseWithHeader()
    {
    	$response = $this->getResponse();
    	$response->getHeaders()
    	//make can accessed by *
    	         ->addHeaderLine('Access-Control-Allow-Origin','*')
    	//set allow methods
    	        ->addHeaderLine('Access-Control-Allow-Methods','POST PUT DELETE GET');
    
    	return $response;
    }
}