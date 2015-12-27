<?php

namespace Newsletter\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Paginator\Paginator, Zend\Paginator\Adapter\Null as PageNull;
use Zend\Session\Container;

use Newsletter\Model\Newsletter;
use Newsletter\Model\NewsletterTable;
use Newsletter\Form\NewsletterForm;
use Newsletter\Form\NewsletterFilter;
// Header
use Zend\Http\Request;
use Zend\Http\Response;
use Zend\Http\Header\Cookie;
use Zend\Http\Header\SetCookie;

class NewsletterController extends AbstractActionController {
	public $_fileName;
	protected $UserTable;
	
	
	public function newslettermanageAction()
	{
		$this->layout ( 'layout/bags' );
		$getuser = $this->forward ()->dispatch ( 'Admin\Controller\Index', array (
				'action' => 'getuser'
		) );
// 		var_dump($getuser->email);
		if($getuser)
		{
			$this->layout()->getuser=$getuser;
			 
			//change pass
			$request = $this->getRequest();
			if ($request->isPost())
			{
				$data =  array(
						'id_user' => $getuser->id,
						'email' => $getuser->email,
						'status'=> 1,
						'is_subscribed' => $dataPost['is_subscribed'],
						//'date_creat' => $dataPost ['date_creat'],
							
				);
				$Newsletter = new Newsletter(); $Newsletter->exchangeArray($data);
				$Newsletter_status = $this->getServiceLocator()->get('NewsletterTable')->is_subscribed($Newsletter);
				//var_dump($Newsletter_status);//die;
	     	}
     		
     	}
     	else {
     		$this->redirect()->toUrl(WEBPATH);
     	}
     	
     	$this->layout()->Newsletter_status = $Newsletter_status;
				
	}
	
	public function subscribernewAction()
	{
		 $this->layout('layout/bags');
		 $request = $this->getRequest();
		 if ($request->isPost())
		 {
		 	    $datapost = $request->getPost();
		 	    if($datapost['checkboxdontshow'] !='' and $datapost['checkboxdontshow'] =='on')
		 	    {
		 	    	$this->layout()->popupNewsletterOff = 1;
		 	    }else { $this->layout()->popupNewsletterOff = 1; }
		 	    
				$data =  array(
						'id_user' => $getuser->id,
						'email' => $datapost['email'],
						'status'=> 1,
						'is_subscribed' =>1,
						//'date_creat' => $dataPost ['date_creat'],
							
				);
				
		 	$Newsletter = new Newsletter(); 
		 	$Newsletter->exchangeArray($data);
		 	$Newsletter_status = $this->getServiceLocator()->get('NewsletterTable')->save($Newsletter);
		 	if($Newsletter_status != 0)
		 	{
		 		$request = new Request();
		 		if(!isset($this->getRequest()->getCookie()->popupNewsletterOff))
		 		{
		 			// cookie not exist
		 			$cookie = new SetCookie('popupNewsletterOff', 'true', time() + 365 * 60 * 60 * 24,'/'); // now + 1 year
		 			$response = $this->getResponse()->getHeaders();
		 			$response->addHeader($cookie);
		 		} else {}
		 		
		 	}
		 	$this->layout()->Status_subscribed = $Newsletter_status;
		 }
	}
	
	public function indexAction() {
		$getuser=$this->forward()->dispatch('Admin\Controller\Index',array('action'=>'getuser'));
		if(!$getuser)
		{
			// not yet login
			$this->redirect ()->toRoute ( 'home');
		}
		$this->layout()->getuser=$getuser;
		return new ViewModel ( array (
				
		) );
	}
	
