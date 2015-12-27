<?php

namespace Checkout\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Paginator\Paginator, Zend\Paginator\Adapter\Null as PageNull;
use Zend\Session\Container;
use Checkout\Model\Checkout;
use Checkout\Model\CheckoutTable;
use Checkout\Form\CheckoutForm;
use Checkout\Form\CheckoutFilter;

class CartController extends AbstractActionController {
	public $_fileName;
	protected $UserTable;
	public function indexAction() { 
		// layout
		$this->layout ( 'layout/bags' );
		$getuser = $this->forward ()->dispatch ( 'Admin\Controller\Index', array (
				'action' => 'getuser' 
		) );
		$this->layout ()->getuser = $getuser;
		$view = new ViewModel ();
		$this->layout ( 'layout/bags' );
		$Shoppingcart_session = new Container('shoppingcart');
		if (isset ( $Shoppingcart_session->Shoppingcart)) {
			$shopingcart = $Shoppingcart_session->Shoppingcart;
			$this->layout ()->shopingcart = $shopingcart;
			 
		}
		return $view;
	}
	public function configureAction() {
		$id = $this->params ()->fromRoute ( 'id', 0 );
	  	//layout
	  	$this->layout('layout/bags');
	  	$getuser=$this->forward()->dispatch('Admin\Controller\Index',array('action'=>'getuser'));
	  	//var_dump($getuser);
	  	$this->layout()->getuser=$getuser;
	  }
	  
	  public function deleteAction()
	  { 
	  	//layout
	  	$this->layout('layout/bags');
	  	$getuser=$this->forward()->dispatch('Admin\Controller\Index',array('action'=>'getuser'));
	    $this->layout()->getuser=$getuser;
	    $id = $this->params ()->fromRoute ( 'id'); 
	    $Shoppingcart_session = new Container('shoppingcart');
	    if (isset ( $Shoppingcart_session->Shoppingcart )) {
	    	$shopingcart = $Shoppingcart_session->Shoppingcart;
	    	if (isset ( $shopingcart [$id] )) unset ( $shopingcart [$id] );
	    	$Shoppingcart_session->Shoppingcart = $shopingcart; 
	    	$this->redirect()->toRoute('Checkout',  array('controller'=>'cart','action' =>'cart' ));
	    	//redirect($cart_url);
	    }
	    
	  }
	  
	  public function estimatepostAction()
	  {
	  	$view = new ViewModel ();
	  	$request = $this->getRequest();
	  	if($request->isPost())
	  	{
	  		$data = $request->getPost()->toArray();
	  		echo "<pre>";
	  		print_r($data);
	  		echo "</pre>";
	  		die;
	  	}
	  	return $view;
	  }
	  
	  public function addAction() { 
	  	$this->layout ( 'layout/bags' );
	  	$getuser = $this->forward ()->dispatch ( 'Admin\Controller\Index', array (
	  			'action' => 'getuser'
	  	) );
	  	$this->layout ()->getuser = $getuser;
	  } 
	  
	  public function cartAction()
	  {
	  	
	  	$view = new ViewModel ();
	  	$this->layout ( 'layout/bags' );
	  	$Shoppingcart_session = new Container('shoppingcart');
	  	if (isset ( $Shoppingcart_session->Shoppingcart)) {
	  		$shopingcart = $Shoppingcart_session->Shoppingcart;
	  		$this->layout ()->shopingcart = $shopingcart;
	  		
	  	}
	  	return $view;
	  }
	  
	  public function updatepostAction()
	  {
	  	$Shoppingcart_session = new Container('shoppingcart');
	  	$this->layout ( 'layout/bags' );
	    $request = $this->getRequest();
	  	if($request->isPost())
	  	{
	  		$data = $request->getPost()->toArray();
	  		if($data['update_cart_action']=='update_qty')
	  		{
	  			if(!empty($data['cart']) and is_array($data['cart']))
	  			{
	  				$cart =  $data['cart'];
	  				foreach ($cart as $keycart=>$value_cart)
	  				{
	  				  if (isset ( $Shoppingcart_session->Shoppingcart)) {
				  		$shopingcart = $Shoppingcart_session->Shoppingcart;
				  		$shopingcart [$keycart] ['sl'] = $value_cart['qty'];
				  		$shopingcart [$keycart] ['total'] = $shopingcart [$keycart] ['price'] * $shopingcart [$keycart] ['sl'];
				  		$Total_all = $shopingcart [$keycart] ['total'];
				  		$Shoppingcart_session->Shoppingcart = $shopingcart;
				  	  }
	  				}
	  			}
	  			$this->redirect()->toRoute('Checkout',  array('controller'=>'cart','action' =>'cart' ));
	  		}
	  		
	  		if($data['update_cart_action']=='empty_cart')
	  		{
	  			if (isset ( $Shoppingcart_session->Shoppingcart)) {
	  				$Shoppingcart_session->Shoppingcart = null;
	  			}
	  			echo '<script language="javascript"> alert("empty cart done !"); window.location.replace("' . WEBPATH . '/checkout/cart/cart"); </script>';
	  			//$this->redirect()->toRoute('Checkout',  array('controller'=>'cart','action' =>'cart' ));
	  		}

	  	}
	  	
	  }
	  
	 
}
