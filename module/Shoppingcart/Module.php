<?php
namespace Shoppingcart;
use Shoppingcart\Model\CityTable;
use Shoppingcart\Model\DistrictTable;
 class Module {

    public function getAutoloaderConfig() {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getConfig() {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getServiceConfig() {
        return array(
            'factories' => array(
			//Khai báo model tại đât
                'Shoppingcart\Model\CityTable' => function($sm) {
            $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
            $table = new CityTable($dbAdapter);
            return $table;
        },
                 'Shoppingcart\Model\DistrictTable' => function($sm) {
            $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
            $table = new DistrictTable($dbAdapter);
            return $table;
        },
		//End
            ),
        );
    }

}