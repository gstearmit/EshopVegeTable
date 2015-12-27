<?php

namespace Customer\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Session\Container;
use Customer\Model\Customer;
use Manufacture\Model\Utility;
use Zend\Mail\Message;
use Zend\Mail\Transport\Smtp as SmtpTransport;
use Zend\Mail\Transport\SmtpOptions;
use Zend\Db\Sql\Select;
use Zend\Paginator\Paginator;
use Zend\Paginator\Adapter\Iterator as paginatorIterator;

class CustomerlazadaController extends AbstractActionController {

    protected $Acount;

    public function getAcountTable() {
        if (!$this->Acount) {
            $pst = $this->getServiceLocator();
            $this->Acount = $pst->get('Customer\Model\CustomerTable');
        }
        return $this->Acount;
    }
     public function getCatalogAdtTable() {
        if (!$this->Catalog_Adt) {
            $sm = $this->getServiceLocator();
            $this->Catalog_Adt = $sm->get('Apotravinycz\Model\CatalogTable');
        }
        return $this->Catalog_Adt;
    }
    

    public function loginAction() {
         $this->layout('layout/lazadatheme');
        $email = addslashes(trim($this->params()->fromPost('email')));
        $password = addslashes(trim($this->params()->fromPost('password')));
         $url = addslashes(trim($this->params()->fromPost('url')));
        $endpass = substr(base64_encode(md5($password)), 0, -1);
        $checklogin = $this->getAcountTable()->checklogin($email, $endpass);
        if ($checklogin) {
            $this->redirect()->toUrl($url);
        } else {
            echo '<script> alert("Email hoặc mật khẩu không đúng"); window.history.go(-1);</script>';
        }
    }

    public function registerAction() {
        $this->layout('layout/lazadatheme');
        $fullname = addslashes(trim($this->params()->fromPost('fullname')));
        $email = addslashes(trim($this->params()->fromPost('email')));
        //$phone = addslashes(trim($this->params()->fromPost('phone')));
        $password = addslashes(trim($this->params()->fromPost('password')));
        $year = addslashes(trim($this->params()->fromPost('year')));
        $month = addslashes(trim($this->params()->fromPost('month')));
        $dates = addslashes(trim($this->params()->fromPost('date')));
        $sex = addslashes(trim($this->params()->fromPost('sex')));
        $birthday=$dates.'-'.$month.'-'.$year;
        $date = date('Y-m-d');
        $endpass = substr(base64_encode(md5($password)), 0, -1);
        $data = array(
            'fullname' => $fullname,
            'email' => $email,
            'phone' => '',
            'password' => $endpass,
            'company' => '',
            'address' => '',
            'city' => '',
            'yahoo' => '',
            'skype' => '',
            'facebook' => '',
            'date' => $date,
            'cus_mod' => $date,
             'birthday'=>$birthday,
            'sex'=>$sex
        );
        //print_r($data);die;
        $check = $this->getAcountTable()->checkacount($email);
        if ($check) {
            $objct = new Customer();
            $objct->exchangeArray($data);
            $this->getAcountTable()->addacount($objct);
            echo '<script> alert("Đăng ký tài khoản thành công"); window.history.go(-1);</script>';
                $user_new=  $this->getAcountTable()->get_acount_new();
                $session_user = new Container('userlogin');
                $session_user->username = $email;
                $session_user->idus = $user_new['id'];
                 $session_user->fullname = $user_new['fullname'];
                 $session_user->address = $user_new['address'];
                  $session_user->phone = $user_new['phone'];
             //$this->redirect()->toUrl(WEBPATH.'/lazada/index' );
            
        } else {
           echo '<script> alert("Email này đã tồn tại không thể đăng ký"); window.history.go(-1);</script>';
            //$this->redirect()->toUrl(WEBPATH.'/lazada/index' );
        }
    }

    public function forgotpassAction() {
        $this->layout ( 'layout/lazadatheme' );
            $this->productcart();
            if($this->request->isPost()){
        $email = addslashes(trim($this->params()->fromPost('email')));
        $check = $this->getAcountTable()->checkacount($email);
        if ($check) {
            $error='<div class="alert alert-warning" role="alert">Email này không tồn tại</div>';
            return array('error'=>$error);
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
            $message[] = "------ Yêu Cầu Thay Đổi Mật Khẩu -------";
            $message[] = "Mật khảu hiện tại của bạn là : ".$pass;
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
            $sendmail->setSubject("Yêu Cầu Thay Đổi Mật Khẩu.");
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
            $error='<div class="alert alert-success" role="alert">Một mật khẩu mới đã được gửi đén Email của bạn.</div>';
            return array('error'=>$error);
        }
            }
    }

