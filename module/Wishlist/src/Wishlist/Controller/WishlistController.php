<?php

namespace Wishlist\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Paginator\Paginator, Zend\Paginator\Adapter\Null as PageNull;
use Zend\Session\Container;

use Wishlist\Model\Wishlist;
use Wishlist\Model\WishlistTable;
use Wishlist\Form\WishlistForm;
use Wishlist\Form\WishlistFilter;


class WishlistController extends AbstractActionController {
	public $_fileName;
	protected $UserTable;
	
	public function indexAction() 
	  {
	  	
	  	$getuser=$this->forward()->dispatch('Admin\Controller\Index',array('action'=>'getuser'));
	
	  	if(!$getuser)
	  	{
	  		
	  		// not yet login
	  		//$this->redirect ()->toRoute ('Adminloginnoform');
	  	}
	  	$this->layout()->getuser=$getuser;
	  	
	  	$this->layout('layout/bags');
	  	$getuser=$this->forward()->dispatch('Admin\Controller\Index',array('action'=>'getuser'));
	  	//var_dump($getuser);
	  	$this->layout()->getuser=$getuser;
	  	
	  
	  }
	  
	 
	
	public function statusAction() {
		
		$view= new ViewModel();
		
	
		$id = $this->params ()->fromRoute ( 'id', 0 );
		$status = $this->params ()->fromRoute ( 'status', 0 );
	
		$WishlistTable = $this->getServiceLocator ()->get ( 'WishlistTable' );
		
	
		if ($id == 0) {
			return $this->redirect ()->toRoute ( 'Wishlist', array (
					'controller' => 'Wishlist',
					'action' => 'list' 
			) );
		} else {
			
					$exchange_data = array ();
						
					$exchange_data['id'] = $id;
					$exchange_data['status'] = $status;
					
						
					$Wishlist = new Wishlist();
					$Wishlist->exchangeArray ( $exchange_data );
						
					$checkupdate = $WishlistTable->savestatus ( $Wishlist );
		
			
			$view->id = $id;
			$view->check=$checkupdate;
			return $view;
		}
	}
	
	public function deleteAction() {
		$id = $this->params ()->fromRoute ( 'id', 0 );
		if ($id != 0) {
			$this->getServiceLocator ()->get ( 'WishlistTable' )->delete ( $id );
			return $this->redirect ()->toRoute ( 'Wishlist', array (
					'controller' => 'Wishlist',
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
