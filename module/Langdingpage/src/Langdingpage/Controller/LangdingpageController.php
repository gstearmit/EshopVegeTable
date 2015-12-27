<?php

namespace Langdingpage\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Paginator\Paginator,
    Zend\Paginator\Adapter\Null as PageNull;
use Zend\Session\Container;
use Langdingpage\Model\Langdingpage;
use Langdingpage\Model\LangdingpageTable;
use Langdingpage\Form\LangdingpageForm;
use Langdingpage\Form\LangdingpageFilter;
// Header
use Zend\Http\Request;
use Zend\Http\Response;
use Zend\Http\Header\Cookie;
use Zend\Http\Header\SetCookie;

class LangdingpageController extends AbstractActionController {

    public $_fileName;
    protected $UserTable;

    public function redirectAction()
    {
    	$ismobile = 0;
    	$container = $_SERVER['HTTP_USER_AGENT'];
    	$useragents = array(
    			'Android',
    			'IEMobile',
    			'iPhone',
    			'iPad',
    	);
    	foreach ($useragents as $useragents) {
    		//echo $useragents;
    		if (strstr($container, $useragents)) {
    			$ismobile = 1;
    		}
    	}
    	if ($ismobile == 1) {
    		//echo '<script>alert("Ban Dang Chay Website Tren Mobile"); </script>';
    		$this->layout('layout/apotravinytheme');
    		$this->getcatalog();
    		$product_hot = $this->getProductAdtTable()->producthot();
    		return array('product_hot' => $product_hot);
    	} else {
    		//echo '<script>alert("Ban Dang Chay Website Tren PC"); </script>';
    		$this->redirect()->toUrl(WEBPATH.'/lazada/index');
    	
    	}
    }
    
    public function indexAction() {
    	//check cookies
    	$request = new Request(); 
    	if(!isset($this->getRequest()->getCookie()->landing))
    	{ 
    		// cookie not exist
    		$cookie = new SetCookie('landing', 'value', time() + 365 * 60 * 60 * 24); // now + 1 year
    		$response = $this->getResponse()->getHeaders();
    		$response->addHeader($cookie);
    	} else {
    		// exist cookie
	    	$ismobile = 0;
	    	$container = $_SERVER['HTTP_USER_AGENT'];
	    	$useragents = array(
	    			'Android',
	    			'IEMobile',
	    			'iPhone',
	    			'iPad',
	    	);
	    	foreach ($useragents as $useragents) {
	    		//echo $useragents;
	    		if (strstr($container, $useragents)) {
	    			$ismobile = 1;
	    		}
	    	}
	    	if ($ismobile == 1) { // Mobile
	    		$this->redirect()->toUrl(WEBPATH.'/apotraviny/index');
	    	} else { // PC + LapTop
	    		$this->redirect()->toUrl(WEBPATH.'/lazada/index'); 
	    	}
    	}
    	
    	

        $getuser = $this->forward()->dispatch('Admin\Controller\Index', array('action' => 'getuser'));
        //if(!$getuser) { // not yet login $this->redirect ()->toRoute ( 'home'); }
        $this->layout()->getuser = $getuser;
        $this->layout('layout/rohliklangdingpage');

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


        return new ViewModel(array(
                ));
    }

    public function addAction() {



        $getuser = $this->forward()->dispatch('Admin\Controller\Index', array('action' => 'getuser'));
        if (!$getuser) {
            // not yet login
            $this->redirect()->toRoute('home');
        }
        $this->layout()->getuser = $getuser;

        $form = new LangdingpageForm ();
        if ($this->getRequest()->isPost()) {

            $data = array_merge_recursive($this->getRequest()->getPost()->toArray(), $this->getRequest()->getFiles()->toArray());
            $form->setData($data);
            if (!$form->isValid()) {
                return new ViewModel(array(
                    'error' => true,
                    'form' => $form
                        ));
            } else {

                $exchange_data = $data;

                $Langdingpage = new Langdingpage();
                $Langdingpage->exchangeArray($exchange_data);
                $this->getServiceLocator()->get('LangdingpageTable')->save($Langdingpage);
                return $this->redirect()->toRoute('Langdingpage', array(
                            'controller' => 'contactp',
                            'action' => 'list'
                        ));
            }
        }

        return new ViewModel(array(
            'form' => $form
                ));
    }

