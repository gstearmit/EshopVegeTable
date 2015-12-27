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

use Payoutrates\Model\Contact;
use Payoutrates\Model\ContactTable;
use Payoutrates\Form\ContactForm;
use Payoutrates\Form\ContactFilter;


class ContactController extends AbstractActionController {
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
		
		
		return new ViewModel ( array (
				
		) );
	}
	
	public function addNewsAction() {
		
		$form = new ContactForm ();
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
				
				$Contact = new Contact();
				$Contact->exchangeArray ( $exchange_data );
				$this->getServiceLocator ()->get ( 'ContactTable' )->save ($Contact);
				return $this->redirect ()->toRoute ( 'Contactcontroll', array (
						'controller' => 'contact',
						'action' => 'listNews' 
				) );
			}
		}
		
		return new ViewModel ( array (
				'form' => $form 
		) );
	}
	public function listNewsAction() {
		
		
	
		
		$ContactTable = $this->getServiceLocator ()->get ( 'ContactTable' );
		$allRecord = $ContactTable->countAll ();
		$pageNull = new PageNull ( $allRecord );
		$itemsPerPage = 20;
		$pageRange = 5;
		$page = $this->params ()->fromRoute ( 'page', 1 );
		$offset = ($page - 1) * $itemsPerPage;
		$paginator = new Paginator ( $pageNull );
		$paginator->setCurrentPageNumber ( $page );
		$paginator->setItemCountPerPage ( $itemsPerPage );
		$paginator->setPageRange ( $pageRange );
		
		$listpr = $ContactTable->getList ( $offset, $itemsPerPage );
		
		
		
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
		
		
		$id = $this->params ()->fromRoute ( 'id');
		
		
		
		$ContactTable = $this->getServiceLocator ()->get ( 'ContactTable' );
		$form = new ContactForm ();
		$form->setInputFilter ( new ContactFilter () );
		
		$filter = $form->getInputFilter ();

			
			
		$newsDetail = $ContactTable->getById ( $id );
		
		
		if ($id == 0) {
			return $this->redirect ()->toRoute ( 'Contactcontroll', array (
					'controller' => 'contact',
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
							
						
					
					$Contact = new Contact();
					$Contact->exchangeArray ( $exchange_data );
					
					
					
					$ContactTable->save ( $Contact );
					
					
					return $this->redirect ()->toRoute ( 'Contactcontroll', array (
							'controller' => 'contact',
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
		
		
	
		$id = $this->params ()->fromRoute ( 'id', 0 );
		$status = $this->params ()->fromRoute ( 'status', 0 );
	
		$ContactTable = $this->getServiceLocator ()->get ( 'ContactTable' );
		
	
		if ($id == 0) {
			return $this->redirect ()->toRoute ( 'Contactcontroll', array (
					'controller' => 'contact',
					'action' => 'list-news'
			) );
		} else {
			
					$exchange_data = array ();
						
					$exchange_data['id'] = $id;
					$exchange_data['status'] = $status;
					
						
					$Contact = new Contact();
					$Contact->exchangeArray ( $exchange_data );
						
					$checkupdate = $ContactTable->savestatus ( $Contact );
		
			
			$view->id = $id;
			$view->check=$checkupdate;
			return $view;
		}
	}
	
	public function deleteNewsAction() {
		$id = $this->params ()->fromRoute ( 'id', 0 );
		if ($id != 0) {
			$this->getServiceLocator ()->get ( 'ContactTable' )->delete ( $id );
			return $this->redirect ()->toRoute ( 'Contactcontroll', array (
					'controller' => 'contact',
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
