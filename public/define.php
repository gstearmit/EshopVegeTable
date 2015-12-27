<?php	
	//http://rohlik.cz.localhost:20134/
	
	chdir(dirname(__DIR__));

	define('APPLICATION_PATH23', realpath(dirname(__DIR__)));	
	
	define('WEBPATH_NO_HTTP', $_SERVER['SERVER_NAME']);
	define('WEBPATH', 'http://'.$_SERVER['SERVER_NAME']);
	define('WEBPATH_REAL', 'http://'.$_SERVER['SERVER_NAME'].'/html/index');
	define('WEBPATH_REAL_ADMIN', 'http://'.$_SERVER['SERVER_NAME'].'/html/admin');
	
	
	define('THEME_EROR_404', 'http://'.$_SERVER['SERVER_NAME'].'/html/visatwo');
	define('BAG_REAL_HTML', 'http://'.$_SERVER['SERVER_NAME'].'/bagseshop');
	define('BAG_WEBPATH', 'http://'.$_SERVER['SERVER_NAME']);
	define('BAG_NO_HTTP', $_SERVER['SERVER_NAME']);
	define('Mage_Cookies_domain', $_SERVER['SERVER_NAME']);
	
	//-------------------------------------------------------------------------------------------
	define('ROHLIK_LANGDINGPAGE', 'http://'.$_SERVER['SERVER_NAME'].'/langpage');
	define('ROHLIK_APOTRAVINY', 'http://'.$_SERVER['SERVER_NAME'].'/themerohlik');
	define('APOTRAVINY_ADMIN', 'http://'.$_SERVER['SERVER_NAME'].'/admintheme');
	define('ROHLIK_LAZADA', 'http://'.$_SERVER['SERVER_NAME'].'/lazadatheme');
	//-------------------------------------------------------------------------------------------
	
	define('CACHE', dirname(__DIR__).'\cache');
	define('CAcerts', ROOT_PATH . '\public\CAcerts');
	
	define('LIBRARY_PATH', realpath(APPLICATION_PATH23 . '/library/'));
	define('PUBLIC_PATH'	, realpath(APPLICATION_PATH23 . '/public_html'));
	define('TEMPLATE_PATH'	, realpath(PUBLIC_PATH . '/templates'));
	define('DIR_UPLOAD_NEW'	, realpath(PUBLIC_PATH.'/uploadnews'));
	//default.png
	define('FILES_PATH'	, realpath(PUBLIC_PATH . '/files'));
	define('MZIMG_PATH'	, realpath(PUBLIC_PATH . '/images'));
	
	/*
	//upload
	define('UPLOAD_PATH_IMG', ROOT_PATH.'\public\publicupload\images');
	define('UPLOAD_PATH_IMG_THUNB_', ROOT_PATH .'\public\publicupload\images\thumb_');
	define('UPLOAD_PATH_IMG_290x372', ROOT_PATH.'\public\publicupload\images\290x372');
	define('UPLOAD_PATH_IMG_67x86', ROOT_PATH.'\public\publicupload\images\67x86');
	*/
	//upload
	define('UPLOAD_PATH_IMG', ROOT_PATH.'/public/publicupload/images');
	define('UPLOAD_PATH_IMG_THUNB_', ROOT_PATH .'/public/publicupload/images/thumb_');
	define('UPLOAD_PATH_IMG_290x372', ROOT_PATH.'/public/publicupload/images/290x372');
	define('UPLOAD_PATH_IMG_67x86', ROOT_PATH.'/public/publicupload/images/67x86');
	//run images
	
	//run images
	define('WEBPATH_UPLOAD_PATH_IMG', WEBPATH .'/publicupload/images/');
	define('WEBPATH_UPLOAD_PATH_IMG_THUNB_', WEBPATH .'/publicupload/images/thumb_/');
	define('WEBPATH_UPLOAD_PATH_IMG_290x372', WEBPATH.'/publicupload/images/290x372/');
	define('WEBPATH_UPLOAD_PATH_IMG_67x86', WEBPATH.'\public\publicupload/images/67x86/');
	
	
	define('IP_SERVER_TEST', '127.0.0.1');
	define('IP_SERVER_TEST2', '192.168.10.9');
	define('IP_SERVER_TEST3', '192.168.10.11');
	
	//PayPal
	define('PayPalMode', 'sandbox');// sandbox or live
	define('PayPalApiUsername'	,'gstearmit-facilitator_api1.gmail.com'); //PayPal API Username
	define('PayPalApiPassword'	, 'E852AMMAF9C6U69P'); //Paypal API password
	define('PayPalApiSignature'	,'ADP0Jx7lp27Jj81pNkfy3qhuA7vNABTHqFpZM-3KJn-2Pn1ngildrbtC'); //Paypal API Signature

	//san box test
	// 		$PayPalMode 			= 'sandbox'; // sandbox or live
	// 		$PayPalApiUsername 		= 'gstearmit-facilitator_api1.gmail.com'; //PayPal API Username
	// 		$PayPalApiPassword 		= 'E852AMMAF9C6U69P'; //Paypal API password
	// 		$PayPalApiSignature 	= 'ADP0Jx7lp27Jj81pNkfy3qhuA7vNABTHqFpZM-3KJn-2Pn1ngildrbtC'; //Paypal API Signature
	
	
	define('USAMin', 0.5);
	define('USAMax'	,3); 
	define('EUMin'	, 0.3); 
	define('EUMax'	,2); 
	define('QTeMin'	, 0.1);
	define('QTeMax'	,1);