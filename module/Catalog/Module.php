<?php
namespace Catalog;
//use Zend\Mvc\ModuleRouteListener;
//use Zend\Mvc\MvcEvent;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
 use Catalog\Model\Catalog;
 use Catalog\Model\CatalogTable;

 class Module
 {
     public function getAutoloaderConfig()
     {
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

     public function getConfig()
     {
         return include __DIR__ . '/config/module.config.php';
     }
	 public function getServiceConfig()
     {
         return array(
             'factories' => array(
                 'Catalog\Model\CatalogTable' =>  function($sm) {
                     $tableGateway = $sm->get('CatalogTableGateway');
                     $table = new CatalogTable($tableGateway);
                     return $table;
                 },
                 'CatalogTableGateway' => function ($sm) {
                     $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                     $resultSetPrototype = new ResultSet();
                     $resultSetPrototype->setArrayObjectPrototype(new Catalog());
                     return new TableGateway('catelog', $dbAdapter, null, $resultSetPrototype);
                 },
             ),
         );
     }
 }
 ?>