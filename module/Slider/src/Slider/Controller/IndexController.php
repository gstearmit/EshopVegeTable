<?php

namespace Slider\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Slider\Model\Slider;
use Slider\Model\SliderTable;
use Slider\Form\SliderForm;
use Slider\Form\SliderFormFilter;
use Slider\Form\SliderueSearchForm as SearchFromSliderue;
use Zend\Session\Container;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
// form upload
use Zend\Http\PhpEnvironment\Request;
use Main\Model\Utility;
//File Size
use Zend\Validator\File\Size;
use Zend\Validator\File\Extension;
//Paginator
use Zend\Paginator\Paginator,
    Zend\Paginator\Adapter\Null as PageNull;
use Zend\Db\Sql\Select;

class IndexController extends AbstractActionController {

    public function searchAction() {
        $url = 'index';
        $request = $this->getRequest();
        if ($request->isPost()) {
            $formdata = (array) $request->getPost();
            $search_data = array();
            foreach ($formdata as $key => $value) {
                if ($key != 'submit') {
                    if (!empty($value)) {
                        $search_data [$key] = $value;
                    }
                }
            }
            if (!empty($search_data)) {
                $search_by = json_encode($search_data);
                $url .= '/search_by/' . $search_by;
            }
        }
        $this->redirect()->toRoute('Slider', array(
            'action' => 'manacatalogue',
            'id' => null,
            'uenc' => null,
            'page' => null,
            'order_by' => null,
            'search_by' => $search_by,
        ));
    }

    public function indexAction() {        
        $this->layout('layout/bags');
        $getuser = $this->forward()->dispatch('Admin\Controller\Index', array(
            'action' => 'getuser'
        ));

        $this->layout()->getuser = $getuser;
        // notlogin
        if (!$getuser) {
            $this->redirect()->toUrl(WEBPATH);
        }

// 		//search
// 		$searchform = new SearchFromSlider();
// 		$searchform->get ( 'submit' )->setValue ( 'Search' );
// 		$this->layout()->formSearch = $searchform;


        $select = new Select ();
        $order_by = $this->params()->fromRoute('order_by') ? $this->params()->fromRoute('order_by') : 'id';
        $order = $this->params()->fromRoute('order') ? $this->params()->fromRoute('order') : Select::ORDER_DESCENDING;
        $page = $this->params()->fromRoute('page') ? (int) $this->params()->fromRoute('page') : 1;
        $search_by = $this->params()->fromRoute('search_by') ? $this->params()->fromRoute('search_by') : '';
        $select->order($order_by . ' ' . $order);
        $where = new \Zend\Db\Sql\Where ();
        $formdata = array();
        if (!empty($search_by)) {
            $formdata = (array) json_decode($search_by);
            if (!empty($formdata ['descriptionkey'])) {
                $where->addPredicate(new \Zend\Db\Sql\Predicate\Like('descriptionkey', '%' . $formdata ['descriptionkey'] . '%'));
            }
            if (!empty($formdata ['title'])) {
                $where->addPredicate(new \Zend\Db\Sql\Predicate\Like('title', '%' . $formdata ['title'] . '%'));
            }
        }
        if (!empty($where)) {
            $select->where($where);
        }

        $ContactpTable = $this->getSliderTable();
        $allRecord = $ContactpTable->countAll();
        $pageNull = new PageNull($allRecord);
        $itemsPerPage = 20;
        $pageRange = 5;
        $page = $this->params()->fromRoute('page', 1);
        $offset = ($page - 1) * $itemsPerPage;
        $paginator = new Paginator($pageNull);
        $paginator->setCurrentPageNumber($page);
        $paginator->setItemCountPerPage($itemsPerPage);
        $paginator->setPageRange($pageRange);

        $listpr = $ContactpTable->getList($offset, $itemsPerPage);
        $this->layout()->listNews = $listpr;
        $this->layout()->paginator = $paginator;
        $this->layout()->allRecord = $allRecord;
        $this->layout()->offset = $offset;
        $this->layout()->itemsPerPage = $itemsPerPage;

// 			echo "<pre>";
// 			print_r($itemsPerPage);
// 			echo "</pre>";
// 	die;



        $all_catalogue = $this->getSliderTable()->fetchAll();

        $this->layout()->catalogue = $all_catalogue;
    }

