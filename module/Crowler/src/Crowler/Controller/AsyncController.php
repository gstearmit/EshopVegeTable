<?php
/*
namespace Crowler\Controller;
use Zend\Loader\StandardAutoloader;
use Zend\Feed\Reader\Reader;
use Zend\Debug\Debug;

require_once 'Zend/library/Zend/Loader/StandardAutoloader.php';
$loader = new StandardAutoloader(array('autoregister_zf' => true));
$loader->register();

class Async extends Thread {
    public function __construct($loader) {
        $this->loader = $loader;
    }

    public function run() {
        $this->loader->register();

        printf(
            "Executing Thread with ZF2 Loaded (%s)\n", Debug::getSapi() 
        );

        var_dump ($this->loader);
    }
}

$t = new Async($loader);
$t->start();
*/
?>