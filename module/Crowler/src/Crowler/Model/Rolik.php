<?php

namespace Crowler\Model;
use Zend\Mvc\Controller\AbstractActionController;
// rss
use Zend\Feed\Reader as feed;
use Zend\View\Model\JsonModel;
use Zend\Http\Client as HttpClient;
use Zend\Http\Client\Adapter\Curl;
// DOM
use DOMDocument;
use DOMXPath;
use DOMNode;
use Zend\Stdlib\ErrorHandler;
use Zend\Dom\Query;

ob_start ( 'ob_gzhandler' );
use Crowler\Model\Rohlikdetail as RohlikDetail;

class Rolik {
	
	protected $httpcode; 
	public  $Iteams = array ();
	protected $ProductName = array ();
	protected $Product_Url = array ();
	protected $ProductImg = array ();
	protected $ProductPrice = array ();
	protected $ProductPromotion = array ();
	protected $ProductDetail = array ();
	protected $CountryofOrigin = array ();
	protected $HTTP_CODE = array ();
	protected $Url_get ;
	protected $Body_get = array ();
	protected $host;
	protected $Dom_product_name;
	protected $Dom_product_price;
	protected $Dom_product_images;
	protected $Dom_product_href_detail;
	protected $Dom_product_promotion;
	protected $Dom_CountryofOrigin;
	protected $Dom_ProductDetails;
	protected $body='';
	protected $ALL_iteams = array();
	protected $data_popuplink = array();
	protected $Url = array();
	protected $ProductId = array();
	protected $_tmp_Url_get_detail;
	
	
	public function __construct($_url_get_crowler,
			                    $setHost,$setDom_product_name,$setDom_product_price,
			                    $setDom_product_images,$setDom_product_href_detail,
			                    $setDom_product_promotion,$setDom_CountryofOrigin,
			                    $setDom_ProductDetails
	                         ) 
	{
		$this->Url_get = $_url_get_crowler;
		$this->host = $setHost;
		$this->Dom_product_name = $setDom_product_name;
		$this->Dom_product_price = $setDom_product_price;
		$this->Dom_product_images = $setDom_product_images;
		$this->Dom_product_href_detail = $setDom_product_href_detail;
		$this->Dom_product_promotion = $setDom_product_promotion;
		$this->Dom_CountryofOrigin = $setDom_CountryofOrigin ;
		$this->Dom_ProductDetails =  $setDom_ProductDetails;
		
		$this->Iteams = null;
	}
	
	/**start function property**/
	/*
	 * Set and Get $httpcode
	*/
	public function setStatus_url_check($newval) {
		$this->httpcode = $newval;
	}
	public function getStatus_url_check() {
		return $this->httpcode;
	}
	
	/*
	 * Set and Get $Iteams
	*/
	public function setPropertyIteams($data) {
		$this->Iteams = $data;
	}
	public function getPropertyIteams() {
		return $this->Iteams;
	}
	
	/*
	 * Set and Get $ProductName
	*/
	public function setPropertyProductName($ArrayProductName) {
		$this->ProductName = $ArrayProductName;
	}
	public function getPropertyProductName() {
		return $this->ProductName;
	}
	
	/*
	 * Set and Get $Product_Url
	*/
	public function setPropertyProduct_Url($ArrayUrl) {
		$this->Product_Url = $ArrayUrl;
	}
	public function getPropertyProduct_Url() {
		return $this->Product_Url;
	}
	
	/*
	 * Set and Get $ProductImg
	*/
	public function setPropertyProductImg($ArrayProductImg) {
		$this->ProductImg = $ArrayProductImg;
	}
	public function getPropertyProductImg() {
		return $this->ProductImg;
	}
	
	/*
	 * Set and Get $ProductPrice
	*/
	public function setPropertyProductPrice($ArrayProductPrice) {
		$this->ProductPrice = $ArrayProductPrice;
	}
	public function getPropertyProductPrice() {
		return $this->ProductPrice;
	}
	
	/*
	 * Set and Get $ProductPromotion
	*/
	public function setPropertyProductPromotion($ArrayProductPromotion) {
		$this->ProductPromotion = $ProductPromotion;
	}
	public function getPropertyProductPromotion() {
		return $this->ProductPromotion;
	}
	
