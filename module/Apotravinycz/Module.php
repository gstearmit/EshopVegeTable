<?php

namespace Apotravinycz;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Apotravinycz\Model\Apotravinycz;
use Apotravinycz\Model\ApotravinyczTable;
use Apotravinycz\Model\CatalogTable;
use Apotravinycz\Model\ApotravinyczproductTable;

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
                'ApotravinyczTable' => function($sm) {
            $tableGateway = $sm->get('ApotravinyczTableGateway');
            $table = new ApotravinyczTable($tableGateway);
            return $table;
        },
                'ApotravinyczTableGateway' => function ($sm) {
            $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
            $resultSetPrototype = new ResultSet();
            $resultSetPrototype->setArrayObjectPrototype(new Apotravinycz());
            return new TableGateway('product', $dbAdapter, null, $resultSetPrototype);
        },
         'Apotravinycz\Model\CatalogTable' => function($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $table = new CatalogTable($dbAdapter);
                    return $table;
                },
          'Apotravinycz\Model\ApotravinyczproductTable' => function($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $table = new ApotravinyczproductTable($dbAdapter);
                    return $table;
                },
        
      
        
            ),
        );
    }

}
