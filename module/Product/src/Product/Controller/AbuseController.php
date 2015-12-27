<?php

namespace Payoutrates\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Zend\Paginator\Paginator, Zend\Paginator\Adapter\Null as PageNull;
use Zend\Session\Container;



use Payoutrates\Model\Abuse;
use Payoutrates\Model\AbuseTable;
use Payoutrates\Form\AbuseForm;
use Payoutrates\Form\AbuseFilter;


class AbuseController extends AbstractActionController {
	public $_fileName;
	protected $UserTable;
	public function getUserTable() {
		if (! $this->UserTable) {
			$sm = $this->getServiceLocator ();
			$this->UserTable = $sm->get ( 'Users\Model\UserTable' );
		}
		return $this->UserTable;
	}
	
	public function indexAction(){
		
	}
	
	public function addNewsAction() {
		$session = new Container ( 'user' );
		$session_fb = new Container ( 'facebook' );
		
		
		if($session->username != ''){
			$name_user = $session->username;
		}else if( $session_fb->username != '')
		{
			$name_user = $session_fb->username;
		} 
		
		$id_user =$this->getUserTable()->getuser($name_user)->id;
		
		if ($session_fb->role != null) {
			
			if ($session_fb->role = "publisher") {
				$this->layout ( 'layout/layoutpub' );
			}
			if ($session_fb->role == "advertiser") {
				$this->layout ( 'layout/layoutadv' );
			}
			if ($session_fb->role == "supperadmin") {
				$this->layout ( 'layout/layoutindex' );
			}
		} else {
			$this->layout ( 'layout/admin' );
		}
		
		$form = new AbuseForm();
		// $form->setInputFilter(new PayoutratesFilter());
// 		$data = $this->getServiceLocator ()->get ( 'ContactTable' )->gettype();
		
	  
		
// 		if(is_array($data) and !empty($data)){ $datatypetmp = $data ;} else { $datatypetmp = Null;}
// 		$form->settype($datatypetmp);
		
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
				
				$Abuse = new Abuse();
				$Abuse->exchangeArray ( $exchange_data );
				$this->getServiceLocator ()->get ( 'AbuseTable' )->save ($Abuse);
				return $this->redirect ()->toRoute ( 'Abuse', array (
						'controller' => 'abuse',
						'action' => 'listNews' 
				) );
			}
		}
		
		return new ViewModel ( array (
				'form' => $form 
		) );
	}
	public function listNewsAction() {
		
		
		$session = new Container ( 'user' );
		$session_fb = new Container ( 'facebook' );
		$name_user = $session_fb->username;
		
		if ($session_fb->role != null) {
			
			if ($session_fb->role = "publisher") {
				$this->layout ( 'layout/layoutpub' );
			}
			if ($session_fb->role == "advertiser") {
				$this->layout ( 'layout/layoutadv' );
			}
			if ($session_fb->role == "supperadmin") {
				$this->layout ( 'layout/admin' );
			}
		} 

		 
		if ($session_fb->role == null and $session->username == null) {
			
			$urlredirect = WEBPATH;
    		header("location: ". $urlredirect);
		}else if ($session_fb->role == null and $session->username != null)
		{
			$this->layout ( 'layout/admin' );
		}
		
		$AbuseTable = $this->getServiceLocator ()->get ( 'AbuseTable' );
		$allRecord = $AbuseTable->countAll ();
		$pageNull = new PageNull ( $allRecord );
		$itemsPerPage = 20;
		$pageRange = 5;
		$page = $this->params ()->fromRoute ( 'page', 1 );
		$offset = ($page - 1) * $itemsPerPage;
		$paginator = new Paginator ( $pageNull );
		$paginator->setCurrentPageNumber ( $page );
		$paginator->setItemCountPerPage ( $itemsPerPage );
		$paginator->setPageRange ( $pageRange );
		
		$listpr = $AbuseTable->getList ( $offset, $itemsPerPage );
		
		
		
		return new ViewModel ( array (
				'listNews' => $listpr,
				'paginator' => $paginator,
				'allRecord' => $allRecord,
				'offset' => $offset,
				'itemsPerPage' => $itemsPerPage 
		) );
	}
	public function editNewsAction()
	 {
		$session = new Container ( 'user' );
		$session_fb = new Container ( 'facebook' );
			if($session->username != ''){
			$name_user = $session->username;
		}else if( $session_fb->username != '')
		{
			$name_user = $session_fb->username;
		} 
		
		$id_user =$this->getUserTable()->getuser($name_user)->id;
		
		if ($session_fb->role != null) {
			
			if ($session_fb->role = "publisher") {
				$this->layout ( 'layout/layoutpub' );
			}
			if ($session_fb->role == "advertiser") {
				$this->layout ( 'layout/layoutadv' );
			}
			if ($session_fb->role == "supperadmin") {
				$this->layout ( 'layout/layoutindex' );
			}
		} 
		
		if ($session_fb->role == null and $session->username == null) {
			
			$urlredirect = WEBPATH;
    		header("location: ". $urlredirect);
		}else if ($session_fb->role == null and $session->username != null)
		{
			$this->layout ( 'layout/admin' );
		}
		
		$id = $this->params ()->fromRoute ( 'id');
		
		
		
		$AbuseTable = $this->getServiceLocator ()->get ( 'AbuseTable' );
		$form = new AbuseForm();
		$form->setInputFilter ( new AbuseFilter () );
		
		$filter = $form->getInputFilter ();

			
			
		$newsDetail = $AbuseTable->getById ( $id );
		
		
		if ($id == 0) {
			return $this->redirect ()->toRoute ( 'Abuse', array (
					'controller' => 'abuse',
					'action' => 'list-news' 
			) );
		} else {
			
			$form->bind ( $newsDetail );
			if ($this->getRequest ()->isPost ()) 
			{
				
				
				$data = array_merge_recursive ( $this->getRequest ()->getPost ()->toArray (), $this->getRequest ()->getFiles ()->toArray () );
				$form->setData ( $data );
				
				
				
				if (! $form->isValid ()) {
					
					
					
					return new ViewModel ( array (
							'error' => true,
							'form' => $form,
							// 'image' => $this->_fileName,
							'id' => $id 
					) );
					
				} else 
				{
					
					        $exchange_data = array ();
					        $exchange_data = $data;
// 					        $exchange_data['name'] = $data['name'];
// 					        $exchange_data['email'] = $data['email'];
// 					        $exchange_data['phone'] = $data['phone'];
// 					        $exchange_data['status'] = $data['status'];
					        $exchange_data['id'] = $id;
							
						
					
					$Abuse = new Abuse();
					$Abuse->exchangeArray ( $exchange_data );
					
					
					
					$AbuseTable->save ( $Abuse );
					
					
					return $this->redirect ()->toRoute ( 'Abuse', array (
							'controller' => 'abuse',
							'action' => 'list-news' 
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
		
		$view= new ViewModel();
		$session = new Container ( 'user' );
		$session_fb = new Container ( 'facebook' );
		if($session->username != ''){
			$name_user = $session->username;
		}else if( $session_fb->username != '')
		{
			$name_user = $session_fb->username;
		}
	
		$id_user =$this->getUserTable()->getuser($name_user)->id;
	
		if ($session_fb->role != null) {
				
			if ($session_fb->role = "publisher") {
				$this->layout ( 'layout/layoutpub' );
			}
			if ($session_fb->role == "advertiser") {
				$this->layout ( 'layout/layoutadv' );
			}
			if ($session_fb->role == "supperadmin") {
				$this->layout ( 'layout/admin' );
			}
		}
		
		if ($session_fb->role == null and $session->username == null) {
				
			$urlredirect = WEBPATH;
			header("location: ". $urlredirect);
		}else if ($session_fb->role == null and $session->username != null)
		{
			$this->layout ( 'layout/admin' );
		}
	
		$id = $this->params ()->fromRoute ( 'id', 0 );
		$status = $this->params ()->fromRoute ( 'status', 0 );
	
		$AbuseTable = $this->getServiceLocator ()->get ( 'AbuseTable' );
		
	
		if ($id == 0) {
			return $this->redirect ()->toRoute ( 'Contactcontroll', array (
					'controller' => 'contact',
					'action' => 'list-news'
			) );
		} else {
			
					$exchange_data = array ();
						
					$exchange_data['id'] = $id;
					$exchange_data['status'] = $status;
					
						
					$Abuse = new Abuse();
					$Abuse->exchangeArray ( $exchange_data );
						
					$checkupdate = $AbuseTable->savestatus ( $Abuse );
		
			
			$view->id = $id;
			$view->check=$checkupdate;
			return $view;
		}
	}
	
	public function deleteNewsAction() {
		$id = $this->params ()->fromRoute ( 'id', 0 );
		if ($id != 0) {
			$this->getServiceLocator ()->get ( 'AbuseTable' )->delete ( $id );
			return $this->redirect ()->toRoute ( 'Abuse', array (
					'controller' => 'abuse',
					'action' => 'list-news' 
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
