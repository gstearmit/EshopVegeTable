<?php

namespace Magiccategory;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Magiccategory\Model\Magiccategory;
use Magiccategory\Model\MagiccategoryTable;

class Module {

    public function onBootstrap(MvcEvent $e) {
        
    }

    public function getConfig() {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig() {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getServiceConfig() {
        return array(
            'initializers' => array(
                function($instance, $sm) {

            if ($instance instanceof \Zend\Db\Adapter\AdapterAwareInterface) {

                $instance->setDbAdapter($sm->get('Zend\Db\Adapter\Adapter'));
            }
        }
            ),
            'factories' => array(
             'MagiccategoryTable' => function($sm) {
        	$tableGateway = $sm->get('MagiccategoryTableGateway');
        	$table = new MagiccategoryTable($tableGateway);
        	return $table;
			},
			'MagiccategoryTableGateway' => function ($sm) {
				$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
				$resultSetPrototype = new ResultSet();
				$resultSetPrototype->setArrayObjectPrototype(new Magiccategory());
				return new TableGateway('checkout', $dbAdapter, null, $resultSetPrototype);
			},
            ),
        );
    }

}
