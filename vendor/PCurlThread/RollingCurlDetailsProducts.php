<?php 
namespace PCurlThread;
// DOM
use DOMDocument;
use DOMXPath;
use DOMNode;
use Zend\Stdlib\ErrorHandler;
use Zend\Dom\Query;

class RollingCurlDetailsProducts {
	public function testcurl($str) {
		echo 'Hello ' . $str;
	}
    /**
     * @var int
     *
     * Window size is the max number of simultaneous connections allowed.
	 * 
     * REMEMBER TO RESPECT THE SERVERS:
     * Sending too many requests at one time can easily be perceived
     * as a DOS attack. Increase this window_size if you are making requests
     * to multiple servers or have permission from the receving server admins.
     */
    private $window_size = 5;
    /**
     * @var float
     *
     * Timeout is the timeout used for curl_multi_select.
     */
    private $timeout = 10;
    /**
     * @var string|array
     *
     * Callback function to be applied to each result.
     */
    private $callback;
    /**
     * @var array
     *
     * Set your base options that you want to be used with EVERY request.
     */
    
    public $funccallback;
    /**
     * @var array
     */
    
    public $_All_Result;
    /*
     * $var array
     * @author Joinh 
     */
    
    protected $options = array(
		CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_CONNECTTIMEOUT => 30,
        CURLOPT_TIMEOUT => 30
	);
	
    /**
     * @var array
     */
    private $headers = array();
    /**
     * @var Request[]
     *
     * The request queue
     */
    private $requests = array();
    /**
     * @var RequestMap[]
     *
     * Maps handles to request indexes
     */
    private $requestMap = array();
    private $host = array();
    
    
    /**
     * @var add_host[]
     *
     * Array indexes host
     */
    public function add_host($_host) {
    	$this->host[] = $_host;
    	return true;
    }
    
    /**
     * @var DomMap[]
     *
     * Maps handles to Dom indexes
     */
    private $DomMap = array();
    
    private $dom_Name = array();
    private $dom_Promotion = array();
    private $dom_Price = array();
    private $dom_Img = array();
    private $dom_CountryofOrigin = array();
    private $dom_ProductDetails = array();
    private $dom_product_href_detail = array();
    
    /**************save property product *************************/
    private $url_product = array();
    public function add_url_product($_url) {
    	$this->url_product[] = $_url;
    	return true;
    }
    
    private $name = array();
    public function add_name($_name) {
    	$this->name[] = $_name;
    	return true;
    }
    
    private $url_alias = array();
    public function add_url_alias($_url_alias) {
    	$this->url_alias[] = $_url_alias;
    	return true;
    }
    
    private $thumbnail = array();
    public function add_thumbnail($thumbnail) {
    	$this->thumbnail[] = $thumbnail;
    	return true;
    }
    
    private $price = array();
    public function add_price($price) {
    	$this->price[] = $price;
    	return true;
    }
    
    private $promotion = array();
    public function add_promotion($promotion) {
    	$this->promotion[] = $promotion;
    	return true;
    }
    
    private $data_popuplink = array();
    public function add_data_popuplink($data_popuplink) {
    	$this->data_popuplink[] = $data_popuplink;
    	return true;
    }
    
    private $product_id = array();
    public function add_product_id($product_id) {
    	$this->product_id[] = $product_id;
    	return true;
    }
    
    
    /**
     * @var items[]
     *
     * chua toan bo items luu khi crowler
     */
    private $items = array();
    
    /**
     * @var items_products[]
     *
     * luu toan toan bo items cua ca products va tat ca cac thuoc tinh cua product khi crowler lay details san pham
     */
    public  $items_products = array();
    
    private $url = array();
    private $urlMap =array(); 
    
    /**
     * @var returns[]
     *
     * All returns of requests
     */
    private $returns = array();
    /**
     * @param  $callback
     * Callback function to be applied to each result.
     *
     * Can be specified as 'my_callback_function'
     * or array($object, 'my_callback_method').
     *
     * Function should take three parameters: $response, $info, $request.
     * $response is response body, $info is additional curl info.
     * $request is the original request
     *
     * @return void
     */
	function __construct($callback = null) {
        $this->callback = $callback;
        $this->funccallback = $callback;
    }
    
    function getfunc_callback()
    { 
    	return $this->funccallback; 
    }
    
    
    
    /**
     * @param string $name
     * @return mixed
     */
    public function __get($name) {
        return (isset($this->{$name})) ? $this->{$name} : null;
    }
    /**
     * @param string $name
     * @param mixed $value
     * @return bool
     */
    public function __set($name, $value){
        // append the base options & headers
        if ($name == "options" || $name == "headers") {
            $this->{$name} = $value + $this->{$name};
        } else {
            $this->{$name} = $value;
        }
        return true;
    }
    /**
     * Add a request to the request queue
     *
     * @param Request $request
     * @return bool
     */
    public function add($request) {
         $this->requests[] = $request;
         return true;
    }
    
