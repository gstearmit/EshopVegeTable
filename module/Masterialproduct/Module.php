<?php

namespace Masterialproduct;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Masterialproduct\Model\Masterialproduct;
use Masterialproduct\Model\MasterialproductTable;


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
                'MasterialproductTable' => function($sm) {
            $tableGateway = $sm->get('MasterialproductTableGateway');
            $table = new MasterialproductTable($tableGateway);
            return $table;
        },
                'MasterialproductTableGateway' => function ($sm) {
            $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
            $resultSetPrototype = new ResultSet();
            $resultSetPrototype->setArrayObjectPrototype(new Masterialproduct());
            return new TableGateway('product', $dbAdapter, null, $resultSetPrototype);
        },
        
      
        
            ),
        );
    }

}
