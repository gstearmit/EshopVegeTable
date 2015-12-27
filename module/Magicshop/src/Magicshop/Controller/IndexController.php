<?php

namespace Magicshop\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Paginator\Paginator, Zend\Paginator\Adapter\Null as PageNull;
use Zend\Session\Container;

use Magicshop\Model\Magicshop;
use Magicshop\Model\MagicshopTable;
use Magicshop\Form\MagicshopForm;
use Magicshop\Form\MagicshopFilter;


class IndexController extends AbstractActionController {
	public $_fileName;
	protected $UserTable;
	
	public function cartAction() 
	  {
	  	$this->layout('layout/bags');
	  	$getuser=$this->forward()->dispatch('Admin\Controller\Index',array('action'=>'getuser'));
	  	//var_dump($getuser);
	  	$this->layout()->getuser=$getuser;
	  	
	  	$cart = null; // rong
	  	
	  	if( $cart != null)
	  	{
	  		// shoppingacart id data
	  		$this->redirect ()->toRoute ( 'onepage');
	  	}else if( $cart == null){
	  	
				  	return new ViewModel ( array (
				  			'Shoppingcart' => $cart,
				  			
				  	) );
	  	}
	  }
	
	
	
	public function onepageAction()
	{
		$this->layout('layout/bags');
		$getuser=$this->forward()->dispatch('Admin\Controller\Index',array('action'=>'getuser'));
		//var_dump($getuser);
		$this->layout()->getuser=$getuser;
	}
	
	public function addAction() {
		$getuser=$this->forward()->dispatch('Admin\Controller\Index',array('action'=>'getuser'));
		if(!$getuser)
		{
			// not yet login
			$this->redirect ()->toRoute ( 'home');
		}
		$this->layout()->getuser=$getuser;
		
		$form = new MagicshopForm ();
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
				
				$Magicshop = new Magicshop();
				$Magicshop->exchangeArray ( $exchange_data );
				$this->getServiceLocator ()->get ( 'MagicshopTable' )->save ($Magicshop);
				return $this->redirect ()->toRoute ( 'Magicshop', array (
					'controller' => 'Magicshop',
					'action' => 'list' 
			) );
			}
		}
		
		return new ViewModel ( array (
				'form' => $form 
		) );
	}
	public function listAction() {
		
		$getuser=$this->forward()->dispatch('Admin\Controller\Index',array('action'=>'getuser'));
		if(!$getuser)
		{
			// not yet login
			$this->redirect ()->toRoute ( 'home');
		}
		$this->layout()->getuser=$getuser;
		
		$MagicshopTable = $this->getServiceLocator ()->get ( 'MagicshopTable' );
		$allRecord = $MagicshopTable->countAll ();
		$pageNull = new PageNull ( $allRecord );
		$itemsPerPage = 20;
		$pageRange = 5;
		$page = $this->params ()->fromRoute ( 'page', 1 );
		$offset = ($page - 1) * $itemsPerPage;
		$paginator = new Paginator ( $pageNull );
		$paginator->setCurrentPageNumber ( $page );
		$paginator->setItemCountPerPage ( $itemsPerPage );
		$paginator->setPageRange ( $pageRange );
		
		$listpr = $MagicshopTable->getList ( $offset, $itemsPerPage );
		
		
		
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
		
		
		
		$MagicshopTable = $this->getServiceLocator ()->get ( 'MagicshopTable' );
		$form = new MagicshopForm ();
		$form->setInputFilter ( new MagicshopFilter () );
		
		$filter = $form->getInputFilter ();

			
			
		$newsDetail = $MagicshopTable->getById ( $id );
		
		
		if ($id == 0) {
			return $this->redirect ()->toRoute ( 'Magicshop', array (
					'controller' => 'Magicshop',
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
							
						
					
					$Magicshop = new Magicshop();
					$Magicshop->exchangeArray ( $exchange_data );
					
					
					
					$MagicshopTable->save ( $Magicshop );
					
					
						return $this->redirect ()->toRoute ( 'Magicshop', array (
						         'controller' => 'Magicshop',
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
	
		$MagicshopTable = $this->getServiceLocator ()->get ( 'MagicshopTable' );
		
	
		if ($id == 0) {
			return $this->redirect ()->toRoute ( 'Magicshop', array (
					'controller' => 'Magicshop',
					'action' => 'list' 
			) );
		} else {
			
					$exchange_data = array ();
						
					$exchange_data['id'] = $id;
					$exchange_data['status'] = $status;
					
						
					$Magicshop = new Magicshop();
					$Magicshop->exchangeArray ( $exchange_data );
						
					$checkupdate = $MagicshopTable->savestatus ( $Magicshop );
		
			
			$view->id = $id;
			$view->check=$checkupdate;
			return $view;
		}
	}
	
	public function deleteAction() {
		$id = $this->params ()->fromRoute ( 'id', 0 );
		if ($id != 0) {
			$this->getServiceLocator ()->get ( 'MagicshopTable' )->delete ( $id );
			return $this->redirect ()->toRoute ( 'Magicshop', array (
					'controller' => 'Magicshop',
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
