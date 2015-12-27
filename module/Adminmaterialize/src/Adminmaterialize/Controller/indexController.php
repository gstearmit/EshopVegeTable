<?php
namespace Adminmaterialize\Controller;
//use Zend\Crypt\BlockCipher;
//use Zend\Crypt\Password\Bcrypt;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Adminmaterialize\Form\RegisterForm;
use Adminmaterialize\Form\LoginForm;
use Adminmaterialize\Form\ChangeavaForm;
use Adminmaterialize\Model\Adminmaterialize;    
use Zend\Session\Container;      // <-- Add this import
use Zend\Mail\Transport\Smtp as SmtpTransport;
use Zend\Mail\Transport\SmtpOptions;
use Zend\Mail\Message;
use Zend\Mail\Transport\Sendmail as SendmailTransport;

use Adminmaterialize\Form as Form;


class indexController extends AbstractActionController
{
	
	public function dashboardAction()
	{   $viewModel=new ViewModel();		
		$this->layout('layout/apotravinyadmin');
		$getuser = $this->forward ()->dispatch ( 'Admin\Controller\Index', array (
				'action' => 'getuser' 
		) );
		// var_dump($getuser);
		$this->layout ()->getuser = $getuser;
		
		return $viewModel;
	}
	
	public function loginpostAction()
	{
		$request=$this->getRequest();
		if($request->isPost())
		{
			$data=$request->getPost();
			

			$email = $data ['username'];
			$password = $data ['password'];
			$data = array(
					'email'=>$email,
					'password'=>$password,
			);
			
			if ($email !='' and $password !='') 
			{
				
				$admin = new Adminmaterialize();
				$admin->exchangeArray($data);
				$k=$this->getAdminmaterializeTable()->loginemailpass($admin);
			
			
				if($k==1||$k==2){
					echo 'Incorrect Username or password ';
					die;
				}
				if($k==0){
					$this->redirect()->toUrl(WEBPATH.'/mydashboard');
				}
				 
			}else { echo "Error!";die; }
		}
	}
    public function indexAction()
    {
		$viewModel=new ViewModel();		
		$getuser=$this->getuserAction();
		$this->layout()->getuser=$getuser;
		if($getuser)
        {$group=$getuser->group;}
		else{
				$this->layout('error/admin');
				$viewModel->err=false;
				return $viewModel;
		}
        if($group=="admin"||$group=="supperadmin"||$group=="adsmanager"){
			//$this->layout('layout/layoutadmin');
        	$this->layout('layout/admintheme');
			$viewModel->err=true;
            return $viewModel;
			}else
			{
				$this->layout('error/admin');
				$viewModel->err=false;
				return $viewModel;
			}     
       
    }
	public function memberAction()
	{		
		$getuser=$this->getuserAction();		
		if($getuser)
        {$group=$getuser->group;}
		else{
				$this->layout('error/admin');
				$viewModel->err=false;
				return $viewModel;
		}
        if(isset($group)&&$group=="supperadmin"){
			$page=1;
			$this->layout()->err=true;
			$paginator=$this->getAdminmaterializeTable()->fetchAll(true);
			$paginator->setCurrentPageNumber(1);
			$paginator->setItemCountPerPage(50);
			$this->layout()->paginator=$paginator;
			$this->layout('layout/layoutadmin');
			$this->layout()->getuser=$getuser;
		}else{ 
			$this->layout()->err=false;
			$this->layout('error/admin');
		}
	}
	public function forgotAction()
	{
		$getuser = $this->getuserAction();
        $this->layout()->getuser=$getuser;
		$this->layout('layout/home');
		$request=$this->getRequest();
		if($request->isPost())
		{
			$this->layout()->check=true;
			$data=$request->getPost();
			$l=$this->getAdminmaterializeTable()->getbyemail($data->email);
			$k=$this->getAdminmaterializeTable()->recoverpass($data->email);
			$this->layout()->email=$data->email;
			if($k){
			$message = new Message();
			$message->addTo($data->email)
					->addFrom('fox@eclip.tv')
					->setSubject('Recover Password ')
					->setBody("Your account:
usename: ".$l->username."
password: ".$k);

			// Setup SMTP transport using LOGIN authentication
			$transport = new SmtpTransport();
			$options   = new SmtpOptions(array(
				'name'              => 'localhost',
				'host'              => '124.158.4.83',
				'connection_class'  => 'login',
				'connection_config' => array(
					'username' => 'fox@eclip.tv',
					'password' => 'mkfqp6NH6',
				),
			));
			$transport->setOptions($options);
			$transport->send($message);
			$this->layout()->err=false;
			}else {$this->layout()->err=true;}
		}
		else{
			$this->layout()->check=false;
		}
	}
	public function catalogAction()
	{
		$catalog=$this->forward()->dispatch('Catalog\Controller\Index',array('action'=>'getdata'));        
        $allcat=$this->forward()->dispatch('Catalog\Controller\Index',array('action'=>'getall'));        
        $getuser = $this->getuserAction();
        $this->layout()->getuser=$getuser;
		 if($getuser&&($getuser->group=='admin'||$getuser->group=='supperadmin')){
			$this->layout('layout/layoutadmin');
			$this->layout()->catalog=$catalog;
			$this->layout()->allcat=$allcat;
			$this->layout()->err=true;
		 }else{ 
			$this->layout('error/admin');
			$this->layout()->err=false;
        
			}
	}
	public function deleteAction()
	{
		$getuser=$this->getuserAction();
		$this->layout()->getuser=$getuser;
		$request=$this->getRequest();
        if($request->isPost())
        {			
			if(!$getuser){
				return false;
			}else{
						if($getuser)
						{$group=$getuser->group;}
				if($group=="supperadmin"){
					$k=$request->getPost();
					$id=$k->id;
					$this->getAdminmaterializeTable()->deleteAdminmaterialize($id);	
					return true;
			}else{
				return false;
				}
			}
		}
	}
	public function editAction()
	{
		$viewModel=new ViewModel();
		$viewModel->setTerminal(true);
		$getuser=$this->getuserAction();
		$request=$this->getRequest();
        if($request->isPost())
        {
			
			if(!$getuser){
				$viewModel->err=false;
				return $viewModel;
			}else{
						if($getuser)
				{$group=$getuser->group;}
				else{
						$this->layout('error/admin');
						$viewModel->err=false;
						return $viewModel;
				}
				if($group=="supperadmin"){
					$viewModel->err=true;
					$k=$request->getPost();
					$admin=new Adminmaterialize();
					$admin->exchangeArray($k);
					$res=$this->getAdminmaterializeTable()->editAdminmaterialize($admin);
					$viewModel->res=$res;
					return $viewModel;		
			}else{
				$viewModel->err=false;
				return $viewModel;
				}
			}
		}
	}
public function adsmanageAction()
	{
		$viewModel=new ViewModel();
		
		$kind = (string) $this->params()->fromRoute('kind');
		$this->layout()->kind=$kind;
		
		$getuser=$this->getuserAction();
		
		if($getuser)
        {$group=$getuser->group;}
		else{
				$this->layout('error/admin');
				$viewModel->err=false;
				return $viewModel;
		}
        if(isset($group)&&($group=="supperadmin"||$group=="adsmanager")){
			$this->layout('layout/layoutadmin');
			$this->layout()->getuser=$getuser;
			$this->layout()->err=true;
		}else{ 
			$this->layout('error/admin');
			$this->layout()->err=false;
			}
	} 
    public function registerAction()
    {
       $viewModel = new ViewModel();
       $viewModel->setTerminal(true);
       $form= new RegisterForm();
       $response=$this->getResponse();
       $request = $this->getRequest();
       if ($request->isPost()) {
			$admin = new Adminmaterialize();
            $form->setData($request->getPost());
            if ($form->isValid()) {
                 $admin->exchangeArray($form->getData());
                 $k=$this->getAdminmaterializeTable()->saveAdminmaterialize($admin);
                 if($k){ 
                }
            }
         }
         return $viewModel;
     }
     public function logoutAction()
     {
        $session_user = new Container('user');
        $session_user->time=0;
        $session_user->username='';
        $this->redirect()->toUrl(WEBPATH);
     }
     public function loginAction()
     {        
       $viewModel = new ViewModel();
       $viewModel->setTerminal(true);
       $form= new LoginForm();
       $response=$this->getResponse();
       $request = $this->getRequest();
       if ($request->isPost()) {
             $admin = new Adminmaterialize();
              $form->setData($request->getPost());
             if ($form->isValid()) {
                 $admin->exchangeArray($form->getData());
                 $k=$this->getAdminmaterializeTable()->checklogin($admin); 
				 if($k==1||$k==2){
                    echo 'Incorrect Username or password';
					}
                if($k==0){}
				}
         }
        return $viewModel;
     }
     
     
     public function loginnoformAction()
     {
     	$viewModel = new ViewModel();
     	$this->layout('layout/bags');
     	$form= new LoginForm();
     	$response=$this->getResponse();
     	$request = $this->getRequest();
     	if ($request->isPost()) {
     		$admin = new Adminmaterialize();
     		$form->setData($request->getPost());
     		if ($form->isValid()) {
     			$admin->exchangeArray($form->getData());
     			$k=$this->getAdminmaterializeTable()->checklogin($admin);
     			if($k==1||$k==2){
     				echo 'Incorrect Username or password';
     			}
     			if($k==0){}
     		}
     	}
     	return $viewModel;
     }
     
     //Addressnew
     public function addressnewAction()
     {
     	$this->layout('layout/bags');
     	$getuser = $this->getuserAction();
     	//var_dump($getuser);
     	$this->layout()->getuser=$getuser;
     }
     
     //addressmanage
     public function addressmanageAction()
     {
     	$this->layout('layout/bags');
     	$getuser = $this->getuserAction();
     	//var_dump($getuser);
     	$this->layout()->getuser=$getuser;
     }
     
     //addressedit
     public function addresseditAction()
     {
     	$this->layout('layout/bags');
     	$getuser = $this->getuserAction();
     	
     	if($getuser)
     	{
     		$this->layout()->getuser=$getuser;
     		
     		//change pass
     		$request = $this->getRequest();
     		if ($request->isPost()) 
     		{
     			$dataPost = $request->getPost();
     			$data =  array(
     				    'firstname' => $dataPost ['firstname'],
						'lastname' => $dataPost ['lastname'],
						'email' => $dataPost ['lastname'],
						'company' => $dataPost ['company'],
						'street_1' => $dataPost ['street'] [0],
						'street_2' => $dataPost ['street'] [0],
						'telephone' => $dataPost ['telephone'],
						'fax' => $dataPost ['fax'],
						'city' => $dataPost ['city'],
						'region' => $dataPost ['region'],
						'postcode' => $dataPost ['postcode'],
						'country' => $dataPost ['country'],
						'default_billing' => $dataPost ['default_billing'],
						'default_shipping' => $dataPost ['default_shipping'],
     						
     			);

     			$user = new Adminmaterialize(); $user->exchangeArray($data);
      			$Update_address = $this->getAdminmaterializeTable()->update_address($getuser->id,$user);
     			//var_dump($Update_address);//die;
     			
     		}
     		
     	}
     	else {
     		$this->redirect()->toUrl(WEBPATH);
     	}
     	
     	$this->layout()->Update_address = $Update_address;
     }
     
     // MY DASHBOAR
     public function mydashboardAction()
     {
     	$this->layout('layout/bags');
     	$getuser = $this->getuserAction();
     	$this->layout()->getuser=$getuser;
     	if(!$getuser)
     	{
     		$this->redirect()->toUrl(WEBPATH);
     	}

     }
    
     public function accounteditAction()
     {
     	$this->layout('layout/bags');
     	$getuser = $this->getuserAction();
     	//var_dump($getuser);
     	$this->layout()->getuser=$getuser;
     	if(!$getuser)
     	{
     		$this->redirect()->toUrl(WEBPATH);
     	}
     }
     
     public function createaccountAction()
     {
     	$viewModel = new ViewModel();
     	$this->layout('layout/bags');
     	$form= new LoginForm();
     	$response=$this->getResponse();
     	$request = $this->getRequest();
     	if ($request->isPost()) {
     		$admin = new Adminmaterialize();
     		$form->setData($request->getPost());
     		if ($form->isValid()) {
     			$admin->exchangeArray($form->getData());
     			$k=$this->getAdminmaterializeTable()->checklogin($admin);
     			if($k==1||$k==2){
     				echo 'Incorrect Username or password';
     			}
     			if($k==0){}
     		}
     	}
     	return $viewModel;
     }
     
     public function forgotpasswordAction()
     {
     	$this->layout('layout/bags');
     	$getuser = $this->getuserAction();
     	//var_dump($getuser);
     	$this->layout()->getuser=$getuser;
     	
     	
     }
     
     public function loginajaxAction()
     {
     	$username = $this->params()->fromPost('username');
     	$password = $this->params()->fromPost('password');
     	$data = array(
     			'username'=>$username,
     			'password'=>$password,
     	);
     	
     	if ($username !='' and $password !='') {
     		    $data = array(
     		    	'username'=>$username,
     		    	'password'=>$password,
     		    );
     		    $admin = new Adminmaterialize();
     			$admin->exchangeArray($data);
     			
     			$k=$this->getAdminmaterializeTable()->checklogin($admin);
     			//$session_user = new Container('user');
     			//return $session_user;
     			//echo "k ---";print_r($session_user);die;
     			
     			if($k==1||$k==2){
     				echo 'Incorrect Username or password ';
     				die;
     			}
     			if($k==0){
     				echo '';
     				die;
     			//	$this->redirect()->toUrl(WEBPATH.'/admin');
     			}
     		
     	}else { echo "Error!";die; }
     	
     }
     
     
      public function accountchangepassAction()
     {
     	$this->layout('layout/bags');
     	$getuser = $this->getuserAction();
     	
     	if($getuser)
     	{
     		$this->layout()->getuser=$getuser;
     		
     		//change pass
     		$request = $this->getRequest();
     		if ($request->isPost()) {
     			$dataPost = $request->getPost();

     			$data =  array(
     				'firstname'=>$dataPost['firstname'],
     				'lastname'=>$dataPost['lastname'],
     				'email'=>$dataPost['lastname'],
     				'password'=>$dataPost['password'],
     						
     			);
     			$current_password = $dataPost['current_password'];
     			$news_password = $dataPost['password'];
     			$statuschangepass = $this->getAdminmaterializeTable()->acounteditpass($getuser,$current_password,$news_password);
     			
     		}
     		
     	}
     	else {
     		$this->redirect()->toUrl(WEBPATH);
     	}
     	
     	$this->layout()->statuschangepass = $statuschangepass;
     }
     
     public function changepassAction()
     {
     	$viewModel = new ViewModel();
       $viewModel->setTerminal(true);
        $getuser=$this->getuserAction();
        $viewModel->getuser=$getuser;
        if(!$getuser){return $viewModel;}
        else
        {

        	$form=array();
        	$request = $this->getRequest();
       		if ($request->isPost()) {
              		$form=$request->getPost();
             		if ($form) {
                		 $k=$this->getAdminmaterializeTable()->changepass($getuser,$form);
                		if($k==2)
                		{
                			echo "Password repeat invalid";
                		}if($k==1){
                 			echo "Password  invalid";                 			
                 		}
					}
         	}
         	return $viewModel;
        }        
     }
     public function changeavatarAction()
     {
     	$viewModel = new ViewModel();
        $viewModel->setTerminal(true);
        $getuser=$this->getuserAction();
        $viewModel->getuser=$getuser;
        return $viewModel;  
     }
     public function changeAction()
     {
		$viewModel = new ViewModel();
		$viewModel->setTerminal(true);
		$getuser=$this->getuserAction();
        $viewModel->getuser=$getuser;
        $viewModel->key=false;
        if(!$getuser){return $viewModel;}
        else
        {
			$form=array();
			$request = $this->getRequest();
			if ($request->isPost()) 
			{     
				$post = array_merge_recursive(
						$request->getPost()->toArray(),
						$request->getFiles()->toArray()
				);
				$form=$post;
				if ($form) {
					$k=$this->getAdminmaterializeTable()->updateava($form,$getuser);
					return $this->redirect()->toUrl(WEBPATH.'/main/profile');
						//var_dump($k);
					
				}
			}
            return $viewModel;       
        }           
     }
     public function getAdminmaterializeTable()
     {
         if (!$this->AdminmaterializeTable) {
             $sm = $this->getServiceLocator();
             $this->AdminmaterializeTable = $sm->get('Adminmaterialize\Model\AdminmaterializeTable');
         }
         return $this->AdminmaterializeTable;
     }
     public function sessionAction()
     {
        $session_user = new Container('user');
        $time= $session_user->time;
        $user=$session_user->username;
        if($time<time())
        {
            $session_user->username='';
            $session_user->time=0;
            $this->session=false;            
        }
        else $this->session=true;
        return $this->session;
     }
     public function getuserAction()
     {
        if($this->sessionAction())
        {
             $session_user = new Container('user');
             $user=$session_user->username;
            return $this->getAdminmaterializeTable()->getuser($user);
        }else return false;
     }
      protected $session;
	 protected $AdminmaterializeTable;    
}
?>