<?php

namespace Main\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
class EshopbagsController extends AbstractActionController {
	
	public function indexAction() 
	{
		$this->layout ( 'layout/bags' );
		
		$getuser=$this->forward()->dispatch('Admin\Controller\Index',array('action'=>'getuser'));
		// var_dump($getuser);
		$this->layout()->getuser=$getuser;
		
		$slug = $this->params()->fromRoute('slug');
		
		$view=new ViewModel();
		
		$view->slug = $slug;
		return $view;
	}
	
	
	public function getMainTable() {
		if (! $this->MainTable) {
			$sm = $this->getServiceLocator ();
			$this->MainTable = $sm->get ( 'Main\Model\MainTable' );
		}
		return $this->MainTable;
	}
	
	protected $MainTable;
	
}