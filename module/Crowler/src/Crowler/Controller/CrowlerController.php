<?php

namespace Crowler\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Crowler\Form\CrowlerFilter;
use Crowler\Form\CrowlerForm;
use Crowler\Model\Crowler;
use Crowler\Model\Database;

use Zend\Paginator\Paginator,
    Zend\Paginator\Adapter\Null as PageNull;
use Zend\Session\Container;
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

//Name
use Crowler\Model\Name;
use Crowler\Model\NameTable;

use Crowler\Model\Declaration;
use Crowler\Model\DeclarationTable;

use Zend\Http\Request;

//Get Data Rohlik.cz
use Crowler\Model\Rohlik;
use Crowler\Model\Rohlikdetail;
use Crowler\Model\Getcrowler;
use Crowler\Model\Rolik;
use Zend\XmlRpc\Value\String;

// Asynic
// use Crowler\Model\Async;
// use MyLib\Hello;
// use MyLib\Crowthread;
// use MyLib\AsyncOperation;
use MyLib\Rohlikcrowler;

use Zend\Loader\StandardAutoloader;
use Zend\Feed\Reader\Reader;
use Zend\Debug\Debug;

// Multi Curl
use MyLib\EpiCurl;
use MyLib\EpiCurlManager;

//Rolling - Curl
use PCurlThread\GroupRollingCurl; 
use PCurlThread\ RollingCurl;
use PCurlThread\RollingCurlException;
use PCurlThread\RollingCurlGroup;
use PCurlThread\RollingCurlGroupException;
use PCurlThread\RollingCurlGroupRequest;
use PCurlThread\RollingCurlRequest;
use PCurlThread\RollingCurlDetailsProducts;
use PCurlThread\RollingCurlRequestDetailsProducts;

use PCurlThread\PHello;
use MyLib\Hello;

class CrowlerController extends AbstractActionController {

    public $_fileName;
    protected $UserTable;
    
    public function getUserTable() {
        if (!$this->UserTable) {
            $sm = $this->getServiceLocator();
            $this->UserTable = $sm->get('Users\Model\UserTable');
        }
        return $this->UserTable;
    }
    
    public function get_name_dataAction() {
    	$Name = $this->getServiceLocator()->get('NameTable')->getAll();
    	$data = array();
    	$idtmp = array();
    	foreach ($Name as $upload) :
    	if ($upload->parent == 0) {
    		$id = $upload->id;
    		$cat = $upload->name;
    		$data [$id] = $cat;
    		array_push($idtmp, $id);
    	} else {
    		$parent = $upload->parent;
    		$key = array_search($parent, $idtmp);
    		$tmp = array();
    		$id = $upload->id;
    		$cat = $upload->name;
    		array_splice($idtmp, $key + 1, 0, $id);
    		if (isset($data [$key])) {
    			$str = $data [$key];
    			$begi = '';
    			$beg = substr_count($str, ' - ');
    			$tt = ' - ';
    			while ($beg != - 1) {
    				$tt = ' - ' . $tt;
    				$beg --;
    			}
    			$tmp [$id] = $tt . $cat;
    		} else
    			$tmp [$id] = ' -  - ' . $cat;
    		array_splice($data, $key + 1, 0, $tmp);
    	}
    	endforeach ;
    	$result = array();
    	//$k = 0; $v = '';
    	for ($i = 0; $i < sizeof($data); $i ++) {
    		$k = $idtmp [$i];
    		$v = $data [$i];
    		$result [$k] = $v;
    	}
    	return $result;
    }

    public function lazadaAction() {


        // truong hop ko phai https
        //kich ban 1
// 		        $client = new HttpClient();
// 				$client->setAdapter('Zend\Http\Client\Adapter\Curl');
// 				$response = $this->getResponse();
// 				$response->getHeaders()->addHeaderLine('content-type', 'text/html; charset=utf-8'); //set content-type
// 				$client->setUri('http://www.lazada.vn/dien-thoai-may-tinh-bang/?ref=MT');
// 				$result                 = $client->send();
// 				$body                   = $result->getBody();//content of the web
// 				var_dump($body);
// 				die("hioangasaa xzxzxzxzx");
// 				$dom = new Query($content);
// 				var_dump($dom);
// 				die("hioangasaa xzxzxzxzx");
        // kich ban 2
// 		        echo "CAcerts </br>"; var_dump(CAcerts);die();
// 				$client = new HttpClient('https://www.rohlik.cz', array(
// 						'adapter' => 'Zend\Http\Client\Adapter\Curl'
// 				));
// 				$response = $client->send();
// 				echo "<pre>";
// 				print_r($response);
// 				echo "<pre>";
// 				 die;
        // kich ban 4
        $config = array(
            'adapter' => 'Zend\Http\Client\Adapter\Curl',
            'curloptions' => array(
                CURLOPT_RETURNTRANSFER => true, // return web page
                CURLOPT_HEADER => false, // don't return headers
                CURLOPT_FOLLOWLOCATION => true, // follow redirects
                CURLOPT_ENCODING => "", // handle all encodings
                CURLOPT_USERAGENT => "Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US) AppleWebKit/534.10 (KHTML, like Gecko) Chrome/8.0.552.224 Safari/534.10", // who am i
                CURLOPT_AUTOREFERER => true, // set referer on redirect
                CURLOPT_CONNECTTIMEOUT => 120, // timeout on connect
                CURLOPT_TIMEOUT => 120, // timeout on response
                CURLOPT_MAXREDIRS => 10, // stop after 10 redirects
                CURLOPT_SSL_VERIFYPEER => false     // Disabled SSL Cert checks
            ),
        );
        $uri = 'http://www.lazada.vn/dien-thoai-may-tinh-bang/?ref=MT';
        $client = new \Zend\Http\Client($uri, $config);
        $response = $this->getResponse();
        $response->getHeaders()->addHeaderLine('content-type', 'text/html; charset=utf-8'); //set content-type
        $result = $client->send();
        $body = $result->getBody(); //content of the web
        //print_r($body);
        $dom = new Query($body);

        $ProductName = array();
        $Product_Url = array();
        $get_Product_Name = $dom->execute('a.product-name'); // div.items article h3 a : ten cua san pham
        var_dump(count($get_Product_Name));
        die();

// 				//if (count ( $get_Product_Name ) > 0) {
// 					foreach ( $get_Product_Name as $key => $r ) {
// 						$aelement = $r->getElementsByTagName ( "a" )->item ( 0 );
// 						if ($aelement->hasAttributes ()) {
// 							$ProductName [] = $aelement->textContent;
// 							$Product_Url [] = $aelement->getAttributeNode ( 'href' )->nodeValue;
// 						}
// 					}
// 				//} else { echo "loi khi lay product name";  }

        echo "<pre>";
        print_r($ProductName);
        echo "</pre>";
    }

