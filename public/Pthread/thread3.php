<?php
use Zend\Loader\StandardAutoloader;
use Zend\Feed\Reader\Reader;
use Zend\Debug\Debug;

//var_dump(dirname(__DIR__));

require_once dirname(dirname(__DIR__)).'/vendor/ZF2/library/Zend/Loader/StandardAutoloader.php';
$loader = new StandardAutoloader(array('autoregister_zf' => true));
$loader->register();

class T extends Thread {
    public function __construct($loader) {
        $this->loader = $loader;
    }

    public function run() {
        $this->loader->register();

        echo "</br>";
        printf(
            "Executing Thread with ZF2 Loaded (%s)\n", Debug::getSapi() 
        );

       echo "<pre>";
       print_r($this->loader);
       echo "</pre>";
    }
}

$t = new T($loader);
var_dump($t->start());
?>