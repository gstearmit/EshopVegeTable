<?php
namespace MyLib;
// use Zend\Loader\StandardAutoloader;
// use Zend\Feed\Reader\Reader;
use Zend\Debug\Debug;



// require_once LIBAPO.'/ZF2/library/Zend/Loader/StandardAutoloader.php';
// $loader = new StandardAutoloader(array('autoregister_zf' => true));
// $loader->register();

class Rohlikcrowler extends Thread {
    public function __construct($loader) {
        $this->loader = $loader;
    }

    public function run() {
        $this->loader->register();
        return $this->loader;
//         echo "</br>";
//         printf(
//             "Executing Thread with ZF2 Loaded (%s)\n", Debug::getSapi() 
//         );

//        echo "<pre>";
//        print_r($this->loader);
//        echo "</pre>";
    }
}

// $t = new Rohlikcrowler($loader);
// var_dump($t->start());
?>