    //add_url_crowler
    public function add_url_crowler($url_clrowler) {
    	$this->url[] = $url_clrowler;
    	return true;
    }
    //add_Items
    public function add_items($items_tmp,$i,$url)
    {
    	//$this->items[$i]['url'] = $url;
    	//$this->items[$i]['product'] = $items_tmp; 
    	$this->items[$i] = $items_tmp;
    	return true;
    }
    
    //add_Items_product_details
    public function add_items_product_details($items_tmp,$i,$url)
    {
    	        $this->items_products[$i]['product_countryoforigin'] = $items_tmp->countryoforigin;
    	        $this->items_products[$i]['product_detail'] = $items_tmp->product_detail;
    	        $this->items_products[$i]['url_details'] = $this->host[$i].$this->url_alias[$i];
    	        
		    	$this->items_products[$i]['host'] = $this->host[$i];
		    	$this->items_products[$i]['url'] = $this->url_product[$i] ;
		    	$this->items_products[$i]['name'] = $this->name[$i];
		    	$this->items_products[$i]['url_alias'] = $this->url_alias[$i];
		    	$this->items_products[$i]['thumbnail'] = $this->thumbnail[$i];
		    	$this->items_products[$i]['price'] = $this->price[$i];
		    	//$this->items_products[$i]['data_popuplink'] = $this->data_popuplink[$i];
		    	//$this->items_products[$i]['product_id'] = $this->product_id[$i];
    	 return true;
    }
    
    public function add_dom_Name($dom_Name) {
    	$this->dom_Name[] = $dom_Name;
    	return true;
    }
    
    public function add_dom_Img($dom_Img) {
    	$this->dom_Img[] = $dom_Img;
    	return true;
    }
    
    public function add_dom_Price($dom_Price) {
    	$this->dom_Price[] = $dom_Price;
    	return true;
    }
    
    public function add_dom_ProductDetails($dom_ProductDetails) {
    	$this->dom_ProductDetails[] = $dom_ProductDetails;
    	return true;
    }
    
    public function add_dom_Promotion($dom_Promotion) {
    	$this->dom_Promotion[] = $dom_Promotion;
    	return true;
    }
    
    public function add_dom_CountryofOrigin($dom_CountryofOrigin) {
    	$this->dom_CountryofOrigin[] = $dom_CountryofOrigin;
    	return true;
    }
    
    public function add_dom_product_href_detail($dom_product_href_detail) {
    	$this->dom_product_href_detail[] = $dom_product_href_detail;
    	return true;
    }
    
    /**
     * @param \returns[] $returns
     */
    public function setReturns($returns)
    {
        $this->returns = $returns;
    }
    /**
     * @return \returns[]
     */
    public function getReturns()
    {
        return $this->returns;
    }
    /**
     * Create new Request and add it to the request queue
     *
     * @param string $url
     * @param string $method
     * @param  $post_data
     * @param  $headers
     * @param  $options
     * @return bool
     */
    public function request($url, $method = "GET", $post_data = null, $headers = null, $options = null) {
         $this->requests[] = new RollingCurlRequest($url, $method, $post_data, $headers, $options);
         return true;
    }
    /**
     * Perform GET request
     *
     * @param string $url
     * @param  $headers
     * @param  $options
     * @return bool
     */
    
    function getrequest()
    {
    	return $this->requests;
    }
    
    public function get($url, $headers = null, $options = null) {
        return $this->request($url, "GET", null, $headers, $options);
    }
    /**
     * Perform POST request
     *
     * @param string $url
     * @param  $post_data
     * @param  $headers
     * @param  $options
     * @return bool
     */
    public function post($url, $post_data = null, $headers = null, $options = null) {
        return $this->request($url, "POST", $post_data, $headers, $options);
    }
    /**
     * Execute the curl
     *
     * @param int $window_size Max number of simultaneous connections
     * @return string|bool
     */
    public function execute($window_size = null) {
         // start the rolling curl. window_size is the max number of simultaneous connections
        return $this->rolling_curl($window_size);
        
    }
    
    
    
    public function request_return_callback($response, $info)
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
    
