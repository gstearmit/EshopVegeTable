<?php

namespace Crowler\Model;
// rss
//use Zend\Mvc\Controller\AbstractActionController;
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
#ob_start ( 'ob_gzhandlerdetails' );
class Rohlikdetail {
	public $host; //https://www.rohlik.cz
	public function set_Host($newval) {
		$this->host = $newval;
	}
	 public function get_Host() {
		return $this->host ;
	}
	
	protected $ProductImg = array();
	public function setPropertyProductImg($_ProductImg) {
		$this->ProductImg = $ProductImg;
	}
	public function getPropertyProductImg() {
		return $this->ProductImg ;
	}
	
	protected $ProductDetail = array();
	public function setPropertyProductDetail($_ProductDetail) {
		$this->ProductDetail = $_ProductDetail;
	}
	public function getPropertyProductDetail() {
		return $this->ProductDetail ;
	}
	
	protected $img;
	public function setPropertyimg($_img)
	{
		$this->img= $_img;
	}
	public function getPropertyimg()
	{
		return $this->img1;
	}
	
	protected $img0;
	public function setPropertyimg0($_img0)
	{
		$this->img0= $_img0;
	}
	public function getPropertyimg0()
	{
		return $this->img0;
	}
	
	protected $img1;
	public function setPropertyimg1($_img1)
	{
		$this->img1= $_img1;
	}
	public function getPropertyimg1()
	{
		return $this->img1;
	}
	
	protected $img2;
	public function setPropertyimg2($_img2)
	{
		$this->img2= $_img2;
	}
	public function getPropertyimg2()
	{
		return $this->img2;
	}
	protected $img3;
	public function setPropertyimg3($_img3)
	{
		$this->img3= $_img3;
	}
	public function getPropertyimg3()
	{
		return $this->img3;
	}
	protected $img4;
    public function setPropertyimg4($_img4)
	{
		$this->img4= $_img4;
	}
	public function getPropertyimg4()
	{
		return $this->img4;
	}
	protected $img5;
    public function setPropertyimg5($_img5)
	{
		$this->img5= $_img5;
	}
	public function getPropertyimg5()
	{
		return $this->img5;
	}
	protected $img6;
    public function setPropertyimg6($_img6)
	{
		$this->img6= $_img6;
	}
	public function getPropertyimg6()
	{
		return $this->img6;
	}
	protected $img7;
    public function setPropertyimg7($_img7)
	{
		$this->img7= $_img7;
	}
	public function getPropertyimg7()
	{
		return $this->img7;
	}
	protected $img8;
    public function setPropertyimg8($_img8)
	{
		$this->img8= $_img8;
	}
	public function getPropertyimg8()
	{
		return $this->img8;
	}
	protected $img9;
    public function setPropertyimg9($_img9)
	{
		$this->img9= $_img9;
	}
	public function getPropertyimg9()
	{
		return $this->img9;
	}
	
	protected $httpcode;
	public function set_Status_url_check($newval) {
		$this->httpcode = $newval;
	}
	public function get_Status_url_check() {
		return $this->httpcode;
	}
	
	protected $body_details;
	public function setBody($_body_tmp) {
		$this->body_details = $_body_tmp ;
	}
	public function getBody() {
		return $this->body_details;
	}
	
	protected $Iteams_details = array ();
	public function setPropertyIteams_details($data) {
		$this->Iteams_details = $data;
	}
	public function getPropertyIteams_details() {
		return $this->Iteams_details;
	}
	
	protected $CountryofOrigin= array();
	public function setPropertyCountryofOrigin($countryoforigin) {
		$this->CountryofOrigin = $countryoforigin;
	}
	public function getPropertyCountryofOrigin() {
		return $this->CountryofOrigin;
	}
	
	protected $Url_Details = array();
	public function setPropertyUrl($_url) {
		$this->Url_Details = $_url ;
	}
	public function getPropertyUrl()
	{
		return $this->Url_Details;
	}
	
	protected $Dom_CountryofOrigin;
	public function setDom_Country_of_Origin($_Dom_CountryofOrigin) {
		$this->Dom_CountryofOrigin = $_Dom_CountryofOrigin ;
	}
	public function getDom_Country_of_Origin() {
		return $this->Dom_CountryofOrigin;
	}
	
	protected $Dom_ProductDetails;
	public function setDom_Product_Details($_Dom_ProductDetails) {
		$this->Dom_ProductDetails = $_Dom_ProductDetails ;
	}
	public function getDom_Product_Details() {
		return $this->Dom_ProductDetails;
	}
	
	public function __construct() { }
	