    public function alcoholAction() {
// 		$getuser=$this->forward()->dispatch('Admin\Controller\Index',array('action'=>'getuser'));
// 		if(!$getuser)
// 		{
// 			// not yet login
// 			$this->redirect ()->toRoute ( 'home');
// 		}

        $config = array(
            'adapter' => 'Zend\Http\Client\Adapter\Curl',
            'curloptions' => array(
                CURLOPT_RETURNTRANSFER => true, // return web page
                CURLOPT_HEADER => false, // don't return headers
                CURLOPT_FOLLOWLOCATION => true, // follow redirects
                CURLOPT_ENCODING => "", // handle all encodings
                CURLOPT_USERAGENT => "Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US) AppleWebKit/534.10 (KHTML, like Gecko) Chrome/8.0.552.224 Safari/534.10", // who am i
                CURLOPT_AUTOREFERER => true, // set referer on redirect
                CURLOPT_CONNECTTIMEOUT => 120, // timeout on connect
                CURLOPT_TIMEOUT => 120, // timeout on response
                CURLOPT_MAXREDIRS => 10, // stop after 10 redirects
                CURLOPT_SSL_VERIFYPEER => false     // Disabled SSL Cert checks
            ),
        );
        $uri = 'https://www.rohlik.cz/c133337-alkohol-a-tabak';
        $client = new \Zend\Http\Client($uri, $config);
        $response = $this->getResponse();
        $response->getHeaders()->addHeaderLine('content-type', 'text/html; charset=UTF-8'); //set content-type
        $result = $client->send();
        $body = $result->getBody(); //content of the web
        //print_r($body);
        $dom = new Query($body);

        /* --- Product Name and Product URL-->getdetail -- */
        $ProductName = array();
        $Product_Url = array();
        $get_Product_Name = $dom->execute('div.items article h3'); // div.items article h3 a : ten cua san pham //var_dump ( count ( $get_Product_Name ) ); die ();
        /* var_dump(count($get_Product_Name));die; */
        if (count($get_Product_Name) > 0) {
            foreach ($get_Product_Name as $key => $r) {
                $aelement = $r->getElementsByTagName("a")->item(0);

                if ($aelement->hasAttributes()) {
                    $ProductName [] = $aelement->textContent;
                    $Product_Url [] = $aelement->getAttributeNode('href')->nodeValue;
                }
            }
        } else {
            echo "loi khi lay product name";
        }


        /* -- Product Promotion --- */
        $ProductPromotion = array();
        $get_Product_Promotion = $dom->execute('div.items article div.ico'); // $get_Product_Img : anh  cua san pham  //img.grocery-image-placeholder
        /* var_dump ( count ( $get_Product_Promotion ) );  die (); */

        if (count($get_Product_Promotion) > 0) {
            foreach ($get_Product_Promotion as $key => $_pro) {
                //echo "<pre>"; print_r (  $_pro->textContent );
                $ProductPromotion[] = $_pro->textContent;
            }
        } else {
            echo "loi khi lay product Promotion";
        }

        /* --- Get Product -->div.items article h6 Product Price and Product Price Older  -- */
        $ProductPrice = array();
        $Product_Price_older = array();
        $get_Product_Price = $dom->execute('div.items article h6'); // div.items article h3 a : ten cua san pham //var_dump ( count ( $get_Product_Name ) ); die ();
        /* var_dump ( count ( $get_Product_Price ) ); */
        if (count($get_Product_Price) > 0) {
            foreach ($get_Product_Price as $key => $_Price) {
                //echo "<pre>"; print_r ( $_Price->textContent);
                $ProductPrice[] = @trim($_Price->textContent);
            }
        } else {
            echo "loi khi lay product Price";
        }

        /* -- Product Img --- */
        $ProductImg = array();
        $get_Product_Img = $dom->execute('div.items article a.img img'); // $get_Product_Img : anh  cua san pham  //img.grocery-image-placeholder
        /* var_dump ( count ( $get_Product_Img ) ); // die (); */

        if (count($get_Product_Img) > 0) {
            foreach ($get_Product_Img as $key => $_img) {
                //echo "<pre>"; print_r ( $_img->getAttributeNode('data-replace')->nodeValue );
                $ProductImg[] = $_img->getAttributeNode('data-replace')->nodeValue;
            }
        } else {
            echo "loi khi lay product img";
        }

        //save data cache
        // Lưu tin đã lấy vào file cache

        $napoje_tmp = array();

        for ($i = 0; $i <= @count($ProductName); $i++) {
            $napoje_tmp[$i]['name'] = $ProductName[$i];
            $napoje_tmp[$i]['url_alias'] = $Product_Url[$i];
            $napoje_tmp[$i]['thumbnail'] = $ProductImg[$i];
            $napoje_tmp[$i]['price'] = $ProductPrice[$i];
            $napoje_tmp[$i]['promotion'] = $ProductPromotion[$i];
        }

        $path = CACHE . '/temp_data_alcohol.cache.php';
        $content = '<?php $items = ' . var_export($napoje_tmp, true) . ';?>';
        $handler = fopen($path, 'w+');
        fwrite($handler, $content);
        fclose($handler);

        die("SUCCESSSSS");

//        echo "<pre>";
//        print_r($ProductImg);
//        echo "</pre>";
//        echo "</br>--------------------------------</br>";
//        die();
    }

    public function farmerAction() {
       
        $config = array(
            'adapter' => 'Zend\Http\Client\Adapter\Curl',
            'curloptions' => array(
                CURLOPT_RETURNTRANSFER => true, // return web page
                CURLOPT_HEADER => false, // don't return headers
                CURLOPT_FOLLOWLOCATION => true, // follow redirects
                CURLOPT_ENCODING => "", // handle all encodings
                CURLOPT_USERAGENT => "Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US) AppleWebKit/534.10 (KHTML, like Gecko) Chrome/8.0.552.224 Safari/534.10", // who am i
                CURLOPT_AUTOREFERER => true, // set referer on redirect
                CURLOPT_CONNECTTIMEOUT => 120, // timeout on connect
                CURLOPT_TIMEOUT => 120, // timeout on response
                CURLOPT_MAXREDIRS => 10, // stop after 10 redirects
                CURLOPT_SSL_VERIFYPEER => false     // Disabled SSL Cert checks
            ),
        );
        
         $uri = 'https://www.rohlik.cz/c133137-farmarske-potraviny';
        $client = new \Zend\Http\Client($uri, $config);
        $response = $this->getResponse();
        $response->getHeaders()->addHeaderLine('content-type', 'text/html; charset=UTF-8'); //set content-type
        $result = $client->send();
        $body = $result->getBody(); //content of the web
        //print_r($body);
        $dom = new Query($body);

        /* --- Product Name and Product URL-->getdetail -- */
        $ProductName = array();
        $Product_Url = array();
        $get_Product_Name = $dom->execute('div.items article h3'); // div.items article h3 a : ten cua san pham //var_dump ( count ( $get_Product_Name ) ); die ();
        /* var_dump(count($get_Product_Name));die; */
        if (count($get_Product_Name) > 0) {
            foreach ($get_Product_Name as $key => $r) {
                $aelement = $r->getElementsByTagName("a")->item(0);

                if ($aelement->hasAttributes()) {
                    $ProductName [] = $aelement->textContent;
                    $Product_Url [] = $aelement->getAttributeNode('href')->nodeValue;
                }
            }
        } else {
            echo "loi khi lay product name";
        }


        /* -- Product Promotion --- */
        $ProductPromotion = array();
        $get_Product_Promotion = $dom->execute('div.items article div.ico'); // $get_Product_Img : anh  cua san pham  //img.grocery-image-placeholder
        /* var_dump ( count ( $get_Product_Promotion ) );  die (); */

        if (count($get_Product_Promotion) > 0) {
            foreach ($get_Product_Promotion as $key => $_pro) {
                //echo "<pre>"; print_r (  $_pro->textContent );
                $ProductPromotion[] = $_pro->textContent;
            }
        } else {
            echo "loi khi lay product Promotion";
        }

        /* --- Get Product -->div.items article h6 Product Price and Product Price Older  -- */
        $ProductPrice = array();
        $Product_Price_older = array();
        $get_Product_Price = $dom->execute('div.items article h6'); // div.items article h3 a : ten cua san pham //var_dump ( count ( $get_Product_Name ) ); die ();
        /* var_dump ( count ( $get_Product_Price ) ); */
        if (count($get_Product_Price) > 0) {
            foreach ($get_Product_Price as $key => $_Price) {
                //echo "<pre>"; print_r ( $_Price->textContent);
                $ProductPrice[] = @trim($_Price->textContent);
            }
        } else {
            echo "loi khi lay product Price";
        }

        /* -- Product Img --- */
        $ProductImg = array();
        $get_Product_Img = $dom->execute('div.items article a.img img'); // $get_Product_Img : anh  cua san pham  //img.grocery-image-placeholder
        /* var_dump ( count ( $get_Product_Img ) ); // die (); */

        if (count($get_Product_Img) > 0) {
            foreach ($get_Product_Img as $key => $_img) {
                //echo "<pre>"; print_r ( $_img->getAttributeNode('data-replace')->nodeValue );
                $ProductImg[] = $_img->getAttributeNode('data-replace')->nodeValue;
            }
        } else {
            echo "loi khi lay product img";
        }

        //save data cache
        // Lưu tin đã lấy vào file cache

        $napoje_tmp = array();

        for ($i = 0; $i <= @count($ProductName); $i++) {
            $napoje_tmp[$i]['name'] = $ProductName[$i];
            $napoje_tmp[$i]['url_alias'] = $Product_Url[$i];
            $napoje_tmp[$i]['thumbnail'] = $ProductImg[$i];
            $napoje_tmp[$i]['price'] = $ProductPrice[$i];
            $napoje_tmp[$i]['promotion'] = $ProductPromotion[$i];
        }

        $path = CACHE . '/temp_data_alcohol.cache.php';
        $content = '<?php $items = ' . var_export($napoje_tmp, true) . ';?>';
        $handler = fopen($path, 'w+');
        fwrite($handler, $content);
        fclose($handler);

        die("SUCCESSSSS");
    }
    
