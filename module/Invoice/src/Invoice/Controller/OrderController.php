<?php

namespace Invoice\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Session\Container;
use Invoice\Model\Oder;
use Invoice\Model\Oderdetail;
use Zend\Db\Sql\Select;
use Zend\Paginator\Paginator;
use Zend\Paginator\Adapter\Iterator as paginatorIterator;
class OrderController extends AbstractActionController {

    protected $Catalog_Adt;

    public function getCatalogAdtTable() {
        if (!$this->Catalog_Adt) {
            $sm = $this->getServiceLocator();
            $this->Catalog_Adt = $sm->get('Apotravinycz\Model\CatalogTable');
        }
        return $this->Catalog_Adt;
    }

    protected $Product_Adt;

    public function getProductAdtTable() {
        if (!$this->Product_Adt) {
            $sm = $this->getServiceLocator();
            $this->Product_Adt = $sm->get('Apotravinycz\Model\ApotravinyczproductTable');
        }
        return $this->Product_Adt;
    }

    protected $Order;

    public function getOrderAdtTable() {
        if (!$this->Order) {
            $sm = $this->getServiceLocator();
            $this->Order = $sm->get('Invoice\Model\OderTable');
        }
        return $this->Order;
    }

    protected $Orderdeail;

    public function getOrderdetailAdtTable() {
        if (!$this->Orderdeail) {
            $sm = $this->getServiceLocator();
            $this->Orderdeail = $sm->get('Invoice\Model\OderdetailTable');
        }
        return $this->Orderdeail;
    }
    public function indexAction() {
         $getuser = $this->forward()->dispatch('Admin\Controller\Index', array('action' => 'getuser'));
        if (!$getuser) {
            // not yet login
            $this->redirect()->toRoute('home');
        }
        $this->layout()->getuser = $getuser;
        $this->layout('layout/apotravinyadmin');
       
        $select = new Select();
        $page = $this->params()->fromRoute('page') ? (int) $this->params()->fromRoute('page') : 1;
        $data_order = $this->getOrderAdtTable()->listorder(); 
        $itemsPerPage = 10;
        $data_order->current();
        $paginator = new Paginator(new paginatorIterator($data_order));
        $paginator->setCurrentPageNumber($page)
                ->setItemCountPerPage($itemsPerPage)
                ->setPageRange(5);
        
        return new ViewModel(array(                   
                    'page' => $page,
                    'paginator' => $paginator,
                    
                ));
    }
    public function viewAction(){
        $getuser = $this->forward()->dispatch('Admin\Controller\Index', array('action' => 'getuser'));
        if (!$getuser) {
            // not yet login
            $this->redirect()->toRoute('home');
        }
        $this->layout()->getuser = $getuser;
        $this->layout('layout/apotravinyadmin');
        $id_order=  $this->params()->fromRoute('id');
       $data_oder=  $this->getOrderAdtTable()->view_order($id_order);
       $id_oder_detail=$data_oder['id'];
       $data_detail[$id_oder_detail]=  $this->getOrderdetailAdtTable()->get_array_order($id_oder_detail);
       foreach ($data_detail[$id_oder_detail] as $key=>$value){
           $id_product=$value['id_product'];
           $data_product[$id_product]=  $this->getProductAdtTable()->product_detail($id_product);
       }
       return array(
           'data'=>$data_oder,
           'data_detail'=>$data_detail,
           'data_product'=>$data_product,
           );
    }
    public function updatestatusAction(){
        $id=  $this->params()->fromPost('id_oder');
        $status=  $this->params()->fromPost('status');
       $data=array(
         'status_oder'=>$status,
       );
       $obj=new Oder();
       $obj->exchangeArray($data);
       $this->getOrderAdtTable()->update_status($id, $obj);
       echo 'Change status successful bill';
        die;
    }
    public function deleteAction(){
        $id_order=  $this->params()->fromRoute('id');
        $this->getOrderAdtTable()->delete_oder($id_order);
        $this->getOrderdetailAdtTable()->delete_oder_detail($id_order);
        $this->redirect()->toUrl(WEBPATH.'/invoice/order/index');
    }
}
