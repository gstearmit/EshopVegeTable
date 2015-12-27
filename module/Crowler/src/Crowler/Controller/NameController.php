<?php

namespace Crowler\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Crowler\Form\CrowlerFilter;
use Crowler\Form\CrowlerForm;
use Crowler\Model\Name;
use Crowler\Model\NameTable;

use Zend\Paginator\Paginator, Zend\Paginator\Adapter\Null as PageNull;
use Zend\Session\Container;
use Main\Model\Utility;

// catalogue
use Catalog\Model\Catalog;
use Catalog\Model\CatalogTable;

// Tags
use Tags\Module\Tags;
use Tags\Module\TagsTable;

class NameController extends AbstractActionController {
	public $_fileName;
	protected $UserTable;
	public function getUserTable() {
		if (! $this->UserTable) {
			$sm = $this->getServiceLocator ();
			$this->UserTable = $sm->get ( 'Users\Model\UserTable' );
		}
		return $this->UserTable;
	}
	public function viewAction() {
		$view = new ViewModel ();
		// check xem sessoin uenc khoa do da duoc tao chua
		// neu chua khoi tao
		// neu roi add them 1 phan tu vao sesion voi id va uenc da duoc tao
		$this->layout ( 'layout/apotravinyadmin' );
		
		$getuser = $this->forward ()->dispatch ( 'Admin\Controller\Index', array (
				'action' => 'getuser' 
		) );
		// var_dump($getuser);
		$this->layout ()->getuser = $getuser;
		
		$id = (int)$this->params ()->fromRoute ( 'id' );
		$uenc = $this->params ()->fromRoute ( 'uenc' );
		if($id != 0){
		$product_all = $this->getServiceLocator()->get('NameTable')->get($id);
		}else die("Error , Crowler !!!");
		$view->setVariable ( 'id', $id );
		$view->setVariable ( 'uenc', $uenc );
		$view->setVariable ( 'product', $product_all );
		
		return $view;
	}
	
	
	public function indexAction() {
		$getuser=$this->forward()->dispatch('Admin\Controller\Index',array('action'=>'getuser'));
		if(!$getuser)
		{
			// not yet login
			$this->redirect ()->toRoute ( 'home');
		}
		$this->layout()->getuser=$getuser;
		
		$this->layout ( 'layout/apotravinyadmin' );
		
		$NameTable = $this->getServiceLocator ()->get ( 'NameTable' );
		$allRecord = $NameTable->countAll ();
		$pageNull = new PageNull ( $allRecord );
		$itemsPerPage = 10;
		$pageRange = 5;
		$page = $this->params ()->fromRoute ( 'page', 1 );
		$offset = ($page - 1) * $itemsPerPage;
		$paginator = new Paginator ( $pageNull );
		$paginator->setCurrentPageNumber ( $page );
		$paginator->setItemCountPerPage ( $itemsPerPage );
		$paginator->setPageRange ( $pageRange );
		
		$listpr_tmp = $NameTable->getList ( $offset, $itemsPerPage );
		$i=0; $listpr = array();
		foreach ($listpr_tmp as $key =>$Object)
		{
			if($Object->parent != null)
			{
				$name_parent = $NameTable ->parent_find($Object->parent);
				if($name_parent != 0)
				{
					$naem_pare = $name_parent;
				}else $naem_pare ='null';
				
			}
			$listpr[$i]->id =  $Object->id;
			$listpr[$i]->name =  $Object->name;
			$listpr[$i]->parent =  $name_parent;
			$listpr[$i]->child =  $Object->child;
			$listpr[$i]->date_creat =  $Object->date_creat;
			$listpr[$i]->date_modified =  $Object->date_modified;
			$listpr[$i]->hot =  $Object->hot;
			$listpr[$i]->status =  $Object->status;
			$listpr[$i]->new =  $Object->new;
			$listpr[$i]->alias =  $Object->alias;
			$listpr[$i]->img =  $Object->img;
			$listpr[$i]->description =  $Object->description;
			$i++;
		}
		

		$Array_name_data = $this->get_name_dataAction();
		
		return new ViewModel ( array (
				'listNews' => $listpr,
				'paginator' => $paginator,
				'allRecord' => $allRecord,
				'offset' => $offset,
				'itemsPerPage' => $itemsPerPage,
				'NameData'  => $Array_name_data,
		) );
	}
	