    public function singrollingcurlAction() {
    	$uri = 'https://www.rohlik.cz/c133137-farmarske-potraviny';
    	$rc = new RollingCurl("request_callback");
    	$rc->request($uri);
    	
    	$dom_Img = 'div.items article a.img img';
    	$dom_Name = 'div.items article h3';
    	$dom_Price = 'div.items article h6';
    	$dom_Promotion = 'div.items article div.ico' ;
    	// Add Dom
    	$rc->add_dom_Img($dom_Img);
    	$rc->add_dom_Name($dom_Name);
    	$rc->add_dom_Price($dom_Price);
    	//$rc->add_dom_ProductDetails($dom_ProductDetails);
    	$rc->add_dom_Promotion($dom_Promotion);
    	//$rc->add_dom_CountryofOrigin($dom_CountryofOrigin);
    	//$rc->add_dom_product_href_detail($dom_product_href_detail);
    	
    	
    	$data = $rc->execute();
    	
    	echo "<pre>";
    	print_r($data);
    	echo "</pre>";

    	die("SUCCESSSSS - Please check file cache temp_data_alcohol.cache.php");
    	
    }
    
    
    public function rohlikcrowlerdetailtwoAction()
    {
    	$getuser=$this->forward()->dispatch('Admin\Controller\Index',array('action'=>'getuser'));
    	if(!$getuser)
    	{
    		// not yet login
    		$this->redirect ()->toRoute ( 'home');
    	}
    	// kich ban 4
    	$config = array(
    			'adapter' => 'Zend\Http\Client\Adapter\Curl',
    			'curloptions' => array(
    					CURLOPT_RETURNTRANSFER => true, // return web page
    					CURLOPT_HEADER => false, // don't return headers
    					CURLOPT_FOLLOWLOCATION => true, // follow redirects
    					CURLOPT_ENCODING => "", // handle all encodings
    					CURLOPT_USERAGENT => "Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US) AppleWebKit/534.10 (KHTML, like Gecko) Chrome/8.0.552.224 Safari/534.10", // who am i
    					CURLOPT_AUTOREFERER => true, // set referer on redirect
    					CURLOPT_CONNECTTIMEOUT => 120, // timeout on connect
    					CURLOPT_TIMEOUT => 120, // timeout on response
    					CURLOPT_MAXREDIRS => 10, // stop after 10 redirects
    					CURLOPT_SSL_VERIFYPEER => false     // Disabled SSL Cert checks
    			),
    	);
    	//$uri = 'https://www.rohlik.cz/1295045-gambrinus-original-10-6x-500ml-6ks';
    	$uri = 'https://www.rohlik.cz/1295045-gambrinus-original-10-6x-500ml-6ks';
    	 
    	$client = new \Zend\Http\Client($uri, $config);
    	$response = $this->getResponse();
    	$response->getHeaders()->addHeaderLine('content-type', 'text/html; charset=UTF-8'); //set content-type
    	$result = $client->send();
    	$body = $result->getBody(); //content of the web
    	//print_r($body);
    	$dom = new Query($body);
    	 
    	/* --  $_ProductDetails --- */
    	$_ProductDetails = array();
    	$get_ProductDetails = $dom->execute('div.detail div.main section');
    	 
    	if (count($get_ProductDetails) > 0) {
    		foreach ($get_ProductDetails as $key => $_pro) {
    			//echo "<pre>"; print_r (  $_pro->textContent );
    			$str = @trim($_pro->textContent);
    			//$result = $str_replace(" ", "", $_pro->textContent);
    			$_ProductDetails[] = $str;
    		}
    	} else { echo  "loi khi lay ProductDetails"; }
    	 
    	/*************$_CountryofOrigin***************************/
    	 
    	$_feed_dom = 'div.detail div.main article div.like a span';
    	$_CountryofOrigin = array();
    	$get_CountryofOrigin = $dom->execute($_feed_dom);
    	 
    	if (count($get_CountryofOrigin) > 0) {
    		foreach ($get_CountryofOrigin as $key => $_pro) {
    			$str = @trim($_pro->textContent);
    			$_CountryofOrigin[] = $str;
    		}
    	} else { echo  "loi khi lay ProductDetails"; }
    	 
    	echo "<pre>";
    	print_r($_ProductDetails);
    	echo "</pre>";
    	echo "</br>-----------------------------------------------</br>";
    	echo "<pre>";
    	print_r($_CountryofOrigin);
    	echo "</pre>";
    	die;
    }
    
    public function rohlikcrowlerdetailAction()
    {
    	$getuser=$this->forward()->dispatch('Admin\Controller\Index',array('action'=>'getuser'));
    	if(!$getuser)
    	{
    		// not yet login
    		$this->redirect ()->toRoute ( 'home');
    	}
    	// kich ban 4
    	$config = array(
    			'adapter' => 'Zend\Http\Client\Adapter\Curl',
    			'curloptions' => array(
    					CURLOPT_RETURNTRANSFER => true, // return web page
    					CURLOPT_HEADER => false, // don't return headers
    					CURLOPT_FOLLOWLOCATION => true, // follow redirects
    					CURLOPT_ENCODING => "", // handle all encodings
    					CURLOPT_USERAGENT => "Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US) AppleWebKit/534.10 (KHTML, like Gecko) Chrome/8.0.552.224 Safari/534.10", // who am i
    					CURLOPT_AUTOREFERER => true, // set referer on redirect
    					CURLOPT_CONNECTTIMEOUT => 120, // timeout on connect
    					CURLOPT_TIMEOUT => 120, // timeout on response
    					CURLOPT_MAXREDIRS => 10, // stop after 10 redirects
    					CURLOPT_SSL_VERIFYPEER => false     // Disabled SSL Cert checks
    			),
    	);
    	//$uri = 'https://www.rohlik.cz/1295045-gambrinus-original-10-6x-500ml-6ks';
    	$uri = 'https://www.rohlik.cz/c75533-napoje?productPopup=734717-rajec-neperliva-voda';
    	
    	$client = new \Zend\Http\Client($uri, $config);
    	$response = $this->getResponse();
    	$response->getHeaders()->addHeaderLine('content-type', 'text/html; charset=UTF-8'); //set content-type
    	$result = $client->send();
    	$body = $result->getBody(); //content of the web
    	//print_r($body);
    	$dom = new Query($body);
    	
    	/* --  $_ProductDetails --- */
    	$_ProductDetails = array();
    	$get_ProductDetails = $dom->execute('div.popupDetail div.table div.cell div.tabs div.tab');
    	
    	if (count($get_ProductDetails) > 0) {
    		foreach ($get_ProductDetails as $key => $_pro) {
    			//echo "<pre>"; print_r (  $_pro->textContent );
    			$str = @trim($_pro->textContent);
    			//$result = $str_replace(" ", "", $_pro->textContent);
    			$_ProductDetails[] = $str;
    		}
    	} else { echo  "loi khi lay ProductDetails"; }
    	
    	/*************$_CountryofOrigin***************************/
    	
    	$_feed_dom = 'li.country';
    	$_CountryofOrigin = array();
    	$get_CountryofOrigin = $dom->execute($_feed_dom);
    	
    	if (count($get_CountryofOrigin) > 0) {
    		foreach ($get_CountryofOrigin as $key => $_pro) {
    			$str = @trim($_pro->textContent);
    			$_CountryofOrigin[] = $str;
    		}
    	} else { echo  "loi khi lay ProductDetails"; }
    	
    	echo "<pre>";
    	print_r($_ProductDetails);
    	echo "</pre>";
    	echo "</br>-----------------------------------------------</br>";
    	echo "<pre>";
    	print_r($_CountryofOrigin);
    	echo "</pre>";
    }