	public function _is_checkurl($url)
	{
		
		$options = array (
				CURLOPT_RETURNTRANSFER => true, // return web page
				CURLOPT_HEADER => false, // don't return headers
				CURLOPT_FOLLOWLOCATION => true, // follow redirects
				CURLOPT_ENCODING => "", // handle all encodings
				CURLOPT_USERAGENT => "Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US) AppleWebKit/533.2 (KHTML, like Gecko) Chrome/5.0.342.3 Safari/533.2", // who am i
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
		$this->set_Status_url_check($httpcode); 
		unset($ch, $options);
		return $httpcode;
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
		
		$client = new \Zend\Http\Client ( $uri, $config );
		//$response = $this->getResponse ();
		//$response->getHeaders ()->addHeaderLine ( 'content-type', 'text/html; charset=UTF-8' ); // set content-type
		$result = $client->send ();
		$body = $result->getBody (); // content of the web 
		$this->setBody($body);
		return $body;
		
	}
	
	public function get_Feed_ProductDetails($url)
	{
		if ($url == null) return false;
		$this->_is_checkurl ( $url );
		$url_check = $this->get_Status_url_check();           
		if ($url_check != 200) return "Url is error : " . $url_check; 
		$this->setPropertyUrl($url);
 		$this->getBodyUrl($url); 
 		$_body =  $this->getBody();
		$dom = new Query ($_body);
		
// 		$this->getProductDetails($dom,$this->getDom_Product_Details());
// 		$this->getCountryofOrigin($dom,$this->getDom_Country_of_Origin());
// 		$this->Exchangdata();
		
	}
	
	public function getProductDetails(Query $dom,$_feed_dom = null)
	{
		if($_feed_dom == null) $_feed_dom = 'div.detail div.main section';  //'div#popup_dsc';
	
		$_ProductDetails = array();
		$get_ProductDetails = $dom->execute($_feed_dom);
	
		if (count($get_ProductDetails) > 0) {
			foreach ($get_ProductDetails as $key => $_pro) {
				//echo "<pre>"; print_r (  $_pro->textContent );
				$str = @trim($_pro->textContent);
				//$result = $str_replace(" ", "", $_pro->textContent);
				$_ProductDetails[] = $str;
			}
		} else { $this->setPropertyProductDetail("loi khi lay ProductDetails"); }
	
		$this->setPropertyProductDetail($_ProductDetails);
	}
	
	public function getCountryofOrigin(Query $dom,$_feed_dom = null)
	{
		if($_feed_dom == null) $_feed_dom = 'div.detail div.main article div.like a span';   //'li.country';
		$_CountryofOrigin = array();
		$get_CountryofOrigin = $dom->execute($_feed_dom);
	
		if (count($get_CountryofOrigin) > 0) {
			foreach ($get_CountryofOrigin as $key => $_pro) {
				$str = @trim($_pro->textContent);
				$_CountryofOrigin[] = $str;
			}
		} else { $this->setPropertyCountryofOrigin("loi khi lay ProductDetails"); }
	
		$this->setPropertyCountryofOrigin($_CountryofOrigin);
	}
	
	public function Exchangdata()
	{
		$napoje_tmp = array ();
		$_ProdDetails = $this->getPropertyProductDetail();
		$_ProdCountryofOrigin = $this->getPropertyCountryofOrigin();
	
		$_host_tmp = $this->get_Host();
		$_url = $this->getPropertyUrl();
	
		for($i = 0; $i < @count ($_ProdDetails ); $i ++) {
			//$napoje_tmp [$i] ['host'] = $_host_tmp;
			//$napoje_tmp [$i] ['product_id'] = $_ProdId[$i];
			$napoje_tmp [$i] ['url_details'] = $_url;
			$napoje_tmp [$i] ['product_details'] = $_ProdDetails[$i];
			$napoje_tmp [$i] ['countryoforigin'] =  $_ProdCountryofOrigin[$i];
		}
		$this->setPropertyIteams_details($napoje_tmp); // luu vao bien chung $Iteams
	}
	
	public function details_description_and_CountryofOrigin($_url,$_dom_countryoforigin,$_dom_detail_product_descriptstion)
	{
		$this->_is_checkurl($_url );
		$url_check = $this->get_Status_url_check();
		if ($url_check != 200) {
			$this->setPropertyProductDetail($data = null);
			$this->setPropertyCountryofOrigin($country=null); 
		}
		if ($url_check == 200) {
			$this->setPropertyUrl($_url);
    	   // $_body = $this->getBodyUrl($_url);
// 			$result_tmp = $clientnew->send (); return $result_tmp;
// 			$body_tmp = $result_tmp->getBody (); // content of the web
// 			$this->setBody($body_tmp);
		
// 			//$_body =  $this->getBody();
// 			$dom = new Query ($_body);
// 			//$this->getProductDetails($dom,$_dom_detail_product_descriptstion);
// 			//$this->getCountryofOrigin($dom,$_dom_countryoforigin);
		}//200
	}
	
}