    public function catalogitemscompareAction() {
        // so sang 2 san pham luon
        $this->layout('layout/ctalogprinter');
        $getuser = $this->forward()->dispatch('Admin\Controller\Index', array(
            'action' => 'getuser'
        ));
        // var_dump($getuser);
        $this->layout()->getuser = $getuser;

        $items = $this->params()->fromRoute('items');
        $uenc = $this->params()->fromRoute('uenc');

        echo "items :";
        var_dump($items);
        echo "</br>";
        echo "uenc :";
        var_dump($uenc);
    }

    public function productcompareclearallAction() {
        // xoa het session "product_compare" voi uenc duoc truyen vao
        $this->layout('layout/bags');
        $getuser = $this->forward()->dispatch('Admin\Controller\Index', array(
            'action' => 'getuser'
        ));
        // var_dump($getuser);
        $this->layout()->getuser = $getuser;

        $id = $this->params()->fromRoute('id');
        $uenc = $this->params()->fromRoute('uenc');

        echo "id :";
        var_dump($id);
        echo "</br>";
        echo "uenc :";
        var_dump($uenc);
    }

    public function productcompareremoveAction() {
        // xoa mot phan tu session "product_compare" voi id va uenc duoc truyen vao
        $this->layout('layout/bags');
        $getuser = $this->forward()->dispatch('Admin\Controller\Index', array(
            'action' => 'getuser'
        ));
        // var_dump($getuser);
        $this->layout()->getuser = $getuser;

        $id = $this->params()->fromRoute('id');
        $uenc = $this->params()->fromRoute('uenc');

        echo "id :";
        var_dump($id);
        echo "</br>";
        echo "uenc :";
        var_dump($uenc);
    }

    public function productcompareaddAction() {
        // check xem sessoin uenc khoa do da duoc tao chua
        // neu chua khoi tao
        // neu roi add them 1 phan tu vao sesion voi id va uenc da duoc tao
        $this->layout('layout/bags');
        $getuser = $this->forward()->dispatch('Admin\Controller\Index', array(
            'action' => 'getuser'
        ));
        // var_dump($getuser);
        $this->layout()->getuser = $getuser;

        $id = $this->params()->fromRoute('id');
        $uenc = $this->params()->fromRoute('uenc');

        echo "id :";
        var_dump($id);
        echo "</br>";
        echo "uenc :";
        var_dump($uenc);
    }

    public function viewAction() {
        // check xem sessoin uenc khoa do da duoc tao chua
        // neu chua khoi tao
        // neu roi add them 1 phan tu vao sesion voi id va uenc da duoc tao
        $this->layout('layout/bags');
        $getuser = $this->forward()->dispatch('Admin\Controller\Index', array(
            'action' => 'getuser'
        ));
        // var_dump($getuser);
        $this->layout()->getuser = $getuser;

        $id = $this->params()->fromRoute('id');
        $uenc = $this->params()->fromRoute('uenc');

        echo "id :";
        var_dump($id);
        echo "</br>";
        echo "uenc :";
        var_dump($uenc);
        die("view is update");
    }

