<?php

namespace Payoutrates\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Payoutrates\Form\PayoutratesFilter;
use Payoutrates\Form\PayoutratesForm;
use Payoutrates\Model\Payoutrates;
use Payoutrates\Model\PayoutratesTable;
use Payoutrates\Model\Payoutype;
use Payoutrates\Model\PayoutypeTable;
use Zend\Paginator\Paginator, Zend\Paginator\Adapter\Null as PageNull;
use Zend\Session\Container;



use Payoutrates\Model\Oders;
use Payoutrates\Model\OdersTable;

use Payoutrates\Model\Odersdetails;
use Payoutrates\Model\OdersdetailsTable;

//paypal
use Shortlink\Model\Mypaypal;
use Publisher\Model\Pub;

class OderController extends AbstractActionController {
	public $_fileName;
	protected $UserTable;
	public function getUserTable() {
		if (! $this->UserTable) {
			$sm = $this->getServiceLocator ();
			$this->UserTable = $sm->get ( 'Users\Model\UserTable' );
		}
		return $this->UserTable;
	}
	
	public function indexAction() {
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
				
			if ($session_fb->role == "publisher") {
				$this->layout ( 'layout/layoutpub' );
			}
			if ($session_fb->role == "advertiser") {
				$this->layout ( 'layout/layoutadv' );
			}
			if ($session_fb->role == "supperadmin") {
				$this->layout ( 'layout/admin' );
			}
		} else {
			$this->layout ( 'layout/layoutindex' );
		}
	
		
		return new ViewModel ( array (
				
		) );
	}
	
	
	public function listAction() {
		
		
		$session = new Container ( 'user' );
		$session_fb = new Container ( 'facebook' );
		$name_user = $session_fb->username;
		
		if ($session_fb->role != null) {
			
			if ($session_fb->role == "publisher") {
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
		
		$id_user = $session->id;
		
		
		$OdersTable = $this->getServiceLocator ()->get ( 'OdersTable' );
		
		$allRecord = $OdersTable->countAll ($id_user);

		$pageNull = new PageNull ( $allRecord );
		$itemsPerPage = 20;
		$pageRange = 5;
		$page = $this->params ()->fromRoute ( 'page', 1 );
		$offset = ($page - 1) * $itemsPerPage;
		$paginator = new Paginator ( $pageNull );
		$paginator->setCurrentPageNumber ( $page );
		$paginator->setItemCountPerPage ( $itemsPerPage );
		$paginator->setPageRange ( $pageRange );
		
		$listpr = $OdersTable->getList ($id_user, $offset, $itemsPerPage );
		
		
		return new ViewModel ( array (
				'list' => $listpr,
				'paginator' => $paginator,
				'allRecord' => $allRecord,
				'offset' => $offset,
				'itemsPerPage' => $itemsPerPage 
		) );
	}
	public function editNewsAction() {
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
			
			if ($session_fb->role == "publisher") {
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
		
		$id = $this->params ()->fromRoute ( 'id', 0 );
		
		$PayoutratesTable = $this->getServiceLocator ()->get ( 'PayoutratesTable' );
		$form = new PayoutratesForm ();
		$form->setInputFilter ( new PayoutratesFilter () );
		// $form->get('news_thumbnail')->removeAttributes(array('required'));
		$filter = $form->getInputFilter ();
		// $filter->get('news_thumbnail')->setRequired(false);
			
		$data = $this->getServiceLocator ()->get ( 'PayoutypeTable' )->gettype();
		//$form->get('type')->removeAttributes(array('required'));
		if(is_array($data) and !empty($data)){ $datatypetmp = $data ;} else { $datatypetmp = Null;}
		$form->settype($datatypetmp);
			
			
		$newsDetail = $PayoutratesTable->getById ( $id );
		// $this->_fileName = $newsDetail->news_thumbnail;
		
		
		if ($id == 0) {
			return $this->redirect ()->toRoute ( 'Payoutrates', array (
					'controller' => 'payoutrates',
					'action' => 'list-news' 
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
					
					        $exchange_data['id'] = $id;
							$exchange_data['namepackge'] = $data ['namepackge'];
							$exchange_data['price'] = $data ['price'];
							$exchange_data['id_user'] = $id_user;
							
							$exchange_data['type'] = $data['type'] ;
							
							$exchange_data['DKCpmUni'] = $data ['DKCpmUni'];
							$exchange_data['DKCpmRaw'] = $data ['DKCpmRaw'];
							
							$exchange_data['MBCpmUni'] =$data ['MBCpmUni'];
							$exchange_data['MBCpmRaw'] = $data ['MBCpmRaw'];
							$exchange_data['code'] = $data['code'];
							$exchange_data['hotstring'] = $data['hotstring'];
					
						
					
					$Payoutrates = new Payoutrates ();
					$Payoutrates->exchangeArray ( $exchange_data );
					
					$PayoutratesTable->save ( $Payoutrates );
					return $this->redirect ()->toRoute ( 'Payoutrates', array (
							'controller' => 'payoutrates',
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
				
			if ($session_fb->role == "publisher") {
				$this->layout ( 'layout/layoutpub' );
			}
			if ($session_fb->role == "advertiser") {
				$this->layout ( 'layout/layoutadv' );
			}
			if ($session_fb->role == "supperadmin") {
				$this->layout ( 'layout/admin' );
			}
		} else {
			$this->layout ( 'layout/admin' );
		}
	
		$id = $this->params ()->fromRoute ( 'id', 0 );
		$status = $this->params ()->fromRoute ( 'status', 0 );
	
		$PayoutratesTable = $this->getServiceLocator ()->get ( 'PayoutratesTable' );
		
	
		if ($id == 0) {
			return $this->redirect ()->toRoute ( 'Payoutrates', array (
					'controller' => 'payoutrates',
					'action' => 'list-news'
			) );
		} else {
			
					$exchange_data = array ();
						
					$exchange_data['id'] = $id;
					$exchange_data['status'] = $status;
					
						
					$Payoutrates = new Payoutrates ();
					$Payoutrates->exchangeArray ( $exchange_data );
						
					$checkupdate = $PayoutratesTable->savestatus ( $Payoutrates );
		
			
			$view->id = $id;
			$view->check=$checkupdate;
			return $view;
		}
	}
	
	public function deleteNewsAction() {
		$id = $this->params ()->fromRoute ( 'id', 0 );
		if ($id != 0) {
			$this->getServiceLocator ()->get ( 'PayoutratesTable' )->delete ( $id );
			return $this->redirect ()->toRoute ( 'Payoutrates', array (
					'controller' => 'payoutrates',
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