   public function  pare_dom($output,$i,$_url_tmp)
   {
   	 
   	$dom = new Query($output);
   	 
   	/* --  $_ProductDetails --- */
   	$_ProductDetails;
   	$get_ProductDetails = $dom->execute($this->dom_ProductDetails[$i]); 
   	//$dom->execute('div.popupDetail div.table div.cell div.tabs div.tab'); // div.detail div.main section
   	 
   	if (count($get_ProductDetails) > 0) {
   		foreach ($get_ProductDetails as $key => $_pro) { 
   			$str = @trim($_pro->textContent); 
   			$_ProductDetails = $str;
   		}
   	} else { $_ProductDetails =  "loi khi lay ProductDetails"; }
   	 
   	/*************$_CountryofOrigin***************************/
   	 
   	$get_CountryofOrigin = $dom->execute($this->dom_CountryofOrigin[$i]);
   	 
   	if (count($get_CountryofOrigin) > 0) {
   		foreach ($get_CountryofOrigin as $key => $_pro) {
   			$str = @trim($_pro->textContent);
   			$_CountryofOrigin= $str;
   		}
   	} else { $_CountryofOrigin =  "loi khi lay ProductDetails"; }
   	 
   	$Data_details = new \stdClass;
   	$Data_details->details = $_ProductDetails;
   	$Data_details->countryoforigin = $_CountryofOrigin;
   
   	return $Data_details;
   }
   
   public function export_cache($items)
   {
   	$path = CACHE . '/temp_data_rolling.productdetail.cache.php';
   	$content = '<?php $items = ' . var_export($items, true) . ';?>';
   	$handler = fopen($path, 'a+');
   	fwrite($handler, $content);
   	fclose($handler);
   }
   