	public function get_name_dataAction() {
		$Name = $this->getServiceLocator()->get('NameTable')->getAll();
		$data = array();
		$idtmp = array();
		foreach ($Name as $upload) :
		if ($upload->parent == 0) {
			$id = $upload->id;
			$cat = $upload->name;
			$data [$id] = $cat;
			array_push($idtmp, $id);
		} else {
			$parent = $upload->parent;
			$key = array_search($parent, $idtmp);
			$tmp = array();
			$id = $upload->id;
			$cat = $upload->name;
			array_splice($idtmp, $key + 1, 0, $id);
			if (isset($data [$key])) {
				$str = $data [$key];
				$begi = '';
				$beg = substr_count($str, ' - ');
				$tt = ' - ';
				while ($beg != - 1) {
					$tt = ' - ' . $tt;
					$beg --;
				}
				$tmp [$id] = $tt . $cat;
			} else
				$tmp [$id] = ' -  - ' . $cat;
			array_splice($data, $key + 1, 0, $tmp);
		}
		endforeach ;
		$result = array();
		//$k = 0; $v = '';
		for ($i = 0; $i < sizeof($data); $i ++) {
			$k = $idtmp [$i];
			$v = $data [$i];
			$result [$k] = $v;
		}
		return $result;
	}
	
	
	public function addnewnameAction() 
	{
	   $this->layout ( 'layout/apotravinyadmin' );
	   $getuser = $this->forward ()->dispatch ( 'Admin\Controller\Index', array (
				'action' => 'getuser' 
		) );
		$this->layout ()->getuser = $getuser;
		// notlogin
		if (! $getuser) {
			$this->redirect ()->toUrl ( WEBPATH );
		}
		$this->layout ()->getuser = $getuser;
		if ($this->getRequest()->isPost()) {
			//$data = array_merge_recursive($this->getRequest()->getPost()->toArray(), $this->getRequest()->getFiles()->toArray());
			$data = $this->getRequest()->getPost()->toArray();
			$_data = array(
				'name'=>$data['name'],
				'alias'=>$data['url_alias'],
				'description'=>$data['description_name'],	
				'parent'=>$data['parent'],		
			);
			
			$name  = new Name();
			$name->exchangeArray($_data);
			$name_save = $this->getServiceLocator()->get('NameTable')->save($name);
			
			if($name_save != 0){ echo "Hooray! Your Name site has been added!";die;}
			if($name_save == 0){ echo "Hooray! Your Name site Error add!";die;}
		}
		
	}
	public function editAction() {
		$this->layout ( 'layout/apotravinyadmin' );
		$id = $this->params ()->fromRoute ( 'id', 0 );
		if($id == 0) { die("Error Edit data ! try agian!");}
		
		
		$getuser = $this->forward ()->dispatch ( 'Admin\Controller\Index', array (
				'action' => 'getuser'
		) );
		$this->layout ()->getuser = $getuser;
		// notlogin
		if (! $getuser) {
			$this->redirect ()->toUrl ( WEBPATH );
		}
		$this->layout ()->getuser = $getuser;
		if ($this->getRequest()->isPost()) {
			//$data = array_merge_recursive($this->getRequest()->getPost()->toArray(), $this->getRequest()->getFiles()->toArray());
			$data = $this->getRequest()->getPost()->toArray();
			$_data = array(
					'id'=>$data['id'],
					'name'=>$data['name'],
					'alias'=>$data['url_alias'],
					'description'=>$data['description_name'],
					'parent'=>$data['parent'],
			);
			$name  = new Name();
			$name->exchangeArray($_data);
			$name_save = $this->getServiceLocator()->get('NameTable')->save($name);
				
			if($name_save != 0){ echo "Hooray! Your Name site has been Edit!";die;}
			if($name_save == 0){ echo "Hooray! Your Name site Error edit!";die;}
		}
		
		
		
		
		$data = $this->getServiceLocator()->get('NameTable')->get($id);
		$Array_name_data = $this->get_name_dataAction();
		return new ViewModel ( 
				array ( 
				'id'=>$id,		
				'Data'  => $data,
				'NameData'=>$Array_name_data,
		) );
	}
	
	public function statusAction() {
		
		$view= new ViewModel();
		$this->layout ( 'layout/apotravinyadmin' );
	
		$id = $this->params ()->fromRoute ( 'id', 0 );
		$status = $this->params ()->fromRoute ( 'status', 0 );
	
		$NameTable = $this->getServiceLocator ()->get ( 'NameTable' );
		
	
		if ($id == 0) {
			return $this->redirect ()->toRoute ( 'Crowler', array (
					'controller' => 'product',
					'action' => 'list-news'
			) );
		} else {
			
					$exchange_data = array ();
						
					$exchange_data['id'] = $id;
					$exchange_data['status'] = $status;
					
						
					$Crowler = new Crowler ();
					$Crowler->exchangeArray ( $exchange_data );
						
					$checkupdate = $NameTable->savestatus ( $Crowler );
		
			
			$view->id = $id;
			$view->check=$checkupdate;
			return $view;
		}
	}
	
	
	
