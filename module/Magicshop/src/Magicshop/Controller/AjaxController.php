<?php

namespace Magicshop\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Paginator\Paginator, Zend\Paginator\Adapter\Null as PageNull;
use Zend\Session\Container;

use Magicshop\Model\Magicshop;
use Magicshop\Model\MagicshopTable;
use Magicshop\Form\MagicshopForm;
use Magicshop\Form\MagicshopFilter;

use Zend\View\Model\JsonModel;

//Product
use Product\Model\Product;
use Product\Model\ProductTable;


class AjaxController extends AbstractActionController {
	public $_fileName;
	protected $UserTable;
	
	public function indexAction()
	{
		
		// Shoppingcart
		$Shoppingcart_session = new Container('shoppingcart');
		
	    $product_id  =  (int)$this->params ()->fromPost ( 'product_id',0);
		
	    if($product_id == 0) die("Not query ! Oops! Error!");
	    $IsProductView = $this->params ()->fromPost ( 'IsProductView');
		$get_product = $this->getServiceLocator()->get('ProductTable')->get($product_id);
		$name = $get_product->name;
		
		$img_featured = '';
		if ($get_product->img != '' || $get_product->img != null) {
			$img_featured = $get_product->img;
		}
		if (($get_product->img == '' and $get_product->img0 != '' ) || ($get_product->img == null and $get_product->img0 != '' )) {
			$img_featured = $get_product->img0;
		}
		if ($get_product->img == '' and $get_product->img0 == '' and $get_product->img1 != '') {
			$img_featured = $get_product->img1;
		}
		if ($get_product->img == null and $get_product->img0 == null and $get_product->img1 != '') {
			$img_featured = $get_product->img1;
		}
		if ($get_product->img == null and $get_product->img0 == null and $get_product->img1 == null) {
			$img_featured = 'default.jpg';
		}
		
		
		$id = $product_id;
		
		if (! isset ( $Shoppingcart_session->Shoppingcart)) {
			$Shoppingcart_session->Shoppingcart= array ();
		}
		
		if (isset ( $Shoppingcart_session->Shoppingcart)) {
			$shopingcart = $Shoppingcart_session->Shoppingcart;
			if (isset ( $shopingcart [$id] )) {
				$shopingcart [$id] ['sl'] = $shopingcart [$id] ['sl'] + 1;
				$shopingcart [$id] ['total'] = $shopingcart [$id] ['price'] * $shopingcart [$id] ['sl'];
				$Total_all = $shopingcart [$id] ['total'];
				$Shoppingcart_session->Shoppingcart = $shopingcart;
			} else {
				$shopingcart [$id] ['pid'] = $id;
				$shopingcart [$id] ['name'] = $name;
				$shopingcart [$id] ['img'] = $img_featured;
				$shopingcart [$id] ['sl'] = 1;
				$shopingcart [$id] ['alias'] = $get_product->alias;
				$shopingcart [$id] ['price'] = $get_product->price;
				$shopingcart [$id] ['total'] = $get_product->price * $shopingcart [$id] ['sl'];
				$Total_all = $shopingcart [$id] ['total'];
				$Shoppingcart_session->Shoppingcart = $shopingcart;
			}
			
		}
	    
		$shopingcart_count = @count($Shoppingcart_session->Shoppingcart);
		$format_number_Total = @number_format($Total_all, 0, '', '.');
		$url_checkout = WEBPATH."/checkout/cart/cart";
	    return new JsonModel(array(
			                "dataOption"=> '<div class="response">
							   <p><span class="product-name">'.$name.' was added to your shopping cart</span></p>
							   <img class="image" src="'.WEBPATH_UPLOAD_PATH_IMG_THUNB_ . '/' . $img_featured.'" />
							      <div>
							       <p>There are
							        <a href="'.WEBPATH.'/checkout/cart/cart" id="items-count">'.$shopingcart_count.' items</a>in your cart.</p>
							       <p>Cart Subtotal:
							              <span class="total-price">
							              <span class="price">$'.$format_number_Total.'</span></span></p>
							             <div class="action-cart">
							                 <a href="'.$url_checkout.'" class="buttonshoppingcart button btn-cart" title="View Cart" ><span>View Cart</span></a>
							                 <button class="button cart-continue" title="Continue" type="button">
							                   <span><span>Continue</span></span></button>
							     </div>',
						     "count" =>"'.$shopingcart_count.'",
						     "add_to_cart"=> "1",
						     "script"=> "",
	    		             "product_id"=>$product_id,
	    		             "IsProductView"=>$IsProductView,
        ) );
	    
	}
	
	public function reloadcartAction()
	{
		echo $stringnew = '<div id="popupAjaxcart" style="display: block;"><div id="toPopup" style="display: block;"><div class="response"><p><span class="product-name">Dorian Perforated Oxford was added to your shopping cart</span></p><img class="image" src="http://alothemes.com/demo/smije/media/catalog/product/cache/4/small_image/55x/9df78eab33525d08d6e5fb8d27136e95/1/2/12_6.jpg"><div><p>There are <a href="http://alothemes.com/demo/smije/index.php/checkout/cart/" id="items-count">3 items</a> in your cart.</p><p>Cart Subtotal: <span class="total-price"><span class="price">$957.00</span></span></p><div class="action-cart"><button onclick="setLocation("http://alothemes.com/demo/smije/index.php/checkout/cart/")" class="button btn-cart" title="View Cart" type="button"><span><span>View Cart</span></span></button><button class="button cart-continue" title="Continue" type="button"><span><span>Continue</span></span></button></div></div></div></div><div class="loading" style="display: none;"></div><div class="overlay" style="display: block; opacity: 0.7;"></div><div></div></div>';
		die;
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