    public function manageacountAction(){
         $this->layout ( 'layout/lazadatheme' );
         $this->productcart();
         //--------------
        $data_m = $this->getCatalogAdtTable()->listcatalog();
        $sub_menu = array();
        foreach ($data_m as $key => $value) {
            $parent_id = $value['id'];
            $sub_menu[$parent_id] = $this->getCatalogAdtTable()->submenu($parent_id);
        }
        //------------
         return array(                
                'data_m'=>$data_m,
                'sub_menu'=>$sub_menu
                );
    }
    public function changepasswordAction(){
        $this->layout ( 'layout/lazadatheme' );
         $this->productcart();
          //--------------
        $data_m = $this->getCatalogAdtTable()->listcatalog();
        $sub_menu = array();
        foreach ($data_m as $key => $value) {
            $parent_id = $value['id'];
            $sub_menu[$parent_id] = $this->getCatalogAdtTable()->submenu($parent_id);
        }
        //------------
         
         if($this->request->isPost()){
        $email = addslashes(trim($this->params()->fromPost('email')));
        $pass = addslashes(trim($this->params()->fromPost('password')));
        $check = $this->getAcountTable()->checkacount($email);
        if ($check) {
            $error='<div class="alert alert-warning" role="alert">Email này không tồn tại</div>';
            return array(
                'data_m'=>$data_m,
                'sub_menu'=>$sub_menu,
                'error'=>$error);
        } else {           
            $endpass = substr(base64_encode(md5($pass)), 0, -1);
            $data=array(
                'password'=>$endpass,
            );
            $obj=new Customer();
            $obj->exchangeArray($data);
            $this->getAcountTable()->updatepass($email, $obj);
            $error='<div class="alert alert-success" role="alert">Thay đổi Mật khẩu thành công</div>';
            return array(
                'data_m'=>$data_m,
                'sub_menu'=>$sub_menu,
                'error'=>$error);
         }
         }
          return array(
                'data_m'=>$data_m,
                'sub_menu'=>$sub_menu,);                
        
    }
     public function changeemailAction(){
        $this->layout ( 'layout/lazadatheme' );
         $this->productcart();
           //--------------
        $data_m = $this->getCatalogAdtTable()->listcatalog();
        $sub_menu = array();
        foreach ($data_m as $key => $value) {
            $parent_id = $value['id'];
            $sub_menu[$parent_id] = $this->getCatalogAdtTable()->submenu($parent_id);
        }
        //------------
          $session_user = new Container('userlogin');               
           $idus=$session_user->idus;
         if($this->request->isPost()){
        $email = addslashes(trim($this->params()->fromPost('email')));
        
        $check = $this->getAcountTable()->checkacount($email);
        if ($check) {
            $data=array(
                'email'=>$email,
            );
            $obj=new Customer();
            $obj->exchangeArray($data);
            $this->getAcountTable()->update_email($idus, $obj);
             $session_user = new Container('userlogin');
             $session_user->username = $email;
            $error='<div class="alert alert-success" role="alert">Thay đổi Email thành công</div>';
            return array(
                'data_m'=>$data_m,
                'sub_menu'=>$sub_menu,
                'error'=>$error);            
        } else {   
            
            $error='<div class="alert alert-warning" role="alert">Email đã không tồn tại</div>';
            return array(
                'data_m'=>$data_m,
                'sub_menu'=>$sub_menu,
                'error'=>$error);
         }
         }
          return array(
                'data_m'=>$data_m,
                'sub_menu'=>$sub_menu,
               );
    }

    public function logoutAction() {       
        $session_user = new Container('userlogin');
        $session_user->offsetUnset('username');
        $session_user->offsetUnset('idus');       
        $this->redirect()->toUrl(WEBPATH.'/lazada/index');
    }
    public function productcart(){
             $product_cat = $this->forward ()->dispatch ( 'Shoppingcart\Controller\Lazadashopping', array (
				'action' => 'viewcart' 
		) );
        $this->layout()->setVariable('product_cat', $product_cat);
        }
}

?>