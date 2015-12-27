<?php

namespace News\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use News\Form\NewsFilter, News\Form\NewsForm;
use News\Model\News;
use News\Model\NewsTable;
use Zend\Paginator\Paginator, Zend\Paginator\Adapter\Null as PageNull;

use Zend\Session\Container;

class NewsController extends AbstractActionController {

    public $_fileName;

   
    
    public function addNewsAction() {
    	
         $this->layout('layout/home');
         
         $catalog=$this->forward()->dispatch('Catalog\Controller\Index',array('action'=>'getdata'));
         $this->layout()->catalog=$catalog;
         $allcat=$this->forward()->dispatch('Catalog\Controller\Index',array('action'=>'getall'));
         $this->layout()->allcat=$allcat;
         $getuser=$this->forward()->dispatch('Admin\Controller\Index',array('action'=>'getuser'));
		if(!$getuser)
		{
			// not yet login
			$this->redirect ()->toRoute ( 'home');
		}
		$this->layout()->getuser=$getuser;
    	
        $form = new NewsForm();
        $form->setInputFilter(new NewsFilter());

        if ($this->getRequest()->isPost()) {
            $data = array_merge_recursive(
                    $this->getRequest()->getPost()->toArray(), $this->getRequest()->getFiles()->toArray()
            );
            $form->setData($data);
            if (!$form->isValid()) {
                return new ViewModel(array(
                    'error' => true,
                    'form' => $form,
                ));
            } else {
                $fileName = $this->upload();

                $exchange_data = array();
                $exchange_data['news_thumbnail'] = $fileName;
                $exchange_data['news_name'] = $data['news_name'];
                $exchange_data['news_content'] = $data['news_content'];
                $exchange_data['url_static'] = $data['url_static'];
                $newsModel = new News();
                $newsModel->exchangeArray($exchange_data);
                $this->getServiceLocator()->get('NewsTable')->saveNews($newsModel);
                return $this->redirect()->toRoute('News', array('controller' => 'news', 'action' => 'list-news'));
            }
        }

        return new ViewModel(array(
            'form' => $form,
        ));
    }
    
    public function newsviewAction()
    {
    	$this->layout('layout/home');
    	$catalog=$this->forward()->dispatch('Catalog\Controller\Index',array('action'=>'getdata'));
    	$this->layout()->catalog=$catalog;
    	$allcat=$this->forward()->dispatch('Catalog\Controller\Index',array('action'=>'getall'));
    	$this->layout()->allcat=$allcat;
    	$getuser=$this->forward()->dispatch('Admin\Controller\Index',array('action'=>'getuser'));
		
		$this->layout()->getuser=$getuser;
    	
    	$code = $this->params()->fromRoute('code',0);
    	if($code)
    	{
    		$newsTable = $this->getServiceLocator()->get('NewsTable');
    		$detailview = $newsTable->getNewsByUrl($code);
    		
    		
    	}else 
    	{
    		die('Not Exits content or url !');
    	}
    	
   
    	return new ViewModel(array(
    			 'detailview' => $detailview,
    	));
    	
    }

    public function listNewsAction() {
    
    	$this->layout('layout/admintheme');
    	
    	$catalog=$this->forward()->dispatch('Catalog\Controller\Index',array('action'=>'getdata'));
    	$this->layout()->catalog=$catalog;
    	$allcat=$this->forward()->dispatch('Catalog\Controller\Index',array('action'=>'getall'));
    	$this->layout()->allcat=$allcat;
    	$getuser=$this->forward()->dispatch('Admin\Controller\Index',array('action'=>'getuser'));
		if(!$getuser)
		{
			// not yet login
			$this->redirect ()->toRoute ( 'home');
		}
		$this->layout()->getuser=$getuser;
    	
        $newsTable = $this->getServiceLocator()->get('NewsTable');
        $allRecord = $newsTable->countAll();
        $pageNull = new PageNull($allRecord);
        $itemsPerPage = 10;
        $pageRange = 5;
        $page = $this->params()->fromRoute('page', 1);
        $offset = ($page - 1) * $itemsPerPage;
        $paginator = new Paginator($pageNull);
        $paginator->setCurrentPageNumber($page);
        $paginator->setItemCountPerPage($itemsPerPage);
        $paginator->setPageRange($pageRange);
        return new ViewModel(array(
            'listNews' => $newsTable->getList($offset, $itemsPerPage),
            'paginator' => $paginator,
            'allRecord' => $allRecord,
            'offset' => $offset,
            'itemsPerPage' => $itemsPerPage,
        ));
    }