	/*
	 * Set and Get $ProductDetail
	*/
	public function setPropertyProductDetail($ArrayDetail) {
		$this->ProductDetail = $ArrayDetail;
	}
	public function getPropertyProductDetail() {
		return $this->ProductDetail;
	}
	
	
	/*
	 * Set and Get $CountryofOrigin
	*/
	public function setPropertyCountryofOrigin($countryoforigin) {
		$this->CountryofOrigin = $countryoforigin;
	}
	public function getPropertyCountryofOrigin() {
		return $this->CountryofOrigin;
	}
	
	/*
	 * Set and Get $HTTP_CODE
	*/
	public function setPropertyHttpCode($_HTTP_CODE) {
		$this->HTTP_CODE = $_HTTP_CODE;
	}
	public function getPropertyHttpCode() {
		return $this->HTTP_CODE;
	}
	
	/*
	 * Set and Get $Url_get
	*/
	public function setPropertyUrl_get($_Url_get) {
		$this->Url_get = $_Url_get;
	}
	public function getPropertyUrl_get() {
		return $this->Url_get;
	}
	
	
	/*
	 * Set and Get $Body_get
	*/
	public function setPropertyBody_get($_Body_get) {
		$this->Body_get = $_Body_get;
	}
	public function getPropertyBody_get() {
		return $this->Body_get;
	}
	
	/*
	 * Set and Get $host
	*/
	public function setHost($_host_url) {
		$this->host = $_host_url;
	}
	public function getHost() {
		return $this->host;
	}
	
	/*
	 * Set and Get $Dom_product_name
	*/
	public function setDom_product_name($dom_name) {
		$this->Dom_product_name = $dom_name ;
	}
	public function getDom_product_name() {
		return $this->Dom_product_name;
	}
	
	/*
	 * Set and Get $Dom_product_price
	*/
	public function setDom_product_price($dom_price) {
		$this->Dom_product_price = $dom_price ;
	}
	public function getDom_product_price() {
		return $this->Dom_product_price;
	}
	
	/*
	 * Set and Get $Dom_product_images
	*/
	public function setDom_product_images($dom_images) {
		$this->Dom_product_images = $dom_images;
	}
	public function getDom_product_images() {
		return $this->Dom_product_images;
	}
	
	/*
	 * Set and Get $Dom_product_href_detail
	*/
	public function setDom_product_href_detail($dom_href_detail) {
		$this->Dom_product_href_detail = $dom_href_detail ;
	}
	public function getDom_product_href_detail() {
		return $this->Dom_product_href_detail;
	}
	
	/*
	 * Set and Get $Dom_product_promotion
	*/
	public function setDom_product_promotion($dom_promotion) {
		$this->Dom_product_promotion = $dom_promotion ;
	}
	public function getDom_product_promotion() {
		return $this->Dom_product_promotion;
	}
	
	/*
	 * Set and Get $Dom_CountryofOrigin
	*/
	public function setDom_CountryofOrigin($_Dom_CountryofOrigin) {
		$this->Dom_CountryofOrigin = $_Dom_CountryofOrigin ;
	}
	public function getDom_CountryofOrigin() {
		return $this->Dom_CountryofOrigin;
	}
	
	/*
	 * Set and Get $Dom_ProductDetails
	*/
	public function setDom_ProductDetails($_Dom_ProductDetails) {
		$this->Dom_ProductDetails = $_Dom_ProductDetails ;
	}
	public function getDom_ProductDetails() {
		return $this->Dom_ProductDetails;
	}
	
	
	/*
	 * Set and Get $body
	*/
	public function setBody($_body_tmp) {
		$this->body = $_body_tmp ;
	}
	public function getBody() {
		return $this->body;
	}
	
	/*
	 * Set and Get $ALL_iteams
	*/
	public function setPropertyAll_Iteams($all_items) {
		$this->ALL_iteams = $all_items ;
	}
	public function getPropertyAll_Iteams() {
		return $this->ALL_iteams;
	}
	
