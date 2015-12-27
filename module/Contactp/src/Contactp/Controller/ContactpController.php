<?php

namespace Contactp\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Paginator\Paginator, Zend\Paginator\Adapter\Null as PageNull;
use Zend\Session\Container;

use Contactp\Model\Contactp;
use Contactp\Model\ContactpTable;
use Contactp\Form\ContactpForm;
use Contactp\Form\ContactpFilter;


class ContactpController extends AbstractActionController {
	public $_fileName;
	protected $UserTable;
	
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
		
		$form = new ContactpForm ();
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
				
				$Contactp = new Contactp();
				$Contactp->exchangeArray ( $exchange_data );
				$this->getServiceLocator ()->get ( 'ContactpTable' )->save ($Contactp);
				return $this->redirect ()->toRoute ( 'Contactp', array (
					'controller' => 'contactp',
					'action' => 'list' 
			) );
			}
		}
		
		return new ViewModel ( array (
				'form' => $form 
		) );
	}
	public function listAction() {
		$this->layout ( 'layout/bags' );
		$getuser=$this->forward()->dispatch('Admin\Controller\Index',array('action'=>'getuser'));
		if(!$getuser)
		{
			// not yet login
			$this->redirect ()->toRoute ( 'home');
		}
		$this->layout()->getuser=$getuser;
		
		$ContactpTable = $this->getServiceLocator ()->get ( 'ContactpTable' );
		$allRecord = $ContactpTable->countAll ();
		$pageNull = new PageNull ( $allRecord );
		$itemsPerPage = 5;
		$pageRange = 3;
		$page = $this->params ()->fromRoute ( 'page', 1 );
		$offset = ($page - 1) * $itemsPerPage;
		$paginator = new Paginator ( $pageNull );
		$paginator->setCurrentPageNumber ( $page );
		$paginator->setItemCountPerPage ( $itemsPerPage );
		$paginator->setPageRange ( $pageRange );
		
		$listpr = $ContactpTable->getList ( $offset, $itemsPerPage );
		
		
		
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
		
		
		
		$ContactpTable = $this->getServiceLocator ()->get ( 'ContactpTable' );
		$form = new ContactpForm ();
		$form->setInputFilter ( new ContactpFilter () );
		
		$filter = $form->getInputFilter ();

			
			
		$newsDetail = $ContactpTable->getById ( $id );
		
		
		if ($id == 0) {
			return $this->redirect ()->toRoute ( 'Contactp', array (
					'controller' => 'contactp',
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
							
						
					
					$Contactp = new Contactp();
					$Contactp->exchangeArray ( $exchange_data );
					
					
					
					$ContactpTable->save ( $Contactp );
					
					
						return $this->redirect ()->toRoute ( 'Contactp', array (
						         'controller' => 'contactp',
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
	
		$ContactpTable = $this->getServiceLocator ()->get ( 'ContactpTable' );
		
	
		if ($id == 0) {
			return $this->redirect ()->toRoute ( 'Contactp', array (
					'controller' => 'contactp',
					'action' => 'list' 
			) );
		} else {
			
					$exchange_data = array ();
						
					$exchange_data['id'] = $id;
					$exchange_data['status'] = $status;
					
						
					$Contactp = new Contactp();
					$Contactp->exchangeArray ( $exchange_data );
						
					$checkupdate = $ContactpTable->savestatus ( $Contactp );
		
			
			$view->id = $id;
			$view->check=$checkupdate;
			return $view;
		}
	}
	
	public function deleteAction() {
		$id = $this->params ()->fromRoute ( 'id', 0 );
		if ($id != 0) {
			$this->getServiceLocator ()->get ( 'ContactpTable' )->delete ( $id );
			return $this->redirect ()->toRoute ( 'Contactp', array (
					'controller' => 'contactp',
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
