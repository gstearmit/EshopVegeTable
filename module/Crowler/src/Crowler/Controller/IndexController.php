<?php

namespace Crowler\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Crowler\Form\CrowlerFilter;
use Crowler\Form\CrowlerForm;
use Product\Model\Product;
use Product\Model\ProductTable;
use Crowler\Model\Crowler;
use Zend\Paginator\Paginator,
    Zend\Paginator\Adapter\Null as PageNull;
use Zend\Session\Container;
use Main\Model\Utility;
// catalogue
use Catalog\Model\Catalog;
use Catalog\Model\CatalogTable;
// Tags
use Tags\Module\Tags;
use Tags\Module\TagsTable;

use Symfony\Component\DomCrawler\Crawler;

class IndexController extends AbstractActionController {

    public $_fileName;
    protected $UserTable;

    public function getUserTable() {
        if (!$this->UserTable) {
            $sm = $this->getServiceLocator();
            $this->UserTable = $sm->get('Users\Model\UserTable');
        }
        return $this->UserTable;
    }

    public function testcrowlersymfonyAction()
    {
    	$html = '<!DOCTYPE html>
			<html>
			    <body>
			        <p class="message">Hello World!</p>
			        <p>Hello Crawler!</p>
			    </body>
			</html>';
    	
    	
    	$crawler = new Crawler($html); 
    	
    	foreach ($crawler as $domElement) {
    		 print_r($domElement->nodeName);
    	}
    	die("voa day roi die di");
    }
    
    public function viewAction() {
        $view = new ViewModel ();
        // check xem sessoin uenc khoa do da duoc tao chua
        // neu chua khoi tao
        // neu roi add them 1 phan tu vao sesion voi id va uenc da duoc tao
        $this->layout('layout/apotravinyadmin');

        $getuser = $this->forward()->dispatch('Admin\Controller\Index', array(
            'action' => 'getuser'
        ));
        // var_dump($getuser);
        $this->layout()->getuser = $getuser;

        $id = (int) $this->params()->fromRoute('id');
        $uenc = $this->params()->fromRoute('uenc');
        if ($id != 0) {
            $product_all = $this->getServiceLocator()->get('ProductTable')->get($id);
        } else
            die("Error , Crowler !!!");
        $view->setVariable('id', $id);
        $view->setVariable('uenc', $uenc);
        $view->setVariable('product', $product_all);

        return $view;
    }
    
    public  function get_items_rolling() {
    	$data = array();
    	$dir = CACHE . '/temp_data_rolling.cache.php';
    	if (file_exists ( $dir )) {
    		require $dir;
    		if (isset ( $items ) and $items) {
    			$data = $items;
    		}else $data = null;
    	}
    	return $data;
    }
    
    public function listtookproductAction() {
    	$getuser = $this->forward()->dispatch('Admin\Controller\Index', array('action' => 'getuser'));
    	if (!$getuser) {
    		// not yet login
    		$this->redirect()->toRoute('home');
    	}
    	$this->layout()->getuser = $getuser;
    
    	$this->layout('layout/apotravinyadmin');
     
    
    	$listpr_tmp = $this->get_items_rolling();
    	
//     	echo "<pre>";
//     	print_r($listpr_tmp);
//     	echo "</pre>";
//     	die;
    	
    	
    	return new ViewModel(array( 
    			'allRecord' => $listpr_tmp, 
    	));
    }
    

