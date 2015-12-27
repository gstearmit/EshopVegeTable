<?php
namespace Main;
use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;

use Main\Model\MainTable;
use Main\Model\Main;

use Main\Model\Buyer;
use Main\Model\BuyerTable;

use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;


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
     
     public function onBootstrap(MvcEvent $e)
    {
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);


    }
    
	 public function getServiceConfig()
     {
         return array(
             'factories' => array(
                 'Main\Model\MainTable' =>  function($sm) {
                     $tableGateway = $sm->get('MainTableGateway');
                     $table = new MainTable($tableGateway);
                     return $table;
                 },
                 'MainTableGateway' => function ($sm) {
                     $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                     $resultSetPrototype = new ResultSet();
                     $resultSetPrototype->setArrayObjectPrototype(new Main());
                     return new TableGateway('video', $dbAdapter, null, $resultSetPrototype);
                 },
                 
                 'BuyerTable' => function($sm) {
                 	$tableGateway = $sm->get('BuyerTableGateway');
                 	$table = new BuyerTable($tableGateway);
                 	return $table;
                 },
                 'BuyerTableGateway' => function ($sm) {
                 	$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                 	$resultSetPrototype = new ResultSet();
                 	$resultSetPrototype->setArrayObjectPrototype(new Buyer());
                 	return new TableGateway('buyerTable', $dbAdapter, null, $resultSetPrototype);
                 },
             
             ),
         );
     }
 }
 ?>