    public function rohlikcrowlerAction() {
		$getuser=$this->forward()->dispatch('Admin\Controller\Index',array('action'=>'getuser'));
		if(!$getuser)
		{
			// not yet login
			$this->redirect ()->toRoute ( 'home');
		}
        // kich ban 4
        $config = array(
            'adapter' => 'Zend\Http\Client\Adapter\Curl',
            'curloptions' => array(
                CURLOPT_RETURNTRANSFER => true, // return web page
                CURLOPT_HEADER => false, // don't return headers
                CURLOPT_FOLLOWLOCATION => true, // follow redirects
                CURLOPT_ENCODING => "", // handle all encodings
                CURLOPT_USERAGENT => "Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US) AppleWebKit/534.10 (KHTML, like Gecko) Chrome/8.0.552.224 Safari/534.10", // who am i
                CURLOPT_AUTOREFERER => true, // set referer on redirect
                CURLOPT_CONNECTTIMEOUT => 120, // timeout on connect
                CURLOPT_TIMEOUT => 120, // timeout on response
                CURLOPT_MAXREDIRS => 10, // stop after 10 redirects
                CURLOPT_SSL_VERIFYPEER => false     // Disabled SSL Cert checks
            ),
        );
        $uri = 'https://www.rohlik.cz/c75533-napoje';
        $client = new \Zend\Http\Client($uri, $config);
        $response = $this->getResponse();
        $response->getHeaders()->addHeaderLine('content-type', 'text/html; charset=UTF-8'); //set content-type
        $result = $client->send();
        $body = $result->getBody(); //content of the web
        //print_r($body);	
        $dom = new Query($body);

        /* --- Product Name and Product URL-->getdetail -- */
        $ProductName = array();
        $Product_Url = array();
        $get_Product_Name = $dom->execute('div.items article h3'); // div.items article h3 a : ten cua san pham //var_dump ( count ( $get_Product_Name ) ); die ();

        if (count($get_Product_Name) > 0) {
            foreach ($get_Product_Name as $key => $r) {
                $aelement = $r->getElementsByTagName("a")->item(0);

                if ($aelement->hasAttributes()) {
                    $ProductName [] = $aelement->textContent;
                    $Product_Url [] = $aelement->getAttributeNode('href')->nodeValue;
                }
            }
        } else {
            echo "loi khi lay product name";
        }

        /* -- Product Img --- */
        $ProductImg = array();
        $get_Product_Img = $dom->execute('img.grocery-image-placeholder'); // $get_Product_Img : anh  cua san pham  //img.grocery-image-placeholder
        /* var_dump ( count ( $get_Product_Img ) ); // die (); */

        if (count($get_Product_Img) > 0) {
            foreach ($get_Product_Img as $key => $_img) {
                //echo "<pre>"; print_r ( $_img->getAttributeNode('data-replace')->nodeValue );
                $ProductImg[] = $_img->getAttributeNode('data-replace')->nodeValue;
            }
        } else {
            echo "loi khi lay product img";
        }


        /* --- Get Product -->div.items article h6 Product Price and Product Price Older  -- */
        $ProductPrice = array();
        $Product_Price_older = array();
        $get_Product_Price = $dom->execute('div.items article h6'); // div.items article h3 a : ten cua san pham //var_dump ( count ( $get_Product_Name ) ); die ();
        /* var_dump ( count ( $get_Product_Price ) ); */
        if (count($get_Product_Price) > 0) {
            foreach ($get_Product_Price as $key => $_Price) {
                //echo "<pre>"; print_r ( $_Price->textContent);
                $ProductPrice[] = @trim($_Price->textContent);
            }
        } else {
            echo "loi khi lay product Price";
        }


        /* -- Product Promotion --- */
        $ProductPromotion = array();
        $get_Product_Promotion = $dom->execute('div.items article div.ico'); // $get_Product_Img : anh  cua san pham  //img.grocery-image-placeholder
        /* var_dump ( count ( $get_Product_Promotion ) );  die (); */

        if (count($get_Product_Promotion) > 0) {
            foreach ($get_Product_Promotion as $key => $_pro) {
                //echo "<pre>"; print_r (  $_pro->textContent );
                $str = @trim($_pro->textContent);
                //$result = $str_replace(" ", "", $_pro->textContent);
                $ProductPromotion[] = $str;
            }
        } else {
            echo "loi khi lay product Promotion";
        }


        //save data cache
        // Lưu tin đã lấy vào file cache

        $napoje_tmp = array();

        for ($i = 0; $i <= @count($ProductName); $i++) {
            $napoje_tmp[$i]['name'] = $ProductName[$i];
            $napoje_tmp[$i]['url_alias'] = $Product_Url[$i];
            $napoje_tmp[$i]['thumbnail'] = $ProductImg[$i];
            $napoje_tmp[$i]['price'] = $ProductPrice[$i];
            $napoje_tmp[$i]['promotion'] = $ProductPromotion[$i];
        }

        $path = CACHE . '/temp_data.cache.php';
        $content = '<?php $items = ' . var_export($napoje_tmp, true) . ';?>';
        $handler = fopen($path, 'w+');
        fwrite($handler, $content);
        fclose($handler);

       echo "<pre>";
       print_r($napoje_tmp);
       echo "</pre>";
       
    }

    public function   adddeclarationAction()
    {
    	$view = new ViewModel ();
    	$getuser = $this->forward()->dispatch('Admin\Controller\Index', array('action' => 'getuser'));
    	if (!$getuser) {
    		// not yet login
    		$this->redirect()->toRoute('home');
    	}
    	$this->layout()->getuser = $getuser;
    	$this->layout('layout/apotravinyadmin');
    	
    	//set name data
    	$Array_name_data = $this->get_name_dataAction(); 
    	$view->setVariable('NameData', $Array_name_data); 
    	return $view;
    }
    
    public function   adddeclarationapostAction()
    {
    	if ($this->getRequest()->isPost()) {
    		$data = $this->getRequest()->getPost();
    		
    		$data->product_code = rand(10,10000);
    		$declaration = new Declaration();
    		$declaration->exchangeArray($data);
    			
    		$check_save = $this->getServiceLocator()->get('DeclarationTable')->save($declaration);
    		echo $check_save ; die;
    	} 
    	
    }
    
    public function declarationsiteAction() {
        $getuser = $this->forward()->dispatch('Admin\Controller\Index', array('action' => 'getuser'));
        if (!$getuser) {
            // not yet login
            $this->redirect()->toRoute('home');
        }
        $this->layout()->getuser = $getuser;
        $this->layout('layout/apotravinyadmin');
        
        $NameTable = $this->getServiceLocator()->get('NameTable'); 
        $DeclarationTable = $this->getServiceLocator ()->get ( 'DeclarationTable' );
		$allRecord = $DeclarationTable->countAll ();
		$pageNull = new PageNull ( $allRecord );
		$itemsPerPage = 4;
		$pageRange = 3;
		$page = $this->params ()->fromRoute ( 'page', 1 );
		$offset = ($page - 1) * $itemsPerPage;
		$paginator = new Paginator ( $pageNull );
		$paginator->setCurrentPageNumber ( $page );
		$paginator->setItemCountPerPage ( $itemsPerPage );
		$paginator->setPageRange ( $pageRange );
		
		$list_Declaration_tmp = $DeclarationTable->getList ( $offset, $itemsPerPage );
		$i=0; $listpr = array();
		foreach ($list_Declaration_tmp as $key =>$Object)
		{
			if($Object->name_id != null)
			{ $name = $NameTable->parent_find($Object->name_id); }
			$listpr[$i]->id =  $Object->id;
			$listpr[$i]->product_code =  $Object->product_code;
			$listpr[$i]->name_id =  $Object->name_id;
			$listpr[$i]->name =  $name;
			$listpr[$i]->host =  $Object->host;
			$listpr[$i]->url =  $Object->url;
			$listpr[$i]->page_taken =  $Object->page_taken;
			$listpr[$i]->avatar_images =  $Object->avatar_images;
			$listpr[$i]->directoryavatar =  $Object->directoryavatar;
			$listpr[$i]->product_name =  $Object->product_name;
			$listpr[$i]->product_price =  $Object->product_price;
			$listpr[$i]->product_images =  $Object->product_images;
			$listpr[$i]->product_descriptstion =  $Object->product_descriptstion;
				
			$listpr[$i]->detail_product_descriptstion =  $Object->detail_product_descriptstion;
			$listpr[$i]->countryoforigin =  $Object->countryoforigin;
			$listpr[$i]->product_promotion =  $Object->product_promotion;
			$listpr[$i]->product_href_detail =  $Object->product_href_detail;
			
			$i++;
		}
		
		// crowler
		$dir_tmp_cache = CACHE . '/temp_data.cache.php'; 
		$Crowler = new Crowler();
		$cmd =  (string)$this->params()->fromPost('cmd');
		$temps =  $this->params()->fromPost('temps');
		
		    // Cach 2
			$Array_Crowler_url_object = array();$_Iteams = array();$save_cmd='';$items=null; $_Iteams_All= array() ;
			if($cmd !='' and $temps !='') {
				
				// get Declaration
				$_temps =  @implode ( ',', $temps );
				if($_temps !='' and $cmd=='feed')
				{
		
					$_mysql = 'SELECT 	declaration.* 	FROM 	declaration 	WHERE 	declaration.id in ('.$_temps.') 	ORDER BY 	declaration.id DESC';
					$Array_Crowler_url_object = $DeclarationTable->feed_sql($_mysql);
		
					$save_cmd = $cmd; $_Array_Rohlik = array();
					$r = 0;
		
					foreach ($Array_Crowler_url_object as $key=>$_value_get)
					{
						//set All dom o day
						$setHost = $_value_get['host'];
						$setDom_product_name = $_value_get['product_name'];                      //  [product_name] => div.items article h3
						$setDom_product_price =$_value_get['product_price'];                    //  [product_price] => div.items article h6
						$setDom_product_images = $_value_get['product_images'];                  //  [product_images] => div.items article a.img img
						$setDom_product_href_detail = $_value_get['product_href_detail'];        //  [product_href_detail] => div.items article h3
						$setDom_product_promotion = $_value_get['product_promotion'];           //  [product_href_detail] => div.items article h3
						$setDom_CountryofOrigin = $_value_get['countryoforigin'];
						$setDom_ProductDetails = $_value_get['detail_product_descriptstion'];
						$_url_get_crowl = $_value_get['url'];
						 
						$Rohlik = new Rolik($_url_get_crowl,
								$setHost,$setDom_product_name,$setDom_product_price,
								$setDom_product_images,$setDom_product_href_detail,
								$setDom_product_promotion,$setDom_CountryofOrigin,
								$setDom_ProductDetails
						);
						 
						$_Array_Rohlik[$r] = $Rohlik;
		
						// $Rohlik->feed_all($_value_get['url'],$_value_get['product_name'],$_value_get['product_images'],$_value_get['product_price'],$_value_get['product_promotion'],$_value_get['countryoforigin'],$_value_get['detail_product_descriptstion']);
						//$_Iteams[$key] = $Rohlik->getPropertyIteams();
						 
						$_Iteams =  $Rohlik->feed_all();
						$r++;
					}
		
		
					//                 		echo "</br> --------------Rohlik-----------------</br><pre>";
					//                 		print_r($_Iteams);
					//                 		echo "</pre>";
		
					// //                 		echo "</br> --------------$_Array_Rohlik-----------------</br><pre>";
					// //                 		print_r($_Array_Rohlik);
					// //                 		echo "</pre>";
					 
					//                 		die("</br>--------Rohlik-----------</br>");
		
		
		
					$path = CACHE . '/temp_data.cache.php';
					if (file_exists ( $path )) {
					$content = '<?php $items = ' . var_export($_Iteams, true) . ';?>';
					$handler = fopen($path, 'w+');
					fwrite($handler, $content);
					fclose($handler);
					
					$items = $this->get_itemscrowler();
					$items_details = 0;
					
					}else {die("Not exits temp_data.cache.php file in folder cache! please check file in folder cache!  ");}
		
					} // if($_temps !='')
		
						 
					} //end if($cmd !='' and $temps !='')
						 
						if($cmd=='' and $temps=='')
		                {
		                	$save_cmd = $cmd;
		                	$items = $this->get_itemscrowler();
						    $items_details = 0;
						 
			            }
		
						//feeddetails
						if($cmd=='feeddetails' and $temps=='')
						{
							$save_cmd = $cmd;
							$items_details = 1;
							$items = $this->getdetailproductcrowler();
							 
							 
							if($items == null){
							die("Please check file cache in folder cache temp_data.cache.php and temp_data_all.cache.php . May be is not extis!!!!!!");
		                }
		 
		
		 
		 
		}
		
		if($cmd=='insertdata' and $temps=='')
		{
						die("chua lam duoc ne");
						$save_cmd = $cmd;
						$items = (string) $this->getdetailproductcrowler();
						$items_details = 1;
						if($items == null){
						die("Please check file cache in folder cache iteams_data.cache.php and iteams_all_data.cache.php . May be is not extis!!!!!!");
		                	}
		                }
        
		
		
		
		return new ViewModel ( array (
				'listNews' => $listpr,
				'paginator' => $paginator,
				'allRecord' => $allRecord,
				'offset' => $offset,
				'itemsPerPage' => $itemsPerPage,
				'items'=>$items,
				'items_details'=>$items_details,
				'save_cmd' =>$save_cmd,
		) );
    }