    public function listAction() {
        $this->layout('layout/bags');
        $getuser = $this->forward()->dispatch('Admin\Controller\Index', array('action' => 'getuser'));
        if (!$getuser) {
            // not yet login
            $this->redirect()->toRoute('home');
        }
        $this->layout()->getuser = $getuser;

        $LangdingpageTable = $this->getServiceLocator()->get('LangdingpageTable');
        $allRecord = $LangdingpageTable->countAll();
        $pageNull = new PageNull($allRecord);
        $itemsPerPage = 5;
        $pageRange = 3;
        $page = $this->params()->fromRoute('page', 1);
        $offset = ($page - 1) * $itemsPerPage;
        $paginator = new Paginator($pageNull);
        $paginator->setCurrentPageNumber($page);
        $paginator->setItemCountPerPage($itemsPerPage);
        $paginator->setPageRange($pageRange);

        $listpr = $LangdingpageTable->getList($offset, $itemsPerPage);



        return new ViewModel(array(
            'listNews' => $listpr,
            'paginator' => $paginator,
            'allRecord' => $allRecord,
            'offset' => $offset,
            'itemsPerPage' => $itemsPerPage
                ));
    }

    public function editAction() {
        $getuser = $this->forward()->dispatch('Admin\Controller\Index', array('action' => 'getuser'));
        if (!$getuser) {
            // not yet login
            $this->redirect()->toRoute('home');
        }
        $this->layout()->getuser = $getuser;

        $id = $this->params()->fromRoute('id');



        $LangdingpageTable = $this->getServiceLocator()->get('LangdingpageTable');
        $form = new LangdingpageForm ();
        $form->setInputFilter(new LangdingpageFilter());

        $filter = $form->getInputFilter();



        $newsDetail = $LangdingpageTable->getById($id);


        if ($id == 0) {
            return $this->redirect()->toRoute('Langdingpage', array(
                        'controller' => 'contactp',
                        'action' => 'list'
                    ));
        } else {

            $form->bind($newsDetail);
            if ($this->getRequest()->isPost()) {


                $data = array_merge_recursive($this->getRequest()->getPost()->toArray(), $this->getRequest()->getFiles()->toArray());
                $form->setData($data);



                if (!$form->isValid()) {



                    return new ViewModel(array(
                        'error' => true,
                        'form' => $form,
                        // 'image' => $this->_fileName,
                        'id' => $id
                            ));
                } else {

                    $exchange_data = array();
                    $exchange_data = $data;
// 					        $exchange_data['name'] = $data['name'];
// 					        $exchange_data['email'] = $data['email'];
// 					        $exchange_data['phone'] = $data['phone'];
// 					        $exchange_data['status'] = $data['status'];
                    $exchange_data['id'] = $id;



                    $Langdingpage = new Langdingpage();
                    $Langdingpage->exchangeArray($exchange_data);



                    $LangdingpageTable->save($Langdingpage);


                    return $this->redirect()->toRoute('Langdingpage', array(
                                'controller' => 'contactp',
                                'action' => 'list'
                            ));
                }
            }
            return new ViewModel(array(
                'form' => $form,
                // 'image' => $this->_fileName,
                'id' => $id
                    ));
        }
    }

    public function statusAction() {

        $view = new ViewModel();


        $id = $this->params()->fromRoute('id', 0);
        $status = $this->params()->fromRoute('status', 0);

        $LangdingpageTable = $this->getServiceLocator()->get('LangdingpageTable');


        if ($id == 0) {
            return $this->redirect()->toRoute('Langdingpage', array(
                        'controller' => 'contactp',
                        'action' => 'list'
                    ));
        } else {

            $exchange_data = array();

            $exchange_data['id'] = $id;
            $exchange_data['status'] = $status;


            $Langdingpage = new Langdingpage();
            $Langdingpage->exchangeArray($exchange_data);

            $checkupdate = $LangdingpageTable->savestatus($Langdingpage);


            $view->id = $id;
            $view->check = $checkupdate;
            return $view;
        }
    }

    public function deleteAction() {
        $id = $this->params()->fromRoute('id', 0);
        if ($id != 0) {
            $this->getServiceLocator()->get('LangdingpageTable')->delete($id);
            return $this->redirect()->toRoute('Langdingpage', array(
                        'controller' => 'contactp',
                        'action' => 'list'
                    ));
        }
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

}
