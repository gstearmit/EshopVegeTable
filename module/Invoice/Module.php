<?php

namespace Invoice;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Invoice\Model\Invoice;
use Invoice\Model\InvoiceTable;
use Invoice\Model\OderTable;
use Invoice\Model\OderdetailTable;
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
             'InvoiceTable' => function($sm) {
        	$tableGateway = $sm->get('InvoiceTableGateway');
        	$table = new InvoiceTable($tableGateway);
        	return $table;
			},
			'InvoiceTableGateway' => function ($sm) {
				$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
				$resultSetPrototype = new ResultSet();
				$resultSetPrototype->setArrayObjectPrototype(new Invoice());
				return new TableGateway('invoice', $dbAdapter, null, $resultSetPrototype);
			},
                         'Invoice\Model\OderTable' => function($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $table = new OderTable($dbAdapter);
                    return $table;                    
                }, 
                         'Invoice\Model\OderdetailTable' => function($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $table = new OderdetailTable($dbAdapter);
                    return $table;                    
                },        
            ),
        );
    }

}