    public function filedstructureAction()
    {
    	$view = new ViewModel ();
    	$getuser = $this->forward()->dispatch('Admin\Controller\Index', array('action' => 'getuser'));
    	if (!$getuser) {
    		// not yet login
    		$this->redirect()->toRoute('home');
    	}
    	$this->layout()->getuser = $getuser;
    	$this->layout('layout/apotravinyadmin');
    	 
    	//set name data
    	$Array_name_data = $this->get_name_dataAction();
    	 
    	$id = (int) $this->params()->fromRoute('id');
    	
    	if($id==0) die("Error!"); 
    	$get_deca  =  $this->getServiceLocator()->get('DeclarationTable')->getById($id);
    	
    	
    	if ($this->getRequest()->isPost()) {
    		$data = $this->getRequest()->getPost();
    		$declaration = new Declaration();
    		$declaration->exchangeArray($data);
    			
    		$check_save = $this->getServiceLocator()->get('DeclarationTable')->save($declaration);
    	
    	}
    	 
    	$view->setVariable('data_deca', $get_deca);
    	$view->setVariable('NameData', $Array_name_data);
    	$view->setVariable('check_save', $check_save);
    	return $view;
    } 
    
    public function testsingleAction()
    {

    	/********************* Start Curl Rolling *******************************/
    	
    	 // single curl request
    	$rc = new RollingCurl($this->request_callback($response, $info));
    	$rc->request("http://www.msn.com");
    	echo "<pre>";
    	print_r($rc->execute());
    	echo "</pre>";
    	// another single curl request
    	$rc = new RollingCurl($this->request_callback);
    	$rc->request("http://www.google.com");
    	echo "<pre>";
    	print_r($rc->execute());
    	echo "</pre>";
    	
    	echo "<hr>";
    	
    	// top 20 sites according to alexa (11/5/09)
    	$urls = array("http://www.google.com",
    			"http://www.facebook.com",
    			"http://www.yahoo.com",
    			"http://www.youtube.com",
    			"http://www.live.com",
    			"http://www.wikipedia.com",
    			"http://www.blogger.com",
    			"http://www.msn.com",
    			"http://www.baidu.com",
    			"http://www.yahoo.co.jp",
    			"http://www.myspace.com",
    			"http://www.qq.com",
    			"http://www.google.co.in",
    			"http://www.twitter.com",
    			"http://www.google.de",
    			"http://www.microsoft.com",
    			"http://www.google.cn",
    			"http://www.sina.com.cn",
    			"http://www.wordpress.com",
    			"http://www.google.co.uk",
    			"https://www.rohlik.cz/c75591-sladke-a-slane"
    	);
    	$rc = new RollingCurl("request_callback");
    	$rc->window_size = 20;
    	foreach ($urls as $url) {
    	$request = new RollingCurlRequest($url);
    	$rc->add($request);
    	}
    	
    	echo "<pre>";
    	print_r($rc->execute());
    	echo "</pre>";
    	
    	die();
    	
    	
    	/**********************End Curl Rolling ******************************/
    }
    
    
    public function indexAction() {
       $getuser = $this->forward()->dispatch('Admin\Controller\Index', array('action' => 'getuser'));
        if (!$getuser) {
            // not yet login
            $this->redirect()->toRoute('home');
        }
        $this->layout()->getuser = $getuser;
        $this->layout('layout/apotravinyadmin');
        
        $NameTable = $this->getServiceLocator()->get('NameTable');
        $DeclarationTable = $this->getServiceLocator ()->get ( 'DeclarationTable' );
        $allRecord = $DeclarationTable->countAll ();
        $pageNull = new PageNull ( $allRecord );
        $itemsPerPage = 10;
        $pageRange = 3;
        $page = $this->params ()->fromRoute ( 'page', 1 );
        $offset = ($page - 1) * $itemsPerPage;
        $paginator = new Paginator ( $pageNull );
        $paginator->setCurrentPageNumber ( $page );
        $paginator->setItemCountPerPage ( $itemsPerPage );
        $paginator->setPageRange ( $pageRange );
        
        $list_Declaration_tmp = $DeclarationTable->getList ( $offset, $itemsPerPage );
        
      
        if(!is_array($list_Declaration_tmp) or empty($list_Declaration_tmp)) die("Not object recode Declaration");
        $i=0; $listpr = array();
        
      
        foreach ($list_Declaration_tmp as $key =>$Object)
        {
        	if($Object->name_id != null)
        	{ $name = $NameTable->parent_find($Object->name_id); }
        	$listpr[$i]->phuc =  0;
        	$listpr[$i]->id =  $Object->id;
        	$listpr[$i]->product_code =  $Object->product_code;
        	$listpr[$i]->name_id =  $Object->name_id;
        	$listpr[$i]->name =  $name;
        	$listpr[$i]->host =  $Object->host;
        	$listpr[$i]->url =  $Object->url;
        	$listpr[$i]->page_taken =  $Object->page_taken;
        	$listpr[$i]->avatar_images =  $Object->avatar_images;
        	$listpr[$i]->directoryavatar =  $Object->directoryavatar;
        	$listpr[$i]->product_name =  $Object->product_name;
        	$listpr[$i]->product_price =  $Object->product_price;
        	$listpr[$i]->product_images =  $Object->product_images;
        	$listpr[$i]->product_descriptstion =  $Object->product_descriptstion;
        
        	$listpr[$i]->detail_product_descriptstion =  $Object->detail_product_descriptstion;
        	$listpr[$i]->product_promotion =  $Object->product_promotion;
        	$listpr[$i]->product_href_detail =  $Object->product_href_detail;
        		
        	$i++;
        }
      
        // crowler
        $dir_tmp_cache = CACHE . '/temp_data.cache.php';
        
        $Crowler = new Crowler();
        $cmd =  (string)$this->params()->fromPost('cmd');
        $temps =  $this->params()->fromPost('temps');
        $_array_delete = array();
        // Cach 2
                $Array_Crowler_url_object = array();$_Iteams = array();$save_cmd='';$items=null; $_Iteams_All= array() ;
                if($cmd !='' and $temps !='') {
                	// get Declaration 
                	$_temps =  @implode ( ',', $temps ); 
                	
                	if($_temps !='' and $cmd=='feed')
                	{ 
                		// test xoa noi dung file cache de test temp_data_rolling.cache.php
                		$path_delete_content = CACHE . '/temp_data_rolling.cache.php';
                		if (file_exists ( $path_delete_content )) {
                			$content1 = '';
                			$handler1 = fopen($path_delete_content, 'w+');
                			fwrite($handler1, $content1);
                			fclose($handler1);
                		}
                		
                		$_mysql = 'SELECT 	declaration.* 	FROM 	declaration 	WHERE 	declaration.id in ('.$_temps.') 	ORDER BY 	declaration.id DESC';
                		$Array_Crowler_url_object = $DeclarationTable->feed_sql($_mysql);
                		
                		$save_cmd = $cmd; $_Array_Rohlik = array();
                		$r = 0;
                		
                		$rolling_crowler = new RollingCurl("request_callback");
                		$rolling_crowler->window_size = 500;
                		
                		foreach ($Array_Crowler_url_object as $key=>$_value_get)
                		{ 
                		   //set All dom o day
                		   $setHost = $_value_get['host'];
                		   $dom_Name = $_value_get['product_name'];                      
                		   $dom_Price =$_value_get['product_price'];                    
                		   $dom_Img = $_value_get['product_images'];                   
                		   $dom_product_href_detail = $_value_get['product_href_detail'];        
                		   $dom_Promotion = $_value_get['product_promotion'];            
                		   $dom_CountryofOrigin = $_value_get['countryoforigin'];
                		   $dom_ProductDetails = $_value_get['product_descriptstion'];
                		   //$_value_get['detail_product_descriptstion'];
                		   
                		   $_url_get_crowl = $_value_get['url'];
                		   
                		   $request = new RollingCurlRequest($_url_get_crowl);
                		   $rolling_crowler->add($request);
                		   $rolling_crowler->add_url_crowler($_url_get_crowl);
                		   $rolling_crowler->add_host($setHost);
                           // Add Dom                		   
                		   $rolling_crowler->add_dom_Img($dom_Img);
                		   $rolling_crowler->add_dom_Name($dom_Name);
                		   $rolling_crowler->add_dom_Price($dom_Price);
                		   $rolling_crowler->add_dom_ProductDetails($dom_ProductDetails);
                		   $rolling_crowler->add_dom_Promotion($dom_Promotion);
                		   $rolling_crowler->add_dom_CountryofOrigin($dom_CountryofOrigin);
                		   $rolling_crowler->add_dom_product_href_detail($dom_product_href_detail);
                		  
                		}
                		$rolling_crowler->execute(); 
//                 		echo "<pre>";
//                 		print_r($rolling_crowler->execute());
//                 		echo "</pre>";
                	//	die;
                		
                		$items = $this->get_items_rolling() ;//$this->get_items();
                		$items_details = 0; 
//                 		echo "<pre>";
//                 		print_r($items);
//                 		echo "</pre>";                		
                	} // if($_temps !='')
                		
                	
                	if($_temps !='' and $cmd=='feed_delete')
                	{ 
                		$_mysql = 'SELECT 	declaration.* 	FROM 	declaration 	WHERE 	declaration.id in ('.$_temps.') 	ORDER BY 	declaration.id DESC';
                		$Array_Crowler_url_object = $DeclarationTable->feed_sql($_mysql);
                		foreach ($Array_Crowler_url_object as $key=>$_value_get)
                		{
                			$delete = $DeclarationTable->delete($_value_get['id']);
                			$_array_delete[$_value_get['id']]['id'] = $_value_get['id'];
                			$_array_delete[$_value_get['id']]['url'] = $_value_get['url'];
                			$_array_delete[$_value_get['id']]['status_delete'] = $delete;
                			
                		}// end for
                		
                	}//end delete
                	
                } //end if($cmd !='' and $temps !='')

                //index
                if($cmd=='' and $temps=='')
                { 
                	$save_cmd = $cmd;
                	$items = $this->get_items_rolling() ;//$this->get_items();
                	$items_details = 0;
                	
                }
                
                //feeddetails
                if($cmd=='feeddetails' and $temps=='')
                {
                	 //echo "feeddetails</br>";
                	
                	$save_cmd = $cmd;
                	$items_details = 1;
                	$items = $this->get_detail_product_rolling();   
                	
//                 	echo "<pre>";
//                 	print_r($items);
//                 	echo "</pre>";
                	
                	 

                	if($items == null){
                		die("Please check file cache in folder cache iteams_data.cache and iteams_all_data.cache . May be is not extis!!!!!!");
                	}

                	
                    if($items == 3 || $items == 1 ){
                		die(' iteams not exits');
                	}

                	if($items == 2 ){
                		die('temp_data_rolling.productdetail.cache not exits');
                	}
                	if($items == 10   ){
                		die('temp_data_rolling.cache not exits');
                	}	
                
                }
                
                if($cmd=='insertdata' and $temps=='')
                {
                	die("chua lam duoc ne");
                	$save_cmd = $cmd;
                	$items = (string) $this->getdetailproduct();
                	$items_details = 1;
                	if($items == null){
                		die("Please check file cache in folder cache iteams_data.cache and iteams_all_data.cache . May be is not extis!!!!!!");
                	}
                }
               
        return new ViewModel ( array (
        		'listNews' => $listpr,
        		'paginator' => $paginator,
        		'allRecord' => $allRecord,
        		'offset' => $offset,
        		'itemsPerPage' => $itemsPerPage,
        		'items'=>$items,
        		'items_details'=>$items_details,
        		'save_cmd' =>$save_cmd,
        		'_array_delete'=>$_array_delete,
        ) );
    }
    