	/*
	 * Set and Get $data_popuplink
	*/
	public function setPropertydata_popuplink($_popuplink) {
		$this->data_popuplink = $_popuplink ;
	}
	public function getPropertydata_popuplink() {
		return $this->data_popuplink;
	}
	
	/*
	 * Set and Get $Url
	*/
	public function setPropertyUrl($_url) {
		$this->Url = $_url ;
	}
	public function getPropertyUrl()
	{
		return $this->Url;
	}
	
	/*
	 * Set and Get $ProductId
	*/
	public function setPropertyProductId($_Prod_Id) {
		$this->ProductId = $_Prod_Id ;
	}
	public function getPropertyProductId()
	{
		return $this->ProductId;
	}
	/**end function properti******/
	
	
	
	public function _is_checkurl($url) {
		if ($url == null) return false;
		$options = array (
				CURLOPT_RETURNTRANSFER => true, // return web page
				CURLOPT_HEADER => false, // don't return headers
				CURLOPT_FOLLOWLOCATION => true, // follow redirects
				CURLOPT_ENCODING => "", // handle all encodings
				CURLOPT_USERAGENT => "Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US) AppleWebKit/534.10 (KHTML, like Gecko) Chrome/8.0.552.224 Safari/534.10", // who am i
				CURLOPT_AUTOREFERER => true, // set referer on redirect
				CURLOPT_CONNECTTIMEOUT => 120, // timeout on connect
				CURLOPT_TIMEOUT => 120, // timeout on response
				CURLOPT_MAXREDIRS => 10, // stop after 10 redirects
				CURLOPT_SSL_VERIFYPEER => false  // Disabled SSL Cert checks
				);
		
		$ch = curl_init ( $url );
		curl_setopt_array ( $ch, $options );
		
		$data = curl_exec ( $ch );
		$httpcode = curl_getinfo ( $ch, CURLINFO_HTTP_CODE ); // lay code tra ve cua http
		curl_close ( $ch );
		unset($ch, $options);
		$this->httpcode  = $httpcode ; 
		return $this->httpcode; // return ($httpcode >= 200 && $httpcode < 300);
	}
	
	public function getBodyUrl($uri) {
		$config = array (
				'adapter' => 'Zend\Http\Client\Adapter\Curl',
				'curloptions' => array (
						CURLOPT_RETURNTRANSFER => true, // return web page
						CURLOPT_HEADER => false, // don't return headers
						CURLOPT_FOLLOWLOCATION => true, // follow redirects
						CURLOPT_ENCODING => "", // handle all encodings
						CURLOPT_USERAGENT => "Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US) AppleWebKit/534.10 (KHTML, like Gecko) Chrome/8.0.552.224 Safari/534.10", // who am i
						CURLOPT_AUTOREFERER => true, // set referer on redirect
						CURLOPT_CONNECTTIMEOUT => 120, // timeout on connect
						CURLOPT_TIMEOUT => 120, // timeout on response
						CURLOPT_MAXREDIRS => 10, // stop after 10 redirects
						CURLOPT_SSL_VERIFYPEER => false  // Disabled SSL Cert checks
								) 
		);
		// $uri = 'https://www.rohlik.cz/c75533-napoje';
		$client = new \Zend\Http\Client ( $uri, $config );
		//$response = $this->getResponse ();
		//$response->getHeaders ()->addHeaderLine ( 'content-type', 'text/html; charset=UTF-8' ); // set content-type
		$result = $client->send ();
		$_body = $result->getBody (); // content of the web 
		$this->body = $_body;
		return $this->body;
	}
	
