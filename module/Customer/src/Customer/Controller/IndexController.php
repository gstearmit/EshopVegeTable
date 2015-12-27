<?php

namespace Customer\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Session\Container;
use Customer\Model\Customer;
use Customer\Model\Email;
use Manufacture\Model\Utility;
use Zend\Mail\Message;
use Zend\Mail\Transport\Smtp as SmtpTransport;
use Zend\Mail\Transport\SmtpOptions;
use Zend\Mime\Message as MimeMessage;
use Zend\Mime\Part as MimePart;
use Zend\Db\Sql\Select;
use Zend\Paginator\Paginator;
use Zend\Paginator\Adapter\Iterator as paginatorIterator;

class IndexController extends AbstractActionController {

    protected $Acount;

    public function getAcountTable() {
        if (!$this->Acount) {
            $pst = $this->getServiceLocator();
            $this->Acount = $pst->get('Customer\Model\CustomerTable');
        }
        return $this->Acount;
    }

   protected $Email;

    public function getEmailTable() {
        if (!$this->Email) {
            $pst = $this->getServiceLocator();
            $this->Email = $pst->get('Customer\Model\EmailTable');
        }
        return $this->Email;
    }

// --------------------------------- ADMIN CUSTOMER ---------------------------------------
    public function indexAction() {
        $getuser = $this->forward()->dispatch('Admin\Controller\Index', array('action' => 'getuser'));
        if (!$getuser) {
            // not yet login
            $this->redirect()->toRoute('home');
        }
        $this->layout()->getuser = $getuser;
        $this->layout('layout/apotravinyadmin');

        $select = new Select();
        $page = $this->params()->fromRoute('page') ? (int) $this->params()->fromRoute('page') : 1;
        $customer = $this->getAcountTable()->listcustomer();
        $itemsPerPage = 10;
        $customer->current();
        $paginator = new Paginator(new paginatorIterator($customer));
        $paginator->setCurrentPageNumber($page)
                ->setItemCountPerPage($itemsPerPage)
                ->setPageRange(5);

        return new ViewModel(array(
            'page' => $page,
            'paginator' => $paginator,
        ));
    }

    public function viewAction() {
        $getuser = $this->forward()->dispatch('Admin\Controller\Index', array('action' => 'getuser'));
        if (!$getuser) {
            // not yet login
            $this->redirect()->toRoute('home');
        }
        $this->layout()->getuser = $getuser;
        $this->layout('layout/apotravinyadmin');
        $id = $this->params()->fromRoute('id');
        $data_detail = $this->getAcountTable()->acountdetail($id);
        return array('data_detail' => $data_detail);
    }

    public function deleteAction() {
        $id = $this->params()->fromRoute('id');
        $this->getAcountTable()->delete_acount($id);
        $this->redirect()->toRoute('Customer');
    }

// -------------------------------- END ADMIN ---------------------------------
    public function loginAction() {

        $email = addslashes(trim($this->params()->fromPost('email')));
        $password = addslashes(trim($this->params()->fromPost('password')));
        $endpass = substr(base64_encode(md5($password)), 0, -1);
        $checklogin = $this->getAcountTable()->checklogin($email, $endpass);
        if ($checklogin) {
            echo '';
            die;
        } else {
            $error = "E-mail nebo heslo nesprávné";
            echo $error;
            die;
        }
    }
     public function loginwishlistAction() {
        $session_wish =new Container('wisht_list');
        $email = addslashes(trim($this->params()->fromPost('email')));
        $password = addslashes(trim($this->params()->fromPost('password')));
        $endpass = substr(base64_encode(md5($password)), 0, -1);
        $checklogin = $this->getAcountTable()->checklogin($email, $endpass);
        if ($checklogin) {
            $session_wish->error='';
            $this->redirect()->toUrl(WEBPATH.'/apotraviny/index/index');
        } else {
            
            $session_wish->error='E-mail nebo heslo nesprávné';
           $this->redirect()->toUrl(WEBPATH.'/apotraviny/index/login');
            
        }
    }
    public function registerAction() {
        //print_r($country);die;


        $email = addslashes(trim($this->params()->fromPost('email')));
        $phone = addslashes(trim($this->params()->fromPost('phone')));
        $password = addslashes(trim($this->params()->fromPost('password')));
        $date = date('Y-m-d');
        $endpass = substr(base64_encode(md5($password)), 0, -1);
        $data = array(
            'fullname' => '',
            'email' => $email,
            'phone' => $phone,
            'password' => $endpass,
            'company' => '',
            'address' => '',
            'city' => '',
            'yahoo' => '',
            'skype' => '',
            'facebook' => '',
            'date' => $date,
            'cus_mod' => $date,
            'birthday'=>'',
            'sex'=>''
        );

        $check = $this->getAcountTable()->checkacount($email);
        if ($check) {
            $objct = new Customer();
            $objct->exchangeArray($data);
            $this->getAcountTable()->addacount($objct);
//                $user_new=  $this->getAcountTable()->get_acount_new();
//                $session_user = new Container('userlogin');
//                $session_user->username = $name;
//                $session_user->idus = $user_new['ID'];
            // $this->redirect()->toUrl(WEB_PATH );
            die;
        } else {
            $error = 'Tento e-mail již v systému existuje';
            echo $error;
            die;
        }
    }