    public  function get_items_rolling() {
    	$data = '';
    	$dir = CACHE . '/temp_data_rolling.cache.php';
    	if (file_exists ( $dir )) {
    		require $dir;
    		if (isset ( $items ) and $items) {
    			foreach ( $items as $key => $value_product ) {
	    			foreach ( $value_product as $keyn => $value ) { 
	    				$data .= '<li>' . $value ['name'] . '</li>';
	    			}
    			}
    		}else $data = null;
    	}
    	return $data;
    }
    
    
    public function get_detail_product_rolling()
    {  
    	// test xoa noi dung file cache de test temp_data_rolling.productdetail.cache.php
    	$path_delete_content = CACHE . '/temp_data_rolling.productdetail.cache.php';
    	if (file_exists ( $path_delete_content )) {
    		$content1 = '';
    		$handler1 = fopen($path_delete_content, 'w+');
    		fwrite($handler1, $content1);
    		fclose($handler1);
    	}
    	
    	/**********************Start Crowler*****************************/
    	
    	$dem = 0;
    	$data = '';
    	$dir = CACHE .'/temp_data_rolling.cache.php';
    	if (file_exists ( $dir )) {
    		require $dir;
    		if (isset ( $items ) and $items) {
    	
    			$rolling_crowler_product_details = new RollingCurlDetailsProducts("request_callback");
    			$rolling_crowler_product_details->window_size = 3000;
    	
    			foreach ( $items as $key => $value_product ) {
    				foreach ( $value_product as $keyn => $value ) {
    					// check url
    					if($value['host'] != '' and substr ($value['host'], -1) == '/')
    					{
    						$url = substr($value['host'],0,-1).$value['url_alias'];
    					}
    					if($value['host'] != '' and substr ($value['host'], -1) != '/') {
    						$url = $value['host'].$value['url_alias'];
    					}
    	
    					$request = new RollingCurlRequestDetailsProducts($url);
    					$rolling_crowler_product_details->add($request);
    					$rolling_crowler_product_details->add_url_crowler($url);
    					 
    					 
    					$dom_Name = $value['dom_product_name'];
    					$dom_Price =$value['dom_product_price'];
    					$dom_Img = $value['dom_product_images'];
    					$dom_product_href_detail = $value['dom_product_href_detail'];
    					$dom_Promotion = $value['dom_product_promotion'];
    					$dom_CountryofOrigin = $value['dom_countryoforigin'];
    					$dom_ProductDetails = $value['product_descriptstion'];
    					 
    					 
    					// Add Dom
    					$rolling_crowler_product_details->add_dom_Img($dom_Img);
    					$rolling_crowler_product_details->add_dom_Name($dom_Name);
    					$rolling_crowler_product_details->add_dom_Price($dom_Price);
						$rolling_crowler_product_details->add_dom_ProductDetails ( $dom_ProductDetails );
						$rolling_crowler_product_details->add_dom_Promotion($dom_Promotion);
    					$rolling_crowler_product_details->add_dom_CountryofOrigin($dom_CountryofOrigin);
    					$rolling_crowler_product_details->add_dom_product_href_detail($dom_product_href_detail);
    					 
    					 
    					// save product property
    					$host = $value['host'];
    					$url = $value['url'];
    					$name = $value['name'];
    					$url_alias = $value['url_alias'];
    					$thumbnail = $value['thumbnail'];
    					$price = $value['price'];
    					$promotion =  $value['promotion'];
    					//thieu
    					//	$data_popuplink = $value['data_popuplink'];
    					//	$product_id = $value['product_id'];
    					 
    					// add thuoc tinh product de luu lai
    					$rolling_crowler_product_details->add_host($host);
    					$rolling_crowler_product_details->add_url_product($url);
    					$rolling_crowler_product_details->add_name($name);
    					$rolling_crowler_product_details->add_url_alias($url_alias);
    					$rolling_crowler_product_details->add_thumbnail($thumbnail);
    					$rolling_crowler_product_details->add_price($price);
    					$rolling_crowler_product_details->add_promotion($promotion);
    					//$rolling_crowler_product_details->add_data_popuplink($data_popuplink);
    					//$rolling_crowler_product_details->add_product_id($product_id);
    	
    				}
    			}
    			 
//     			   	echo "<pre>";
//     			    print_r($rolling_crowler_product_details);
//     			    echo "</pre>";
    	
    			$rolling_crowler_product_details->execute();
    			 
    			 
    			//getdata
    			$datadetails = '';
    			$dir = CACHE . '/temp_data_rolling.productdetail.cache.php';
    			if (file_exists ( $dir )) {
    				require $dir;
    				if (isset ( $items ) and $items) {
    					foreach ( $items as $keyn => $value ) {
    						$datadetails .= '<li>' . $value ['name'] . '</li>';
    					}
    					$data =  $datadetails;
    				}else   $data = 3; // ' iteams not exits'
    	          
    			}else   $data = 2; // 'temp_data_rolling.productdetail.cache not exits'
         
    		 }else   $data = 1; // ' iteams not exits'
    		}else   $data = 10 ; // 'temp_data_rolling.cache not exits'
    		
    		return  $data;
    }
    
