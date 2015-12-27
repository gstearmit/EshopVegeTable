<?php

namespace Wishlist\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Paginator\Paginator, Zend\Paginator\Adapter\Null as PageNull;
use Zend\Session\Container;

use Wishlist\Model\Wishlist;
use Wishlist\Model\WishlistTable;
use Wishlist\Form\WishlistForm;
use Wishlist\Form\WishlistFilter;


class AjaxController extends AbstractActionController {
	public $_fileName;
	protected $UserTable;
	
	public function indexAction()
	{
		//die("index/ajax");
		$this->layout('layout/bags');
		$getuser=$this->forward()->dispatch('Admin\Controller\Index',array('action'=>'getuser'));
		//var_dump($getuser);
		$this->layout()->getuser=$getuser;
		
		echo $ajax ='{
				  "dataOption": "<div class=\"response\"><p><span class=\"product-name\">Roller Suitcase was added to your shopping cart<\/span><\/p><img class=\"image\" src=\"http:\/\/alothemes.com\/demo\/smije\/media\/catalog\/product\/cache\/4\/small_image\/55x\/9df78eab33525d08d6e5fb8d27136e95\/1\/7\/17_2.jpg\" \/><div><p>There are <a href=\"http:\/\/alothemes.com\/demo\/smije\/index.php\/checkout\/cart\/\" id=\"items-count\">3 items<\/a> in your cart.<\/p><p>Cart Subtotal: <span class=\"total-price\"><span class=\"price\">$1,097.00<\/span><\/span><\/p><div class=\"action-cart\"><button onclick=\"setLocation("http:\/\/alothemes.com\/demo\/smije\/index.php\/checkout\/cart\/")\" class=\"button btn-cart\" title=\"View Cart\" type=\"button\"><span><span>View Cart<\/span><\/span><\/button><button class=\"button cart-continue\" title=\"Continue\" type=\"button\"><span><span>Continue<\/span><\/span><\/button><\/div>",
				  "count": " (3 items)",
				  "add_to_cart": "1",
				  "script": ""
				}
				';
		die;
	}
	
	public function reloadcartAction()
	{
		echo $ajax ='<div class="mini-maincart">
					<div class="cartSummary">
						<span class="icon-cart">Cart:</span> <span class="item">2 item(s) -</span>
						<span><span class="price">$641.00</span></span>
					</div>
					<div class="mini-contentCart" style="display: none">
						<div class="block-content">
							<p class="block-subtitle">Recently added item(s)</p>
							<ol id="cart-sidebar" class="mini-products-list clearfix">
								<li class="item"><a
									href="http://alothemes.com/demo/smije/index.php/roller-suitcase.html"
									title="Roller Suitcase" class="product-image"><img
										src="http://alothemes.com/demo/smije/media/catalog/product/cache/4/thumbnail/200x250/9df78eab33525d08d6e5fb8d27136e95/1/7/17_2.jpg"
										width="79" height="86" alt="Roller Suitcase" /></a>
									<div class="product-details">
										<p class="product-name">
											<a
												href="http://alothemes.com/demo/smije/index.php/roller-suitcase.html">Roller
												Suitcase</a>
										</p>
				
										<strong>1</strong> x <span class="price">$456.00</span>
				
				
										<div class="clearfix">
											<a
												href="http://alothemes.com/demo/smije/index.php/checkout/cart/configure/id/304/"
												title="Edit item" class="btn-edit">Edit item</a> <a
												href="http://alothemes.com/demo/smije/index.php/checkout/cart/delete/id/304/uenc/aHR0cDovL2Fsb3RoZW1lcy5jb21odHRwOi8vYWxvdGhlbWVzLmNvbS9kZW1vL3NtaWplLw,,/"
												title="Remove This Item" onclick="return confirm(" Are you sure
												you would like to remove this item from the shopping
												cart?");" class="btn-remove btn-remove2">Remove This Item</a>
										</div>
									</div></li>
								<li class="item"><a
									href="http://alothemes.com/demo/smije/index.php/plaid-cotton-shirt.html"
									title="Plaid Cotton Shirt" class="product-image"><img
										src="http://alothemes.com/demo/smije/media/catalog/product/cache/4/thumbnail/200x250/9df78eab33525d08d6e5fb8d27136e95/1/_/1_1.jpg"
										width="79" height="86" alt="Plaid Cotton Shirt" /></a>
									<div class="product-details">
										<p class="product-name">
											<a
												href="http://alothemes.com/demo/smije/index.php/plaid-cotton-shirt.html">Plaid
												Cotton Shirt</a>
										</p>
				
										<strong>1</strong> x <span class="price">$185.00</span>
				
				
										<div class="clearfix">
											<a
												href="http://alothemes.com/demo/smije/index.php/checkout/cart/configure/id/303/"
												title="Edit item" class="btn-edit">Edit item</a> <a
												href="http://alothemes.com/demo/smije/index.php/checkout/cart/delete/id/303/uenc/aHR0cDovL2Fsb3RoZW1lcy5jb21odHRwOi8vYWxvdGhlbWVzLmNvbS9kZW1vL3NtaWplLw,,/"
												title="Remove This Item" onclick="return confirm(" Are you sure
												you would like to remove this item from the shopping
												cart?");" class="btn-remove btn-remove2">Remove This Item</a>
										</div>
									</div></li>
							</ol>
							<p class="subtotal">
								<span class="label">Cart Subtotal:</span> <span class="price">$641.00</span>
							</p>
							<div class="actions">
								<a href="http://alothemes.com/demo/smije/index.php/checkout/cart/"
									class="view-cart"> View cart </a> <a
									href="http://alothemes.com/demo/smije/index.php/checkout/onepage/">Checkout</a>
							</div>
							<script type="text/javascript">decorateList("cart-sidebar", "none-recursive")</script>
						</div>
					</div>
				</div>
				';
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
