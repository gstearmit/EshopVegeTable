<?php

namespace Sales\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Paginator\Paginator, Zend\Paginator\Adapter\Null as PageNull;
use Zend\Session\Container;
use Sales\Model\Sales;
use Sales\Model\SalesTable;
use Sales\Form\SalesForm;
use Sales\Form\SalesFilter;

class IndexController extends AbstractActionController {
	public $_fileName;
	protected $UserTable;
	public function orderhistoryAction() {
		$this->layout ( 'layout/bags' );
		$getuser = $this->forward ()->dispatch ( 'Admin\Controller\Index', array (
				'action' => 'getuser' 
		) );
		// var_dump($getuser);
		$this->layout ()->getuser = $getuser;
	}
	public function billingagreementAction() {
		$this->layout ( 'layout/bags' );
		$getuser = $this->forward ()->dispatch ( 'Admin\Controller\Index', array (
				'action' => 'getuser' 
		) );
		// var_dump($getuser);
		$this->layout ()->getuser = $getuser;
	}
	
	
	
	
	
	public function downloadableproductsAction()
	{
		$this->layout ( 'layout/bags' );
		$getuser = $this->forward ()->dispatch ( 'Admin\Controller\Index', array (
				'action' => 'getuser'
		) );
		// var_dump($getuser);
		$this->layout ()->getuser = $getuser;
	}
	
	public function recurringprofileAction() {
		$this->layout ( 'layout/bags' );
		$getuser = $this->forward ()->dispatch ( 'Admin\Controller\Index', array (
				'action' => 'getuser'
		) );
		// var_dump($getuser);
		$this->layout ()->getuser = $getuser;
	}
	
	public function deleteAction() {
		$id = $this->params ()->fromRoute ( 'id', 0 );
		if ($id != 0) {
			$this->getServiceLocator ()->get ( 'SalesTable' )->delete ( $id );
			return $this->redirect ()->toRoute ( 'Sales', array (
					'controller' => 'Sales',
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
