<?php
namespace Admin\Controller;
//use Zend\Crypt\BlockCipher;
use Zend\Crypt\Password\Bcrypt;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Admin\Form\RegisterForm;
use Admin\Form\LoginForm;
use Admin\Form\ChangeavaForm;
use Admin\Model\Admin;    
use Zend\Session\Container;      // <-- Add this import
use Zend\Mail\Transport\Smtp as SmtpTransport;
use Zend\Mail\Transport\SmtpOptions;
use Zend\Mail\Message;
use Zend\Mail\Transport\Sendmail as SendmailTransport;

use Admin\Form as Form;


class indexController extends AbstractActionController
{
	
	public function dashboardAction()
	{
		//die("dashboard acuon");
		$this->layout('layout/apotravinyadmin');
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
				
				$admin = new Admin();
				$admin->exchangeArray($data);
				$k=$this->getAdminTable()->loginemailpass($admin);
			
			
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
			$paginator=$this->getAdminTable()->fetchAll(true);
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
			$l=$this->getAdminTable()->getbyemail($data->email);
			$k=$this->getAdminTable()->recoverpass($data->email);
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
					$this->getAdminTable()->deleteAdmin($id);	
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
					$admin=new Admin();
					$admin->exchangeArray($k);
					$res=$this->getAdminTable()->editAdmin($admin);
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
			$admin = new Admin();
            $form->setData($request->getPost());
            if ($form->isValid()) {
                 $admin->exchangeArray($form->getData());
                 $k=$this->getAdminTable()->saveAdmin($admin);
                 if($k){ 
                }
            }
         }
         return $viewModel;
     }
     public function logoutAction()
     {
        $session_user = new Container('user');
       // $session_user->getManager()->getStorage()->clear('user');
        $session_user->getManager()->getStorage()->clear();
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
             $admin = new Admin();
              $form->setData($request->getPost());
             if ($form->isValid()) {
                 $admin->exchangeArray($form->getData());
                 $k=$this->getAdminTable()->checklogin($admin); 
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
     		$admin = new Admin();
     		$form->setData($request->getPost());
     		if ($form->isValid()) {
     			$admin->exchangeArray($form->getData());
     			$k=$this->getAdminTable()->checklogin($admin);
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

     			$user = new Admin(); $user->exchangeArray($data);
      			$Update_address = $this->getAdminTable()->update_address($getuser->id,$user);
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
     		$admin = new Admin();
     		$form->setData($request->getPost());
     		if ($form->isValid()) {
     			$admin->exchangeArray($form->getData());
     			$k=$this->getAdminTable()->checklogin($admin);
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
     	if($this->request->isPost()){
            $email = addslashes(trim($this->params()->fromPost('email')));
            $check = $this->getAdminTable()->checkemail($email);
            if($check == 1){               
                $pass = $this->getAdminTable()->generateRandomString();
                $bcrypt = new Bcrypt ();
                $endpass = $bcrypt->create ( $pass );
                $this->getAdminTable()->forgotpass($email, $endpass);
                $message = array();

                $message[] = "";
                $message[] = "------ Thông tin mật khẩu-------";
                $message[] = "Mật khảu hiện tại của bạn là : ".$pass;
                $message[] = "";
                $message[] = "Hãy đăng nhập và thay đổi mật khẩu.";
                $message[] = "";
                $message[] = WEBPATH . "/loginmaster";
                $message[] = "---------------------------------";

                $textPart = new \Zend\Mime\Part(implode("\r\n", $message));
                $textPart->type = "text/plain";
                $body = new \Zend\Mime\Message();
                $body->setParts(array($textPart));
                $sendmail = new Message();
                $sendmail->setTo($email);
                $sendmail->setFrom("sale@esellinc.com");
                $sendmail->setEncoding("UTF-8");
                $sendmail->setSubject("Yêu Cầu Thay Đổi Mật Khẩu Tại .".WEBPATH);
                $sendmail->setBody($body);
                $transport = new SmtpTransport();
                $option = new SmtpOptions(array(
                    'name' => 'localhost',
                    'host' => '166.62.28.97',
                    'port' => '25',
                    'connection_class' => 'login',
                    'connection_config' => array(
                        'username' => 'sale@esellinc.com',
                        'password' => 'esell@Ellacy1990',
                        'ssl' => 'tls',
                    ),
                ));
                $transport->setOptions($option);
                $transport->send($sendmail);
                $alert ='<p class="alert alert-success">A new password has been sent to e-mail us your check for information email accounts committee .</p>';
                return array('alert'=>$alert);
            }  else {
                $alert ='<p class="alert alert-warning">This email is not registered</p>';
                return array('alert'=>$alert);
            }
        }
     	
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
     		    $admin = new Admin();
     			$admin->exchangeArray($data);
     			
     			$k=$this->getAdminTable()->checklogin($admin);
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
     			$statuschangepass = $this->getAdminTable()->acounteditpass($getuser,$current_password,$news_password);
     			
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
                		 $k=$this->getAdminTable()->changepass($getuser,$form);
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
					$k=$this->getAdminTable()->updateava($form,$getuser);
					return $this->redirect()->toUrl(WEBPATH.'/main/profile');
						//var_dump($k);
					
				}
			}
            return $viewModel;       
        }           
     }
     public function getAdminTable()
     {
         if (!$this->AdminTable) {
             $sm = $this->getServiceLocator();
             $this->AdminTable = $sm->get('Admin\Model\AdminTable');
         }
         return $this->AdminTable;
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
            return $this->getAdminTable()->getuser($user);
        }else return false;
     }
      protected $session;
	 protected $AdminTable;    
}
?>