    public function editNewsAction() {
    	$this->layout('layout/home');
    	$catalog=$this->forward()->dispatch('Catalog\Controller\Index',array('action'=>'getdata'));
    	$this->layout()->catalog=$catalog;
    	$allcat=$this->forward()->dispatch('Catalog\Controller\Index',array('action'=>'getall'));
    	$this->layout()->allcat=$allcat;
    	$getuser=$this->forward()->dispatch('Admin\Controller\Index',array('action'=>'getuser'));
		if(!$getuser)
		{
			// not yet login
			$this->redirect ()->toRoute ( 'home');
		}
		$this->layout()->getuser=$getuser;
    	
        $news_id = $this->params()->fromRoute('id', 0);
        if ($news_id == 0) {
            return $this->redirect()->toRoute('News', array('controller' => 'news', 'action' => 'list-news'));
        } else {
            $newsTable = $this->getServiceLocator()->get('NewsTable');
            $form = new NewsForm();
            $form->setInputFilter(new NewsFilter());
            $form->get('news_thumbnail')->removeAttributes(array('required'));
            $filter = $form->getInputFilter();
            $filter->get('news_thumbnail')->setRequired(false);

            $newsDetail = $newsTable->getNewsById($news_id);
            $this->_fileName = $newsDetail->news_thumbnail;
            $form->bind($newsDetail);
            if ($this->getRequest()->isPost()) {
                $data = array_merge_recursive(
                        $this->getRequest()->getPost()->toArray(), $this->getRequest()->getFiles()->toArray()
                );
                $form->setData($data);
                if (!$form->isValid()) {
                    return new ViewModel(array(
                        'error' => true,
                        'form' => $form,
                        'image' => $this->_fileName,
                        'news_id' => $news_id
                    ));
                } else {
                    $exchange_data = array();
                    $exchange_data['news_id'] = $news_id;
                    if ($data['news_thumbnail']['name'] == "") {
                        $exchange_data['news_thumbnail'] = '';
                    } else {
                        $fileName = $this->upload();
                        $exchange_data['news_thumbnail'] = $fileName;
                    }

                    $exchange_data['news_name'] = $data['news_name'];
                    $exchange_data['news_content'] = $data['news_content'];

                    $newsModel = new News();
                    $newsModel->exchangeArray($exchange_data);
                    $newsTable->saveNews($newsModel);
                    return $this->redirect()->toRoute('News', array('controller' => 'news', 'action' => 'list-news'));
                }
            }
            return new ViewModel(array(
                'form' => $form,
                'image' => $this->_fileName,
                'news_id' => $news_id
            ));
        }
    }

    public function deleteNewsAction() {
        $id = $this->params()->fromRoute('id', 0);
        if ($id != 0) {
            $this->getServiceLocator()->get('NewsTable')->deleteNews($id);
            return $this->redirect()->toRoute('News', array('controller' => 'news', 'action' => 'list-news'));
        }
    }

    public function upload() {
        $adapter = new \Zend\File\Transfer\Adapter\Http();
        $fileImage = "file-" . rand(100, 999) . ".png";
        foreach ($adapter->getFileInfo() as $info) {
            if ($info['name'] != null) {
                $adapter->addFilter('File\Rename', array(
                    'target' => 'public/uploads/' . $fileImage,
                    'overwrite' => true), $info['name']
                );
                $adapter->receive($info['name']);
            }
        }
        return $fileImage;
    }

}
