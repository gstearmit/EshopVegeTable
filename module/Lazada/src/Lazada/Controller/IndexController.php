<?php

namespace Lazada\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Lazada\Form\LazadaFilter;
use Lazada\Form\LazadaForm;
use Lazada\Model\Lazada;
use Lazada\Model\LazadaTable;
use Lazada\Model\Payoutype;
use Lazada\Model\PayoutypeTable;
use Zend\Session\Container;
use Zend\Session\SessionManager;
use Main\Model\Utility;
use Zend\Db\Sql\Select;
use Zend\Paginator\Paginator;
use Zend\Paginator\Adapter\Iterator as paginatorIterator;

// catalogue
use Catalog\Model\Catalog;
use Catalog\Model\CatalogTable;

// Tags
use Tags\Module\Tags;
use Tags\Module\TagsTable;

// setting
use Settings\Model\Settings;
use Settings\Model\SettingsTable;

class IndexController extends AbstractActionController {
	public $_fileName;
	protected $UserTable;
	public function getUserTable() {
		if (! $this->UserTable) {
			$sm = $this->getServiceLocator ();
			$this->UserTable = $sm->get ( 'Users\Model\UserTable' );
		}
		return $this->UserTable;
	}
        protected $Manufacture;

    public function getManufactureTable() {
        if (!$this->Manufacture) {
            $pst = $this->getServiceLocator();
            $this->Manufacture = $pst->get('Manufacture\Model\ManufactureTable');
        }
        return $this->Manufacture;
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
		$this->layout ( 'layout/bags' );
		
		$getuser = $this->forward ()->dispatch ( 'Admin\Controller\Index', array (
				'action' => 'getuser' 
		) );
		// var_dump($getuser);
		$this->layout ()->getuser = $getuser;
		
		$id = (int)$this->params ()->fromRoute ( 'id' );
		$uenc = $this->params ()->fromRoute ( 'uenc' );
		if($id != 0){
		$product_all = $this->getServiceLocator()->get('LazadaTable')->get($id);
		}else die("Error , Lazada !!!");
		$view->setVariable ( 'id', $id );
		$view->setVariable ( 'uenc', $uenc );
		$view->setVariable ( 'product', $product_all );
		
		return $view;
	}
	public function indexAction() {
		$this->layout ( 'layout/lazadatheme' );
		$this->productcart();
		
		//get Infor Setting
		$setting = $this->getServiceLocator ()->get ( 'SettingsTable' )->fetchAll ();		
		$this->layout ()->setting = $setting;
		$setting_session = new Container('setting');
		foreach ($setting as $key=>$set)
		{
			$name = $set->name;
			$logo1 = $set->logo1;                      
			$ico = $set->ico;
			$seo_description  =  $set->seo_description;
			$seo_keywords=$set->seo_keywords;
			$phone = $set->phone;
			$email = $set->email;
			$facebook = $set->facebook;
			$tweets = $set->tweets;
			$printerest = $set->printerest;
			$youtube_acount = $set->youtube_acount;
			$google = $set->google;
			$address = $set->address;
		}
		
		$setting_session->logo1 =  $logo1;
		if($setting_session->setting == false)
		{
			$setting_session->setting = true;
			$setting_session->name =  $name;
			//$setting_session->logo1 =  $logo1;
			$setting_session->ico  = $ico ;
			$setting_session->seo_description   =  $seo_description;
			$setting_session->seo_keywords = $seo_keywords;
			$setting_session->phone  = $phone;
			$setting_session->email  = $email ;
			$setting_session->facebook  =  $facebook;
			$setting_session->tweets  =  $tweets;
			$setting_session->printerest  = $printerest ;
			$setting_session->youtube_acount  =  $youtube_acount;
			$setting_session->google  = $google;
			$setting_session->address  = $address;
		}
          
         // Get all product search       
        $list_product = $this->getProductAdtTable()->listall_product();
        $session_product = new Container('product');
        $session_product->product_search = $list_product;
      
        // -------------------------------
        //Get All Catalog --------------
        $list_catalog =$this->getCatalogAdtTable()->loadall_catalog();
        $session_catalog = new Container('catalog');
        $session_catalog->list_cat = $list_catalog;
        
        //-------------------
	$data_manu=  $this->getManufactureTable()->show_manu();
        //$data_catalog=  $this->getCatalogAdtTable()->listcatalog();
        $data_catalog_index=  $this->getCatalogAdtTable()->lazada_listcatalog();
        $sub_menu = array();
        foreach ($data_catalog_index as $key => $value) {
            $parent_id = $value['id'];
            $id_cat=$value['id'];
            $list_cat=  $this->getCatalogAdtTable()->getallMenu($id_cat);// mảng id của danh muc con thuoc danh mục cha
        
            $sub_menu[$parent_id] = $this->getCatalogAdtTable()->submenu($parent_id);
             $product_sales[$id_cat]=  $this->getProductAdtTable()->productcat_sales($list_cat);
             $product_featured[$id_cat]=  $this->getProductAdtTable()->productcat_featured($list_cat);
             $product_hot[$id_cat]=  $this->getProductAdtTable()->productcat_hot($list_cat);
             $productcat_index[$id_cat]=  $this->getProductAdtTable()->productcat_index($list_cat);
             foreach ($productcat_index[$id_cat] as $key_w=>$value_w){
                 $id_product = $value_w['id'];
             $product_wisht[$id_product] = $this->getFavoriteTable()->get_wish_detail($id_product);
            
             }
        }
       $product_new=  $this->getProductAdtTable()->product_new();
      
        return array(
            'data_manu'=>$data_manu, //hãng sản xuất
            'catalog'=>$data_catalog_index,
            'sub_menu'=>$sub_menu,
             'product_new'=>$product_new,
            'product_sales'=>$product_sales,
            'product_featured'=>$product_featured,
            'product_hot'=>$product_hot,
            'productcat_index'=>$productcat_index,
            'product_wisht'=>$product_wisht,
            );
		
     
	}
        public function viewproductcatAction(){
           $this->layout ( 'layout/lazadatheme' );          
           $this->productcart(); 
           
           $order= $_GET['order-by'];
           $get_order = str_replace('-', ' ',$order);
           if($order == null){
               $order_by ='id DESC';
           }  else {
                $order_by =$get_order;                
           }
           $id_cat=  $this->params()->fromRoute('id');
            $catalog_detail=  $this->getCatalogAdtTable()->catalogdetail($id_cat);
           $_SESSION['getid']=$id_cat;
            $select = new Select();
            
       $list_cat=  $this->getCatalogAdtTable()->getallMenu($id_cat);// mảng id của danh muc con thuoc danh mục cha
        $page = $this->params()->fromRoute('page') ? (int) $this->params()->fromRoute('page') : 1;
        $listproduct = $this->getProductAdtTable()->product_cat( $order_by, $list_cat);
        $itemsPerPage = 20;
        $listproduct->current();
        $paginator = new Paginator(new paginatorIterator($listproduct));
        $paginator->setCurrentPageNumber($page)
                ->setItemCountPerPage($itemsPerPage)
                ->setPageRange(5);
        
         //--------------
        $data_m = $this->getCatalogAdtTable()->listcatalog();
       
        $sub_menu = array();
        foreach ($data_m as $key => $value) {
            $parent_id = $value['id'];
            $sub_menu[$parent_id] = $this->getCatalogAdtTable()->submenu($parent_id);
        }
        //------------
        return new ViewModel(array(
            'page' => $page,
            'paginator' => $paginator,
            'catalog_detail'=>$catalog_detail,
            'listproduct'=>$listproduct,
            'data_m'=>$data_m,
            'sub_menu'=>$sub_menu,
            'order'=>$order,
        ));
        }

