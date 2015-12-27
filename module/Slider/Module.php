<?php
namespace Slider;
//use Zend\Mvc\ModuleRouteListener;
//use Zend\Mvc\MvcEvent;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
 use Slider\Model\Slider;
 use Slider\Model\SliderTable;

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
                 'Slider\Model\SliderTable' =>  function($sm) {
                     $tableGateway = $sm->get('SliderTableGateway');
                     $table = new SliderTable($tableGateway);
                     return $table;
                 },
                 'SliderTableGateway' => function ($sm) {
                     $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                     $resultSetPrototype = new ResultSet();
                     $resultSetPrototype->setArrayObjectPrototype(new Slider());
                     return new TableGateway('slideshow', $dbAdapter, null, $resultSetPrototype);
                 },
             ),
         );
     }
 }
 ?>