    public function indexAction() {
        $getuser = $this->forward()->dispatch('Admin\Controller\Index', array('action' => 'getuser'));
        if (!$getuser) {
            // not yet login
            $this->redirect()->toRoute('home');
        }
        $this->layout()->getuser = $getuser;

        $this->layout('layout/apotravinyadmin');

        $ProductTable = $this->getServiceLocator()->get('ProductTable');
        $allRecord = $ProductTable->countAll();
        $pageNull = new PageNull($allRecord);
        $itemsPerPage = 5;
        $pageRange = 5;
        $page = $this->params()->fromRoute('page', 1);
        $offset = ($page - 1) * $itemsPerPage;
        $paginator = new Paginator($pageNull);
        $paginator->setCurrentPageNumber($page);
        $paginator->setItemCountPerPage($itemsPerPage);
        $paginator->setPageRange($pageRange);

        $listpr_tmp = $ProductTable->getList($offset, $itemsPerPage);
        $i=0; $listpr = array();
         
		foreach ($listpr_tmp as $key =>$Object)
		{
			if($Object->cat_id != null)
			{
				$name_parent = $this->getCatalogTable()->parent_find($Object->cat_id);
				if($name_parent != 0)
				{
					$naem_pare = $name_parent;
				}else $naem_pare ='null';
				
			}
			
			if($Object->tag_id != null)
			{
				$name_tags = $this->getTagsTable()->parent_find($Object->tag_id);
			
			}
			
			
			$listpr[$i]->id =  $Object->id;
			$listpr[$i]->name =  $Object->name;
			$listpr[$i]->descripts =  $Object->descripts;
			$listpr[$i]->detail_product =  $Object->detail_product;
			$listpr[$i]->cat_id =  $name_parent;
			$listpr[$i]->new =  $Object->new;
			$listpr[$i]->hot =  $Object->hot;
			$listpr[$i]->status =  $Object->status;
			$listpr[$i]->promotions =  $Object->promotions;
			$listpr[$i]->price =  $Object->price;
			$listpr[$i]->rating =  $Object->rating;
			$listpr[$i]->availability =  $Object->availability;
			
			$listpr[$i]->tag_id =  $name_tags;
			$listpr[$i]->manufacturer_id =  $Object->manufacturer_id;
			$listpr[$i]->date_creat =  $Object->date_creat;
			$listpr[$i]->date_change =  $Object->date_change;
			$listpr[$i]->user_id =  $Object->user_id;
			$listpr[$i]->status =  $Object->status;
			$listpr[$i]->about_price =  $Object->about_price;
			$listpr[$i]->weekly_featured =  $Object->weekly_featured;
			$listpr[$i]->featured_products =  $Object->featured_products;
			$listpr[$i]->new_products =  $Object->new_products;
			$listpr[$i]->sale_products =  $Object->sale_products;
			$listpr[$i]->most_viewed =  $Object->most_viewed;
			
			
			$listpr[$i]->lastest_products =  $Object->lastest_products;
			$listpr[$i]->array_img =  $Object->array_img;
			$listpr[$i]->img =  $Object->img;
			$listpr[$i]->img1 =  $Object->img1;
			$listpr[$i]->img2 =  $Object->img2;
			$listpr[$i]->img3 =  $Object->img3;
			$listpr[$i]->img4 =  $Object->img4;
			$listpr[$i]->img5 =  $Object->img5;
			$listpr[$i]->img6 =  $Object->img6;
			$listpr[$i]->img7 =  $Object->img7;
			$listpr[$i]->img8 =  $Object->img8;
			$listpr[$i]->img9 =  $Object->img9;
			$listpr[$i]->img0 =  $Object->img0;
		
			$i++;
		}
        return new ViewModel(array(
            'listNews' => $listpr,
            'paginator' => $paginator,
            'allRecord' => $allRecord,
            'offset' => $offset,
            'itemsPerPage' => $itemsPerPage
        ));
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

        $this->layout('layout/addalbumadmin');

        $dataPayout = $this->getServiceLocator()->get('PayoutypeTable')->gettype();

        $utility = new Utility ();
        $product = new Crowler ();
        $view = new ViewModel ();

        $dbAdapter = $this->getServiceLocator()->get('Zend\Db\Adapter\Adapter');
        $getuser = $this->forward()->dispatch('Admin\Controller\Index', array(
            'action' => 'getuser'
        ));
        $this->layout()->getuser = $getuser;
        if ($getuser && ($getuser->group == 'admin' || $getuser->group == 'supperadmin')) {

            $form = new CrowlerForm($dbAdapter);
            //$form->setInputFilter ( new CrowlerFilter () );
            $catalogarr = $this->getdataAction();

            $form->setId($catalogarr);
            
             $tags = $this->getTagsAction();
            $form->settagsId($tags);

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
                        $getcata = $this->getServiceLocator()->get('ProductTable')->get($id);
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
                        $product = new Crowler ();
                        $product->dataArraySwap($data, $renname_file_img);
                        $check = $this->getServiceLocator()->get('ProductTable')->save($product);
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
                        $getcata = $this->getServiceLocator()->get('ProductTable')->get($id);
                        if ($getcata) {
                            $get_img_older = $getcata->img;
                        }
                        $product = new Crowler ();
                        $product->dataArraySwap($form->getData(), $get_img_older);
                        $check = $this->getServiceLocator()->get('ProductTable')->save($product);
                        $_url = WEBPATH . '/product/index/add/' . $id;
                        if ($check == 0) {
                            // notupdate
                            $_url = WEBPATH . '/product/index/index';
                            $this->redirect()->toUrl($_url);
                        }
                        if ($check != 0) {
                            $_url = WEBPATH . '/product/index/index';
                            $this->redirect()->toRoute('Crowler', array(
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
            $catalog_cr = $this->getServiceLocator()->get('ProductTable')->get($product_id);
                        
             $form->settagsId($tags);
            $Tags_cr = $this->getServiceLocator()->get('ProductTable')->get($product_id);
            $form->bind($Tags_cr);
            if ($product_id == 0) {
                $form->get('submit')->setAttribute('value', 'Add Crowler');
            } else {
                $form->get('submit')->setAttribute('value', 'Edit Crowler');
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
                $_img_thumb10 = $catalog_cr->img0;
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
            $view->setVariable('Crowlerform', $form);
            $view->setVariable('id_product', $product_id);
            $view->setVariable('data_product', $catalog_cr);

            return $view;
        } else {
            $view->check = 2;
            $this->layout('error/admin');
        }
    }

    public function tmpdeimgAction() {
        $this->layout('layout/apotravinyadmin');
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
            $_Crowler_all = $this->getServiceLocator()->get('ProductTable')->get($product_id);

            if ($_Crowler_all->array_img != '' || $_Crowler_all->array_img != null || $_Crowler_all->array_img != NULL || $_Crowler_all->array_img != (NULL)) {
                $array_img = @explode(',', $_Crowler_all->array_img);
                for ($k = 0; $k <= count($array_img); $k++) {
                    // update img all
                    $check = $this->getServiceLocator()->get('ProductTable')->saveimg($array_img[$k], $k, $product_id);
                    $ret[$i][$array_img[$k]] = $check;
                }

                echo @json_encode($ret);
                die;
            } else {
                //echo "Crowler_all : ";echo "<pre>";print_r($_Crowler_all);echo "</pre>";
                die("Error ! try agian!");
            }
        }

        if ($img == 0 and $product_id != 0) {
            $get_all_img = $this->getServiceLocator()->get('ProductTable')->get($product_id);
            if ($get_all_img->array_img != null) {
                $img_array_ck = $this->getServiceLocator()->get('ProductTable')->update_array_img($product_id);
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
        $_ProductTable = $this->getServiceLocator()->get('ProductTable');

        if (isset($_FILES ["myfile"])) {
            $ret = array();
            $tmp_Crowler_all = ''; //
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
                    $_Crowler_all = $_ProductTable->get($product_id);
                    if ($_Crowler_all->array_img != '' || $_Crowler_all->array_img === null || $_Crowler_all->array_img === NULL || $_Crowler_all->array_img === '(NULL)') {
                        if ($_Crowler_all->array_img === null) {
                            $tmp_Crowler_all = $NewImageName;
                        } else
                            $tmp_Crowler_all = $_Crowler_all->array_img . ',' . $NewImageName;
                    }
                    //update array_img
                    $data_update_img = array(
                        'id' => $product_id,
                        'array_img' => $tmp_Crowler_all,
                    );

                    $Crowler = new Crowler();
                    $Crowler->exchangeArray($data_update_img);
                    $_check = $_ProductTable->update_array_img_insert($Crowler);
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


        $this->layout('layout/apotravinyadmin');
        $getuser = $this->forward()->dispatch('Admin\Controller\Index', array(
            'action' => 'getuser'
        ));

        $this->layout()->getuser = $getuser;
        // notlogin
        if (!$getuser) {
            $this->redirect()->toUrl(WEBPATH);
        }



        $this->layout()->getuser = $getuser;

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
        $img0 = null;
        $utility = new Utility ();
        $product = new Crowler ();
        $view = new ViewModel ();

        $dbAdapter = $this->getServiceLocator()->get('Zend\Db\Adapter\Adapter');


        if ($getuser && ($getuser->group == 'admin' || $getuser->group == 'supperadmin')) {

            $form = new CrowlerForm($dbAdapter);
            //$form->setInputFilter ( new CrowlerFilter () );
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
                        $getcata = $this->getServiceLocator()->get('ProductTable')->get($id);

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



                        $product = new Crowler ();
                        $product->dataArraySwap($data, $img, $img1, $img2, $img3, $img4, $img5, $img6, $img7, $img8, $img9, $img0);



                        $check = $this->getServiceLocator()->get('ProductTable')->save($product);



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
                        $getcata = $this->getServiceLocator()->get('ProductTable')->get($id);

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
                            $get_img_older10 = $getcata->img0;
                        }
                        $product = new Crowler ();
                        $product->dataArraySwap($form->getData(), $get_img_older, $get_img_older1, $get_img_older2, $get_img_older3, $get_img_older4, $get_img_older5, $get_img_older6, $get_img_older7, $get_img_older8, $get_img_older9, $get_img_older10);
                        $check = $this->getServiceLocator()->get('ProductTable')->save($product);
                        $_url = WEBPATH . '/product/index/add/' . $id;
                        if ($check == 0) {
                            // notupdate
                            $_url = WEBPATH . '/product/index/index';
                            $this->redirect()->toUrl($_url);
                        }
                        if ($check != 0) {
                            $_url = WEBPATH . '/product/index/index';
                            $this->redirect()->toRoute('Crowler', array(
                                'controller' => 'index',
                                'action' => 'add',
                                'id' => $check
                            ));
                        }
                    }
                } else {
                    echo "not valid form";
                }
            }// end post

            $product_id = (int) $this->params()->fromRoute('id', 0);
            $catalog_cr = $this->getServiceLocator()->get('ProductTable')->get($product_id);


            if ($product_id == 0) {
                $form->get('submit')->setAttribute('value', 'Add Crowler');
            } else
                $form->get('submit')->setAttribute('value', 'Edit Crowler');

            $_img_thumb = null;
            $_img_thumb1 = null;
            $_img_thumb2 = null;
            $_img_thumb3 = null;
            $_img_thumb4 = null;
            $_img_thumb5 = null;
            $_img_thumb6 = null;
            $_img_thumb7 = null;
            $_img_thumb8;
            $_img_thumb9 = null;

            if (!empty($catalog_cr) and $product_id != 0) {
                $view->setVariable('Error', 1);
                $form->bind($catalog_cr);
                $_img_thumb = $catalog_cr->img;
                //$_img_thumb1 = $catalog_cr->img1;
// 				$_img_thumb2 = $catalog_cr->img2;
// 				$_img_thumb3 = $catalog_cr->img3;
// 				$_img_thumb4 = $catalog_cr->img4;
// 				$_img_thumb5 = $catalog_cr->img5;
// 				$_img_thumb6 = $catalog_cr->img6;
// 				$_img_thumb7 = $catalog_cr->img7;
// 				$_img_thumb8 = $catalog_cr->img8;
// 				$_img_thumb9 = $catalog_cr->img9;
// 				$_img_thumb0 = $catalog_cr->img0;
// 				$view->setVariable ( 'img_thumb1', $_img_thumb1 );
// 				$view->setVariable ( 'img_thumb2', $_img_thumb2 );
// 				$view->setVariable ( 'img_thumb3', $_img_thumb3 );
// 				$view->setVariable ( 'img_thumb4', $_img_thumb4 );
// 				$view->setVariable ( 'img_thumb5', $_img_thumb5 );
// 				$view->setVariable ( 'img_thumb6', $_img_thumb6 );
// 				$view->setVariable ( 'img_thumb7', $_img_thumb7 );
// 				$view->setVariable ( 'img_thumb8', $_img_thumb8 );
// 				$view->setVariable ( 'img_thumb9', $_img_thumb9 );
// 				$view->setVariable ( 'img_thumb0', $_img_thumb0 );
            }


            $view->setVariable('Crowlerform', $form);
            $view->setVariable('id_product', $product_id);
            $view->setVariable('img_thumb', $_img_thumb);

            return $view;
        } else {
            $view->check = 2;
            $this->layout('error/admin');
            return $view;
        }
    }

    public function listAction() {
        $this->layout('layout/apotravinyadmin');

        $ProductTable = $this->getServiceLocator()->get('ProductTable');
        $allRecord = $ProductTable->countAll();
        $pageNull = new PageNull($allRecord);
        $itemsPerPage = 20;
        $pageRange = 5;
        $page = $this->params()->fromRoute('page', 1);
        $offset = ($page - 1) * $itemsPerPage;
        $paginator = new Paginator($pageNull);
        $paginator->setCurrentPageNumber($page);
        $paginator->setItemCountPerPage($itemsPerPage);
        $paginator->setPageRange($pageRange);

        $listpr = $ProductTable->getList($offset, $itemsPerPage);

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
        $product = new Crowler ();
        $view = new ViewModel ();

        $dbAdapter = $this->getServiceLocator()->get('Zend\Db\Adapter\Adapter');
        $getuser = $this->forward()->dispatch('Admin\Controller\Index', array(
            'action' => 'getuser'
        ));
        $this->layout()->getuser = $getuser;
        if ($getuser && ($getuser->group == 'admin' || $getuser->group == 'supperadmin')) {
            $this->layout('layout/apotravinyadmin');
            $form = new CrowlerForm($dbAdapter);
            //$form->setInputFilter ( new ProductFilter () );
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
                //print_r($data);die;
                $form->setData($data);
                // error rat nguy hiem o day ko vaidate form
                if ($form->isValid()) {
                   // print_r($data);die;
                    if ($data ['img'] ['name'] != '') {

                        // edit anh
                        $_array_img = $data ['img'];
                        // Recyle Bin img older
                        $id = $data ['id'];
                        $getcata = $this->getServiceLocator()->get('ProductTable')->get($id);
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
                        $product = new Product ();
                        $product->dataArraySwap($data, $renname_file_img);
                        $check = $this->getServiceLocator()->get('ProductTable')->save($product);
                        if ($check != 0) {

                            $_url = WEBPATH . '/crowler/index/index';
                            $this->redirect()->toUrl($_url);
                        } else {
                            $view->check = 0;                            
                            return $view;
                        }
                    } else {

                        $id = $data ['id'];
                        $getcata = $this->getServiceLocator()->get('ProductTable')->get($id);
                        if ($getcata) {
                            $get_img_older = $getcata->img;
                        }
                        $product = new Product ();
                        $product->dataArraySwap($form->getData(), $get_img_older);
                        $check = $this->getServiceLocator()->get('ProductTable')->save($product);
                        $_url = WEBPATH . '/crowler/index/index';
                        if ($check == 0) {
                            // notupdate
                            $_url = WEBPATH . '/crowler/index/index';
                            $this->redirect()->toUrl($_url);
                        }
                        if ($check != 0) {
                            $_url = WEBPATH . '/crowler/index/index';
                            $this->redirect()->toRoute('Crowler', array(
                                'controller' => 'index',
                                'action' => 'index',
                                //'id' => $check
                            ));
                        }
                    }
                } else {
                    echo "not valid form";
                }
            }
            $form->setId($catalogarr);
            $product_id = (int) $this->params()->fromRoute('id', 0);
            $catalog_cr = $this->getServiceLocator()->get('ProductTable')->get($product_id);
            
            $form->settagsId($tags);
            $Tags_cr = $this->getServiceLocator()->get('ProductTable')->get($product_id);
            $form->bind($Tags_cr);
            if ($product_id == 0) {
                $form->get('submit')->setAttribute('value', 'Add Product');
            } else {
                $form->get('submit')->setAttribute('value', 'Edit Product');
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
                $_img_thumb10 = $catalog_cr->img0;
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
            $view->setVariable('Crowlerform', $form);
            $view->setVariable('id_product', $product_id);

            return $view;
        } else {
            $view->check = 2;
            $this->layout('error/admin');
        }
    }

    public function statusAction() {
       $view = new ViewModel();
       $this->layout('layout/apotravinyadmin');

        $id = $this->params()->fromRoute('id', 0);
        $status = $this->params()->fromRoute('status', 0);
       if($status =='1'){
           $status_update = '0';
       }  else if($status =='0') {
           $status_update ='1' ;
       }
        
        $ProductTable = $this->getServiceLocator()->get('ProductTable');


        if ($id == 0) {
            return $this->redirect()->toRoute('Crowler', array(
                        'controller' => 'index',
                        'action' => 'index'
            ));
        } else {

            $exchange_data = array(
                'id' => $id,
                'status' => $status_update
            );

//           print_r($exchange_data);die;
            $ProductTable_data = new Product ();
            $ProductTable_data->exchangeArray($exchange_data);
           
            $checkupdate = $ProductTable->savestatus($ProductTable_data);

           // print_r($checkupdate);die;
            $view->id = $id;
            $view->check = $checkupdate;
            return $view;
        }
       
    }

    public function deleteAction() {
        $product_id = (int) $this->params()->fromRoute('id', 0);
        if ($product_id == 0) {
            return $this->redirect()->toRoute('Crowler');
        }

        $view = new ViewModel ();
        $utility = new Utility ();
        $this->layout('layout/apotravinyadmin');
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
                    $getcata = $this->getServiceLocator()->get('ProductTable')->get($id);
                    if ($getcata) {
                        $get_img_older = $getcata->img;
                        $_dir = UPLOAD_PATH_IMG;
                        if ($get_img_older) {
                            $utility->deleteImage($get_img_older, $_dir);
                        }
                    }

                    $view->check = $this->getServiceLocator()->get('ProductTable')->delete($product_id);
                    return $view;
                } else {
                    $view->check = 0;
                    return $view;
                }
            }
        }

        $view->setVariable('id', $product_id);
        $view->setVariable('product', $this->getServiceLocator()->get('ProductTable')->get($product_id));

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