    public  function get_items() {
    	$data = '';
    	$dir = CACHE . '/iteams_data.cache.php';
    	if (file_exists ( $dir )) {
    		require $dir;
    		if (isset ( $items ) and $items) {
    		foreach ( $items as $keyn => $value ) {	
    			 $data .= '<li>' . $value ['name'] . '</li>'; 
    		 }
    		}else $data = null;
    	}
    	return $data;
    }
    
    public  function get_itemscrowler() {
    	$data = '';
    	$dir = CACHE . '/temp_data.cache.php';
    	if (file_exists ( $dir )) {
    		require $dir;
    		if (isset ( $items ) and $items) {
    			foreach ( $items as $keyn => $value ) {
    				$data .= '<li>' . $value ['name'] . '</li>';
    			}
    		}else $data = null;
    	}
    	return $data;
    }
    public function getdetailproductcrowler()
    {
    	 
    	$dem = 0;
    	$data = '';
    	$dir = CACHE . '/temp_data.cache.php';
    	if (file_exists ( $dir )) {
    		require $dir;
    		if (isset ( $items ) and $items) {
    			foreach ( $items as $keyn => $value ) {
    				$url = $value['host'].$value['url_alias'];
    				$_Object_get = $this->curlget($url, $key);
    					
    				$data[$keyn]['httpcode'] = $value['httpcode'];
    				$data[$keyn]['host'] = $value['host'];
    				$data[$keyn]['url'] = $value['url'];
    				$data[$keyn]['product_id'] = $value['product_id'];
    				$data[$keyn]['name'] = $value['name'];
    				$data[$keyn]['url_alias'] = $value['url_alias'];
    				$data[$keyn]['thumbnail'] = $value['thumbnail'];
    				$data[$keyn]['price'] = $value['price'];
    				$data[$keyn]['promotion'] =  $value['promotion'];
    				$data[$keyn]['data_popuplink'] = $value['data_popuplink'];
    				$data[$keyn]['httpcode_detail'] = $value['httpcode_detail'];
    				$data[$keyn]['product_detail'] = $_Object_get->details;
    				$data[$keyn]['product_countryoforigin'] = $_Object_get->countryoforigin;
    				//break;  // de burg tren server
    				if($dem == 5) { break;}  // 25 : may ram 2GB -->30 duoc chua toi han
    				// 35 localhost may minh van chay
    				$dem ++;
    			}
    		}else return $data = null;
    	}else return $data = null;
    	 
    	//return $data;
    	 
    	$path = CACHE . '/temp_data_all.cache.php';
    	if (file_exists ( $path ) and !empty($data)) {
    		$contentall = '<?php $items = ' . var_export($data, true) . ';?>';
    		$handler1 = fopen($path, 'w+');
    		fwrite($handler1, $contentall);
    		fclose($handler1);
    
    		//getdata
    		$datadetails = '';
    		if (file_exists ( $path )) {
    			require $dir;
    			if (isset ( $items ) and $items) {
    				foreach ( $items as $keyn => $value ) {
    					$datadetails .= '<li>' . $value ['name'] . '</li>';
    				}
    			}
    		}
    		return $datadetails;
    
    	}else return $datadetails = null;
    }
    
    
    public function getdetailproduct()
    {
    	
    	$dem = 0;
    	$data = '';
    	$dir = CACHE . '/iteams_data.cache.php';
    	if (file_exists ( $dir )) {
    		require $dir;
    		if (isset ( $items ) and $items) {
    			foreach ( $items as $keyn => $value ) { 
    					$url = $value['host'].$value['url_alias'];
    					$_Object_get = $this->curlget($url, $key); 
    					
    					$data[$keyn]['httpcode'] = $value['httpcode'];
    					$data[$keyn]['host'] = $value['host'];
    					$data[$keyn]['url'] = $value['url'];
    					$data[$keyn]['product_id'] = $value['product_id'];
    					$data[$keyn]['name'] = $value['name'];
    					$data[$keyn]['url_alias'] = $value['url_alias'];
    					$data[$keyn]['thumbnail'] = $value['thumbnail']; 
    					$data[$keyn]['price'] = $value['price'];
    					$data[$keyn]['promotion'] =  $value['promotion'];
    					$data[$keyn]['data_popuplink'] = $value['data_popuplink'];
    					$data[$keyn]['httpcode_detail'] = $value['httpcode_detail'];
    					$data[$keyn]['product_detail'] = $_Object_get->details;
    					$data[$keyn]['product_countryoforigin'] = $_Object_get->countryoforigin;
    					//break;  // de burg tren server  
    					if($dem == 5) { break;}  // 25 : may ram 2GB -->30 duoc chua toi han
    					                             // 35 localhost may minh van chay
    					$dem ++;
    			}
    		}else return $data = null; 
    	}else return $data = null; 
    	
    	//return $data;
    	
    	                $path = CACHE . '/iteams_all_data.cache.php';
    	                if (file_exists ( $path ) and !empty($data)) {
                		$contentall = '<?php $items = ' . var_export($data, true) . ';?>';
                		$handler1 = fopen($path, 'w+');
                		fwrite($handler1, $contentall);
                		fclose($handler1);
                		
                		//getdata
                		$datadetails = '';
                		$dir = CACHE . '/iteams_all_data.cache.php';
                		if (file_exists ( $dir )) {
                			require $dir;
                			if (isset ( $items ) and $items) {
                				foreach ( $items as $keyn => $value ) {
                					$datadetails .= '<li>' . $value ['name'] . '</li>';
                				}
                			}
                		}
                		return $datadetails;
                		
    	                }else return $datadetails = null; 
    }
    
