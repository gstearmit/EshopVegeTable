<?php

namespace Crowler;

use Zend\ModuleManager\Feature\AutoloaderProviderInterface,
    Zend\ModuleManager\Feature\ConfigProviderInterface,
    Zend\ModuleManager\Feature\ViewHelperProviderInterface;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Product\Model\Product;
use Product\Model\ProductTable;
use Crowler\Model\Name;
use Crowler\Model\NameTable;
use Crowler\Model\Declaration;
use Crowler\Model\DeclarationTable;
use Crowler\Model\Crowler;

class Module implements
    AutoloaderProviderInterface, 
    ConfigProviderInterface, 
    ViewHelperProviderInterface
 {
	public function onBootstrap(MvcEvent $e) {
	}
	public function getConfig() {
		return include __DIR__ . '/config/module.config.php';
	}
	public function getAutoloaderConfig() {
		return array (
				'Zend\Loader\StandardAutoloader' => array (
						'namespaces' => array (
								__NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__ 
						) 
				) 
		);
	}
	
	public function getViewHelperConfig()
	{
		return array(
				'factories' => array(
						'AutoEscapeHelper' => 'Crowler\View\Helper\HelloWorldHelper',
						'test_helper' => function($sm) {
							$helper = new View\Helper\Testhelper ;
							//$request = $sm->getServiceLocator()->get('Request');
							//$helper->setRequest($request);
							return $helper;
						}
				)
		);
	}
	
	public function getServiceConfig() {
		return array (
				'initializers' => array (
						function ($instance, $sm) {
							
							if ($instance instanceof \Zend\Db\Adapter\AdapterAwareInterface) {
								
								$instance->setDbAdapter ( $sm->get ( 'Zend\Db\Adapter\Adapter' ) );
							}
						}
            ),
            'factories' => array(
                'ProductTable' => function($sm) {
            $tableGateway = $sm->get('ProductTableGateway');
            $table = new ProductTable($tableGateway);
            return $table;
        },
                'ProductTableGateway' => function ($sm) {
            $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
            $resultSetPrototype = new ResultSet();
            $resultSetPrototype->setArrayObjectPrototype(new Product());
            return new TableGateway('product', $dbAdapter, null, $resultSetPrototype);
        },
        
        'NameTable' => function($sm) {
        	$tableGateway = $sm->get('NameTableGateway');
        	$table = new NameTable($tableGateway);
        	return $table;
        },
        'NameTableGateway' => function ($sm) {
        	$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
        	$resultSetPrototype = new ResultSet();
        	$resultSetPrototype->setArrayObjectPrototype(new Name());
        	return new TableGateway('name', $dbAdapter, null, $resultSetPrototype);
        },
		
		'DeclarationTable' => function($sm) {
        	$tableGateway = $sm->get('DeclarationTableGateway');
        	$table = new DeclarationTable($tableGateway);
        	return $table;
        },
        'DeclarationTableGateway' => function ($sm) {
        	$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
        	$resultSetPrototype = new ResultSet();
        	$resultSetPrototype->setArrayObjectPrototype(new Declaration());
        	return new TableGateway('declaration', $dbAdapter, null, $resultSetPrototype);
        },
      
        
            ),
        );
    }

}
