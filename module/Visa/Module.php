<?php

namespace Visa;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Visa\Model\Visa;
use Visa\Model\VisaTable;

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
             'VisaTable' => function($sm) {
        	$tableGateway = $sm->get('VisaTableGateway');
        	$table = new VisaTable($tableGateway);
        	return $table;
			},
			'VisaTableGateway' => function ($sm) {
				$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
				$resultSetPrototype = new ResultSet();
				$resultSetPrototype->setArrayObjectPrototype(new Visa());
				return new TableGateway('visa', $dbAdapter, null, $resultSetPrototype);
			},
            ),
        );
    }

}
