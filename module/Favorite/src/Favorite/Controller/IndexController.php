<?php

namespace Favorite\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Favorite\Model\Favorite;
use Zend\Db\Sql\Select;
use Zend\Paginator\Paginator;
use Zend\Paginator\Adapter\Iterator as paginatorIterator;
use Zend\Session\Container;

class IndexController extends AbstractActionController {

    protected $Favorite;

    private function getFavoriteTable() {
        if (!$this->Favorite) {
            $pst = $this->getServiceLocator();
            $this->Favorite = $pst->get("Fronts\Model\FavoriteTable");
        }
        return $this->Favorite;
    }
    protected $Catalog_Adt;

    public function getCatalogAdtTable() {
        if (!$this->Catalog_Adt) {
            $sm = $this->getServiceLocator();
            $this->Catalog_Adt = $sm->get('Apotravinycz\Model\CatalogTable');
        }
        return $this->Catalog_Adt;
    }
    public function indexAction() {
         $session_user = new Container('userlogin');
        $id_Us = $session_user->idus;
          $this->layout ( 'layout/lazadatheme' );
           //--------------
        $data_m = $this->getCatalogAdtTable()->listcatalog();
        $sub_menu = array();
        foreach ($data_m as $key => $value) {
            $parent_id = $value['id'];
            $sub_menu[$parent_id] = $this->getCatalogAdtTable()->submenu($parent_id);
        }
        //------------
        
        $list_product =  $this->getFavoriteTable()->product_wishlist($id_Us);
        
        return array(             
              'data_m'=>$data_m,
              'sub_menu'=>$sub_menu,
              'list_product'=>$list_product
              );
    }
     
    public function addwishlistAction(){
        $session_user = new Container('userlogin');
        $id_Us = $session_user->idus;

        $id_pro = $this->params()->fromPost('id_pro');        
        $check=  $this->getFavoriteTable()->checkfavorite($id_Us,$id_pro);
        if($check){
        $data=array('customer_ID'=>$id_Us, 'product_ID'=>$id_pro);
        $obj=new Favorite();
        $obj->exchangeArray($data);
        $this->getFavoriteTable()->addfavorite($obj);
        $data_number=  $this->getFavoriteTable()->listfavorite_user($id_Us);
        $session_wishlist = new Container('wishlist');
        $session_wishlist->wishlist=  count($data_number);          
        //echo count($data_number);
        echo 'sucess';
        die;
        }  else {
           echo 'Error';
           die;
        }
    }

    public function deletefavoriteAction(){     
        $this->layout ( 'layout/lazadatheme' );      
        $id_pro=  $this->params()->fromRoute('id');   
        $status =$this->params()->fromRoute('status');      
        $this->getFavoriteTable()->deletefavorite($id_pro); 
        if($status==0){
        $this->redirect()->toUrl(WEBPATH.'/customer/wishlist/index');
        }else if($status==1){
         $this->redirect()->toUrl(WEBPATH.'/lazada/index');  
        }else if($status == 2){
          $this->redirect()->toUrl(WEBPATH.'/lazada/index/detailproduct/'.$id_pro);  
        }
    }
// Theme Apo
    public function wishlistindexAction() {
        $session_user = new Container('userlogin');
        $id_Us = $session_user->idus;
        if($id_Us == null){
            $this->redirect()->toUrl(WEBPATH.'/apotraviny/index/login');
        }
        $this->getcatalog();
        $this->layout('layout/apotravinytheme');    
        $cat_left = $this->getCatalogAdtTable()->listcatalog();
        $list_product =  $this->getFavoriteTable()->product_wishlist($id_Us);        
        return array(       
              'cat_left'=>$cat_left,
              'list_product'=>$list_product
              );
    }
    public function deletewishlistAction(){     
        $this->layout ( 'layout/apotravinytheme' );      
        $id_pro=  $this->params()->fromRoute('id');  
        $flag=  $this->params()->fromRoute('status');       
        $this->getFavoriteTable()->deletefavorite($id_pro); 
        if($flag == 0){
        $this->redirect()->toUrl(WEBPATH.'/customer/wishlist/wishlistindex');
        }else if($flag == 1){
        $this->redirect()->toUrl(WEBPATH.'/apotraviny/index');    
        }else{
        $this->redirect()->toUrl(WEBPATH.'/apotraviny/index/viewproductcat/'.$flag);  
        }
    }
     private function getcatalog() {
        $data = $this->getCatalogAdtTable()->listcatalog();
        $sub_menu = array();
        foreach ($data as $key => $value) {
            $parent_id = $value['id'];
            $sub_menu[$parent_id] = $this->getCatalogAdtTable()->submenu($parent_id);
        }
        $this->layout()->setVariable('menu', $data);
        $this->layout()->setVariable('submenu', $sub_menu);
    }
}

?>