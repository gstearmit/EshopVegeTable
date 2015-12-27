<?php

namespace Magiccategory\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Paginator\Paginator, Zend\Paginator\Adapter\Null as PageNull;
use Zend\Session\Container;

use Magiccategory\Model\Magiccategory;
use Magiccategory\Model\MagiccategoryTable;
use Magiccategory\Form\MagiccategoryForm;
use Magiccategory\Form\MagiccategoryFilter;


class IndexController extends AbstractActionController {
	public $_fileName;
	protected $UserTable;
	
	public function indexAction() 
	  {
	  	$viewModel = new ViewModel();
	  	$viewModel->setTerminal(true);
	  	$request=$this->getRequest();
	  	//echo $request->isPost();
	  	//var_dump($request);
	  	if($request->isPost())
	  	{
	  		$saleproduct = '';
	  		$viewModel->calaogue=$saleproduct;
	  	
	  	
	  	}
	  	return $viewModel;
	  }
	  public function ajaxAction()
	  {
	  	$viewModel = new ViewModel();
	  	$viewModel->setTerminal(true);
	  	$request=$this->getRequest();
	  	//echo $request->isPost();
	  	//var_dump($request);
	  	if($request->isPost())
	  	{
	  		$saleproduct = '';
	  		$viewModel->calaogue=$saleproduct;
	  
	  
	  	}
	  	return $viewModel;
	  }
	  
	
	
	public function statusAction() {
		
		$view= new ViewModel();
		
	
		$id = $this->params ()->fromRoute ( 'id', 0 );
		$status = $this->params ()->fromRoute ( 'status', 0 );
	
		$MagiccategoryTable = $this->getServiceLocator ()->get ( 'MagiccategoryTable' );
		
	
		if ($id == 0) {
			return $this->redirect ()->toRoute ( 'Magiccategory', array (
					'controller' => 'Magiccategory',
					'action' => 'list' 
			) );
		} else {
			
					$exchange_data = array ();
						
					$exchange_data['id'] = $id;
					$exchange_data['status'] = $status;
					
						
					$Magiccategory = new Magiccategory();
					$Magiccategory->exchangeArray ( $exchange_data );
						
					$checkupdate = $MagiccategoryTable->savestatus ( $Magiccategory );
		
			
			$view->id = $id;
			$view->check=$checkupdate;
			return $view;
		}
	}
	
	public function deleteAction() {
		$id = $this->params ()->fromRoute ( 'id', 0 );
		if ($id != 0) {
			$this->getServiceLocator ()->get ( 'MagiccategoryTable' )->delete ( $id );
			return $this->redirect ()->toRoute ( 'Magiccategory', array (
					'controller' => 'Magiccategory',
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