	public function deleteAction() {
		$view = new ViewModel ();
    	$product_id = (int) $this->params()->fromRoute('id', 0);
    	if ($product_id == 0) {
    		return $this->redirect()->toRoute('Product');
    	}
    	
        $this->layout('layout/apotravinyadmin');
        $request = $this->getRequest();
        if ($request->isPost()) {
        	$del = $request->getPost()->get('del', 'No');
        	if ($del == 'Yes') {
			        $id = (int) $request->getPost()->get('id');
			        if ($id != 0) {
			        	//xoa anh
			        	$getcata = $this->getServiceLocator()->get('DeclarationTable')->get($id);
			        	if ($getcata) {
			        		$get_img_older = $getcata->avatar_images;
			        		$_dir = UPLOAD_PATH_IMG;
			        		if ($get_img_older) {
			        			$utility->deleteImage($get_img_older, $_dir);
			        		}
			        	}
			        	//xoa san pham
			           $check_delete=  $this->getServiceLocator()->get('NameTable')->delete($id);
			           $view->check = $check_delete;
			           return $view;
			        }else {
                    $view->check = 0;
                    return $view;
                }
        	}
        }
               // $view->setVariable('check_delete', $check_delete);
                $view->setVariable('id', $product_id);
                $view->setVariable('product', $this->getServiceLocator()->get('NameTable')->get($product_id));
        return $view;
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
	
	public function getdataAction() {
		$Catalogs = $this->getCatalogTable ()->fetchAll ();
		$data = array ();
		$idtmp = array ();
		foreach ( $Catalogs as $upload ) :
		if ($upload->parent == 0) {
			$id = $upload->id;
			$cat = $upload->name;
			$data [$id] = $cat;
			array_push ( $idtmp, $id );
		} else {
			$parent = $upload->parent;
			$key = array_search ( $parent, $idtmp );
			$tmp = array ();
			$id = $upload->id;
			$cat = $upload->name;
			array_splice ( $idtmp, $key + 1, 0, $id );
			if (isset ( $data [$key] )) {
				$str = $data [$key];
				$begi = '';
				$beg = substr_count ( $str, ' - ' );
				$tt = ' - ';
				while ( $beg != - 1 ) {
					$tt = ' - ' . $tt;
					$beg --;
				}
				$tmp [$id] = $tt . $cat;
			} else
				$tmp [$id] = ' -  - ' . $cat;
			array_splice ( $data, $key + 1, 0, $tmp );
		}
		endforeach
		;
		$result = array ();
		//$k = 0; $v = '';
		for($i = 0; $i < sizeof ( $data ); $i ++) {
			$result [$k] = $v;
			$k = $idtmp [$i];
			$v = $data [$i];
		}
		return $result;
	}
	
	
	public function getTagsAction() {
		$Tags = $this->getTagsTable()->fetchAll ();
		$data = array ();
		$idtmp = array ();
		foreach ( $Tags as $upload ) :
		if ($upload->parent == 0) {
			$id = $upload->id;
			$cat = $upload->name;
			$data [$id] = $cat;
			array_push ( $idtmp, $id );
		} else {
			$parent = $upload->parent;
			$key = array_search ( $parent, $idtmp );
			$tmp = array ();
			$id = $upload->id;
			$cat = $upload->name;
			array_splice ( $idtmp, $key + 1, 0, $id );
			if (isset ( $data [$key] )) {
				$str = $data [$key];
				$begi = '';
				$beg = substr_count ( $str, ' - ' );
				$tt = ' - ';
				while ( $beg != - 1 ) {
					$tt = ' - ' . $tt;
					$beg --;
				}
				$tmp [$id] = $tt . $cat;
			} else
				$tmp [$id] = ' -  - ' . $cat;
			array_splice ( $data, $key + 1, 0, $tmp );
		}
		endforeach
		;
		$result = array ();
		//$k = 0; $v = '';
		for($i = 0; $i < sizeof ( $data ); $i ++) {
			$result [$k] = $v;
			$k = $idtmp [$i];
			$v = $data [$i];
		}
		return $result;
	}
	
	public function getCatalogTable() {
		if (! $this->CatalogTable) {
			$sm = $this->getServiceLocator ();
			$this->CatalogTable = $sm->get ( 'Catalog\Model\CatalogTable' );
		}
		return $this->CatalogTable;
	}
	protected $CatalogTable;
	
	public function getTagsTable() {
		if (! $this->TagsTable) {
			$sm = $this->getServiceLocator ();
			$this->TagsTable = $sm->get ( 'Tags\Model\TagsTable' );
		}
		return $this->TagsTable;
	}
	protected $TagsTable;
}
