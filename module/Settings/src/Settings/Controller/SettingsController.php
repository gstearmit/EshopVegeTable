<?php

namespace Settings\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Paginator\Paginator, Zend\Paginator\Adapter\Null as PageNull;
use Zend\Session\Container;
use Settings\Model\Settings;
use Settings\Model\SettingsTable;
use Settings\Form\SettingsForm;
use Settings\Form\SettingsFilter;

class SettingsController extends AbstractActionController {
	public $_fileName;
	protected $UserTable;
	
	public function indexAction() {
		$this->layout ( 'layout/apotravinyadmin' );
		$getuser = $this->forward ()->dispatch ( 'Admin\Controller\Index', array (
				'action' => 'getuser' 
		) );
		if (! $getuser) {
			// not yet login
			$this->redirect ()->toRoute ( 'home' );
		}
		$this->layout ()->getuser = $getuser;
		
		$setting = $this->getServiceLocator ()->get ( 'SettingsTable' )->fetchAll ();
                
                if($this->request->isPost()){                   
                    $id=  addslashes(trim($this->params()->fromPost('id')));
                    $name=  addslashes(trim($this->params()->fromPost('name')));
                    $seo_keywords=  addslashes(trim($this->params()->fromPost('seo_keywords')));
                    $seo_description=  addslashes(trim($this->params()->fromPost('seo_description')));
                    $title=  addslashes(trim($this->params()->fromPost('title')));
                    $address=  addslashes(trim($this->params()->fromPost('address')));
                    $phone=  addslashes(trim($this->params()->fromPost('phone')));
                    $yahoo=  addslashes(trim($this->params()->fromPost('yahoo')));
                    $skype=  addslashes(trim($this->params()->fromPost('skype')));
                    $mobile=  addslashes(trim($this->params()->fromPost('mobile')));
                    $fax=  addslashes(trim($this->params()->fromPost('fax')));
                    $email=  addslashes(trim($this->params()->fromPost('email')));
                   // $url=  addslashes(trim($this->params()->fromPost('url')));
                    $linkweb=  addslashes(trim($this->params()->fromPost('linkweb')));
                    $keyword=  addslashes(trim($this->params()->fromPost('keyword')));
                    $description=  addslashes(trim($this->params()->fromPost('description')));
                    $about=  addslashes(trim($this->params()->fromPost('about')));
                    $introduction=  addslashes(trim($this->params()->fromPost('introduction')));
                    $sologen=  addslashes(trim($this->params()->fromPost('sologen')));
                    $printerest=  addslashes(trim($this->params()->fromPost('printerest')));
                    $facebook=  addslashes(trim($this->params()->fromPost('facebook')));
                    $facebook_text=  addslashes(trim($this->params()->fromPost('facebook_text')));
                    $tweets=  addslashes(trim($this->params()->fromPost('tweets')));
                    $tweets_text=  addslashes(trim($this->params()->fromPost('tweets_text')));
                    $github=  addslashes(trim($this->params()->fromPost('github')));
                    $google=  addslashes(trim($this->params()->fromPost('google')));
                    $feed=  addslashes(trim($this->params()->fromPost('feed')));
                    $youtube_acount=  addslashes(trim($this->params()->fromPost('youtube_acount')));
                    
                    $data_get_setting = $setting[0];
                    $forder_upload = UPLOAD_PATH_IMG.'/logo';
                    $tmplogo = $_FILES["logo1"]["tmp_name"];
                    $file_logo = $_FILES["logo1"]["name"];
                    if($file_logo !=null){                    
                     $url_del = str_replace("\\", "/", $forder_upload . '/'.$data_get_setting->logo1);                      
                     unlink($url_del);                    
                    $ext = substr(strrchr($file_logo, '.'), 1);                    
                    $fileupload=  md5($file_logo).'.'.$ext;      
                    move_uploaded_file($tmplogo, "$forder_upload/$fileupload");
                    }else{
                      $fileupload=$data_get_setting->logo1;  
                    }
                    
                    //--------------------------
                    
                     $tmp_logo_footer = $_FILES["logo_footer"]["tmp_name"];
                    $file_logo_footer = $_FILES["logo_footer"]["name"];
                    if($file_logo_footer !=null){                   
                     $url_del_fav = str_replace("\\", "/", $forder_upload . '/'.$data_get_setting->logo_footer);                      
                    unlink($url_del_fav);                    
                    $ext = substr(strrchr($file_logo_footer, '.'), 1);                    
                    $fileupload_logo_footer=  $file_logo_footer;    
                    move_uploaded_file($tmp_logo_footer, "$forder_upload/$fileupload_logo_footer");
                    }else{
                      $fileupload_logo_footer=$data_get_setting->logo_footer;  
                    }
                   //--------------------------
                    
                     $tmp_fav = $_FILES["ico"]["tmp_name"];
                    $file_fav = $_FILES["ico"]["name"];
                    if($file_fav !=null){                   
                     $url_del_fav = str_replace("\\", "/", $forder_upload . '/'.$data_get_setting->ico);                      
                    unlink($url_del_fav);                    
                    $ext = substr(strrchr($file_fav, '.'), 1);                    
                    $fileupload_fav=  $file_fav;      
                    move_uploaded_file($tmp_fav, "$forder_upload/$fileupload_fav");
                    }else{
                      $fileupload_fav=$data_get_setting->ico;  
                    }
                    $data=array(
                        'id'=>$id,
                        'name'=>$name,
                        'seo_keywords'=>$seo_keywords,
                        'seo_description'=>$seo_description,
                        'title'=>$title,
                        'address'=>$address,
                        'phone'=>$phone,
                        'yahoo'=>$yahoo,
                        'skype'=>$skype,
                        'mobile'=>$mobile,
                        'fax'=>$fax,
                        //'url'=>$url,
                        'logo1'=>$fileupload,
                        'ico'=>$fileupload_fav,
                        'logo_footer'=>$fileupload_logo_footer,
                        'email'=>$email,
                        'linkweb'=>$linkweb,
                        'keyword'=>$keyword,
                        'description'=>$description,
                        'about'=>  stripslashes($about),
                        'introduction'=>$introduction,
                        'sologen'=>$sologen,
                        'printerest'=>$printerest,
                        'facebook'=>$facebook,
                        'facebook_text'=>stripslashes($facebook_text),
                        'tweets'=>$tweets,
                        'tweets_text'=>stripslashes($tweets_text),
                        'github'=>$github,
                        'google'=>$google,
                        'feed'=>$feed,
                        'youtube_acount'=>$youtube_acount,
                    );
                   // print_r($data);die;
                    $data_setting = new Settings();
                    $data_setting->exchangeArray($data);
                    //$this->getSettingTable()->save($data_setting);
                    $this->getServiceLocator ()->get ( 'SettingsTable' )->save($data_setting);
                }
                
		return new ViewModel ( 
				array (
                   'settings'=>$setting,
				)
		 );
	}
	public function addAction() {
		$this->layout ( 'layout/apotravinyadmin' );
		$getuser = $this->forward ()->dispatch ( 'Admin\Controller\Index', array (
				'action' => 'getuser' 
		) );
		if (! $getuser) {
			// not yet login
			$this->redirect ()->toRoute ( 'home' );
		}
		$this->layout ()->getuser = $getuser;
		
		$form = new SettingsForm ();
		if ($this->getRequest ()->isPost ()) {
			
			$data = array_merge_recursive ( $this->getRequest ()->getPost ()->toArray (), $this->getRequest ()->getFiles ()->toArray () );
			$form->setData ( $data );
			if (! $form->isValid ()) {
				return new ViewModel ( array (
						'error' => true,
						'form' => $form 
				) );
			} else {
				
				$exchange_data = $data;
				
				$Settings = new Settings ();
				$Settings->exchangeArray ( $exchange_data );
				$this->getServiceLocator ()->get ( 'SettingsTable' )->save ( $Settings );
				return $this->redirect ()->toRoute ( 'Settings', array (
						'controller' => 'settings',
						'action' => 'list' 
				) );
			}
		}
		
		return new ViewModel ( array (
				'form' => $form 
		) );
	}
	public function listAction() {
		$this->layout ( 'layout/apotravinyadmin' );
		$getuser = $this->forward ()->dispatch ( 'Admin\Controller\Index', array (
				'action' => 'getuser' 
		) );
		if (! $getuser) {
			// not yet login
			$this->redirect ()->toRoute ( 'home' );
		}
		$this->layout ()->getuser = $getuser;
		
		$SettingsTable = $this->getServiceLocator ()->get ( 'SettingsTable' );
		$allRecord = $SettingsTable->countAll ();
		$pageNull = new PageNull ( $allRecord );
		$itemsPerPage = 20;
		$pageRange = 5;
		$page = $this->params ()->fromRoute ( 'page', 1 );
		$offset = ($page - 1) * $itemsPerPage;
		$paginator = new Paginator ( $pageNull );
		$paginator->setCurrentPageNumber ( $page );
		$paginator->setItemCountPerPage ( $itemsPerPage );
		$paginator->setPageRange ( $pageRange );
		
		$listpr = $SettingsTable->getList ( $offset, $itemsPerPage );
		
		return new ViewModel ( array (
				'listNews' => $listpr,
				'paginator' => $paginator,
				'allRecord' => $allRecord,
				'offset' => $offset,
				'itemsPerPage' => $itemsPerPage 
		) );
	}
	public function editAction() {
		$this->layout ( 'layout/apotravinyadmin' );
		$getuser = $this->forward ()->dispatch ( 'Admin\Controller\Index', array (
				'action' => 'getuser' 
		) );
		if (! $getuser) {
			// not yet login
			$this->redirect ()->toRoute ( 'home' );
		}
		$this->layout ()->getuser = $getuser;
		
		$id = $this->params ()->fromRoute ( 'id' );
		
		$SettingsTable = $this->getServiceLocator ()->get ( 'SettingsTable' );
		$form = new SettingsForm ();
		$form->setInputFilter ( new SettingsFilter () );
		
		$filter = $form->getInputFilter ();
		
		$newsDetail = $SettingsTable->getById ( $id );
		
		if ($id == 0) {
			return $this->redirect ()->toRoute ( 'Settings', array (
					'controller' => 'settings',
					'action' => 'list' 
			) );
		} else {
			
			$form->bind ( $newsDetail );
			if ($this->getRequest ()->isPost ()) {
				
				$data = array_merge_recursive ( $this->getRequest ()->getPost ()->toArray (), $this->getRequest ()->getFiles ()->toArray () );
				$form->setData ( $data );
				
				if (! $form->isValid ()) {
					
					return new ViewModel ( array (
							'error' => true,
							'form' => $form,
							// 'image' => $this->_fileName,
							'id' => $id 
					) );
				} else {
					
					$exchange_data = array ();
					$exchange_data = $data;
					// $exchange_data['name'] = $data['name'];
					// $exchange_data['email'] = $data['email'];
					// $exchange_data['phone'] = $data['phone'];
					// $exchange_data['status'] = $data['status'];
					$exchange_data ['id'] = $id;
					
					$Settings = new Settings ();
					$Settings->exchangeArray ( $exchange_data );
					
					$SettingsTable->save ( $Settings );
					
					return $this->redirect ()->toRoute ( 'Settings', array (
							'controller' => 'settings',
							'action' => 'list' 
					) );
				}
			}
			return new ViewModel ( array (
					'form' => $form,
					// 'image' => $this->_fileName,
					'id' => $id 
			) );
		}
	}
	