   public function single_pare_dom($output,$k,$_url_tmp)
   {
   	$dom = new Query($output);
   	/* --- Product Name and Product URL-->getdetail -- */
   	$ProductName = array();
   	$Product_Url = array();
   	$get_Product_Name = $dom->execute($this->dom_Name[$k]); 
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
   	$get_Product_Promotion = $dom->execute($this->dom_Promotion[$k]);
   	if (count($get_Product_Promotion) > 0) {
   		foreach ($get_Product_Promotion as $key => $_pro) {
   			$ProductPromotion[] = $_pro->textContent;
   		}
   	} else {
   		echo "loi khi lay product Promotion";
   	}
   	 
   	/* --- Get Product Price  -- */
   	$ProductPrice = array();
   	$Product_Price_older = array();
   	$get_Product_Price = $dom->execute($this->dom_Price[$k]); 
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
   	$get_Product_Img = $dom->execute($this->dom_Img[$k]); 
   	if (count($get_Product_Img) > 0) {
   		foreach ($get_Product_Img as $key => $_img) {
   			$ProductImg[] = $_img->getAttributeNode('data-replace')->nodeValue;
   		}
   	} else {
   		echo "loi khi lay product img";
   	}
   	 
   	//save data cache
   	// Lưu tin đã lấy vào file cache
   	 
   	$napoje_tmp = array();
   	 
   	for ($i = 0; $i <@count($ProductName); $i++) {
   		$napoje_tmp[$i]['url'] = $_url_tmp;
   		$napoje_tmp[$i]['name'] = $ProductName[$i];
   		$napoje_tmp[$i]['url_alias'] = $Product_Url[$i];
   		$napoje_tmp[$i]['thumbnail'] = $ProductImg[$i];
   		$napoje_tmp[$i]['price'] = $ProductPrice[$i];
   		$napoje_tmp[$i]['promotion'] = $ProductPromotion[$i];
   	}
   	 
   return $napoje_tmp;
   }
    
    
    /**
     * Performs a single curl request
     *
     * @access private
     * @return string
     */
    private function single_curl() {
        $ch = curl_init();		
        $request = array_shift($this->requests);
        $options = $this->get_options($request);
        curl_setopt_array($ch,$options);
        $output = curl_exec($ch);
        $info = curl_getinfo($ch);
        
        // it's not neccesary to set a callback for one-off requests
         //Requet Dom -->Name , Img , Price ,......
         
        if($info['http_code'] !='200')
        {
        	die("not resphone contend ! please check url get contend");
        }
         
        // send the return values to the callback function.
        $_url_tmp = $this->requests[0];
        $items_tmp = $this->single_pare_dom($output, 0,$_url_tmp);
        $this->add_items($items_tmp, 0,$_url_tmp); // add items to save cache file
        $this->export_cache($this->items);
        
        $array = array(
        	'output' =>$output,
        	'infor' =>$info,
        	'status'=>$info['http_code'],
        	'requet' => $request,	
        	'Dom' =>array(
        	   'dom_Name'=>$this->dom_Name,
        	   'dom_CountryofOrigin'=>$this->dom_CountryofOrigin,	
        	   'dom_Img'=>$this->dom_Img,
        	   'dom_Price'=>$this->dom_Price,
        			'dom_product_href_detail'=>$this->dom_product_href_detail,
        			'dom_ProductDetails'=>$this->dom_ProductDetails,			
        			'dom_Promotion'=>$this->dom_Promotion	,	
             ),		
        );
       return $array;
    }
    
    
    /**
     * Performs multiple curl requests
     *
     * @access private
     * @throws RollingCurlException
     * @param int $window_size Max number of simultaneous connections
     * @return bool
     */
    private function rolling_curl($window_size = null) {
    	
        if ($window_size)
            $this->window_size = $window_size;
        // make sure the rolling window isn't greater than the # of urls
        if (sizeof($this->requests) < $this->window_size)
            $this->window_size = sizeof($this->requests);
        
        if ($this->window_size < 2) {
            throw new RollingCurlException("Window size must be greater than 1");
        }
         
        $master = curl_multi_init();        
        // start the first batch of requests
        for ($i = 0; $i < $this->window_size; $i++) {
            $ch = curl_init();
            $options = $this->get_options($this->requests[$i]);
            curl_setopt_array($ch,$options);
            curl_multi_add_handle($master, $ch);
            // Add to our request Maps
            $key = (string) $ch;
            $this->requestMap[$key] = $i;
            $this->DomMap[$key] = $i;
            $this->urlMap[$key] = $i;
        }
        
        do {
            while(($execrun = curl_multi_exec($master, $running)) == CURLM_CALL_MULTI_PERFORM);
            if($execrun != CURLM_OK) {
                break;
            }
            // a request was just completed -- find out which one
            while($done = curl_multi_info_read($master)) {
            	
                // get the info and content returned on the request
                $info = curl_getinfo($done['handle']);
                $output = curl_multi_getcontent($done['handle']);
               
                // sap xep lai case
                $key = (string)$done['handle'];
                $request = $this->requests[$this->requestMap[$key]];
                
                // send the return values to the callback function.
                $_url_tmp = $request ;
                $items_tmp = $this->pare_dom($output, $this->requestMap[$key],$_url_tmp);
               
                $this->add_items_product_details($items_tmp, $this->requestMap[$key],$_url_tmp); // add items to save cache file
               
                // start a new request (it's important to do this before removing the old one)
                if ($i < sizeof($this->requests) && isset($this->requests[$i]) && $i < count($this->requests)) {
                    $ch = curl_init();
                    $options = $this->get_options($this->requests[$i]);
                    curl_setopt_array($ch,$options);
                    curl_multi_add_handle($master, $ch);
                    // Add to our request Maps
                    $key = (string) $ch;
                    $this->requestMap[$key] = $i;
                    $i++;
                }
                // remove the curl handle that just completed
                curl_multi_remove_handle($master, $done['handle']);
            }
            // Block for data in / output; error handling is done by curl_multi_exec
            if ($running) {
                curl_multi_select($master, $this->timeout);
            }
        } while ($running);
        curl_multi_close($master);
      
        //save file cache to view product
        $this->export_cache($this->items_products);
       
    }
    /**
     * Helper function to set up a new request by setting the appropriate options
     *
     * @access private
     * @param Request $request
     * @return array
     */
    private function get_options($request) {
        // options for this entire curl object
        $options = $this->__get('options');
        // NOTE: The PHP cURL library won't follow redirects if either safe_mode is on
        // or open_basedir is defined.
        // See: https://bugs.php.net/bug.php?id=30609
		if (( ini_get('safe_mode') == 'Off' || !ini_get('safe_mode') )
            && ini_get('open_basedir') == '') {
            $options[CURLOPT_FOLLOWLOCATION] = 1;
			$options[CURLOPT_MAXREDIRS] = 5;
        }
        $headers = $this->__get('headers');
		// append custom options for this specific request
		if ($request->options) {
            $options = $request->options + $options;
        }
		// set the request URL
        $options[CURLOPT_URL] = $request->url;
        // posting data w/ this request?
        if ($request->post_data) {
            $options[CURLOPT_POST] = 1;
            $options[CURLOPT_POSTFIELDS] = $request->post_data;
        }
        if ($headers) {
            $options[CURLOPT_HEADER] = 0;
            $options[CURLOPT_HTTPHEADER] = $headers;
        }
        
        // Due to a bug in cURL CURLOPT_WRITEFUNCTION must be defined as the last option
        // Otherwise it doesn't register. So let's unset and set it again
        // See http://stackoverflow.com/questions/15937055/curl-writefunction-not-being-called
        if( ! empty( $options[CURLOPT_WRITEFUNCTION]) ) {
            $writeCallback = $options[CURLOPT_WRITEFUNCTION];
            unset( $options[CURLOPT_WRITEFUNCTION] );
            $options[CURLOPT_WRITEFUNCTION] = $writeCallback;
        }
        return $options;
    }
    /**
     * @return void
     */
    public function __destruct() {
        unset($this->window_size, $this->callback, $this->options, $this->headers, $this->requests);
	}
}