    public function addAction() {
        $utility = new Utility ();
        $Slider = new Slider ();
        $view = new ViewModel ();

        $dbAdapter = $this->getServiceLocator()->get('Zend\Db\Adapter\Adapter');
        $getuser = $this->forward()->dispatch('Admin\Controller\Index', array(
            'action' => 'getuser'
        ));
        $this->layout()->getuser = $getuser;
        if ($getuser && ($getuser->group == 'admin' || $getuser->group == 'supperadmin')) {
            $this->layout('layout/bags');
            $form = new SliderForm($dbAdapter);
            $form->setInputFilter(new SliderFormFilter());
            $Sliderarr = $this->getdataAction();

            $form->setId($Sliderarr);

            $request = $this->getRequest();
            if ($request->isPost()) {
                $form->setInputFilter($Slider->getInputFilter()); // check validate
                $data = array_merge_recursive($request->getPost()->toArray(), $request->getFiles()->toArray());

                $form->setData($data);
                if ($form->isValid()) {
                    if ($data ['img'] ['name'] != '') {
                        // edit anh
                        $_array_img = $data ['img'];
                        // Recyle Bin img older
                        $id = $data ['id'];
                        $getcata = $this->getSliderTable()->getSlider($id);
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
                        $Slider = new Slider ();
                        $Slider->dataArraySwap($data, $renname_file_img);
                        $check = $this->getSliderTable()->saveSlider($Slider);
                        if ($check != 0) {

                            $_url = WEBPATH . '/catalog/manacatalogue';
                            $this->redirect()->toUrl($_url);
                        } else {
                            $view->check = 0;
                            ;
                            return $view;
                        }
                    } else {
                        // echo "add duoc roi ";die;
                        $id = $data ['id'];
                        $getcata = $this->getSliderTable()->getSlider($id);
                        if ($getcata) {
                            $get_img_older = $getcata->img;
                        }
                        $Slider = new Slider ();
                        $Slider->dataArraySwap($form->getData(), $get_img_older);
                        $check = $this->getSliderTable()->saveSlider($Slider);
                        $_url = WEBPATH . '/catalog/add/' . $id;
                        if ($check == 0) {
                            // notupdate
                            $_url = WEBPATH . '/catalog/manacatalogue';
                            $this->redirect()->toUrl($_url);
                        }
                        if ($check != 0) {
                            $_url = WEBPATH . '/catalog/manacatalogue';
                            $this->redirect()->toRoute('Slider', array(
                                'action' => 'add',
                                'id' => $check
                            ));
                        }
                    }
                }
            }
            $form->setId($Sliderarr);
            $Slider_id = (int) $this->params()->fromRoute('id', 0);
            $Slider_cr = $this->getSliderTable()->getSlider($Slider_id);

            if ($Slider_id == 0) {
                $form->get('submit')->setAttribute('value', 'Add Sliderue');
            } else
                $form->get('submit')->setAttribute('value', 'Edit Sliderue');

            if ($Slider_cr and $Slider_id != 0) {
                $form->bind($Slider_cr);
                $_img_thumb = $Slider_cr->img;
            }

            $view->setVariable('img_thumb', $_img_thumb);

            $view->setVariable('catalogform', $form);
            $view->setVariable('id_cata', $Slider_id);

            return $view;
        } else {
            $view->check = 2;
            $this->layout('error/admin');
        }
    }

    public function editAction() {
        $utility = new Utility ();
        $Slider = new Slider ();
        $view = new ViewModel ();
        $id = (int) $this->params()->fromRoute('id', 0);
        $getcata = $this->getSliderTable()->getSlider($id);

        $dbAdapter = $this->getServiceLocator()->get('Zend\Db\Adapter\Adapter');
        $getuser = $this->forward()->dispatch('Admin\Controller\Index', array(
            'action' => 'getuser'
        ));
        $this->layout()->getuser = $getuser;
        if ($getuser && ($getuser->group == 'admin' || $getuser->group == 'supperadmin')) {
            $this->layout('layout/bags');
            $form = new SliderForm($dbAdapter);
            $form->setInputFilter(new SliderFormFilter());
            $Sliderarr = $this->getdataAction();
            $form->setId($Sliderarr);

            $request = $this->getRequest();
            if ($request->isPost()) {
                $form->setInputFilter($Slider->getInputFilter()); // check validate
                $data = array_merge_recursive($request->getPost()->toArray(), $request->getFiles()->toArray());
               // print_r($data); //die;
                $form->setData($data);
                if ($form->isValid()) {
                    if ($data ['img'] ['name'] != '') {
                        // edit anh
                        $_array_img = $data ['img'];
                        // Recyle Bin img older
                       
                        $get_img_older = $getcata->img;
                        $_dir = UPLOAD_PATH_IMG;
                        if ($get_img_older) {
                           $dir = ROOT_PATH.'/public/imgslideshow';
            	           $utility->deleteSlideshow($get_img_older, $dir);
            	           // delete img older thumb_slideshow
            	           $dir_thumb = ROOT_PATH.'/public/imgslideshow/thumb_slideshow';
            	           $utility->deleteSlideshow($get_img_older, $dir_thumb);
            	           // delete img older thumb_slideshow2
            	           $dir_thumb_2 = ROOT_PATH.'/public/imgslideshow/thumb_slideshow2';
            	           $utility->deleteSlideshow($get_img_older, $dir_thumb_2);
                        }

                        // upload and rename
                        $renname_file_img = $utility->uploadImageSlideshow($_array_img);
                        if (!$renname_file_img) {
                            $view->check = 0;
                            return $view;
                        }
                        
                        
                        $Slider = new Slider ();
                        $Slider->dataArraySwap($data, $renname_file_img);
                        $check = $this->getSliderTable()->saveSlider($Slider);

                        $view->check = $check;
                        return $view;
                    } else {
                        $id = $data ['id'];
                        $getcata = $this->getSliderTable()->getSlider($id);
                        if ($getcata) {
                            $get_img_older = $getcata->img;
                        }
                        $Slider = new Slider ();
                        $Slider->dataArraySwap($form->getData(), $get_img_older);

                        $check = $this->getSliderTable()->saveSlider($Slider);
                        $_url = WEBPATH . '/catalog/edit/' . $id;
                        if ($check == 0) {
                            $this->redirect()->toUrl($_url);
                        }
                        // $view->check = $check;
                        // return $view;
                    }
                } else {
                  $messages = $form->getMessages();
                  }
            }
            $form->setId($Sliderarr);
            $Slider_id = (int) $this->params()->fromRoute('id', 0);
            $Slider_cr = $this->getSliderTable()->getSlider($Slider_id);
            if ($Slider_cr) {
                $form->bind($Slider_cr);
                $_img_thumb = $Slider_cr->img;
            }

            $view->setVariable('img_thumb', $_img_thumb);
            //$form->get ( 'submit' )->setAttribute ( 'value', 'Edit Slider' );

            if ($Slider_id == 0) {
                $form->get('submit')->setAttribute('value', 'Add Slider');
            } else {
                $form->get('submit')->setAttribute('value', 'Edit Slider');
                $view->setVariable('error', 1);
            }

            $view->setVariable('Sliderform', $form);
            return $view;
        } else {
            $view->check = 2;
            $this->layout('error/admin');
        }
    }