	public function statusAction() {
		$this->layout ( 'layout/apotravinyadmin' );
		$view = new ViewModel ();
		
		$id = $this->params ()->fromRoute ( 'id', 0 );
		$status = $this->params ()->fromRoute ( 'status', 0 );
		
		$SettingsTable = $this->getServiceLocator ()->get ( 'SettingsTable' );
		
		if ($id == 0) {
			return $this->redirect ()->toRoute ( 'Settings', array (
					'controller' => 'settings',
					'action' => 'list' 
			) );
		} else {
			
			$exchange_data = array ();
			
			$exchange_data ['id'] = $id;
			$exchange_data ['status'] = $status;
			
			$Settings = new Settings ();
			$Settings->exchangeArray ( $exchange_data );
			
			$checkupdate = $SettingsTable->savestatus ( $Settings );
			
			$view->id = $id;
			$view->check = $checkupdate;
			return $view;
		}
	}
	public function deleteAction() {
		$this->layout ( 'layout/apotravinyadmin' );
		$id = $this->params ()->fromRoute ( 'id', 0 );
		if ($id != 0) {
			$this->getServiceLocator ()->get ( 'SettingsTable' )->delete ( $id );
			return $this->redirect ()->toRoute ( 'Settings', array (
					'controller' => 'settings',
					'action' => 'list' 
			) );
		}
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
}
