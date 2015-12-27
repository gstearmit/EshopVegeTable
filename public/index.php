<?php
/**
 * This makes our life easier when dealing with paths. Everything is relative
 * to the application root now.
 */
/**
 * Display all errors when APPLICATION_ENV is development.
 */

if($_SERVER['APPLICATION_ENV'] == null) { $_SERVER['APPLICATION_ENV'] = 'developmentServer';	}

if ($_SERVER['APPLICATION_ENV'] == 'development') {
 	error_reporting(E_ALL);
 	ini_set("display_errors", 1);
// 	  error_reporting(0);
// 	  ini_set("display_errors", 0);
} 

if ($_SERVER['APPLICATION_ENV'] == 'production' || $_SERVER['APPLICATION_ENV'] == 'testing' || $_SERVER['APPLICATION_ENV'] == 'developmentServer' ) {
	error_reporting(0);
	ini_set("display_errors", 0);
}

chdir(dirname(__DIR__));
define('ROOT_PATH', dirname(__DIR__));
define('REQUEST_MICROTIME', microtime(true));


// Decline static file requests back to the PHP built-in webserver
if (php_sapi_name() === 'cli-server' && is_file(__DIR__ . parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH))) {
    return false;
}
include 'define.php';

// Setup autoloading
require 'init_autoloader.php';

// Run the application!
Zend\Mvc\Application::init(require 'config/application.config.php')->run();