        public function detailproductAction(){
            $this->layout ( 'layout/lazadatheme' );
            $this->productcart();
            $id_pro=  $this->params()->fromRoute('id');
            $data_detail=  $this->getProductAdtTable()->product_detail($id_pro);
            $product_same[$data_detail['cat_id']]=  $this->getProductAdtTable()->product_same($data_detail['cat_id']);
            $catalog_detail=  $this->getCatalogAdtTable()->catalogdetail($data_detail['cat_id']);
            $product_wisht = $this->getFavoriteTable()->get_wish_detail($id_pro);
            //--------------
        $data_m = $this->getCatalogAdtTable()->listcatalog();
        $sub_menu = array();
        foreach ($data_m as $key => $value) {
            $parent_id = $value['id'];
            $sub_menu[$parent_id] = $this->getCatalogAdtTable()->submenu($parent_id);
        }
        //------------
            
            return array(
                'data_detail'=>$data_detail,
                'product_same'=>$product_same,
                'catalog_detail'=>$catalog_detail,
                'data_m'=>$data_m,
                'sub_menu'=>$sub_menu,
                'product_wisht'=>$product_wisht,
                );
        }
        public function productbuynowAction(){
            $id_pro=  $this->params()->fromPost('id_pro');
            $data_detail=  $this->getProductAdtTable()->product_detail($id_pro);
            if($data_detail['sale_products']==1){
                $price = $data_detail['price']-($data_detail['price']*$data_detail['promotions']/100);
            }else{
                $price = $data_detail['price'];
            }
            echo '
                <input  type="hidden" name="id_pro" value="'.$data_detail['id'].'" readonly="readonly"/>
                <input  type="hidden" name="price"  value="'.$price.'" readonly="readonly"/>
                 <input  type="hidden" name="name_pro"  value="'.$data_detail['name'].'" readonly="readonly"/>
                <tr> 
	<td> <a href="/may-nh-kts-fujifilm-s9400w-16-2mp-va-zoom-quang-50x-en-941937.html?mp=1">
		<img src="'. WEBPATH_UPLOAD_PATH_IMG_THUNB_ . $data_detail['img'].'" width="117" height="117" alt="" onerror=this.src="'. ROHLIK_LAZADA.'/img/no-product.png" >
	</a>
	</td>
	<td >
		<div class="productdescription">'. $data_detail['name'].'</div>
		
		
	</td>
	<td class="price_center">
		<span>'. $data_detail['price'].' Kč</span><br>
		
	</td>
	<td class="width_10 price center">		
		<input style="width: 40px;" type="text"  value="1" readonly="readonly"/>		
	</td>
	<td class="width_20 right_align price lastcolumn">
		'. $data_detail['price'].' Kč
		<!--<div style="color:green">- 439.900 VND</div>-->		
	</td>
	
</tr>


<tr>
	<td colspan="2"></td>
	<td colspan="2"> <strong>Thành Tiền</strong></td>
	<td> <strong>'. $data_detail['price'].' Kč</strong></br>
		Đã bao gồm VAT
	</td>
	
	</tr>';
            die;
        }
public function searchAction() {
        $this->layout('layout/lazadatheme');
       $this->productcart();
       //--------------
       $order= $_GET['order-by'];
           $get_order = str_replace('-', ' ',$order);
           if($order == null){
               $order_by ='id DESC';
           }  else {
                $order_by =$get_order;                
           }
        $data_m = $this->getCatalogAdtTable()->listcatalog();
        $sub_menu = array();
        foreach ($data_m as $key => $value) {
            $parent_id = $value['id'];
            $sub_menu[$parent_id] = $this->getCatalogAdtTable()->submenu($parent_id);
        }
        //------------
        $_key = addslashes(trim($this->params()->fromQuery('key')));
        $key = @str_replace(',', '', $_key);  

        if ($key != null) {
            $data_search = $this->getProductAdtTable()->search_lazada($key,$order_by);
           // print_r($data_search);
            return array(
                'data_search' => $data_search,
                 'data_m'=>$data_m,
                'sub_menu'=>$sub_menu, 
                 'order'=>$order,
                );
        }
          
        return array(                
                 'data_m'=>$data_m,
                'sub_menu'=>$sub_menu  
                );
    }
        public function productcart(){
             $product_cat = $this->forward ()->dispatch ( 'Shoppingcart\Controller\Lazadashopping', array (
				'action' => 'viewcart' 
		) );
        $this->layout()->setVariable('product_cat', $product_cat);
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
        //--------------------------------------------------------------------------------------------------

        public function addalbumAction()
	{
		$getuser = $this->forward ()->dispatch ( 'Admin\Controller\Index', array (
				'action' => 'getuser'
		) );
		$this->layout ()->getuser = $getuser;
		//not login
		if(!$getuser) {
			$this->redirect()->toUrl(WEBPATH);
		}
		
		$this->layout ( 'layout/albumdrag' );
		
		$dataPayout = $this->getServiceLocator ()->get ( 'PayoutypeTable' )->gettype ();
		
		$utility = new Utility ();
		$product = new Lazada ();
		$view = new ViewModel ();
		
		$dbAdapter = $this->getServiceLocator ()->get ( 'Zend\Db\Adapter\Adapter' );
		$getuser = $this->forward ()->dispatch ( 'Admin\Controller\Index', array (
				'action' => 'getuser'
		) );
		$this->layout ()->getuser = $getuser;
		if ($getuser && ($getuser->group == 'admin' || $getuser->group == 'supperadmin')) {
			
			$form = new LazadaForm ( $dbAdapter );
			//$form->setInputFilter ( new LazadaFilter () );
			$catalogarr = $this->getdataAction ();
				
			$form->setId ( $catalogarr );
				
			// 			$tags = array ();
			// 			$form->settagsId ( $tags );
				
			// 			$manufacturer = array ();
			// 			$form->setmanufacturerId ( $manufacturer );
				
			$request = $this->getRequest ();
			if ($request->isPost ()) {
				//$form->setInputFilter ( $product->getInputFilter () ); // check validate
				$data = array_merge_recursive ( $request->getPost ()->toArray (), $request->getFiles ()->toArray () );
		
				$form->setData ( $data );
				// error rat nguy hiem o day ko vaidate form
				if (!$form->isValid ()) {
					if ($data ['img'] ['name'] != '') {
		
						// edit anh
						$_array_img = $data ['img'];
						// Recyle Bin img older
						$id = $data ['id'];
						$getcata = $this->getServiceLocator ()->get ( 'LazadaTable' )->get ( $id );
						if ($getcata) {
							$get_img_older = $getcata->img;
							$_dir = UPLOAD_PATH_IMG;
							if ($get_img_older) {
								$utility->deleteImage ( $get_img_older, $_dir );
							}
						}
		
						// upload and rename
						$renname_file_img = $utility->uploadImageAlatca ( $_array_img );
						if (! $renname_file_img) {
							$view->check = 0;
							return $view;
						}
						$product = new Lazada ();
						$product->dataArraySwap ( $data, $renname_file_img );
						$check = $this->getServiceLocator ()->get ( 'LazadaTable' )->save ( $product );
						if ($check != 0) {
								
							$_url = WEBPATH . '/product/index/index';
							$this->redirect ()->toUrl ( $_url );
						} else {
							$view->check = 0;
							;
							return $view;
						}
					} else {
		
						$id = $data ['id'];
						$getcata = $this->getServiceLocator ()->get ( 'LazadaTable' )->get ( $id );
						if ($getcata) {
							$get_img_older = $getcata->img;
						}
						$product = new Lazada ();
						$product->dataArraySwap ( $form->getData (), $get_img_older );
						$check = $this->getServiceLocator ()->get ( 'LazadaTable' )->save ( $product );
						$_url = WEBPATH . '/product/index/add/' . $id;
						if ($check == 0) {
							// notupdate
							$_url = WEBPATH . '/product/index/index';
							$this->redirect ()->toUrl ( $_url );
						}
						if ($check != 0) {
							$_url = WEBPATH . '/product/index/index';
							$this->redirect ()->toRoute ( 'Lazada', array (
									'controller' => 'index',
									'action' => 'add',
									'id' => $check
							) );
						}
					}
				}else { echo "not valid form";}
			}
			$form->setId ( $catalogarr );
			$product_id = ( int ) $this->params ()->fromRoute ( 'id', 0 );
			$catalog_cr = $this->getServiceLocator ()->get ( 'LazadaTable' )->get ( $product_id );
				
			if ($product_id == 0) {
				$form->get ( 'submit' )->setAttribute ( 'value', 'Add Lazada' );
			} else
			{
				$form->get ( 'submit' )->setAttribute ( 'value', 'Edit Lazada' );
				$view->setVariable ( 'error', 1 );
			}
			if ($catalog_cr and $product_id != 0) {
				$form->bind ( $catalog_cr );
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
				
			$view->setVariable ( 'img_thumb', $_img_thumb );
			$view->setVariable ( 'img_thumb1', $_img_thumb1 );
			$view->setVariable ( 'img_thumb2', $_img_thumb2 );
			$view->setVariable ( 'img_thumb3', $_img_thumb3 );
			$view->setVariable ( 'img_thumb4', $_img_thumb4 );
			$view->setVariable ( 'img_thumb5', $_img_thumb5 );
			$view->setVariable ( 'img_thumb6', $_img_thumb6 );
			$view->setVariable ( 'img_thumb7', $_img_thumb7 );
			$view->setVariable ( 'img_thumb8', $_img_thumb8 );
			$view->setVariable ( 'img_thumb9', $_img_thumb9 );
			$view->setVariable ( 'img_thumb10', $_img_thumb10 );
			$view->setVariable ( 'Lazadaform', $form );
			$view->setVariable ( 'id_product', $product_id );
				
			return $view;
		} else {
			$view->check = 2;
			$this->layout ( 'error/admin' );
		}
		
	}
	
	public function tmpdeimgAction()
	{
		$this->layout ( 'layout/bags' );
		//don dep anh cu trong thu muc anh
		$session_Recycle_Bin_img_tmp = new Container('Recycle_Bin_img');
		if(!empty($session_Recycle_Bin_img_tmp->tmpBinImg))
		{
			$_img_ALL = $session_Recycle_Bin_img_tmp->tmpBinImg;
		
			//   $array_img = array();
			$array_img[0] =  $_img_ALL->img0;
			$array_img[1] =  $_img_ALL->img1;
			$array_img[2] =  $_img_ALL->img2;
			$array_img[3] =  $_img_ALL->img3;
			$array_img[4] =  $_img_ALL->img4;
			$array_img[5] =  $_img_ALL->img5;
			$array_img[6] =  $_img_ALL->img6;
			$array_img[7] =  $_img_ALL->img7;
			$array_img[8] =  $_img_ALL->img8;
			$array_img[9] =  $_img_ALL->img9;
		
			foreach ($array_img as $key=>$_img_tmp)
			{
				// 		   	echo $key."--------".$_img_tmp;
				$_dir = UPLOAD_PATH_IMG;
				$_dir_thum_ = UPLOAD_PATH_IMG_THUNB_;
				$im = $_img_tmp;
				$file_path = $_dir.'/'.$im;
				$file_path_thumb_ = $_dir_thum_.'/'.$im;
				//delte inages
				if ($im !='' and file_exists($file_path)) {
					@unlink( $file_path );
					 
				}
				//delete Thumb
				if ($im !='' and file_exists($file_path_thumb_)) {
					 
					@unlink($file_path_thumb_);
				}
			}
		
		}
		
		echo $dung = 10000;die;
	}
	
	public function ajaxsaveimgAction()
	{
		
		$getuser = $this->forward ()->dispatch ( 'Admin\Controller\Index', array (
				'action' => 'getuser'
		) );
		$this->layout ()->getuser = $getuser;
		//not login
		if(!$getuser) { $this->redirect()->toUrl(WEBPATH);}
		
		$this->layout ( 'layout/dragdrop' );
		$product_id = ( int ) $this->params ()->fromPost ( 'id',0);
		if($product_id == 0){ die("Error ! try agian!");}
		$img = ( int ) $this->params ()->fromPost ( 'img');
		$ret = array();
		if($img ==1 and $product_id !=0)
		{
			//update img
			$_Lazada_all = $this->getServiceLocator ()->get ( 'LazadaTable' )->get ( $product_id );
				
			if($_Lazada_all->array_img !='' || $_Lazada_all->array_img != null || $_Lazada_all->array_img != NULL || $_Lazada_all->array_img != (NULL) )
			{
				$array_img = @explode(',', $_Lazada_all->array_img);
				for( $k=0; $k<=count($array_img); $k++)
				{
				// update img all
					$check = $this->getServiceLocator ()->get ( 'LazadaTable' )->saveimg($array_img[$k],$k, $product_id);
					$ret[$i][$array_img[$k]] = $check;
				}
			
				echo @json_encode ( $ret );die;
			}
			else
			{
				//echo "Lazada_all : ";echo "<pre>";print_r($_Lazada_all);echo "</pre>";
					die("Error ! try agian!");
				}
				
		
		}
		
		if($img == 0 and $product_id !=0)
		{
			$get_all_img = $this->getServiceLocator ()->get ( 'LazadaTable' )->get($product_id);
			if($get_all_img->array_img!=null){
			   $img_array_ck = $this->getServiceLocator ()->get ( 'LazadaTable' )->update_array_img($product_id);
			   if( $img_array_ck !=0 and $img ==0 and $product_id !=0) { echo "Success";die;}else {echo "Error img";die;}
			}else {
				echo "array_img is null Success";die;
			}
			// khoi tao section de luu cac img0-->im9 ;
			// neu dong y xoa thi don dep cac anh nay
			$session_Recycle_Bin_img = new Container('Recycle_Bin_img');
			$session_Recycle_Bin_img->tmpBinImg = $get_all_img;
			
		}
		

	}
	
	public function dragdropAction()
	{
		$getuser = $this->forward ()->dispatch ( 'Admin\Controller\Index', array (
				'action' => 'getuser'
		) );
		$this->layout ()->getuser = $getuser;
		//not login
		if(!$getuser) { $this->redirect()->toUrl(WEBPATH);}
		
		$this->layout ( 'layout/dragdrop' );
		
		$product_id = ( int ) $this->params ()->fromRoute ( 'id', 0 );
		if($product_id == 0){ die("Error ! try agian!");}
		$img = ( int ) $this->params ()->fromPost ( 'img',0);
		if($img ==1)
		{
			// update array_img = null
			die("Error none");
		}
		
		//---------------------------------- Upload product -------------------------------------------------------
		$utility = new Utility ();
		$output_dir = UPLOAD_PATH_IMG.'/';  //"uploads/";
		$output_dir_thumb = UPLOAD_PATH_IMG_THUNB_.'/';  //"uploads/";
		$_LazadaTable = $this->getServiceLocator ()->get ( 'LazadaTable' );
		
		if (isset ( $_FILES ["myfile"] )) {
			$ret = array ();
			$tmp_Lazada_all =''; //
			$error = $_FILES ["myfile"] ["error"];
			
				if (! @is_array ( $_FILES ["myfile"] ['name'] )) 				// single file
				{
					
					$RandomNum = time ();
					
					$ImageName = @str_replace ( ' ', '-', @strtolower ( $_FILES ['myfile'] ['name'] ) );
					$ImageType = $_FILES ['myfile'] ['type']; // "image/png", image/jpeg etc.
					
					$ImageExt = @substr ( $ImageName, @strrpos ( $ImageName, '.' ) );
					$ImageExt = @str_replace ( '.', '', $ImageExt );
					$ImageName = @preg_replace ( "/\.[^.\s]{3,4}$/", "", $ImageName );
					$NewImageName = $ImageName . '-' . $RandomNum . '.' . $ImageExt;
					
					$check = @move_uploaded_file ( $_FILES ["myfile"] ["tmp_name"], $output_dir . $NewImageName );
					
					//tao kich co anh va di chuyen vao thumbnail
					$dir = UPLOAD_PATH_IMG;
					$dirFileName = $dir . '/' . $NewImageName;
					$options = array (
							'max_width' => 102,
							'max_height' => 102,
							'jpeg_quality' => 100
					);
					$utility->createImageThumbnail ( $dirFileName, $dir.'/thumb_', $options );
					
					if($product_id != 0){
						$_Lazada_all = $_LazadaTable->get ( $product_id );
						if($_Lazada_all->array_img !='' ||$_Lazada_all->array_img === null || $_Lazada_all->array_img === NULL || $_Lazada_all->array_img === '(NULL)' )
						{
							if($_Lazada_all->array_img === null)
							{ 
								$tmp_Lazada_all = $NewImageName; 
							}else  $tmp_Lazada_all = $_Lazada_all->array_img.','.$NewImageName;
						}
						//update array_img
								$data_update_img = array(
									'id'=>$product_id,
									'array_img'=>$tmp_Lazada_all,
							);
								
							$Lazada = new Lazada();
							$Lazada->exchangeArray($data_update_img);
						   $_check =  $_LazadaTable->update_array_img_insert($Lazada);
					}
					
					// echo "<br> Error: ".$_FILES["myfile"]["error"]; 
					//echo "testupload : ";
					
					$ret [$NewImageName] = $output_dir . $NewImageName;
					echo "update_array_img_insert : " ;var_dump($_check);
					echo @json_encode ( $ret );die;
					
				}

			
		}
	}
	
	public function addAction() {
		
		$dataPayout = $this->getServiceLocator ()->get ( 'PayoutypeTable' )->gettype ();
		$img = null ;$img1 =null;$img2=null;$img3=null;$img4=null;$img5=null;
		$img6=null;$img7=null;$img8=null;$img9=null;$img10=null;
		$utility = new Utility ();
		$product = new Lazada ();
		$view = new ViewModel ();
		
		$dbAdapter = $this->getServiceLocator ()->get ( 'Zend\Db\Adapter\Adapter' );
		$getuser = $this->forward ()->dispatch ( 'Admin\Controller\Index', array (
				'action' => 'getuser' 
		) );
		$this->layout ()->getuser = $getuser;
		if ($getuser && ($getuser->group == 'admin' || $getuser->group == 'supperadmin')) {
			
			$form = new LazadaForm ( $dbAdapter );
			//$form->setInputFilter ( new LazadaFilter () );
			$catalogarr = $this->getdataAction ();
			
			$form->setId ( $catalogarr );
			
			$tags = $this->getTagsAction(); 
			$form->settagsId ( $tags );
			
// 			$manufacturer = array ();
// 			$form->setmanufacturerId ( $manufacturer );
			
			$request = $this->getRequest ();
			if ($request->isPost ()) {
				//$form->setInputFilter ( $product->getInputFilter () ); // check validate
				$data = array_merge_recursive ( $request->getPost ()->toArray (), $request->getFiles ()->toArray () );
		
				$form->setData ( $data );
				// error rat nguy hiem o day ko vaidate form
				if (!$form->isValid ()) {
					if ( $data ['img'] ['name'] != ''   ) 
					{
						$id = $data ['id'];
						$getcata = $this->getServiceLocator ()->get ( 'LazadaTable' )->get ( $id );
						
						if ($data ['img'] ['name'] != '')
						{
							// edit anh
							$_array_img = $data ['img'];
							// Recyle Bin img older
							if ($getcata) {
								//img
								$get_img_older = $getcata->img;
								$_dir = UPLOAD_PATH_IMG;
								if ($get_img_older) {
									$utility->deleteImage ( $get_img_older, $_dir );
								}
							}
							// upload and rename
							$renname_file_img = $utility->uploadImageAlatca ( $_array_img );
							if (! $renname_file_img) {
								$view->check = 0;
								return $view;
							}
						
						}//img
						$img = $renname_file_img;
						
						 
						
						if ($data ['img1'] ['name'] != '')
						{
							// edit anh
							$_array_img = $data ['img1'];
							// Recyle Bin img older
							if ($getcata) {
								//img
								$get_img_older = $getcata->img1;
								$_dir = UPLOAD_PATH_IMG;
								if ($get_img_older) {
									$utility->deleteImage ( $get_img_older, $_dir );
								}
							}
							// upload and rename
							$renname_file_img = $utility->uploadImageAlatca ( $_array_img );
							if (! $renname_file_img) {
								$view->check = 0;
								return $view;
							}
						
						}//img1
						$img1 = $renname_file_img; 
						
				
						
						
						$product = new Lazada ();
						$product->dataArraySwap ( $data, $img ,$img1,$img2,$img3,$img4,$img5,$img6,$img7,$img8,$img9,$img10);
						
// 						echo "<pre>";
// 						print_r($product);
// 						echo "</pre>";
// 						echo "</br>  ------";
						
						
						$check = $this->getServiceLocator ()->get ( 'LazadaTable' )->save ( $product );
						
// 						echo "</br>  ------";
// 						echo "<pre>";
// 						print_r($check);
// 						echo "</pre>";
// 						die;
						
						if ($check != 0) {
							
							$_url = WEBPATH . '/product/index/index';
							$this->redirect ()->toUrl ( $_url );
						} else {
							$view->check = 0;
							;
							return $view;
						}
					} else {
						
						$id = $data ['id'];
						$getcata = $this->getServiceLocator ()->get ( 'LazadaTable' )->get ( $id );
						
						
						
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
						$product = new Lazada ();
						$product->dataArraySwap ( $form->getData (), $get_img_older,$get_img_older1,$get_img_older2,$get_img_older3,$get_img_older4,$get_img_older5,$get_img_older6,$get_img_older7,$get_img_older8,$get_img_older9,$get_img_older10 );
						$check = $this->getServiceLocator ()->get ( 'LazadaTable' )->save ( $product );
						$_url = WEBPATH . '/product/index/add/' . $id;
						if ($check == 0) {
							// notupdate
							$_url = WEBPATH . '/product/index/index';
							$this->redirect ()->toUrl ( $_url );
						}
						if ($check != 0) {
							$_url = WEBPATH . '/product/index/index';
							$this->redirect ()->toRoute ( 'Lazada', array (
									'controller' => 'index',
									'action' => 'add',
									'id' => $check 
							) );
						}
					} 
				}else { echo "not valid form";}
			}
			$form->setId ( $catalogarr );
			$product_id = ( int ) $this->params ()->fromRoute ( 'id', 0 );
			$catalog_cr = $this->getServiceLocator ()->get ( 'LazadaTable' )->get ( $product_id );
			
			echo "<pre>";
			print_r($catalog_cr);
			echo "</pre>";
			
			if ($product_id == 0) {
				$form->get ( 'submit' )->setAttribute ( 'value', 'Add Lazada' );
			} else
				$form->get ( 'submit' )->setAttribute ( 'value', 'Edit Lazada' );
			
			if ($catalog_cr and $product_id != 0) {
				$view->setVariable ( 'Error', 1 );
				$form->bind ( $catalog_cr );
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
			
			$view->setVariable ( 'img_thumb', $_img_thumb );
			$view->setVariable ( 'img_thumb1', $_img_thumb1 );
			$view->setVariable ( 'img_thumb2', $_img_thumb2 );
			$view->setVariable ( 'img_thumb3', $_img_thumb3 );
			$view->setVariable ( 'img_thumb4', $_img_thumb4 );
			$view->setVariable ( 'img_thumb5', $_img_thumb5 );
			$view->setVariable ( 'img_thumb6', $_img_thumb6 );
			$view->setVariable ( 'img_thumb7', $_img_thumb7 );
			$view->setVariable ( 'img_thumb8', $_img_thumb8 );
			$view->setVariable ( 'img_thumb9', $_img_thumb9 );
			$view->setVariable ( 'img_thumb10', $_img_thumb10 );
			$view->setVariable ( 'Lazadaform', $form );
			$view->setVariable ( 'id_product', $product_id );
			
			return $view;
		} else {
			$view->check = 2;
			$this->layout ( 'error/admin' );
		}
	}
	public function listAction() {
		$this->layout ( 'layout/bags' );
		
		$LazadaTable = $this->getServiceLocator ()->get ( 'LazadaTable' );
		$allRecord = $LazadaTable->countAll ();
		$pageNull = new PageNull ( $allRecord );
		$itemsPerPage = 20;
		$pageRange = 5;
		$page = $this->params ()->fromRoute ( 'page', 1 );
		$offset = ($page - 1) * $itemsPerPage;
		$paginator = new Paginator ( $pageNull );
		$paginator->setCurrentPageNumber ( $page );
		$paginator->setItemCountPerPage ( $itemsPerPage );
		$paginator->setPageRange ( $pageRange );
		
		$listpr = $LazadaTable->getList ( $offset, $itemsPerPage );
		
		// die("anh co the che vi em em biet ko ");
		
		return new ViewModel ( array (
				'listNews' => $listpr,
				'paginator' => $paginator,
				'allRecord' => $allRecord,
				'offset' => $offset,
				'itemsPerPage' => $itemsPerPage 
		) );
	}
	public function editAction() {
	$dataPayout = $this->getServiceLocator ()->get ( 'PayoutypeTable' )->gettype ();
		
		$utility = new Utility ();
		$product = new Lazada ();
		$view = new ViewModel ();
		
		$dbAdapter = $this->getServiceLocator ()->get ( 'Zend\Db\Adapter\Adapter' );
		$getuser = $this->forward ()->dispatch ( 'Admin\Controller\Index', array (
				'action' => 'getuser' 
		) );
		$this->layout ()->getuser = $getuser;
		if ($getuser && ($getuser->group == 'admin' || $getuser->group == 'supperadmin')) {
			$this->layout ( 'layout/bags' );
			$form = new LazadaForm ( $dbAdapter );
			//$form->setInputFilter ( new LazadaFilter () );
			$catalogarr = $this->getdataAction ();
			
			$form->setId ( $catalogarr );
			
// 			$tags = array ();
// 			$form->settagsId ( $tags );
			
// 			$manufacturer = array ();
// 			$form->setmanufacturerId ( $manufacturer );
			
			$request = $this->getRequest ();
			if ($request->isPost ()) {
				//$form->setInputFilter ( $product->getInputFilter () ); // check validate
				$data = array_merge_recursive ( $request->getPost ()->toArray (), $request->getFiles ()->toArray () );
		
				$form->setData ( $data );
				// error rat nguy hiem o day ko vaidate form
				if (!$form->isValid ()) {
					if ($data ['img'] ['name'] != '') {
						
						// edit anh
						$_array_img = $data ['img'];
						// Recyle Bin img older
						$id = $data ['id'];
						$getcata = $this->getServiceLocator ()->get ( 'LazadaTable' )->get ( $id );
						if ($getcata) {
							$get_img_older = $getcata->img;
							$_dir = UPLOAD_PATH_IMG;
							if ($get_img_older) {
								$utility->deleteImage ( $get_img_older, $_dir );
							}
						}
						
						// upload and rename
						$renname_file_img = $utility->uploadImageAlatca ( $_array_img );
						if (! $renname_file_img) {
							$view->check = 0;
							return $view;
						}
						$product = new Lazada ();
						$product->dataArraySwap ( $data, $renname_file_img );
						$check = $this->getServiceLocator ()->get ( 'LazadaTable' )->save ( $product );
						if ($check != 0) {
							
							$_url = WEBPATH . '/product/index/index';
							$this->redirect ()->toUrl ( $_url );
						} else {
							$view->check = 0;
							;
							return $view;
						}
					} else {
						
						$id = $data ['id'];
						$getcata = $this->getServiceLocator ()->get ( 'LazadaTable' )->get ( $id );
						if ($getcata) {
							$get_img_older = $getcata->img;
						}
						$product = new Lazada ();
						$product->dataArraySwap ( $form->getData (), $get_img_older );
						$check = $this->getServiceLocator ()->get ( 'LazadaTable' )->save ( $product );
						$_url = WEBPATH . '/product/index/add/' . $id;
						if ($check == 0) {
							// notupdate
							$_url = WEBPATH . '/product/index/index';
							$this->redirect ()->toUrl ( $_url );
						}
						if ($check != 0) {
							$_url = WEBPATH . '/product/index/index';
							$this->redirect ()->toRoute ( 'Lazada', array (
									'controller' => 'index',
									'action' => 'add',
									'id' => $check 
							) );
						}
					} 
				}else { echo "not valid form";}
			}
			$form->setId ( $catalogarr );
			$product_id = ( int ) $this->params ()->fromRoute ( 'id', 0 );
			$catalog_cr = $this->getServiceLocator ()->get ( 'LazadaTable' )->get ( $product_id );
			
			if ($product_id == 0) {
				$form->get ( 'submit' )->setAttribute ( 'value', 'Add Lazada' );
			} else
			{
				$form->get ( 'submit' )->setAttribute ( 'value', 'Edit Lazada' );
				$view->setVariable ( 'error', 1 );
			}
			if ($catalog_cr and $product_id != 0) {
				$form->bind ( $catalog_cr );
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
			
			$view->setVariable ( 'img_thumb', $_img_thumb );
			$view->setVariable ( 'img_thumb1', $_img_thumb1 );
			$view->setVariable ( 'img_thumb2', $_img_thumb2 );
			$view->setVariable ( 'img_thumb3', $_img_thumb3 );
			$view->setVariable ( 'img_thumb4', $_img_thumb4 );
			$view->setVariable ( 'img_thumb5', $_img_thumb5 );
			$view->setVariable ( 'img_thumb6', $_img_thumb6 );
			$view->setVariable ( 'img_thumb7', $_img_thumb7 );
			$view->setVariable ( 'img_thumb8', $_img_thumb8 );
			$view->setVariable ( 'img_thumb9', $_img_thumb9 );
			$view->setVariable ( 'img_thumb10', $_img_thumb10 );
			$view->setVariable ( 'Lazadaform', $form );
			$view->setVariable ( 'id_product', $product_id );
			
			return $view;
		} else {
			$view->check = 2;
			$this->layout ( 'error/admin' );
		}
	}
	
	public function statusAction() {
		
		$view= new ViewModel();
		$this->layout ( 'layout/bags' );
	
		$id = $this->params ()->fromRoute ( 'id', 0 );
		$status = $this->params ()->fromRoute ( 'status', 0 );
	
		$LazadaTable = $this->getServiceLocator ()->get ( 'LazadaTable' );
		
	
		if ($id == 0) {
			return $this->redirect ()->toRoute ( 'Lazada', array (
					'controller' => 'product',
					'action' => 'list-news'
			) );
		} else {
			
					$exchange_data = array ();
						
					$exchange_data['id'] = $id;
					$exchange_data['status'] = $status;
					
						
					$Lazada = new Lazada ();
					$Lazada->exchangeArray ( $exchange_data );
						
					$checkupdate = $LazadaTable->savestatus ( $Lazada );
		
			
			$view->id = $id;
			$view->check=$checkupdate;
			return $view;
		}
	}
	
	
	
	public function deleteAction() {
		$product_id = ( int ) $this->params ()->fromRoute ( 'id', 0 );
		if ($product_id == 0) {
			return $this->redirect ()->toRoute ( 'Lazada' );
		}
		
		$view = new ViewModel ();
		$utility = new Utility ();
		$this->layout ( 'layout/bags' );
		$getuser = $this->forward ()->dispatch ( 'Admin\Controller\Index', array (
				'action' => 'getuser' 
		) );
		$this->layout ()->getuser = $getuser;
		
		$request = $this->getRequest ();
		if ($request->isPost ()) {
			$del = $request->getPost ()->get ( 'del', 'No' );
			if ($del == 'Yes') {
				$id = ( int ) $request->getPost ()->get ( 'id' );
				
				if ($id != 0) {
					$getcata = $this->getServiceLocator ()->get ( 'LazadaTable' )->get ( $id );
					if ($getcata) {
						$get_img_older = $getcata->img;
						$_dir = UPLOAD_PATH_IMG;
						if ($get_img_older) {
							$utility->deleteImage ( $get_img_older, $_dir );
						}
					}
					
					$view->check = $this->getServiceLocator ()->get ( 'LazadaTable' )->delete ( $product_id );
					return $view;
				} else {
					$view->check = 0;
					return $view;
				}
	}
}		
				
		$view->setVariable ( 'id', $product_id );
		$view->setVariable ( 'product', $this->getServiceLocator ()->get ( 'LazadaTable' )->get( $product_id ) );
		
		return $view;
	}
	public function upload() {
		$adapter = new \Zend\File\Transfer\Adapter\Http ();
		$fileImage = "file-" . rand ( 100, 999 ) . ".png";
		foreach ( $adapter->getFileInfo () as $info ) {
			if ($info ['name'] != null) {
				$adapter->addFilter ( 'File\Rename', array (
						'target' => 'public/uploads/' . $fileImage,
						'overwrite' => true 
				), $info ['name'] );
				$adapter->receive ( $info ['name'] );
			}
		}
		return $fileImage;
	}
	
	public function getdataAction() {
		$Catalogs = $this->getCatalogTable ()->fetchAll ();
		$data = array ();
		$idtmp = array ();
		foreach ( $Catalogs as $upload ) :
		if ($upload->parent == 0) {
			$id = $upload->id;
			$cat = $upload->name;
			$data [$id] = $cat;
			array_push ( $idtmp, $id );
		} else {
			$parent = $upload->parent;
			$key = array_search ( $parent, $idtmp );
			$tmp = array ();
			$id = $upload->id;
			$cat = $upload->name;
			array_splice ( $idtmp, $key + 1, 0, $id );
			if (isset ( $data [$key] )) {
				$str = $data [$key];
				$begi = '';
				$beg = substr_count ( $str, ' - ' );
				$tt = ' - ';
				while ( $beg != - 1 ) {
					$tt = ' - ' . $tt;
					$beg --;
				}
				$tmp [$id] = $tt . $cat;
			} else
				$tmp [$id] = ' -  - ' . $cat;
			array_splice ( $data, $key + 1, 0, $tmp );
		}
		endforeach
		;
		$result = array ();
		//$k = 0; $v = '';
		for($i = 0; $i < sizeof ( $data ); $i ++) {
			$result [$k] = $v;
			$k = $idtmp [$i];
			$v = $data [$i];
		}
		return $result;
	}
	
	
	public function getTagsAction() {
		$Tags = $this->getTagsTable()->fetchAll ();
		$data = array ();
		$idtmp = array ();
		foreach ( $Tags as $upload ) :
		if ($upload->parent == 0) {
			$id = $upload->id;
			$cat = $upload->name;
			$data [$id] = $cat;
			array_push ( $idtmp, $id );
		} else {
			$parent = $upload->parent;
			$key = array_search ( $parent, $idtmp );
			$tmp = array ();
			$id = $upload->id;
			$cat = $upload->name;
			array_splice ( $idtmp, $key + 1, 0, $id );
			if (isset ( $data [$key] )) {
				$str = $data [$key];
				$begi = '';
				$beg = substr_count ( $str, ' - ' );
				$tt = ' - ';
				while ( $beg != - 1 ) {
					$tt = ' - ' . $tt;
					$beg --;
				}
				$tmp [$id] = $tt . $cat;
			} else
				$tmp [$id] = ' -  - ' . $cat;
			array_splice ( $data, $key + 1, 0, $tmp );
		}
		endforeach
		;
		$result = array ();
		//$k = 0; $v = '';
		for($i = 0; $i < sizeof ( $data ); $i ++) {
			$result [$k] = $v;
			$k = $idtmp [$i];
			$v = $data [$i];
		}
		return $result;
	}
	
	public function getCatalogTable() {
		if (! $this->CatalogTable) {
			$sm = $this->getServiceLocator ();
			$this->CatalogTable = $sm->get ( 'Catalog\Model\CatalogTable' );
		}
		return $this->CatalogTable;
	}
	protected $CatalogTable;
	
	public function getTagsTable() {
		if (! $this->TagsTable) {
			$sm = $this->getServiceLocator ();
			$this->TagsTable = $sm->get ( 'Tags\Model\TagsTable' );
		}
		return $this->TagsTable;
	}
	protected $TagsTable;
}
