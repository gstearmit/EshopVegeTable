<?php
namespace Adminmaterialize;
use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Adminmaterialize\Model\AdminmaterializeTable;
use Adminmaterialize\Model\Adminmaterialize;
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
                 'Adminmaterialize\Model\AdminmaterializeTable' =>  function($sm) {
                     $tableGateway = $sm->get('AdminmaterializeTableGateway');
                     $table = new AdminmaterializeTable($tableGateway);
                     return $table;
                 },
                 'AdminmaterializeTableGateway' => function ($sm) {
                     $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                     $resultSetPrototype = new ResultSet();
                     $resultSetPrototype->setArrayObjectPrototype(new Adminmaterialize());
                     return new TableGateway('admin', $dbAdapter, null, $resultSetPrototype);
                 },
             ),
         );
     }
 }
 ?>