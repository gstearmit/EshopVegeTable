<?php

namespace Slideshow\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Session\Container;
use Slideshow\Form\Slideform;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
//form

// form upload
use Zend\Http\PhpEnvironment\Request;
use Main\Model\Utility;
//File Size
use Zend\Validator\File\Size;
use Zend\Validator\File\Extension;
//Paginator
use Zend\Paginator\Paginator,
    Zend\Paginator\Adapter\Null as PageNull;
use Zend\Db\Sql\Select;
use Slideshow\Model\Slide;
use Slideshow\Form\SlideFilter;
use Doctrine\Tests\Common\Annotations\Null;



class IndexController extends AbstractActionController {
      public function getSlideTable() {
        if (!$this->SlideTable) {
            $sm = $this->getServiceLocator();
            $this->SlideTable = $sm->get('Slideshow\Model\SlideTable');
        }
        return $this->SlideTable;
    }
    protected $SlideTable;
    
    
    public function indexAction() {	
    	
    	$this->layout('layout/bags');
    	$getuser = $this->forward()->dispatch('Admin\Controller\Index', array(
    			'action' => 'getuser'
    	));
    	$this->layout()->getuser = $getuser;
    	if (!$getuser) {// notlogin
    		$this->redirect()->toUrl(WEBPATH);
    	}
    	$this->layout()->getuser = $getuser;
    	
    	//$ProductTable = $this->getServiceLocator()->get('ProductTable');
    	$allRecord = $this->getSlideTable()->countAll();//print_r($allRecord);die;
    	$pageNull = new PageNull($allRecord);
    	$itemsPerPage = 5;
    	$pageRange = 3;
    	$page = $this->params()->fromRoute('page', 1);
    	$offset = ($page - 1) * $itemsPerPage;
    	$paginator = new Paginator($pageNull);
    	$paginator->setCurrentPageNumber($page);
    	$paginator->setItemCountPerPage($itemsPerPage);
    	$paginator->setPageRange($pageRange);
    	$listpr_tmp = $this->getSlideTable()->getList ( $offset, $itemsPerPage );
    	//---------------------------------
    	$fetch_slideshow = $this->getSlideTable()->getList ( $offset, $itemsPerPage );
    	$this->layout()->fetch_slideshow =$fetch_slideshow;
    	return new ViewModel(array(            
            'paginator' => $paginator,
            'allRecord' => $allRecord,
            'offset' => $offset,
            'itemsPerPage' => $itemsPerPage
        ));
    	
    }//end function indexAction()
    
    public function addAction() {
    	//=======check login
    	$utility = new Utility ();
    	$this->layout('layout/bags');
    	$getuser = $this->forward()->dispatch('Admin\Controller\Index', array(
    			'action' => 'getuser'
    	));
    	$this->layout()->getuser = $getuser;
    	// notlogin
    	if (!$getuser) {
    		$this->redirect()->toUrl(WEBPATH);
    	}
    	
    	
    	//load librarie Form
    	$slider = new Slide();
    	
    	$dbAdapter = $this->getServiceLocator()->get('Zend\Db\Adapter\Adapter');
    	$form = new Slideform($dbAdapter);

    	
    	$form->setInputFilter(new SlideFilter()); 
    	
    	
    	
        if ($this->getRequest()->isPost()) {
        	$form->setInputFilter($slider->getInputFilter());
            $data = array_merge_recursive(
                    $this->getRequest()->getPost()->toArray(),
            	   $this->getRequest()->getFiles()->toArray()
            );
            $form->setData($data);
            if ($form->isValid()) {//valide = true
            	//======upload and resize images
            	$_array_img = $this->params()->fromFiles('img');//die;
            	$img_src = $utility->uploadImageSlideshow($_array_img);
				
            	$data = array(
            		'text' => $this->params()->fromPost('text'),
            		'link' => $this->params()->fromPost('link'),
            		'status' => $this->params()->fromPost('status'),
            		'img' =>$img_src
            	);
				$obj= new Slide();
				$obj->exchangeArray($data);
				$a = $this->getSlideTable()->add_slide($obj);
				$this->redirect()->toRoute('Slideshow');
            }
            
            
            
        }//and func
    		
        return new ViewModel(array(
        		'form' => $form,
        ));
    	
 }
    	
    