	public function getProductName(Query $dom, $_feed_dom = null) {
		if ($_feed_dom == null) 	$_feed_dom = 'div.items article h3';
			/* --- Product Name and Product URL-->getdetail -- */
		$_ProductName = array ();
		$_Product_Url = array (); $_data_popuplink = array(); $_Product_id = array();
		$get_Product_Name = $dom->execute ( $_feed_dom ); // div.items article h3 a : ten cua san pham //var_dump ( count ( $get_Product_Name ) ); die ();
		
		$_host_tmp = $this->getHost();
		$_url = $this->getPropertyUrl();
		
		if (count ( $get_Product_Name ) > 0) {
			foreach ( $get_Product_Name as $key => $r ) {
				$aelement = $r->getElementsByTagName ( "a" )->item ( 0 );
				
				if ($aelement->hasAttributes ()) {
					$_ProductName [] = $aelement->textContent;
					$_Product_Url [] = $aelement->getAttributeNode ( 'href' )->nodeValue;
					$popuplink = $aelement->getAttributeNode ( 'data-popuplink' )->nodeValue;
					if($popuplink != null){
						$_data_popuplink[] = $popuplink;
						
						$_url_1 = @str_replace($_host_tmp,'',$_url);                                // _$url_1 = c133337-alkohol-a-tabak
						$_text_product_id = @str_replace($_url_1,'',$popuplink);                   //  $_text_product_id =  /?productId=1287793&do=openProductPopup
						$Product_id = @preg_replace('/[^0-9]/','',$_text_product_id);              //
						$_Product_id[] = $Product_id;
					}else 
					{
						$_data_popuplink = null;
						// tim ProductId cach khac
						$data_gtm_event = $aelement->getAttributeNode ( 'data-gtm-event' )->nodeValue; // json data
						$obj = @json_decode($data_gtm_event);
						$_tmp_product_id = $obj->{'rohlik.productIds'}; 
						$Product_id = $_tmp_product_id[0]; 
						$_Product_id[] = $Product_id;
					}
				}
			}
		} else {
			$this->ProductName = "loi khi lay product name and  product url and data_popuplink";
		}
		$this->ProductName = $_ProductName;
		$this->Product_Url = $_Product_Url;
		$this->data_popuplink =  $_data_popuplink;
		$this->ProductId     = $_Product_id;
		
	}
	
	public function getProductImg(Query $dom, $_feed_dom = null) {
		if ($_feed_dom == null) $_feed_dom = 'img.grocery-image-placeholder';
			/* -- Product Img --- */
		$_ProductImg = array ();
		$get_Product_Img = $dom->execute ( $_feed_dom ); // $get_Product_Img : anh cua san pham //img.grocery-image-placeholder
		/* var_dump ( count ( $get_Product_Img ) ); // die (); */
		
		if (count ( $get_Product_Img ) > 0) {
			foreach ( $get_Product_Img as $key => $_img ) 
			{
				// echo "<pre>"; print_r ( $_img->getAttributeNode('data-replace')->nodeValue );
				$_ProductImg [] = $_img->getAttributeNode ( 'data-replace' )->nodeValue;
			}
			$this->ProductImg = $_ProductImg ;
		} else {
			$this->ProductImg = null;
		}
		
		
	}
	public function getProductPrice(Query $dom, $_feed_dom = null) {
		if ($_feed_dom == null) $_feed_dom = 'div.items article h6';
			
		$_ProductPrice = array ();
		$Product_Price_older = array ();
		$get_Product_Price = $dom->execute ( $_feed_dom ); // div.items article h3 a : ten cua san pham //var_dump ( count ( $get_Product_Name ) ); die ();
		
		if (count ( $get_Product_Price ) > 0) {
			foreach ( $get_Product_Price as $key => $_Price ) {
				// echo "<pre>"; print_r ( $_Price->textContent);
				$_ProductPrice [] = @trim ( $_Price->textContent );
			}
			$this->ProductPrice = $_ProductPrice ;
		} else {
			$this->ProductPrice = null;
		}
	}
	public function getProductPromotion(Query $dom, $_feed_dom = null) {
		if ($_feed_dom == null) 	$_feed_dom = 'div.items article div.ico';
			/* -- Product Promotion --- */
		$_ProductPromotion = array ();
		$get_Product_Promotion = $dom->execute ( $_feed_dom ); // $get_Product_Img : anh cua san pham //img.grocery-image-placeholder
		/* var_dump ( count ( $get_Product_Promotion ) ); die (); */
		
		if (count ( $get_Product_Promotion ) > 0) {
			foreach ( $get_Product_Promotion as $key => $_pro ) {
				// echo "<pre>"; print_r ( $_pro->textContent );
				$str = @trim ( $_pro->textContent );
				// $result = $str_replace(" ", "", $_pro->textContent);
				$_ProductPromotion [] = $str;
				
			}
			
			$this->ProductPromotion = $_ProductPromotion ;
		} else {
			$this->ProductPromotion = null;
		}
		
		
	}
	
