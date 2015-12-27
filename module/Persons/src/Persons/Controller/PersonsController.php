<?php

namespace Persons\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Paginator\Paginator, Zend\Paginator\Adapter\Null as PageNull;
use Zend\Session\Container;

use Persons\Model\Persons;
use Persons\Model\PersonsTable;
use Persons\Form\PersonsForm;
use Persons\Form\PersonsFilter;


class PersonsController extends AbstractActionController {
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
		
		$form = new PersonsForm ();
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
				
				$Persons = new Persons();
				$Persons->exchangeArray ( $exchange_data );
				$this->getServiceLocator ()->get ( 'PersonsTable' )->save ($Persons);
				return $this->redirect ()->toRoute ( 'Persons', array (
					'controller' => 'Persons',
					'action' => 'list' 
			) );
			}
		}
		
		return new ViewModel ( array (
				'form' => $form 
		) );
	}
	public function listAction() {
		die("Persons");
		$getuser=$this->forward()->dispatch('Admin\Controller\Index',array('action'=>'getuser'));
		if(!$getuser)
		{
			// not yet login
			$this->redirect ()->toRoute ( 'home');
		}
		$this->layout()->getuser=$getuser;
		
		$PersonsTable = $this->getServiceLocator ()->get ( 'PersonsTable' );
		$allRecord = $PersonsTable->countAll ();
		$pageNull = new PageNull ( $allRecord );
		$itemsPerPage = 20;
		$pageRange = 5;
		$page = $this->params ()->fromRoute ( 'page', 1 );
		$offset = ($page - 1) * $itemsPerPage;
		$paginator = new Paginator ( $pageNull );
		$paginator->setCurrentPageNumber ( $page );
		$paginator->setItemCountPerPage ( $itemsPerPage );
		$paginator->setPageRange ( $pageRange );
		
		$listpr = $PersonsTable->getList ( $offset, $itemsPerPage );
		
		
		
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
		
		
		
		$PersonsTable = $this->getServiceLocator ()->get ( 'PersonsTable' );
		$form = new PersonsForm ();
		$form->setInputFilter ( new PersonsFilter () );
		
		$filter = $form->getInputFilter ();

			
			
		$newsDetail = $PersonsTable->getById ( $id );
		
		
		if ($id == 0) {
			return $this->redirect ()->toRoute ( 'Persons', array (
					'controller' => 'Persons',
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
							
						
					
					$Persons = new Persons();
					$Persons->exchangeArray ( $exchange_data );
					
					
					
					$PersonsTable->save ( $Persons );
					
					
						return $this->redirect ()->toRoute ( 'Persons', array (
						         'controller' => 'Persons',
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
	
		$PersonsTable = $this->getServiceLocator ()->get ( 'PersonsTable' );
		
	
		if ($id == 0) {
			return $this->redirect ()->toRoute ( 'Persons', array (
					'controller' => 'Persons',
					'action' => 'list' 
			) );
		} else {
			
					$exchange_data = array ();
						
					$exchange_data['id'] = $id;
					$exchange_data['status'] = $status;
					
						
					$Persons = new Persons();
					$Persons->exchangeArray ( $exchange_data );
						
					$checkupdate = $PersonsTable->savestatus ( $Persons );
		
			
			$view->id = $id;
			$view->check=$checkupdate;
			return $view;
		}
	}
	
	public function deleteAction() {
		$id = $this->params ()->fromRoute ( 'id', 0 );
		if ($id != 0) {
			$this->getServiceLocator ()->get ( 'PersonsTable' )->delete ( $id );
			return $this->redirect ()->toRoute ( 'Persons', array (
					'controller' => 'Persons',
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