	public function addAction() {
		$getuser=$this->forward()->dispatch('Admin\Controller\Index',array('action'=>'getuser'));
		if(!$getuser)
		{
			// not yet login
			$this->redirect ()->toRoute ( 'home');
		}
		$this->layout()->getuser=$getuser;
		
		$form = new NewsletterForm ();
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
				
				$Newsletter = new Newsletter();
				$Newsletter->exchangeArray ( $exchange_data );
				$this->getServiceLocator ()->get ( 'NewsletterTable' )->save ($Newsletter);
				return $this->redirect ()->toRoute ( 'Newsletter', array (
					'controller' => 'Newsletter',
					'action' => 'list' 
			) );
			}
		}
		
		return new ViewModel ( array (
				'form' => $form 
		) );
	}
	public function listAction() {
		$this->layout('layout/admintheme');
		$getuser=$this->forward()->dispatch('Admin\Controller\Index',array('action'=>'getuser'));
		if(!$getuser)
		{
			// not yet login
			$this->redirect ()->toRoute ( 'home');
		}
		$this->layout()->getuser=$getuser;
		
		$NewsletterTable = $this->getServiceLocator ()->get ( 'NewsletterTable' );
		$allRecord = $NewsletterTable->countAll ();
		$pageNull = new PageNull ( $allRecord );
		$itemsPerPage = 20;
		$pageRange = 5;
		$page = $this->params ()->fromRoute ( 'page', 1 );
		$offset = ($page - 1) * $itemsPerPage;
		$paginator = new Paginator ( $pageNull );
		$paginator->setCurrentPageNumber ( $page );
		$paginator->setItemCountPerPage ( $itemsPerPage );
		$paginator->setPageRange ( $pageRange );
		
		$listpr = $NewsletterTable->getList ( $offset, $itemsPerPage );
		
		
		
		return new ViewModel ( array (
				'listNews' => $listpr,
				'paginator' => $paginator,
				'allRecord' => $allRecord,
				'offset' => $offset,
				'itemsPerPage' => $itemsPerPage 
		) );
	}
	public function editAction()
	 {
	 	$getuser=$this->forward()->dispatch('Admin\Controller\Index',array('action'=>'getuser'));
		if(!$getuser)
		{
			// not yet login
			$this->redirect ()->toRoute ( 'home');
		}
		$this->layout()->getuser=$getuser;
		
		$id = $this->params ()->fromRoute ( 'id');
		
		
		
		$NewsletterTable = $this->getServiceLocator ()->get ( 'NewsletterTable' );
		$form = new NewsletterForm ();
		$form->setInputFilter ( new NewsletterFilter () );
		
		$filter = $form->getInputFilter ();

			
			
		$newsDetail = $NewsletterTable->getById ( $id );
		
		
		if ($id == 0) {
			return $this->redirect ()->toRoute ( 'Newsletter', array (
					'controller' => 'Newsletter',
					'action' => 'list' 
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
							
						
					
					$Newsletter = new Newsletter();
					$Newsletter->exchangeArray ( $exchange_data );
					
					
					
					$NewsletterTable->save ( $Newsletter );
					
					
						return $this->redirect ()->toRoute ( 'Newsletter', array (
						         'controller' => 'Newsletter',
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
		
		$view= new ViewModel();
		
	
		$id = $this->params ()->fromRoute ( 'id', 0 );
		$status = $this->params ()->fromRoute ( 'status', 0 );
	
		$NewsletterTable = $this->getServiceLocator ()->get ( 'NewsletterTable' );
		
	
		if ($id == 0) {
			return $this->redirect ()->toRoute ( 'Newsletter', array (
					'controller' => 'Newsletter',
					'action' => 'list' 
			) );
		} else {
			
					$exchange_data = array ();
						
					$exchange_data['id'] = $id;
					$exchange_data['status'] = $status;
					
						
					$Newsletter = new Newsletter();
					$Newsletter->exchangeArray ( $exchange_data );
						
					$checkupdate = $NewsletterTable->savestatus ( $Newsletter );
		
			
			$view->id = $id;
			$view->check=$checkupdate;
			return $view;
		}
	}
	
	public function deleteAction() {
		$id = $this->params ()->fromRoute ( 'id', 0 );
		if ($id != 0) {
			$this->getServiceLocator ()->get ( 'NewsletterTable' )->delete ( $id );
			return $this->redirect ()->toRoute ( 'Newsletter', array (
					'controller' => 'Newsletter',
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