	public function feed_all() { 
		//$url = null, $_dom_name = null, $_dom_img = null, $_dom_price = null, $_dom_promotion = null,$_dom_countryoforigin=null,$_dom_detail_product_descriptstion=null
		
		if ($this->Url_get == null) return false; 
		$url_check = $this->_is_checkurl ( $this->Url_get ); // return $this->httpcode;  : 200 
		if ($url_check != 200) return "Url is error : " . $url_check; 
		$this->Url =  $this->Url_get;
 		$_body =  $this->getBodyUrl($this->Url_get);  //return $_body; co duoc body
 		
		$dom = new Query ($_body);
 		$this->getProductName ( $dom, $this->Dom_product_name ); // $this->ProductName = $_ProductName; $this->Product_Url = $_Product_Url;
 		$this->getProductImg ( $dom, $this->Dom_product_images );
 		$this->getProductPrice ( $dom,$this->Dom_product_price );
 		$this->getProductPromotion ( $dom,$this->Dom_product_promotion );
 		
 		//$_dom_countryoforigin1='div.detail div.main article div.like a span';
 		//$_dom_detail_product_descriptstion2 ='div.detail div.main section';
 		
		$_ProductDetails = $this->getProductDetails_by_Product_Url($this->Dom_CountryofOrigin,$this->Dom_ProductDetails);
// 		$data =  array(
// 				'ProductName'=>$this->ProductName,
// 				'Product_Url'=>$this->Product_Url,
// 				'_data_popuplink' =>$this->data_popuplink,
// 				'_Product_id' => $this->ProductId ,
// 				'ProductImg' => $this->ProductImg,
// 				'ProductPrice' =>$this->ProductPrice,
// 				'ProductPromotion'=>$this->ProductPromotion,
// 				'ProductDetails_by_Product_Url'=>$_ProductDetails,
// 		);
// 		return $data ;
		
 		$this->Exchangdata(); 
 		return $this->Iteams;

	}
	
	public function getProductDetails_by_Product_Url($_dom_countryoforigin,$_dom_detail_product_descriptstion)
	{
		$_PrDuct_Url = $this->Product_Url;
		$_ProductDetails = array(); 
		$_CountryofOrigi= array();
	    $_HttpCode = array(); 
	    $_Url_get = array(); 
	    $_Body_get = array();
	    
		$value_url_test = 'https://www.rohlik.cz/1295045-gambrinus-original-10-6x-500ml-6ks';
		$host_tmp = $this->host; 
		
		return $host_tmp;
		
		foreach ($_PrDuct_Url as $key=>$value_url)
		{
			$_url_get = $host_tmp.$value_url;
			$RohlickDetail = new RohlikDetail();
			//if ($value_url != null) {
			 $_Body_get[$key] = $RohlickDetail->details_description_and_CountryofOrigin($_url_get,$_dom_countryoforigin,$_dom_detail_product_descriptstion);
			  // $PropertyHttpCode  = $RohlickDetail->_is_checkurl($_url_get);
			   $PropertyHttpCode  = $RohlickDetail->get_Status_url_check();
			   //$_ProductBody      = $RohlickDetail->getBody();
			   // $_Body_get[$key] = $_ProductBody ;
			   $_HttpCode[$key] = $PropertyHttpCode;
			   $_Url_get[$key] = $_url_get;
			  
// 			   $PropertyProductDetail = $RohlickDetail->getPropertyProductDetail();
// 			   $PropertyCountryofOrigin = $RohlickDetail->getPropertyCountryofOrigin();
// 			   $_ProductDetails[$key] = $PropertyProductDetail[0];
// 			   $_CountryofOrigi[$key] = $PropertyCountryofOrigin[0];
			//}
			
			$this->HTTP_CODE = $_HttpCode;
			$this->Body_get = $_Body_get;
			$this->_tmp_Url_get_detail =  $_Url_get;
		}
	}
	