    public function forgetpassAction() {
        $email = addslashes(trim($this->params()->fromPost('email')));
        $check = $this->getAcountTable()->checkacount($email);
        if ($check) {
            echo 'Tento e-mail není registrován';
            die;
        } else {
            $Uty = new Utility();
            $pass=$Uty->rand_string(8);
            $endpass = substr(base64_encode(md5($pass)), 0, -1);
            $data=array(
                'password'=>$endpass,
            );
            $obj=new Customer();
            $obj->exchangeArray($data);
            $this->getAcountTable()->updatepass($email, $obj);
            $message = array();
            $message[] = "";
            $message[] = "------ Zapomenuté hesloz Rohlik.tk -------";
            $message[] = "Mật khảu hiện tại của bạn là :".$pass;
            $message[] = "";
            $message[] = "Hãy đăng nhập và thay đổi mật khẩu.";
            $message[] = "";            
            $message[] = "---------------------------------";

            $textPart = new \Zend\Mime\Part(implode("\r\n", $message));
            $textPart->type = "text/plain";
            $body = new \Zend\Mime\Message();
            $body->setParts(array($textPart));
            $sendmail = new Message();
            $sendmail->setTo($email);
            $sendmail->setFrom("sales@apotraviny.cz");
            $sendmail->setEncoding("UTF-8");
            $sendmail->setSubject("Thông tin tài khoản quản Shop.");
            $sendmail->setBody($body);
            $transport = new SmtpTransport();
             $option = new SmtpOptions(array(
                 'name' => 'localhost',
                'host' => '212.129.40.198',
                'connection_class' => 'login',
                'connection_config' => array(
                    'ssl' => 'tls',
                    'username' => 'sales@apotraviny.cz',
                    'password' => '+1*KR!y@-mn}'
                ),
                'port' => 25,
            ));
            $transport->setOptions($option);
            $transport->send($sendmail);
            echo '';
            die;
        }
    }

    //--------------------------------------

    public function addressAction(){
          $session_user = new Container('userlogin');            
           $id_us=$session_user->idus;
        $address=  $this->params()->fromPost('address');
       $data=array(
                'address'=>$address,
            );
            $obj=new Customer();
            $obj->exchangeArray($data);
            $this->getAcountTable()->add_address($id_us, $obj);
            echo 'Vaše adresa byla úspěšně aktualizována';
            die;
    }

     public function logoutAction() {       
        $session_user = new Container('userlogin');
        $session_user->offsetUnset('username');
        $session_user->offsetUnset('idus');       
        $this->redirect()->toUrl(WEBPATH.'/apotraviny/index');
    }

