<?php

namespace Apotravinycz\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Apotravinycz\Form\ApotravinyczFilter;
use Apotravinycz\Form\ApotravinyczForm;
use Apotravinycz\Model\Apotravinycz;
use Apotravinycz\Model\ApotravinyczTable;
use Apotravinycz\Model\Payoutype;
use Apotravinycz\Model\PayoutypeTable;
use Zend\Paginator\Paginator,
    Zend\Paginator\Adapter\Null as PageNull;
use Zend\Session\Container;
use Zend\Session\SessionManager;
use Main\Model\Utility;
// catalogue
use Catalog\Model\Catalog;
use Catalog\Model\CatalogTable;
// Tags
use Tags\Module\Tags;
use Tags\Module\TagsTable;
//Admin
use Admin\Model\Admin;
use Admin\Model\AdminTable;
// Mail
use Zend\Mail\Transport\Smtp as SmtpTransport;
use Zend\Mail\Transport\SmtpOptions;
use Zend\Mail\Message;
use Zend\Mail\Transport\Sendmail as SendmailTransport;
// setting
use Settings\Model\Settings;
use Settings\Model\SettingsTable;

class IndexController extends AbstractActionController {

    public $_fileName;
    protected $UserTable;
    protected $AdminTable;

    public function getUserTable() {
        if (!$this->UserTable) {
            $sm = $this->getServiceLocator();
            $this->UserTable = $sm->get('Users\Model\UserTable');
        }
        return $this->UserTable;
    }

    public function getAdminTable() {
        if (!$this->AdminTable) {
            $sm = $this->getServiceLocator();
            $this->AdminTable = $sm->get('Admin\Model\AdminTable');
        }
        return $this->AdminTable;
    }

    protected $Catalog_Adt;

    public function getCatalogAdtTable() {
        if (!$this->Catalog_Adt) {
            $sm = $this->getServiceLocator();
            $this->Catalog_Adt = $sm->get('Apotravinycz\Model\CatalogTable');
        }
        return $this->Catalog_Adt;
    }

    protected $Product_Adt;

    public function getProductAdtTable() {
        if (!$this->Product_Adt) {
            $sm = $this->getServiceLocator();
            $this->Product_Adt = $sm->get('Apotravinycz\Model\ApotravinyczproductTable');
        }
        return $this->Product_Adt;
    }

    protected $Favorite;

    private function getFavoriteTable() {
        if (!$this->Favorite) {
            $pst = $this->getServiceLocator();
            $this->Favorite = $pst->get("Fronts\Model\FavoriteTable");
        }
        return $this->Favorite;
    }

    public function viewAction() {
        $view = new ViewModel ();
// check xem sessoin uenc khoa do da duoc tao chua
// neu chua khoi tao
// neu roi add them 1 phan tu vao sesion voi id va uenc da duoc tao
        $this->layout('layout/bags');

        $getuser = $this->forward()->dispatch('Admin\Controller\Index', array(
            'action' => 'getuser'
        ));
// var_dump($getuser);
        $this->layout()->getuser = $getuser;

        $id = (int) $this->params()->fromRoute('id');
        $uenc = $this->params()->fromRoute('uenc');
        if ($id != 0) {
            $product_all = $this->getServiceLocator()->get('ApotravinyczTable')->get($id);
        } else
            die("Error , Apotravinycz !!!");
        $view->setVariable('id', $id);
        $view->setVariable('uenc', $uenc);
        $view->setVariable('product', $product_all);

        return $view;
    }

    public function loginmasterAction() {

        $session_user = new Container('user');

        $user = $session_user->offsetExists('username');
        $avatar = $session_user->offsetExists('avatar');
//         var_dump($user);
//         var_dump($avatar);

        $this->layout('layout/apoadminlogin');
        if ($this->getRequest()->isPost()) {

            $data = $this->getRequest()->getPost()->toArray();

            $admin = new Admin();
            $admin->exchangeArray($data);

            $k = $this->getAdminTable()->loginemailpass($admin);


            if ($k == 1 || $k == 2) {
                $this->layout()->ErrorCode = $k;
            }
            if ($k == 0) {
// login success 
                $this->redirect()->toRoute('Adminmaterialize', array('action' => 'dashboard'));
            }
        }
    }

    public function pageregisterAction() {
        $this->layout('layout/apoadminlogin');
        if ($this->request->isPost()) {
            $username = addslashes(trim($this->params()->fromPost('username')));
            $email = addslashes(trim($this->params()->fromPost('email')));
            $password = addslashes(trim($this->params()->fromPost('password')));
            $check_user = $this->getAdminTable()->checkuser($username);
            $check_email = $this->getAdminTable()->checkemail($email);
            if ($check_user) {
                $alert = 'This account already exists';
                return array('alert' => $alert);
            } else if ($check_email) {
                $alert = 'This Email already exists';
                return array('alert' => $alert);
            } else {
                $data_user = array(
                    'username' => $username,
                    'password' => $password,
                    'email' => $email
                );
                $admin_model = new Admin();
                $admin_model->exchangeArray($data_user);
                $this->getAdminTable()->register($admin_model);
                $alert = 'Account Registration success';
                return array('alert' => $alert);
            }
        }
    }