	public function Exchangdata() {
		$napoje_tmp = array ();
		$_ProdName = $this->ProductName;
		$_ProdUrl = $this->Product_Url;
		$_ProdImg = $this->ProductImg;
		$_ProdPrice = $this->ProductPrice;
		$_ProdPromotion = $this->ProductPromotion;
		$_ProdData_popuplink = $this->data_popuplink;
		$_host_tmp = $this->host;
		$_url = $this->Url_get;
		$_ProdId = $this->ProductId;
		$_ProdDetail = $this->ProductDetail;
		$_ProdCountryofOrigin = $this->CountryofOrigin;
		$_ProdHttpCode_details = $this->HTTP_CODE;
		
		for($i = 0; $i < @count ($_ProdName ); $i ++) {
			$napoje_tmp [$i] ['httpcode'] = $this->getStatus_url_check();
			$napoje_tmp [$i] ['host'] = $_host_tmp;
			$napoje_tmp [$i] ['url'] = $_url;
			$napoje_tmp [$i] ['product_id'] = $_ProdId[$i];
			$napoje_tmp [$i] ['name'] = $_ProdName[$i];
			$napoje_tmp [$i] ['url_alias'] = $_ProdUrl[$i];
			$napoje_tmp [$i] ['thumbnail'] =  $_ProdImg[$i];
			$napoje_tmp [$i] ['price'] = $_ProdPrice[$i];
			$napoje_tmp [$i] ['promotion'] =  $_ProdPromotion[$i];
			$napoje_tmp [$i] ['data_popuplink'] =  $_ProdData_popuplink[$i];
			$napoje_tmp [$i] ['httpcode_detail'] = $_ProdHttpCode_details[$i];
			$napoje_tmp [$i] ['product_detail'] = $_ProdDetail[$i];
			$napoje_tmp [$i] ['product_countryoforigin'] = $_ProdCountryofOrigin[$i];
		}
		$this->Iteams= $napoje_tmp ; // luu vao bien chung $Iteams
	}
	
	public function getDetail($_dom_countryoforigin=null,$_dom_detail_product_descriptstion=null)
	{
				$_Iteams = $this->getPropertyIteams(); 
				if ($_Iteams != null and is_array ( $_Iteams ) and !empty ( $_Iteams )) {
					// co the lap $this->Product_Url array nay cung duoc
					$_ALL_iteams = array (); 
					$_host = $this->getHost();
					$url_details = null; $CountryofOrigin = null; $detail = null;
				 	
					foreach ( $_Iteams as $key => $Name ) {
						$url_details = $_host.$Name['data_popuplink'];

						$RohlikDetail = new RohlikDetail ();
						$RohlikDetail->_is_checkurl($url_details);
						$httpcode_detail = $RohlikDetail->get_Status_url_check();
						
// 						$RohlikDetail->set_Host($_host);  

//  						$RohlikDetail->setDom_Product_Details($_dom_detail_product_descriptstion);       // dom
//  						$RohlikDetail->setDom_Country_of_Origin($_dom_countryoforigin) ;                 // dom
 						 
//  						$RohlikDetail->get_Feed_ProductDetails($url_details);                                // https://www.rohlik.cz
 						
//                         $detail = $RohlikDetail->getPropertyProductDetail();
// 						$CountryofOrigin = $RohlikDetail->getPropertyCountryofOrigin();
						
// 						$_Iteams_details = $RohlikDetail->getPropertyIteams_details();
						
						$_array_tmp = array (
								'httpcode'=>$Name['httpcode'],
								'host' => $Name['host'],
								'url' => $Name['url'],
								'product_id'=>$Name['product_id'],
								'name' => $Name['name'],
								'url_alias' => $Name['url_alias'],
								'url_details' => $url_details,
								'httpcode_detail' => $httpcode_detail,
								'thumbnail' => $Name['thumbnail'],
								'price' => $Name['price'],
								'promotion' => $Name['promotion'],
								'data_popuplink'=>$Name['data_popuplink'],
								'countryoforigin' => $CountryofOrigin,
								'detail' => $detail,
						);
		
						$_ALL_iteams[$key] = $_array_tmp;
					}
				}
		
				$this->setPropertyAll_Iteams($_ALL_iteams);
	}
}