    public function getdataAction() {
        $Sliders = $this->getSliderTable()->fetchAll();
        $data = array();
        $idtmp = array();
        foreach ($Sliders as $upload) :
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
        $k = 0;
        $v = '';
        for ($i = 0; $i <= sizeof($data); $i ++) {
            $result [$k] = $v;
            $k = $idtmp [$i];
            $v = $data [$i];
        }
        return $result;
    }

    public function getbygroupAction() {
        $Sliders = $this->getSliderTable()->fetchAll();
        $data = array();
        $idtmp = array();
        foreach ($Sliders as $upload) :
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
        for ($i = 0; $i < sizeof($data); $i ++) {
            $k = $idtmp [$i];
            $v = $data [$i];
            $result [$i] = array(
                'id' => $k,
                'catalog' => $v
            );
        }
        return $result;
    }

    public function getallAction() {
        $res = $this->getSliderTable()->fetchAll();
        $result = array();
        foreach ($res as $re) :
            $i = $re->id;
            $result [$i] = $re;
        endforeach
        ;
        return $result;
    }

    public function deleteAction() {
        $Slider_id = (int) $this->params()->fromRoute('id', 0);
        if ($Slider_id == 0) {
            return $this->redirect()->toRoute('Slider');
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
                    $getcata = $this->getSliderTable()->getSlider($id);
                    if ($getcata) {
                        $get_img_older = $getcata->img;
                        $_dir = UPLOAD_PATH_IMG;
                        if ($get_img_older) {
                            $utility->deleteImage($get_img_older, $_dir);
                        }
                    }

                    $view->check = $this->getSliderTable()->delete($Slider_id);
                    return $view;
                } else {
                    $view->check = 0;
                    return $view;
                }
            }
        }

        $view->setVariable('id', $Slider_id);
        $view->setVariable('tags', $this->getSliderTable()->getSlider($Slider_id));

        return $view;
    }

    public function statusAction() {
        $status_id = (int) $this->params()->fromRoute('id', 0);
        $status = (int) $this->params()->fromRoute('status', 0);
        if ($status == 1) {
            $data = array('id' => $status_id, 'status' => '0');
        } else {
            $data = array('id' => $status_id, 'status' => '1');
        }
        //print_r($data);
        $TagModel = new Slider();
        $TagModel->exchangeArray($data);
        $this->getSliderTable()->changeStatus($TagModel);
        $this->redirect()->toRoute('Slider');
//           die;
//		if ($status_id == 0) {
//			return $this->redirect ()->toRoute ( 'Slider' );
//		}
    }

    //------------------------------------------------ ADMIN MASTEZIALISE------------------------------------------------------
   
    public function masterindexAction() {        
        $this->layout('layout/apotravinyadmin');
        $getuser = $this->forward()->dispatch('Admin\Controller\Index', array(
            'action' => 'getuser'
        ));

        $this->layout()->getuser = $getuser;
        // notlogin
        if (!$getuser) {
            $this->redirect()->toUrl(WEBPATH);
        }

// 		//search
// 		$searchform = new SearchFromSlider();
// 		$searchform->get ( 'submit' )->setValue ( 'Search' );
// 		$this->layout()->formSearch = $searchform;


        $select = new Select ();
        $order_by = $this->params()->fromRoute('order_by') ? $this->params()->fromRoute('order_by') : 'id';
        $order = $this->params()->fromRoute('order') ? $this->params()->fromRoute('order') : Select::ORDER_DESCENDING;
        $page = $this->params()->fromRoute('page') ? (int) $this->params()->fromRoute('page') : 1;
        $search_by = $this->params()->fromRoute('search_by') ? $this->params()->fromRoute('search_by') : '';
        $select->order($order_by . ' ' . $order);
        $where = new \Zend\Db\Sql\Where ();
        $formdata = array();
        if (!empty($search_by)) {
            $formdata = (array) json_decode($search_by);
            if (!empty($formdata ['descriptionkey'])) {
                $where->addPredicate(new \Zend\Db\Sql\Predicate\Like('descriptionkey', '%' . $formdata ['descriptionkey'] . '%'));
            }
            if (!empty($formdata ['title'])) {
                $where->addPredicate(new \Zend\Db\Sql\Predicate\Like('title', '%' . $formdata ['title'] . '%'));
            }
        }
        if (!empty($where)) {
            $select->where($where);
        }

        $ContactpTable = $this->getSliderTable();
        $allRecord = $ContactpTable->countAll();
        $pageNull = new PageNull($allRecord);
        $itemsPerPage = 20;
        $pageRange = 5;
        $page = $this->params()->fromRoute('page', 1);
        $offset = ($page - 1) * $itemsPerPage;
        $paginator = new Paginator($pageNull);
        $paginator->setCurrentPageNumber($page);
        $paginator->setItemCountPerPage($itemsPerPage);
        $paginator->setPageRange($pageRange);

        $listpr = $ContactpTable->getList($offset, $itemsPerPage);
        $this->layout()->listNews = $listpr;
        $this->layout()->paginator = $paginator;
        $this->layout()->allRecord = $allRecord;
        $this->layout()->offset = $offset;
        $this->layout()->itemsPerPage = $itemsPerPage;
        $all_catalogue = $this->getSliderTable()->fetchAll();

        $this->layout()->catalogue = $all_catalogue;
    }
    
    public function masteraddAction() {
        $utility = new Utility ();
        $Slider = new Slider ();
        $view = new ViewModel ();

        $dbAdapter = $this->getServiceLocator()->get('Zend\Db\Adapter\Adapter');
        $getuser = $this->forward()->dispatch('Admin\Controller\Index', array(
            'action' => 'getuser'
        ));
        $this->layout()->getuser = $getuser;
        if ($getuser && ($getuser->group == 'admin' || $getuser->group == 'supperadmin')) {
            $this->layout('layout/apotravinyadmin');
            $form = new SliderForm($dbAdapter);
            $form->setInputFilter(new SliderFormFilter());
            $Sliderarr = $this->getdataAction();

            $form->setId($Sliderarr);

            $request = $this->getRequest();
            if ($request->isPost()) {
                $form->setInputFilter($Slider->getInputFilter()); // check validate
                $data = array_merge_recursive($request->getPost()->toArray(), $request->getFiles()->toArray());
                //print_r($data);die;
                $form->setData($data);
                if ($form->isValid()) {
                    if ($data ['img'] ['name'] != '') {
                        // edit anh
                        $_array_img = $data ['img'];
                        // Recyle Bin img older
                        $id = $data ['id'];
                        $getcata = $this->getSliderTable()->getSlider($id);
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
                        $Slider = new Slider ();
                        $Slider->dataArraySwap($data, $renname_file_img);
                        $check = $this->getSliderTable()->saveSlider($Slider);
                        if ($check != 0) {

                            $_url = WEBPATH . '/tags/masterindex';
                            $this->redirect()->toUrl($_url);
                        } else {
                            $view->check = 0;                            
                            return $view;
                        }
                    } else {
                        // echo "add duoc roi ";die;
                        $id = $data ['id'];
                        $getcata = $this->getSliderTable()->getSlider($id);
                        if ($getcata) {
                            $get_img_older = $getcata->img;
                        }
                        $Slider = new Slider ();
                        $Slider->dataArraySwap($form->getData(), $get_img_older);
                        $check = $this->getSliderTable()->saveSlider($Slider);                       
                        $_url = WEBPATH . '/tags/masteradd' . $id;
                        if ($check == 0) {
                            // notupdate
                            $_url = WEBPATH . '/tags/masterindex';
                            $this->redirect()->toUrl($_url);
                        }
                        if ($check != 0) {
                            $_url = WEBPATH . '/tags/masterindex';
                            
//                            //code Gốc
//                            $this->redirect()->toRoute('Slider', array(
//                                'action' => 'masteradd',
//                                'id' => $check
//                            ));
                        }
                    }
                }
            }
            $form->setId($Sliderarr);
            $Slider_id = (int) $this->params()->fromRoute('id', 0);
            $Slider_cr = $this->getSliderTable()->getSlider($Slider_id);

            if ($Slider_id == 0) {
                $form->get('submit')->setAttribute('value', 'Add Sliderue');
            } else
                $form->get('submit')->setAttribute('value', 'Edit Sliderue');

            if ($Slider_cr and $Slider_id != 0) {
                $form->bind($Slider_cr);
                $_img_thumb = $Slider_cr->img;
            }

            $view->setVariable('img_thumb', $_img_thumb);

            $view->setVariable('catalogform', $form);
            $view->setVariable('id_cata', $Slider_id);

            return $view;
        } else {
            $view->check = 2;
            $this->layout('error/admin');
        }
    }
     public function mastereditAction() {
        $utility = new Utility ();
        $Slider = new Slider ();
        $view = new ViewModel ();

        $dbAdapter = $this->getServiceLocator()->get('Zend\Db\Adapter\Adapter');
        $getuser = $this->forward()->dispatch('Admin\Controller\Index', array(
            'action' => 'getuser'
        ));
        $this->layout()->getuser = $getuser;
        if ($getuser && ($getuser->group == 'admin' || $getuser->group == 'supperadmin')) {
            $this->layout('layout/apotravinyadmin');
             
            
            
            $form = new SliderForm($dbAdapter);
            $form->setInputFilter(new SliderFormFilter());
            $Sliderarr = $this->getdataAction();            
            $form->setId($Sliderarr);
            
            
            
            
            $request = $this->getRequest();
            if ($request->isPost()) {
                $form->setInputFilter($Slider->getInputFilter()); // check validate
                $data = array_merge_recursive($request->getPost()->toArray(), $request->getFiles()->toArray());
                //print_r($data);die;
                 
                $form->setData($data);
                if ($form->isValid()) {
                    if ($data ['img'] ['name'] != '') {
                        // edit anh
                        $_array_img = $data ['img'];
                        // Recyle Bin img older
                        $id = $data ['id'];
                        $getcata = $this->getSliderTable()->getSlider($id);
                        $get_img_older = $getcata->img;
                        $_dir = UPLOAD_PATH_IMG;
                        if ($get_img_older) {
                            $utility->deleteImage($get_img_older, $_dir);
                        }

                        // upload and rename
                        $renname_file_img = $utility->uploadImageAlatca($_array_img);
                        if (!$renname_file_img) {
                            $view->check = 0;
                            return $view;
                        }
                        $Slider = new Slider ();
                        $Slider->dataArraySwap($data, $renname_file_img);
                        $check = $this->getSliderTable()->saveSlider($Slider);

                        $view->check = $check;
                        return $view;
                    } else {
                        $id = $data ['id'];
                        $getcata = $this->getSliderTable()->getSlider($id);
                        if ($getcata) {
                            $get_img_older = $getcata->img;
                        }
                        $Slider = new Slider ();
                        $Slider->dataArraySwap($form->getData(), $get_img_older);

                        $check = $this->getSliderTable()->saveSlider($Slider);
                        $_url = WEBPATH . '/catalog/edit/' . $id;
                        if ($check == 0) {
                            $this->redirect()->toUrl($_url);
                        }
                        // $view->check = $check;
                        // return $view;
                    }
                }
            }
            $form->setId($Sliderarr);
            $Slider_id = (int) $this->params()->fromRoute('id', 0);
            $Slider_cr = $this->getSliderTable()->getSlider($Slider_id);
            if ($Slider_cr) {
                $form->bind($Slider_cr);
                $_img_thumb = $Slider_cr->img;
            }

            $view->setVariable('img_thumb', $_img_thumb);
            //$form->get ( 'submit' )->setAttribute ( 'value', 'Edit Slider' );

            if ($Slider_id == 0) {
                $form->get('submit')->setAttribute('value', 'Add Slider');
            } else {
                $form->get('submit')->setAttribute('value', 'Edit Slider');
                $view->setVariable('error', 1);
            }
            
            // Get Data in Radio Form Html-----------------
            $id_tags=  $this->params()->fromRoute('id');
            $get_tags = $this->getSliderTable()->getSlider($id_tags);             
            $view->setVariable('get_tags', $get_tags);
            /// End Get Data in Radio Form Html
            
            $view->setVariable('catalogform', $form);
           
            
            return $view;
        } else {
            $view->check = 2;
            $this->layout('error/admin');
        }
        
       
    }
    public function masterstatusAction() {
        $status_id = (int) $this->params()->fromRoute('id', 0);
        $status = (int) $this->params()->fromRoute('status', 0);
        if ($status == 1) {
            $data = array('id' => $status_id, 'status' => '0');
        } else {
            $data = array('id' => $status_id, 'status' => '1');
        }
        //print_r($data);
        $TagModel = new Slider();
        $TagModel->exchangeArray($data);
        $this->getSliderTable()->changeStatus($TagModel);
        $this->redirect()->toUrl(WEBPATH.'/tags/masterindex');
//           die;
//		if ($status_id == 0) {
//			return $this->redirect ()->toRoute ( 'Slider' );
//		}
    }
    public function masterdeleteAction() {
        $Slider_id = (int) $this->params()->fromRoute('id', 0);
        if ($Slider_id == 0) {
            return $this->redirect()->toRoute('Slider');
        }

        $view = new ViewModel ();
        $utility = new Utility ();
        $this->layout('layout/apotravinyadmin');
        $getuser = $this->forward()->dispatch('Admin\Controller\Index', array(
            'action' => 'getuser'
        ));
       $this->layout()->getuser = $getuser;
       //$id = (int) $request->getPost()->get('id');
                if ($Slider_id != 0) {
                    $getcata = $this->getSliderTable()->getSlider($Slider_id);
                    if ($getcata) {
                        $get_img_older = $getcata->img;
                        $_dir = UPLOAD_PATH_IMG;
                        if ($get_img_older) {
                            $utility->deleteImage($get_img_older, $_dir);
                        }
                    }

                  $this->getSliderTable()->delete($Slider_id);
                  $this->redirect()->toUrl(WEBPATH.'/tags/masterindex');
                }
//
//        $request = $this->getRequest();
//        if ($request->isPost()) {
//            $del = $request->getPost()->get('del', 'No');
//            if ($del == 'Yes') {
//                $id = (int) $request->getPost()->get('id');
//
//                if ($id != 0) {
//                    $getcata = $this->getSliderTable()->getSlider($id);
//                    if ($getcata) {
//                        $get_img_older = $getcata->img;
//                        $_dir = UPLOAD_PATH_IMG;
//                        if ($get_img_older) {
//                            $utility->deleteImage($get_img_older, $_dir);
//                        }
//                    }
//
//                    $view->check = $this->getSliderTable()->delete($Slider_id);
//                    return $view;
//                } else {
//                    $view->check = 0;
//                    return $view;
//                }
//            }
//        }
//
//        $view->setVariable('id', $Slider_id);
//        $view->setVariable('tags', $this->getSliderTable()->getSlider($Slider_id));
//
//        return $view;
    }
    public function getSliderTable() {
        if (!$this->SliderTable) {
            $sm = $this->getServiceLocator();
            $this->SliderTable = $sm->get('Slider\Model\SliderTable');
        }
        return $this->SliderTable;
    }

    protected $SliderTable;

}

?>