    // EMAIL ĐĂNG KÝ NHẬN TIN ------------------------------------------------------------------
    public function listemailAction(){
         $getuser = $this->forward()->dispatch('Admin\Controller\Index', array('action' => 'getuser'));
        if (!$getuser) {
            // not yet login
            $this->redirect()->toRoute('home');
        }
        $this->layout()->getuser = $getuser;
        $this->layout('layout/apotravinyadmin');

        $select = new Select();
        $page = $this->params()->fromRoute('page') ? (int) $this->params()->fromRoute('page') : 1;
        $email = $this->getEmailTable()->listemail();
        $itemsPerPage = 10;
        $email->current();
        $paginator = new Paginator(new paginatorIterator($email));
        $paginator->setCurrentPageNumber($page)
                ->setItemCountPerPage($itemsPerPage)
                ->setPageRange(5);

        return new ViewModel(array(
            'page' => $page,
            'paginator' => $paginator,
        ));
    }
    public function sendmailAction(){
         $getuser = $this->forward()->dispatch('Admin\Controller\Index', array('action' => 'getuser'));
        if (!$getuser) {
            // not yet login
            $this->redirect()->toRoute('home');
        }
        $this->layout()->getuser = $getuser;
        $this->layout('layout/apotravinyadmin');
        $id=  $this->params()->fromRoute('id');
        $data_email=  $this->getEmailTable()->emaildetail($id);
       // print_r($data_email);
        if($this->request->isPost()){
            $title= addslashes(trim($this->params()->fromPost('title')));
            $content= addslashes(trim($this->params()->fromPost('content')));
           
        // Gửi thong tin hóa đơn đên Mail khách hàng
            $date = date('Y-m-d H:i:s');
            $message = new Message();
            $message->addTo($data_email['email'])
                    ->addFrom('xuandac990@gmail.com')
                    ->setSubject($title);

// Setup SMTP transport using LOGIN authentication
            $transport = new SmtpTransport();
            $options = new SmtpOptions(array(
                'host' => '212.129.40.198',
                'connection_class' => 'login',
                'connection_config' => array(
                    'ssl' => 'tls',
                    'username' => 'sales@apotraviny.cz',
                    'password' => '+1*KR!y@-mn}'
                ),
                'port' => 25,
            ));            
//           $options = new SmtpOptions(array(
//                'host' => 'smtp.gmail.com',
//                'connection_class' => 'login',
//                'connection_config' => array(
//                    'ssl' => 'tls',
//                    'username' => 'xuandac990@gmail.com',
//                    'password' => 'nzehggwfhbctqxio'
//                ),
//                'port' => 587,
//            ));
            $content_mail = stripslashes($content).
                    '<a style="display:block; line-height:45px; text-align:center; background:#8BBE33; color:#fff;text-transform: uppercase; font-size:14px; font-weight:bold; margin-top:10px; text-decoration:none;" '
                    . 'href="'.WEBPATH.'/customer/pubemail?code='.$data_email['code'].'">Từ chối nhận thư </a>';
            $html = new MimePart($content_mail);
            $html->type = "text/html";

            $body = new MimeMessage();
            $body->addPart($html);

            $message->setBody($body);

            $transport->setOptions($options);
            $transport->send($message);
            return array('data_email'=>$data_email);
        }
        return array('data_email'=>$data_email);
    }
    public function sendallAction(){
           $getuser = $this->forward()->dispatch('Admin\Controller\Index', array('action' => 'getuser'));
        if (!$getuser) {
            // not yet login
            $this->redirect()->toRoute('home');
        }
        $this->layout()->getuser = $getuser;
        $this->layout('layout/apotravinyadmin');
         $list_email = $this->getEmailTable()->list_sendall();
         
         if($this->request->isPost()){
             $title= addslashes(trim($this->params()->fromPost('title')));
            $content= addslashes(trim($this->params()->fromPost('content')));
            
            
         foreach ($list_email as $key=>$value){
             $email = $value['email'];
             $message = new Message();
            $message->addTo($email)
                    ->addFrom('xuandac990@gmail.com')
                    ->setSubject($title);

// Setup SMTP transport using LOGIN authentication
            $transport = new SmtpTransport();
            $options = new SmtpOptions(array(
                'host' => '212.129.40.198',
                'connection_class' => 'login',
                'connection_config' => array(
                    'ssl' => 'tls',
                    'username' => 'sales@apotraviny.cz',
                    'password' => '+1*KR!y@-mn}'
                ),
                'port' => 25,
            ));   
//           $options = new SmtpOptions(array(
//                'host' => 'smtp.gmail.com',
//                'connection_class' => 'login',
//                'connection_config' => array(
//                    'ssl' => 'tls',
//                    'username' => 'xuandac990@gmail.com',
//                    'password' => 'nzehggwfhbctqxio'
//                ),
//                'port' => 587,
//            ));
            $content_mail = stripslashes($content).
                    '<a style="display:block; line-height:45px; text-align:center; background:#8BBE33; color:#fff;text-transform: uppercase; font-size:14px; font-weight:bold; margin-top:10px; text-decoration:none;" '
                    . 'href="'.WEBPATH.'/customer/pubemail?code='.$value['code'].'">Từ chối nhận thư </a>';
            $html = new MimePart($content_mail);
            $html->type = "text/html";

            $body = new MimeMessage();
            $body->addPart($html);

            $message->setBody($body);

            $transport->setOptions($options);
            $transport->send($message);
         }
         }
    }

    public function registeremailAction(){
        $email = addslashes(trim($this->params()->fromPost('email')));
        $code = $this->rand_string(100);       
        $check = $this->getEmailTable()->checkemail($email);
        if($check){
            $data=array(
              'code'=>$code,
              'email'=>$email 
            );
            $obj = new Email();
            $obj->exchangeArray($data);
            $this->getEmailTable()->addemail($obj);
            echo 'sucess';
            die;
        }  else {
            echo 'error';
            die;
        }
    }
    public function pubemailAction(){
        $this->layout ( 'layout/lazadatheme' );
        $code= $_GET['code'];
        $this->getEmailTable()->delete_email($code);       
    }
     public function deleteemailAction() {
        $id = $this->params()->fromRoute('id');
        $this->getEmailTable()->del_mail($id);
        $this->redirect()->toUrl(WEBPATH.'/customer/listemail ');
    }
    private function rand_string($length) {
        $chars = "aAbBcCdDeEfFgGhHiIjJkKlLmMnNoOpPqQrRsStTuUvVwWxXyYzZ!@$%-=0123456789";
        $size = strlen($chars);
        for ($i = 0; $i < $length; $i++) {
            @$str .= $chars[rand(0, $size - 1)];
        }
        return $str;
    }
    
}

?>