    public function statusAction(){
    	
    	$this->layout('layout/bags');
    	$id = (int) $this->params()->fromRoute('id', 0);
        $status = (int) $this->params()->fromRoute('status', 0);
        if($status==0){
        	$data=array(
        		'id'=>$id,
        		'status'=>1,	
        	);        
        }
        if($status==1){
        	$data=array(
        			'id'=>$id,
        			'status'=>0,
        	);
        }
        $obj= new Slide();
        $obj->exchangeArray($data);        
        $this->getSlideTable()->update_Status($obj);
        $this->redirect()->toRoute('Slideshow');
        
    }
    public function editAction() {
    	$id = (int) $this->params()->fromRoute('id', 0);
    	$fetch_row = $this->getSlideTable()->fetch_row($id);
    	
    	$img_older = $fetch_row->img;
    	$this->layout()->show_img= $fetch_row->img;
    	//=======check login
    	$utility = new Utility ();
    	$this->layout('layout/bags');
    	$getuser = $this->forward()->dispatch('Admin\Controller\Index', array(
    			'action' => 'getuser'
    	));
    	$this->layout()->getuser = $getuser;
    	// notlogin
    	if (!$getuser) {
    		$this->redirect()->toUrl(WEBPATH);
    	}
    	
    	//load librarie Form
    	$slider = new Slide();
    	$dbAdapter = $this->getServiceLocator()->get('Zend\Db\Adapter\Adapter');
    	
    	$form = new Slideform($dbAdapter); 
    	$form->setInputFilter(new SlideFilter()); 
    	$requets = $this->getRequest();
        if ($this->getRequest()->isPost()) {
        	$form->setInputFilter($slider->getInputFilter());
            $data = array_merge_recursive(
                    $requets->getPost()->toArray(),
            	   $requets->getFiles()->toArray()
            );
            $form->setData($data);
            if ($form->isValid()) {//valide = true
            	// delete img older 
            	$dir = ROOT_PATH.'/public/imgslideshow';
            	$utility->deleteSlideshow($img_older, $dir);
            	// delete img older thumb_slideshow
            	$dir = ROOT_PATH.'/public/imgslideshow/thumb_slideshow';
            	$utility->deleteSlideshow($img_older, $dir);
            	// delete img older thumb_slideshow2
            	$dir = ROOT_PATH.'/public/imgslideshow/thumb_slideshow2';
            	$utility->deleteSlideshow($img_older, $dir);
            	//======upload and resize images
            	$_array_img = $data['img'];
            	
            	
            	$img_src = $utility->uploadImageSlideshow($_array_img);
            	
            	$data = array(
            		'id' => $id,
            		'text' => $this->params()->fromPost('text'),
            		'link' => $this->params()->fromPost('link'),
            		'status' => $this->params()->fromPost('status'),
            		'img' =>$img_src
            	);
				$obj= new Slide();
				$obj->exchangeArray($data);
				$checkupdate = $this->getSlideTable()->update_slide($obj);
				 
				if($checkupdate == 1)  {
				   $url = WEBPATH.'/slideshow/index';
			       return	$this->redirect()->toUrl($url);
				}
				if($checkupdate == 0) { 
					//  $error = false;
					 // die(" not update");
				}
            }else{
            	if(($this->params()->fromFiles('img'))&&($this->params()->frompost('text')!=null)&&($this->params()->frompost('link')!=null)){
            		
            		$a= $this->params()->fromFiles('img');
            		
            		if( ($a['type']=='image/jpg')||($a['type']==Null)){
            			$data = array(
            					'id' => $id,
            					'text' => $this->params()->fromPost('text'),
            					'link' => $this->params()->fromPost('link'),
            					'status' => $this->params()->fromPost('status'),
            					'img' => $fetch_row->img,
            			);
            			$obj= new Slide();
            			$obj->exchangeArray($data);
            			$checkupdate = $this->getSlideTable()->update_slide($obj);
            			$url = WEBPATH.'/slideshow/index';
            			return	$this->redirect()->toUrl($url);
            		}
            		
            	}
            	
            }
        }else {
        	
//         	echo "<pre>";
//         	print_r($fetch_row);
//         	echo "</pre>";
        	
        	$form->bind($fetch_row);
        	$form->get('btn_submit')->setAttribute('value', 'Edit Slide');
//         	$form->get('text')->setAttribute('value', '<xmp>'.$fetch_row->text.'</xmp>');
        }
        
        
    		
        return new ViewModel(array(
        		'form' => $form,
        		//'error'=>$error,
        ));
    	
 }
    
    
    public function deleteAction() {
    	
    	$id = (int) $this->params()->fromRoute('id', 0);
    	$fetch_row = $this->getSlideTable()->fetch_row($id);
    	$img_older = $fetch_row->img;
    	$this->layout()->show_img= $fetch_row->img;
    	//=======check login
    	$utility = new Utility ();
    	$this->layout('layout/bags');
    	$getuser = $this->forward()->dispatch('Admin\Controller\Index', array(
    			'action' => 'getuser'
    	));
    	$this->layout()->getuser = $getuser;
    	// notlogin
    	if (!$getuser) {
    		$this->redirect()->toUrl(WEBPATH);
    	}
    	$post = $_POST;
    	if($post['del']=='Yes'){
    	// delete img older 
            	$dir = ROOT_PATH.'/public/imgslideshow';
            	$utility->deleteSlideshow($img_older, $dir);
            	// delete img older thumb_slideshow
            	$dir = ROOT_PATH.'/public/imgslideshow/thumb_slideshow';
            	$utility->deleteSlideshow($img_older, $dir);
            	// delete img older thumb_slideshow2
            	$dir = ROOT_PATH.'/public/imgslideshow/thumb_slideshow2';
            	$utility->deleteSlideshow($img_older, $dir);
            	//======upload and resize images
            	$_array_img = $this->params()->fromFiles('img');//die;
            	$img_src = $utility->uploadImageSlideshow($_array_img);
            	
				$checkupdate = $this->getSlideTable()->delete($id);
				 
				   $url = WEBPATH.'/slideshow/index';
			       return	$this->redirect()->toUrl($url);
				}
    	if($post['del']=='No') {
    		$url = WEBPATH.'/slideshow/index';
			       return	$this->redirect()->toUrl($url);
    	}
    	
    	
    }//and fucn
    
    
    
    
    
}

?>