    public function forgotpasswordmasterAction() {
        $this->layout('layout/apoadminlogin');
        $request = $this->getRequest();
        if ($request->isPost()) {
            $this->layout()->check = true;

            $data = $this->getRequest()->getPost()->toArray();
            $email = $data['email'];
            $l = $this->getAdminTable()->getUserbyEmail($email);
            $k = $this->getAdminTable()->recoverpassmaster($data['email']);

            $this->layout()->email = $data['email'];
            if ($k) {
                $message = new Message();
                $message->addTo($data['email'])
                        ->addFrom('support@adslink.eu')
                        ->setSubject('Recover Password ')
                        ->setBody("Your account:
                            usename: " . $l->username . "
                            password: " . $k);

// Setup SMTP transport using LOGIN authentication

                $transport = new SmtpTransport();
                $options = new SmtpOptions(array(
                    'name' => 'localhost',
                    'host' => '124.158.4.94',
                    'connection_class' => 'login',
                    'connection_config' => array(
                        'username' => 'support@adslink.eu',
                        'password' => 'N$9^Wq,?N*xf',
                    ),
                ));
                $transport->setOptions($options);
                echo "hoang phuc chua gui duoc email ";
                die;
                $check_send = $transport->send($message);
                var_dump($check_send);
                echo "sasassas ";
                die();
                $this->layout()->err = false;
            } else {
                $this->layout()->err = true;
            }
        } else {
            $this->layout()->check = false;
        }
    }

    public function indexAction() {
        $this->layout('layout/apotravinytheme');

//get Infor Setting
        $setting = $this->getServiceLocator()->get('SettingsTable')->fetchAll();
        $this->layout()->setting = $setting;

        foreach ($setting as $key => $set) {
            $name = $set->name;
            $logo1 = $set->logo1;
            $ico = $set->ico;
            $seo_description = $set->seo_description;
            $seo_keywords = $set->seo_keywords;
            $phone = $set->phone;
            $email = $set->email;
            $facebook = $set->facebook;
            $tweets = $set->tweets;
            $printerest = $set->printerest;
            $youtube_acount = $set->youtube_acount;
            $google = $set->google;
            $address = $set->address;
        }

        $setting_session = new Container('setting');
        if ($setting_session->setting == false) {
            $setting_session->setting = true;
            $setting_session->name = $name;
            $setting_session->logo1 = $logo1;
            $setting_session->ico = $ico;
            $setting_session->seo_description = $seo_description;
            $setting_session->seo_keywords = $seo_keywords;
            $setting_session->phone = $phone;
            $setting_session->email = $email;
            $setting_session->facebook = $facebook;
            $setting_session->tweets = $tweets;
            $setting_session->printerest = $printerest;
            $setting_session->youtube_acount = $youtube_acount;
            $setting_session->google = $google;
            $setting_session->address = $address;
        }


//getcatalog
        $this->getcatalog();
        $list_product = $this->getProductAdtTable()->listall_product();
        $session_product = new Container('product');
        $session_product->product_search = $list_product;
        $product_hot = $this->getProductAdtTable()->producthot();
        foreach ($product_hot as $key => $value) {
            $id_product = $value['id'];
            $product_wisht[$id_product] = $this->getFavoriteTable()->get_wish_detail($id_product);
        }
        return array(
            'product_hot' => $product_hot,
            'product_wisht' => $product_wisht,
        );
    }

    public function viewproductcatAction() {
        $this->layout('layout/apotravinytheme');
        $this->getcatalog();
        $order = $_GET['order-by'];
        $get_order = str_replace('-', ' ', $order);
        if ($order == null) {
            $order_by = 'id DESC';
        } else {
            $order_by = $get_order;
        }
        $id_cat = $this->params()->fromRoute('id');
        $data_cat = $this->getCatalogAdtTable()->catalogdetail($id_cat);
        $cat_left = $this->getCatalogAdtTable()->listcatalog();
        return array(
            'data_cat' => $data_cat,
            'cat_left' => $cat_left,
            'order' => $order,
        );
    }

    public function loadproductAction() {
        $session_user = new Container('userlogin');
        $user_name = $session_user->username;
        $id_Us = $session_user->idus;
        $id_cat = $this->params()->fromPost('idcat');
        $limit = $this->params()->fromPost('number');
        $offset = $this->params()->fromPost('offset');
        $order = $this->params()->fromPost('order');
        $order_by = str_replace('-', ' ', $order);
        $product_cat = $this->getProductAdtTable()->loadproduct($id_cat, $order_by, $limit, $offset);

        foreach ($product_cat as $key => $value) {
            $id_product = $value['id'];
            $product_wisht[$id_product] = $this->getFavoriteTable()->get_wish_detail($id_product);
            if ($id_Us == $product_wisht[$id_product]['customer_ID'] && $id_product == $product_wisht[$id_product]['product_ID']) {
                $wishlist = '<span onclick="deleitemswish('.$id_product.','.$id_cat.')"><i class="fa fa-red fa-heart"></i></span>';
            } else {
                if ($user_name == null) {                  
                     $wishlist ='<span class="wishlist" ><i class="fa fa-heart"></i></span>';
                } else {                   
                    $wishlist ='<span onclick="addwishlist(' . $value['id'] . ')" ><i class="fa fa-heart"></i></span>';
                }
            }
            if ($value['sale_products'] == 1) {
                $sales = '<div class="oldprice"> -' . $value['promotions'] . ' %</div>';
                $price = $value['price'] - ($value['price'] * $value['promotions'] / 100);
                $price_sales = '<strong>' . $price . '&nbsp;Kč</strong>
                             <del>' . $value['price'] . '&nbsp;Kč</del>';
            } else {
                $sales = '';
                $price_sales = '<strong>' . $value['price'] . '&nbsp;Kč</strong>';
            }
            echo '<div class="col-md-3 col-sm-3 col-xs-12 col-box">
                                    <div class="imgslider">
                                          '.$wishlist.'
                                         ' . $sales . '
                                        <img onclick="productdetail(' . $value['id'] . ')" src="' . WEBPATH_UPLOAD_PATH_IMG_THUNB_ . $value['img'] . '" class="img-responsive" alt="" onerror=this.src="' . ROHLIK_APOTRAVINY . '/img/no-product.png" />
                                       <!-- <p class="">Datum spotřeby 2.6.2015</p>-->

                                    </div>
                                    <div class="mota">
                                        <p class="detailclick" onclick="productdetail(' . $value['id'] . ')">
                                            <a href="#">' . $value['name'] . ' </a>
                                            <input type="hidden" value="' . $value['id'] . '" id="id_pro' . $value['id'] . '"/>
                                        </p>
                                        <p>' . $price_sales . '</p>                                        
                                        <p class="adddetail">
                                        <form action="' . WEBPATH . '/shoppingcart/addcart" method="post">
                                            <input type="hidden" name="number-product" value="' . $value['availability'] . '" />
                                            <i class="fa fa-minus-circle" onclick="minuscart(' . $value['id'] . ')"></i>
                                            <input style="width:25px;" type="text" name="qty" value="1" id="qty' . $value['id'] . '" class="">
                                             <input type="hidden" name="id-product"  value="' . $value['id'] . '" class="">    
                                            <i class="fa fa-plus-circle" onclick="pluscart(' . $value['id'] . ')"></i>
                                            <button class="btn btn-success">Do košíku </button>
                                        </form>    
                                        </p>
                                        <!--<span>(' . $value['price'] . ' &nbsp;Kč/kg)</span></p>-->

                                    </div>

                                </div>';
        }
        die;
    }

    public function productdetailAction() {
        $id = $this->params()->fromPost('id');
        $product_detail = $this->getProductAdtTable()->product_detail($id);
        $product_same = $this->getProductAdtTable()->product_same($product_detail['cat_id']);

        echo
        '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	 <div class="row ">
         <div class="col-md-6 col-xs-12 col-sm-6">
	 <img src="' . WEBPATH_UPLOAD_PATH_IMG_THUNB_ . $product_detail['img'] . '" class="img-responsive img-detail" alt="" onerror=this.src="' . ROHLIK_APOTRAVINY . '/img/no-product.png"/>	 
	 </div>
	 <div class="col-md-6 col-xs-12 col-sm-6 mixa">
	 <h1>' . $product_detail['name'] . ' </h1>
	 <h3>
		<b>' . $product_detail['price'] . '&nbsp;Kč</b>
                <!--<span> / </span>
		<i>476&nbsp;Kč/l</i>-->
	</h3>
        <form action="' . WEBPATH . '/shoppingcart/addcart" method="post">
	<p> <a href="#" id="minus-cart"> <i class="fa fa-minus"></i></a> 
	<input name="qty" value="1" id="qty-cart" type="text"/> 
        <input type="hidden" name="number-product" value="' . $product_detail['availability'] . '" />
         <input type="hidden" name="id-product"  value="' . $product_detail['id'] . '" class=""> 
	<a href="#" id="plus-cart"> <i class="fa fa-plus"></i> </a>
	<button class="btn btn-success"> Přidat do košíku</button>	
	</p>
        </form>
	<ul>
	<li class="country">Země původu:<strong>Francie</strong>								
	</li>
	<li class="code">Kód zboží: <strong>1291603</strong></li>
	</ul>	 
	 </div>         
            </div>
            <div class="modanmap">
	<div class="row">
	<div class="col-md-12 col-xs-12 col-sm-12">
		<div role="tabpanel">
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Popis a složení</a></li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Podobné produkty</a></li>
    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Další produkty značky</a></li>
   
  </ul>
  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
		' . $product_detail['descripts'] . '
		</div>	
	</div>
        </div>
    <div role="tabpanel" class="tab-pane" id="profile">
	<div class="row">';
        foreach ($product_same as $key => $value) {
            echo '<div class="col-md-3 col-xs-6 col-sm-3">
		<div class="imgslider">
				<span><i class="fa fa-heart"></i></span>
				<!--<div class="oldprice"> -33 %</div>-->
				<img src="' . WEBPATH_UPLOAD_PATH_IMG_THUNB_ . $value['img'] . ' " class="img-responsive" alt="" onerror=this.src="' . ROHLIK_APOTRAVINY . '/img/no-product.png" />
				<p class="detailclick">
				<a href="#">' . $value['name'] . ' </a></p>
				<p><!--	<strong>98&nbsp;Kč</strong>
				<del>17&nbsp;Kč</del>-->
				<!--<span>(515.78&nbsp;Kč/kg)</span></p>-->
                                <p class="adddetail">
                                        <form action="' . WEBPATH . '/shoppingcart/addcart" method="post">
                                            <input type="hidden" name="number-product" value="' . $value['availability'] . '" />
                                            <i class="fa fa-minus-circle" onclick="minuscart(' . $value['id'] . ')"></i>
                                            <input style="width:25px;" type="text" name="qty" value="1" id="qty' . $value['id'] . '" class="">
                                             <input type="hidden" name="id-product"  value="' . $value['id'] . '" class="">    
                                            <i class="fa fa-plus-circle" onclick="pluscart(' . $value['id'] . ')"></i>
                                            <button class="btn btn-success">Do košíku </button>
                                        </form>    
                                        </p>
				</div>		
		</div>';
        }


        echo '</div>	
	</div>

	
    <div role="tabpanel" class="tab-pane" id="messages">
		<div class="row">	
		
		</div>
	
	</div>
		
	</div>   
  </div>	
	
	</div>
	</div>
	
	</div>
      </div>';
        die;
    }

    public function productorangeAction() {
//$this->layout('layout/apotravinytheme');
//$this->getcatalog();
        echo '0000000000';
        die;
        $id_cat = 46;
        $oder = 'price ASC';
        $data = $this->getProductAdtTable()->product_priceAsc($id_cat, $oder);
        print_r($data);
    }

    public function searchAction() {
        $this->layout('layout/apotravinytheme');
        $this->getcatalog();
        $_key = addslashes(trim($this->params()->fromPost('key')));

        $key = @str_replace(',', '', $_key);
        $cat_left = $this->getCatalogAdtTable()->listcatalog();
        if ($key != null) {
            $data_search = $this->getProductAdtTable()->search($key);
            return array('data_search' => $data_search, 'cat_left' => $cat_left,);
        }
        return array('cat_left' => $cat_left,);
    }

    public function loginAction() {
        $this->layout('layout/apotravinytheme');
        $this->getcatalog();
    }

    private function getcatalog() {
        $data = $this->getCatalogAdtTable()->listcatalog();
        $sub_menu = array();
        foreach ($data as $key => $value) {
            $parent_id = $value['id'];
            $sub_menu[$parent_id] = $this->getCatalogAdtTable()->submenu($parent_id);
        }
        $this->layout()->setVariable('menu', $data);
        $this->layout()->setVariable('submenu', $sub_menu);
    }

    public function addalbumAction() {
        $getuser = $this->forward()->dispatch('Admin\Controller\Index', array(
            'action' => 'getuser'
        ));
        $this->layout()->getuser = $getuser;
//not login
        if (!$getuser) {
            $this->redirect()->toUrl(WEBPATH);
        }

        $this->layout('layout/albumdrag');

        $dataPayout = $this->getServiceLocator()->get('PayoutypeTable')->gettype();

        $utility = new Utility ();
        $product = new Apotravinycz ();
        $view = new ViewModel ();

        $dbAdapter = $this->getServiceLocator()->get('Zend\Db\Adapter\Adapter');
        $getuser = $this->forward()->dispatch('Admin\Controller\Index', array(
            'action' => 'getuser'
        ));
        $this->layout()->getuser = $getuser;
        if ($getuser && ($getuser->group == 'admin' || $getuser->group == 'supperadmin')) {

            $form = new ApotravinyczForm($dbAdapter);
//$form->setInputFilter ( new ApotravinyczFilter () );
            $catalogarr = $this->getdataAction();

            $form->setId($catalogarr);

// 			$tags = array ();
// 			$form->settagsId ( $tags );
// 			$manufacturer = array ();
// 			$form->setmanufacturerId ( $manufacturer );

            $request = $this->getRequest();
            if ($request->isPost()) {
//$form->setInputFilter ( $product->getInputFilter () ); // check validate
                $data = array_merge_recursive($request->getPost()->toArray(), $request->getFiles()->toArray());

                $form->setData($data);
// error rat nguy hiem o day ko vaidate form
                if (!$form->isValid()) {
                    if ($data ['img'] ['name'] != '') {

// edit anh
                        $_array_img = $data ['img'];
// Recyle Bin img older
                        $id = $data ['id'];
                        $getcata = $this->getServiceLocator()->get('ApotravinyczTable')->get($id);
                        if ($getcata) {
                            $get_img_older = $getcata->img;
                            $_dir = UPLOAD_PATH_IMG;
                            if ($get_img_older) {
                                $utility->deleteImage($get_img_older, $_dir);
                            }
                        }

// upload and rename
                        $renname_file_img = $utility->uploadImageAlatca($_array_img);
                        if (!$renname_file_img) {
                            $view->check = 0;
                            return $view;
                        }
                        $product = new Apotravinycz ();
                        $product->dataArraySwap($data, $renname_file_img);
                        $check = $this->getServiceLocator()->get('ApotravinyczTable')->save($product);
                        if ($check != 0) {

                            $_url = WEBPATH . '/product/index/index';
                            $this->redirect()->toUrl($_url);
                        } else {
                            $view->check = 0;
                            ;
                            return $view;
                        }
                    } else {

                        $id = $data ['id'];
                        $getcata = $this->getServiceLocator()->get('ApotravinyczTable')->get($id);
                        if ($getcata) {
                            $get_img_older = $getcata->img;
                        }
                        $product = new Apotravinycz ();
                        $product->dataArraySwap($form->getData(), $get_img_older);
                        $check = $this->getServiceLocator()->get('ApotravinyczTable')->save($product);
                        $_url = WEBPATH . '/product/index/add/' . $id;
                        if ($check == 0) {
// notupdate
                            $_url = WEBPATH . '/product/index/index';
                            $this->redirect()->toUrl($_url);
                        }
                        if ($check != 0) {
                            $_url = WEBPATH . '/product/index/index';
                            $this->redirect()->toRoute('Apotravinycz', array(
                                'controller' => 'index',
                                'action' => 'add',
                                'id' => $check
                            ));
                        }
                    }
                } else {
                    echo "not valid form";
                }
            }
            $form->setId($catalogarr);
            $product_id = (int) $this->params()->fromRoute('id', 0);
            $catalog_cr = $this->getServiceLocator()->get('ApotravinyczTable')->get($product_id);

            if ($product_id == 0) {
                $form->get('submit')->setAttribute('value', 'Add Apotravinycz');
            } else {
                $form->get('submit')->setAttribute('value', 'Edit Apotravinycz');
                $view->setVariable('error', 1);
            }
            if ($catalog_cr and $product_id != 0) {
                $form->bind($catalog_cr);
                $_img_thumb = $catalog_cr->img;
                $_img_thumb1 = $catalog_cr->img1;
                $_img_thumb2 = $catalog_cr->img2;
                $_img_thumb3 = $catalog_cr->img3;
                $_img_thumb4 = $catalog_cr->img4;
                $_img_thumb5 = $catalog_cr->img5;
                $_img_thumb6 = $catalog_cr->img6;
                $_img_thumb7 = $catalog_cr->img7;
                $_img_thumb8 = $catalog_cr->img8;
                $_img_thumb9 = $catalog_cr->img9;
                $_img_thumb10 = $catalog_cr->img10;
            }

            $view->setVariable('img_thumb', $_img_thumb);
            $view->setVariable('img_thumb1', $_img_thumb1);
            $view->setVariable('img_thumb2', $_img_thumb2);
            $view->setVariable('img_thumb3', $_img_thumb3);
            $view->setVariable('img_thumb4', $_img_thumb4);
            $view->setVariable('img_thumb5', $_img_thumb5);
            $view->setVariable('img_thumb6', $_img_thumb6);
            $view->setVariable('img_thumb7', $_img_thumb7);
            $view->setVariable('img_thumb8', $_img_thumb8);
            $view->setVariable('img_thumb9', $_img_thumb9);
            $view->setVariable('img_thumb10', $_img_thumb10);
            $view->setVariable('Apotravinyczform', $form);
            $view->setVariable('id_product', $product_id);

            return $view;
        } else {
            $view->check = 2;
            $this->layout('error/admin');
        }
    }

    public function tmpdeimgAction() {
        $this->layout('layout/bags');
//don dep anh cu trong thu muc anh
        $session_Recycle_Bin_img_tmp = new Container('Recycle_Bin_img');
        if (!empty($session_Recycle_Bin_img_tmp->tmpBinImg)) {
            $_img_ALL = $session_Recycle_Bin_img_tmp->tmpBinImg;

//   $array_img = array();
            $array_img[0] = $_img_ALL->img0;
            $array_img[1] = $_img_ALL->img1;
            $array_img[2] = $_img_ALL->img2;
            $array_img[3] = $_img_ALL->img3;
            $array_img[4] = $_img_ALL->img4;
            $array_img[5] = $_img_ALL->img5;
            $array_img[6] = $_img_ALL->img6;
            $array_img[7] = $_img_ALL->img7;
            $array_img[8] = $_img_ALL->img8;
            $array_img[9] = $_img_ALL->img9;

            foreach ($array_img as $key => $_img_tmp) {
// 		   	echo $key."--------".$_img_tmp;
                $_dir = UPLOAD_PATH_IMG;
                $_dir_thum_ = UPLOAD_PATH_IMG_THUNB_;
                $im = $_img_tmp;
                $file_path = $_dir . '/' . $im;
                $file_path_thumb_ = $_dir_thum_ . '/' . $im;
//delte inages
                if ($im != '' and file_exists($file_path)) {
                    @unlink($file_path);
                }
//delete Thumb
                if ($im != '' and file_exists($file_path_thumb_)) {

                    @unlink($file_path_thumb_);
                }
            }
        }

        echo $dung = 10000;
        die;
    }

    public function ajaxsaveimgAction() {

        $getuser = $this->forward()->dispatch('Admin\Controller\Index', array(
            'action' => 'getuser'
        ));
        $this->layout()->getuser = $getuser;
//not login
        if (!$getuser) {
            $this->redirect()->toUrl(WEBPATH);
        }

        $this->layout('layout/dragdrop');
        $product_id = (int) $this->params()->fromPost('id', 0);
        if ($product_id == 0) {
            die("Error ! try agian!");
        }
        $img = (int) $this->params()->fromPost('img');
        $ret = array();
        if ($img == 1 and $product_id != 0) {
//update img
            $_Apotravinycz_all = $this->getServiceLocator()->get('ApotravinyczTable')->get($product_id);

            if ($_Apotravinycz_all->array_img != '' || $_Apotravinycz_all->array_img != null || $_Apotravinycz_all->array_img != NULL || $_Apotravinycz_all->array_img != (NULL)) {
                $array_img = @explode(',', $_Apotravinycz_all->array_img);
                for ($k = 0; $k <= count($array_img); $k++) {
// update img all
                    $check = $this->getServiceLocator()->get('ApotravinyczTable')->saveimg($array_img[$k], $k, $product_id);
                    $ret[$i][$array_img[$k]] = $check;
                }

                echo @json_encode($ret);
                die;
            } else {
//echo "Apotravinycz_all : ";echo "<pre>";print_r($_Apotravinycz_all);echo "</pre>";
                die("Error ! try agian!");
            }
        }

        if ($img == 0 and $product_id != 0) {
            $get_all_img = $this->getServiceLocator()->get('ApotravinyczTable')->get($product_id);
            if ($get_all_img->array_img != null) {
                $img_array_ck = $this->getServiceLocator()->get('ApotravinyczTable')->update_array_img($product_id);
                if ($img_array_ck != 0 and $img == 0 and $product_id != 0) {
                    echo "Success";
                    die;
                } else {
                    echo "Error img";
                    die;
                }
            } else {
                echo "array_img is null Success";
                die;
            }
// khoi tao section de luu cac img0-->im9 ;
// neu dong y xoa thi don dep cac anh nay
            $session_Recycle_Bin_img = new Container('Recycle_Bin_img');
            $session_Recycle_Bin_img->tmpBinImg = $get_all_img;
        }
    }

    public function dragdropAction() {
        $getuser = $this->forward()->dispatch('Admin\Controller\Index', array(
            'action' => 'getuser'
        ));
        $this->layout()->getuser = $getuser;
//not login
        if (!$getuser) {
            $this->redirect()->toUrl(WEBPATH);
        }

        $this->layout('layout/dragdrop');

        $product_id = (int) $this->params()->fromRoute('id', 0);
        if ($product_id == 0) {
            die("Error ! try agian!");
        }
        $img = (int) $this->params()->fromPost('img', 0);
        if ($img == 1) {
// update array_img = null
            die("Error none");
        }

//---------------------------------- Upload product -------------------------------------------------------
        $utility = new Utility ();
        $output_dir = UPLOAD_PATH_IMG . '/';  //"uploads/";
        $output_dir_thumb = UPLOAD_PATH_IMG_THUNB_ . '/';  //"uploads/";
        $_ApotravinyczTable = $this->getServiceLocator()->get('ApotravinyczTable');

        if (isset($_FILES ["myfile"])) {
            $ret = array();
            $tmp_Apotravinycz_all = ''; //
            $error = $_FILES ["myfile"] ["error"];

            if (!@is_array($_FILES ["myfile"] ['name'])) {     // single file
                $RandomNum = time();

                $ImageName = @str_replace(' ', '-', @strtolower($_FILES ['myfile'] ['name']));
                $ImageType = $_FILES ['myfile'] ['type']; // "image/png", image/jpeg etc.

                $ImageExt = @substr($ImageName, @strrpos($ImageName, '.'));
                $ImageExt = @str_replace('.', '', $ImageExt);
                $ImageName = @preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
                $NewImageName = $ImageName . '-' . $RandomNum . '.' . $ImageExt;

                $check = @move_uploaded_file($_FILES ["myfile"] ["tmp_name"], $output_dir . $NewImageName);

//tao kich co anh va di chuyen vao thumbnail
                $dir = UPLOAD_PATH_IMG;
                $dirFileName = $dir . '/' . $NewImageName;
                $options = array(
                    'max_width' => 102,
                    'max_height' => 102,
                    'jpeg_quality' => 100
                );
                $utility->createImageThumbnail($dirFileName, $dir . '/thumb_', $options);

                if ($product_id != 0) {
                    $_Apotravinycz_all = $_ApotravinyczTable->get($product_id);
                    if ($_Apotravinycz_all->array_img != '' || $_Apotravinycz_all->array_img === null || $_Apotravinycz_all->array_img === NULL || $_Apotravinycz_all->array_img === '(NULL)') {
                        if ($_Apotravinycz_all->array_img === null) {
                            $tmp_Apotravinycz_all = $NewImageName;
                        } else
                            $tmp_Apotravinycz_all = $_Apotravinycz_all->array_img . ',' . $NewImageName;
                    }
//update array_img
                    $data_update_img = array(
                        'id' => $product_id,
                        'array_img' => $tmp_Apotravinycz_all,
                    );

                    $Apotravinycz = new Apotravinycz();
                    $Apotravinycz->exchangeArray($data_update_img);
                    $_check = $_ApotravinyczTable->update_array_img_insert($Apotravinycz);
                }

// echo "<br> Error: ".$_FILES["myfile"]["error"]; 
//echo "testupload : ";

                $ret [$NewImageName] = $output_dir . $NewImageName;
                echo "update_array_img_insert : ";
                var_dump($_check);
                echo @json_encode($ret);
                die;
            }
        }
    }

    public function addAction() {

        $dataPayout = $this->getServiceLocator()->get('PayoutypeTable')->gettype();
        $img = null;
        $img1 = null;
        $img2 = null;
        $img3 = null;
        $img4 = null;
        $img5 = null;
        $img6 = null;
        $img7 = null;
        $img8 = null;
        $img9 = null;
        $img10 = null;
        $utility = new Utility ();
        $product = new Apotravinycz ();
        $view = new ViewModel ();

        $dbAdapter = $this->getServiceLocator()->get('Zend\Db\Adapter\Adapter');
        $getuser = $this->forward()->dispatch('Admin\Controller\Index', array(
            'action' => 'getuser'
        ));
        $this->layout()->getuser = $getuser;
        if ($getuser && ($getuser->group == 'admin' || $getuser->group == 'supperadmin')) {

            $form = new ApotravinyczForm($dbAdapter);
//$form->setInputFilter ( new ApotravinyczFilter () );
            $catalogarr = $this->getdataAction();

            $form->setId($catalogarr);

            $tags = $this->getTagsAction();
            $form->settagsId($tags);

// 			$manufacturer = array ();
// 			$form->setmanufacturerId ( $manufacturer );

            $request = $this->getRequest();
            if ($request->isPost()) {
//$form->setInputFilter ( $product->getInputFilter () ); // check validate
                $data = array_merge_recursive($request->getPost()->toArray(), $request->getFiles()->toArray());

                $form->setData($data);
// error rat nguy hiem o day ko vaidate form
                if (!$form->isValid()) {
                    if ($data ['img'] ['name'] != '') {
                        $id = $data ['id'];
                        $getcata = $this->getServiceLocator()->get('ApotravinyczTable')->get($id);

                        if ($data ['img'] ['name'] != '') {
// edit anh
                            $_array_img = $data ['img'];
// Recyle Bin img older
                            if ($getcata) {
//img
                                $get_img_older = $getcata->img;
                                $_dir = UPLOAD_PATH_IMG;
                                if ($get_img_older) {
                                    $utility->deleteImage($get_img_older, $_dir);
                                }
                            }
// upload and rename
                            $renname_file_img = $utility->uploadImageAlatca($_array_img);
                            if (!$renname_file_img) {
                                $view->check = 0;
                                return $view;
                            }
                        }//img
                        $img = $renname_file_img;



                        if ($data ['img1'] ['name'] != '') {
// edit anh
                            $_array_img = $data ['img1'];
// Recyle Bin img older
                            if ($getcata) {
//img
                                $get_img_older = $getcata->img1;
                                $_dir = UPLOAD_PATH_IMG;
                                if ($get_img_older) {
                                    $utility->deleteImage($get_img_older, $_dir);
                                }
                            }
// upload and rename
                            $renname_file_img = $utility->uploadImageAlatca($_array_img);
                            if (!$renname_file_img) {
                                $view->check = 0;
                                return $view;
                            }
                        }//img1
                        $img1 = $renname_file_img;




                        $product = new Apotravinycz ();
                        $product->dataArraySwap($data, $img, $img1, $img2, $img3, $img4, $img5, $img6, $img7, $img8, $img9, $img10);

// 						echo "<pre>";
// 						print_r($product);
// 						echo "</pre>";
// 						echo "</br>  ------";


                        $check = $this->getServiceLocator()->get('ApotravinyczTable')->save($product);

// 						echo "</br>  ------";
// 						echo "<pre>";
// 						print_r($check);
// 						echo "</pre>";
// 						die;

                        if ($check != 0) {

                            $_url = WEBPATH . '/product/index/index';
                            $this->redirect()->toUrl($_url);
                        } else {
                            $view->check = 0;
                            ;
                            return $view;
                        }
                    } else {

                        $id = $data ['id'];
                        $getcata = $this->getServiceLocator()->get('ApotravinyczTable')->get($id);



                        if ($getcata) {
                            $get_img_older = $getcata->img;
                            $get_img_older1 = $getcata->img1;
                            $get_img_older2 = $getcata->img2;
                            $get_img_older3 = $getcata->img3;
                            $get_img_older4 = $getcata->img4;
                            $get_img_older5 = $getcata->img5;
                            $get_img_older6 = $getcata->img6;
                            $get_img_older7 = $getcata->img7;
                            $get_img_older8 = $getcata->img8;
                            $get_img_older9 = $getcata->img9;
                            $get_img_older10 = $getcata->img10;
                        }
                        $product = new Apotravinycz ();
                        $product->dataArraySwap($form->getData(), $get_img_older, $get_img_older1, $get_img_older2, $get_img_older3, $get_img_older4, $get_img_older5, $get_img_older6, $get_img_older7, $get_img_older8, $get_img_older9, $get_img_older10);
                        $check = $this->getServiceLocator()->get('ApotravinyczTable')->save($product);
                        $_url = WEBPATH . '/product/index/add/' . $id;
                        if ($check == 0) {
// notupdate
                            $_url = WEBPATH . '/product/index/index';
                            $this->redirect()->toUrl($_url);
                        }
                        if ($check != 0) {
                            $_url = WEBPATH . '/product/index/index';
                            $this->redirect()->toRoute('Apotravinycz', array(
                                'controller' => 'index',
                                'action' => 'add',
                                'id' => $check
                            ));
                        }
                    }
                } else {
                    echo "not valid form";
                }
            }
            $form->setId($catalogarr);
            $product_id = (int) $this->params()->fromRoute('id', 0);
            $catalog_cr = $this->getServiceLocator()->get('ApotravinyczTable')->get($product_id);

            echo "<pre>";
            print_r($catalog_cr);
            echo "</pre>";

            if ($product_id == 0) {
                $form->get('submit')->setAttribute('value', 'Add Apotravinycz');
            } else
                $form->get('submit')->setAttribute('value', 'Edit Apotravinycz');

            if ($catalog_cr and $product_id != 0) {
                $view->setVariable('Error', 1);
                $form->bind($catalog_cr);
                $_img_thumb = $catalog_cr->img;
                $_img_thumb1 = $catalog_cr->img1;
                $_img_thumb2 = $catalog_cr->img2;
                $_img_thumb3 = $catalog_cr->img3;
                $_img_thumb4 = $catalog_cr->img4;
                $_img_thumb5 = $catalog_cr->img5;
                $_img_thumb6 = $catalog_cr->img6;
                $_img_thumb7 = $catalog_cr->img7;
                $_img_thumb8 = $catalog_cr->img8;
                $_img_thumb9 = $catalog_cr->img9;
                $_img_thumb10 = $catalog_cr->img10;
            }

            $view->setVariable('img_thumb', $_img_thumb);
            $view->setVariable('img_thumb1', $_img_thumb1);
            $view->setVariable('img_thumb2', $_img_thumb2);
            $view->setVariable('img_thumb3', $_img_thumb3);
            $view->setVariable('img_thumb4', $_img_thumb4);
            $view->setVariable('img_thumb5', $_img_thumb5);
            $view->setVariable('img_thumb6', $_img_thumb6);
            $view->setVariable('img_thumb7', $_img_thumb7);
            $view->setVariable('img_thumb8', $_img_thumb8);
            $view->setVariable('img_thumb9', $_img_thumb9);
            $view->setVariable('img_thumb10', $_img_thumb10);
            $view->setVariable('Apotravinyczform', $form);
            $view->setVariable('id_product', $product_id);

            return $view;
        } else {
            $view->check = 2;
            $this->layout('error/admin');
        }
    }

    public function listAction() {
        $this->layout('layout/bags');

        $ApotravinyczTable = $this->getServiceLocator()->get('ApotravinyczTable');
        $allRecord = $ApotravinyczTable->countAll();
        $pageNull = new PageNull($allRecord);
        $itemsPerPage = 20;
        $pageRange = 5;
        $page = $this->params()->fromRoute('page', 1);
        $offset = ($page - 1) * $itemsPerPage;
        $paginator = new Paginator($pageNull);
        $paginator->setCurrentPageNumber($page);
        $paginator->setItemCountPerPage($itemsPerPage);
        $paginator->setPageRange($pageRange);

        $listpr = $ApotravinyczTable->getList($offset, $itemsPerPage);

// die("anh co the che vi em em biet ko ");

        return new ViewModel(array(
            'listNews' => $listpr,
            'paginator' => $paginator,
            'allRecord' => $allRecord,
            'offset' => $offset,
            'itemsPerPage' => $itemsPerPage
        ));
    }

    public function editAction() {
        $dataPayout = $this->getServiceLocator()->get('PayoutypeTable')->gettype();

        $utility = new Utility ();
        $product = new Apotravinycz ();
        $view = new ViewModel ();

        $dbAdapter = $this->getServiceLocator()->get('Zend\Db\Adapter\Adapter');
        $getuser = $this->forward()->dispatch('Admin\Controller\Index', array(
            'action' => 'getuser'
        ));
        $this->layout()->getuser = $getuser;
        if ($getuser && ($getuser->group == 'admin' || $getuser->group == 'supperadmin')) {
            $this->layout('layout/bags');
            $form = new ApotravinyczForm($dbAdapter);
//$form->setInputFilter ( new ApotravinyczFilter () );
            $catalogarr = $this->getdataAction();

            $form->setId($catalogarr);

// 			$tags = array ();
// 			$form->settagsId ( $tags );
// 			$manufacturer = array ();
// 			$form->setmanufacturerId ( $manufacturer );

            $request = $this->getRequest();
            if ($request->isPost()) {
//$form->setInputFilter ( $product->getInputFilter () ); // check validate
                $data = array_merge_recursive($request->getPost()->toArray(), $request->getFiles()->toArray());

                $form->setData($data);
// error rat nguy hiem o day ko vaidate form
                if (!$form->isValid()) {
                    if ($data ['img'] ['name'] != '') {

// edit anh
                        $_array_img = $data ['img'];
// Recyle Bin img older
                        $id = $data ['id'];
                        $getcata = $this->getServiceLocator()->get('ApotravinyczTable')->get($id);
                        if ($getcata) {
                            $get_img_older = $getcata->img;
                            $_dir = UPLOAD_PATH_IMG;
                            if ($get_img_older) {
                                $utility->deleteImage($get_img_older, $_dir);
                            }
                        }

// upload and rename
                        $renname_file_img = $utility->uploadImageAlatca($_array_img);
                        if (!$renname_file_img) {
                            $view->check = 0;
                            return $view;
                        }
                        $product = new Apotravinycz ();
                        $product->dataArraySwap($data, $renname_file_img);
                        $check = $this->getServiceLocator()->get('ApotravinyczTable')->save($product);
                        if ($check != 0) {

                            $_url = WEBPATH . '/product/index/index';
                            $this->redirect()->toUrl($_url);
                        } else {
                            $view->check = 0;
                            ;
                            return $view;
                        }
                    } else {

                        $id = $data ['id'];
                        $getcata = $this->getServiceLocator()->get('ApotravinyczTable')->get($id);
                        if ($getcata) {
                            $get_img_older = $getcata->img;
                        }
                        $product = new Apotravinycz ();
                        $product->dataArraySwap($form->getData(), $get_img_older);
                        $check = $this->getServiceLocator()->get('ApotravinyczTable')->save($product);
                        $_url = WEBPATH . '/product/index/add/' . $id;
                        if ($check == 0) {
// notupdate
                            $_url = WEBPATH . '/product/index/index';
                            $this->redirect()->toUrl($_url);
                        }
                        if ($check != 0) {
                            $_url = WEBPATH . '/product/index/index';
                            $this->redirect()->toRoute('Apotravinycz', array(
                                'controller' => 'index',
                                'action' => 'add',
                                'id' => $check
                            ));
                        }
                    }
                } else {
                    echo "not valid form";
                }
            }
            $form->setId($catalogarr);
            $product_id = (int) $this->params()->fromRoute('id', 0);
            $catalog_cr = $this->getServiceLocator()->get('ApotravinyczTable')->get($product_id);

            if ($product_id == 0) {
                $form->get('submit')->setAttribute('value', 'Add Apotravinycz');
            } else {
                $form->get('submit')->setAttribute('value', 'Edit Apotravinycz');
                $view->setVariable('error', 1);
            }
            if ($catalog_cr and $product_id != 0) {
                $form->bind($catalog_cr);
                $_img_thumb = $catalog_cr->img;
                $_img_thumb1 = $catalog_cr->img1;
                $_img_thumb2 = $catalog_cr->img2;
                $_img_thumb3 = $catalog_cr->img3;
                $_img_thumb4 = $catalog_cr->img4;
                $_img_thumb5 = $catalog_cr->img5;
                $_img_thumb6 = $catalog_cr->img6;
                $_img_thumb7 = $catalog_cr->img7;
                $_img_thumb8 = $catalog_cr->img8;
                $_img_thumb9 = $catalog_cr->img9;
                $_img_thumb10 = $catalog_cr->img10;
            }

            $view->setVariable('img_thumb', $_img_thumb);
            $view->setVariable('img_thumb1', $_img_thumb1);
            $view->setVariable('img_thumb2', $_img_thumb2);
            $view->setVariable('img_thumb3', $_img_thumb3);
            $view->setVariable('img_thumb4', $_img_thumb4);
            $view->setVariable('img_thumb5', $_img_thumb5);
            $view->setVariable('img_thumb6', $_img_thumb6);
            $view->setVariable('img_thumb7', $_img_thumb7);
            $view->setVariable('img_thumb8', $_img_thumb8);
            $view->setVariable('img_thumb9', $_img_thumb9);
            $view->setVariable('img_thumb10', $_img_thumb10);
            $view->setVariable('Apotravinyczform', $form);
            $view->setVariable('id_product', $product_id);

            return $view;
        } else {
            $view->check = 2;
            $this->layout('error/admin');
        }
    }

    public function statusAction() {

        $view = new ViewModel();
        $this->layout('layout/bags');

        $id = $this->params()->fromRoute('id', 0);
        $status = $this->params()->fromRoute('status', 0);

        $ApotravinyczTable = $this->getServiceLocator()->get('ApotravinyczTable');


        if ($id == 0) {
            return $this->redirect()->toRoute('Apotravinycz', array(
                        'controller' => 'product',
                        'action' => 'list-news'
            ));
        } else {

            $exchange_data = array();

            $exchange_data['id'] = $id;
            $exchange_data['status'] = $status;


            $Apotravinycz = new Apotravinycz ();
            $Apotravinycz->exchangeArray($exchange_data);

            $checkupdate = $ApotravinyczTable->savestatus($Apotravinycz);


            $view->id = $id;
            $view->check = $checkupdate;
            return $view;
        }
    }

    public function deleteAction() {
        $product_id = (int) $this->params()->fromRoute('id', 0);
        if ($product_id == 0) {
            return $this->redirect()->toRoute('Apotravinycz');
        }

        $view = new ViewModel ();
        $utility = new Utility ();
        $this->layout('layout/bags');
        $getuser = $this->forward()->dispatch('Admin\Controller\Index', array(
            'action' => 'getuser'
        ));
        $this->layout()->getuser = $getuser;

        $request = $this->getRequest();
        if ($request->isPost()) {
            $del = $request->getPost()->get('del', 'No');
            if ($del == 'Yes') {
                $id = (int) $request->getPost()->get('id');

                if ($id != 0) {
                    $getcata = $this->getServiceLocator()->get('ApotravinyczTable')->get($id);
                    if ($getcata) {
                        $get_img_older = $getcata->img;
                        $_dir = UPLOAD_PATH_IMG;
                        if ($get_img_older) {
                            $utility->deleteImage($get_img_older, $_dir);
                        }
                    }

                    $view->check = $this->getServiceLocator()->get('ApotravinyczTable')->delete($product_id);
                    return $view;
                } else {
                    $view->check = 0;
                    return $view;
                }
            }
        }

        $view->setVariable('id', $product_id);
        $view->setVariable('product', $this->getServiceLocator()->get('ApotravinyczTable')->get($product_id));

        return $view;
    }

    public function upload() {
        $adapter = new \Zend\File\Transfer\Adapter\Http ();
        $fileImage = "file-" . rand(100, 999) . ".png";
        foreach ($adapter->getFileInfo() as $info) {
            if ($info ['name'] != null) {
                $adapter->addFilter('File\Rename', array(
                    'target' => 'public/uploads/' . $fileImage,
                    'overwrite' => true
                        ), $info ['name']);
                $adapter->receive($info ['name']);
            }
        }
        return $fileImage;
    }

    public function getdataAction() {
        $Catalogs = $this->getCatalogTable()->fetchAll();
        $data = array();
        $idtmp = array();
        foreach ($Catalogs as $upload) :
            if ($upload->parent == 0) {
                $id = $upload->id;
                $cat = $upload->name;
                $data [$id] = $cat;
                array_push($idtmp, $id);
            } else {
                $parent = $upload->parent;
                $key = array_search($parent, $idtmp);
                $tmp = array();
                $id = $upload->id;
                $cat = $upload->name;
                array_splice($idtmp, $key + 1, 0, $id);
                if (isset($data [$key])) {
                    $str = $data [$key];
                    $begi = '';
                    $beg = substr_count($str, ' - ');
                    $tt = ' - ';
                    while ($beg != - 1) {
                        $tt = ' - ' . $tt;
                        $beg --;
                    }
                    $tmp [$id] = $tt . $cat;
                } else
                    $tmp [$id] = ' -  - ' . $cat;
                array_splice($data, $key + 1, 0, $tmp);
            }
        endforeach
        ;
        $result = array();
//$k = 0; $v = '';
        for ($i = 0; $i < sizeof($data); $i ++) {
            $result [$k] = $v;
            $k = $idtmp [$i];
            $v = $data [$i];
        }
        return $result;
    }

    public function getTagsAction() {
        $Tags = $this->getTagsTable()->fetchAll();
        $data = array();
        $idtmp = array();
        foreach ($Tags as $upload) :
            if ($upload->parent == 0) {
                $id = $upload->id;
                $cat = $upload->name;
                $data [$id] = $cat;
                array_push($idtmp, $id);
            } else {
                $parent = $upload->parent;
                $key = array_search($parent, $idtmp);
                $tmp = array();
                $id = $upload->id;
                $cat = $upload->name;
                array_splice($idtmp, $key + 1, 0, $id);
                if (isset($data [$key])) {
                    $str = $data [$key];
                    $begi = '';
                    $beg = substr_count($str, ' - ');
                    $tt = ' - ';
                    while ($beg != - 1) {
                        $tt = ' - ' . $tt;
                        $beg --;
                    }
                    $tmp [$id] = $tt . $cat;
                } else
                    $tmp [$id] = ' -  - ' . $cat;
                array_splice($data, $key + 1, 0, $tmp);
            }
        endforeach
        ;
        $result = array();
//$k = 0; $v = '';
        for ($i = 0; $i < sizeof($data); $i ++) {
            $result [$k] = $v;
            $k = $idtmp [$i];
            $v = $data [$i];
        }
        return $result;
    }

    public function getCatalogTable() {
        if (!$this->CatalogTable) {
            $sm = $this->getServiceLocator();
            $this->CatalogTable = $sm->get('Catalog\Model\CatalogTable');
        }
        return $this->CatalogTable;
    }

    protected $CatalogTable;

    public function getTagsTable() {
        if (!$this->TagsTable) {
            $sm = $this->getServiceLocator();
            $this->TagsTable = $sm->get('Tags\Model\TagsTable');
        }
        return $this->TagsTable;
    }

    protected $TagsTable;

}
