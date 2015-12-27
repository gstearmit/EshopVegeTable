<?php
 namespace Channels\Controller;

 use Zend\Mvc\Controller\AbstractActionController;
 use Zend\View\Model\ViewModel;
 use Channels\Model\Channels;          // <-- Add this import
 use Channels\Form\SearchForm;       // <-- Add this import
 use Zend\Session\Container; 
 use Zend\ServiceManager\ServiceLocatorAwareInterface;
 class IndexController extends AbstractActionController
 {
    public function indexAction()
    {
        	        //header------------------------------------------------
        ob_start( 'ob_gzhandler' );
        $this->layout('layout/home');
        $catalog=$this->forward()->dispatch('Catalog\Controller\Index',array('action'=>'getdata'));
        $this->layout()->catalog=$catalog;
        $getuser=$this->forward()->dispatch('Admin\Controller\Index',array('action'=>'getuser'));
        //var_dump($getuser);
        $allcat=$this->forward()->dispatch('Catalog\Controller\Index',array('action'=>'getall'));
        $this->layout()->getuser=$getuser;    
         $channel_code = $this->params()->fromRoute('user', 0);
		 $k=$this->getChannelsTable()->get_channel_by_code($channel_code);
		 if($k){
			 
			 $this->layout()->channel=$k;			 
			 $l = $this->params()->fromRoute('type', 0);
			 $this->layout()->type=$l;
			 if($l!=""&&$l=="playlist"){
			 $this->layout()->check=false;			 
			 }
		 }else{
			$this->layout()->check=true;
			$res=$this->getChannelsTable()->fetchAll();
			$this->layout()->res=$res;
		 }
    }
    public function addChannelAction()
    {
    }
    public function addvideoAction()
    {
    	$channel_code = $this->params()->fromRoute('user', 0);
    }
    public function addplaylistAction()
    {
    }
       

	 public function getChannelsTable()
     {
         if (!$this->ChannelsTable) {
             $sm = $this->getServiceLocator();
             $this->ChannelsTable = $sm->get('Channels\Model\ChannelsTable');
         }
         return $this->ChannelsTable;
     }
	 protected $ChannelsTable;

 }
 ?>