    public function curlget($uri,$key)
    {
    	
    	$config = array(
    			'adapter' => 'Zend\Http\Client\Adapter\Curl',
    			'curloptions' => array(
    					CURLOPT_RETURNTRANSFER => true, // return web page
    					CURLOPT_HEADER => false, // don't return headers
    					CURLOPT_FOLLOWLOCATION => true, // follow redirects
    					CURLOPT_ENCODING => "", // handle all encodings
    					CURLOPT_USERAGENT => "Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US) AppleWebKit/534.10 (KHTML, like Gecko) Chrome/8.0.552.224 Safari/534.10", // who am i
    					CURLOPT_AUTOREFERER => true, // set referer on redirect
    					CURLOPT_CONNECTTIMEOUT => 120, // timeout on connect
    					CURLOPT_TIMEOUT => 120, // timeout on response
    					CURLOPT_MAXREDIRS => 10, // stop after 10 redirects
    					CURLOPT_SSL_VERIFYPEER => false     // Disabled SSL Cert checks
    			),
    	);
    	
    	$client = new \Zend\Http\Client($uri, $config);
    	$response = $this->getResponse();
    	$response->getHeaders()->addHeaderLine('content-type', 'text/html; charset=UTF-8'); //set content-type
    	$result = $client->send();
    	$body = $result->getBody(); //content of the web
    	
    	$dom = new Query($body);
    	
    	/* --  $_ProductDetails --- */
    	$_ProductDetails;
    	$get_ProductDetails = $dom->execute('div.popupDetail div.table div.cell div.tabs div.tab'); // div.detail div.main section
    	
    	if (count($get_ProductDetails) > 0) {
    		foreach ($get_ProductDetails as $key => $_pro) {
    			//echo "<pre>"; print_r (  $_pro->textContent );
    			$str = @trim($_pro->textContent);
    			//$result = $str_replace(" ", "", $_pro->textContent);
    			$_ProductDetails = $str;
    		}
    	} else { $_ProductDetails =  "loi khi lay ProductDetails"; }
    	
    	/*************$_CountryofOrigin***************************/
    	
    	$_feed_dom = 'li.country'; //div.detail div.main article div.like a span
    	$_CountryofOrigin;
    	$get_CountryofOrigin = $dom->execute($_feed_dom);
    	
    	if (count($get_CountryofOrigin) > 0) {
    		foreach ($get_CountryofOrigin as $key => $_pro) {
    			$str = @trim($_pro->textContent);
    			$_CountryofOrigin= $str;
    		}
    	} else { $_CountryofOrigin =  "loi khi lay ProductDetails"; }
    	
    	$Data_details = new \stdClass;
    	$Data_details->details = $_ProductDetails;
    	$Data_details->countryoforigin = $_CountryofOrigin;
    	//unset($ch, $options);
    	
    	return $Data_details;
    }

    public function addAction() {

        $this->layout('layout/apotravinyadmin');
        $form = new CrowlerForm ();
        // $form->setInputFilter(new CrowlerFilter());
        $data = $this->getServiceLocator()->get('PayoutypeTable')->gettype();



        if (is_array($data) and ! empty($data)) {
            $datatypetmp = $data;
        } else {
            $datatypetmp = Null;
        }
        $form->settype($datatypetmp);

        if ($this->getRequest()->isPost()) {

            $data = array_merge_recursive($this->getRequest()->getPost()->toArray(), $this->getRequest()->getFiles()->toArray());
            $form->setData($data);
            if (!$form->isValid()) {
                return new ViewModel(array(
                    'error' => true,
                    'form' => $form
                ));
            } else {

                $exchange_data = array(
                    'namepackge' => $data ['namepackge'],
                    'price' => $data ['price'],
                    'id_user' => $id_user,
                    'type' => $data ['type'],
                    'DKCpmUni' => $data ['DKCpmUni'],
                    'DKCpmRaw' => $data ['DKCpmRaw'],
                    'MBCpmUni' => $data ['MBCpmUni'],
                    'MBCpmRaw' => $data ['MBCpmRaw'],
                    'code' => $data['code'],
                    'hotstring' => $data['hotstring'],
                );

                $Crowler = new Crowler ();
                $Crowler->exchangeArray($exchange_data);
                $this->getServiceLocator()->get('CrowlerTable')->save($Crowler);
                return $this->redirect()->toRoute('Crowler', array(
                            'controller' => 'product',
                            'action' => 'list'
                ));
            }
        }

        return new ViewModel(array(
            'form' => $form
        ));
    }

    public function listAction() {

        $this->layout('layout/apotravinyadmin');

        $CrowlerTable = $this->getServiceLocator()->get('CrowlerTable');
        $allRecord = $CrowlerTable->countAll();
        $pageNull = new PageNull($allRecord);
        $itemsPerPage = 20;
        $pageRange = 5;
        $page = $this->params()->fromRoute('page', 1);
        $offset = ($page - 1) * $itemsPerPage;
        $paginator = new Paginator($pageNull);
        $paginator->setCurrentPageNumber($page);
        $paginator->setItemCountPerPage($itemsPerPage);
        $paginator->setPageRange($pageRange);

        $listpr = $CrowlerTable->getList($offset, $itemsPerPage);

        //die("anh co the che vi em em biet ko ");

        return new ViewModel(array(
            'listNews' => $listpr,
            'paginator' => $paginator,
            'allRecord' => $allRecord,
            'offset' => $offset,
            'itemsPerPage' => $itemsPerPage
        ));
    }

    public function editAction() {
    	$view = new ViewModel ();
    	$getuser = $this->forward()->dispatch('Admin\Controller\Index', array('action' => 'getuser'));
    	if (!$getuser) {
    		// not yet login
    		$this->redirect()->toRoute('home');
    	}
    	$this->layout()->getuser = $getuser;
    	$this->layout('layout/apotravinyadmin');
    	
    	//set name data
    	$Array_name_data = $this->get_name_dataAction();
    	
    	$id = (int) $this->params()->fromRoute('id');
    	 
    	if($id==0) die("Error!");
    	$get_deca  =  $this->getServiceLocator()->get('DeclarationTable')->getById($id);
    	 
    	 
    	if ($this->getRequest()->isPost()) {
    		$data = $this->getRequest()->getPost();
    		$declaration = new Declaration();
    		$declaration->exchangeArray($data);
    		 
    		$check_save = $this->getServiceLocator()->get('DeclarationTable')->save($declaration);
    		 
    	}
    	
    	$view->setVariable('data_deca', $get_deca);
    	$view->setVariable('NameData', $Array_name_data);
    	$view->setVariable('check_save', $check_save);
    	return $view;
    }

    public function statusAction() {

        $view = new ViewModel();
        $this->layout('layout/apotravinyadmin');

        $id = $this->params()->fromRoute('id', 0);
        $status = $this->params()->fromRoute('status', 0);

        $CrowlerTable = $this->getServiceLocator()->get('CrowlerTable');


        if ($id == 0) {
            return $this->redirect()->toRoute('Crowler', array(
                        'controller' => 'product',
                        'action' => 'list-news'
            ));
        } else {

            $exchange_data = array();

            $exchange_data['id'] = $id;
            $exchange_data['status'] = $status;


            $Crowler = new Crowler ();
            $Crowler->exchangeArray($exchange_data);

            $checkupdate = $CrowlerTable->savestatus($Crowler);


            $view->id = $id;
            $view->check = $checkupdate;
            return $view;
        }
    }

    public function deleteAction() {
    	$view = new ViewModel ();
    	$product_id = (int) $this->params()->fromRoute('id', 0);
    	if ($product_id == 0) {
    		return $this->redirect()->toRoute('Product');
    	}
    	
        $this->layout('layout/apotravinyadmin');
        $request = $this->getRequest();
        if ($request->isPost()) {
        	$del = $request->getPost()->get('del', 'No');
        	if ($del == 'Yes') {
			        $id = (int) $request->getPost()->get('id');
			        if ($id != 0) {
			        	//xoa anh
			        	$getcata = $this->getServiceLocator()->get('DeclarationTable')->get($id);
			        	if ($getcata) {
			        		$get_img_older = $getcata->avatar_images;
			        		$_dir = UPLOAD_PATH_IMG;
			        		if ($get_img_older) {
			        			$utility->deleteImage($get_img_older, $_dir);
			        		}
			        	}
			        	//xoa san pham
			           $check_delete=  $this->getServiceLocator()->get('DeclarationTable')->delete($id);
			           $view->check = $check_delete;
			           return $view;
			        }else {
                    $view->check = 0;
                    return $view;
                }
        	}
        }
               // $view->setVariable('check_delete', $check_delete);
                $view->setVariable('id', $product_id);
                $view->setVariable('product', $this->getServiceLocator()->get('DeclarationTable')->get($product_id));
        return $view;
    }

    public function upload() {
        $adapter = new \Zend\File\Transfer\Adapter\Http ();
        $fileImage = "file-" . rand(100, 999) . ".png";
        foreach ($adapter->getFileInfo() as $info) {
            if ($info ['name'] != null) {
                $adapter->addFilter('File\Rename', array(
                    'target' => 'public/uploads/' . $fileImage,
                    'overwrite' => true
                        ), $info ['name']);
                $adapter->receive($info ['name']);
            }
        }
        return $fileImage;
    }
    
    public function request_callback($response, $info)
    {
    	// parse the page title out of the returned HTML
    	if (preg_match("~<title>(.*?)</title>~i", $response, $out)) {
    		$title = $out[1];
    	}
    	echo "<b>$title</b><br />";
    	echo "<pre>";
    	print_r($info);
        	echo "</pre>";
    	echo "<hr>";
    }

}



