<?php

namespace Product;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Product\Model\Product;
use Product\Model\ProductTable;

use Product\Model\Payoutype;
use Product\Model\PayoutypeTable;
//

use Product\Model\Oders;
use Product\Model\OdersTable;

use Product\Model\Odersdetails;
use Product\Model\OdersdetailsTable;

use Product\Model\Buyer;
use Product\Model\BuyerTable;

use Product\Model\Contact;
use Product\Model\ContactTable;

use Product\Model\Abuse;
use Product\Model\AbuseTable;

use Product\Model\Langue;
use Product\Model\LangueTable;

use Product\Model\Countryn;
use Product\Model\CountrynTable;

use Tags\Model\Tags;
use Tags\Model\TagsTable;

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
        
        
        'PayoutypeTable' => function($sm) {
        	$tableGateway = $sm->get('PayoutypeTableGateway');
        	$table = new PayoutypeTable($tableGateway);
        	return $table;
        },
        'PayoutypeTableGateway' => function ($sm) {
        	$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
        	$resultSetPrototype = new ResultSet();
        	$resultSetPrototype->setArrayObjectPrototype(new Payoutype());
        	return new TableGateway('payoutype', $dbAdapter, null, $resultSetPrototype);
        },
        
        'OdersTable' => function($sm) {
        	$tableGateway = $sm->get('OdersTableGateway');
        	$table = new OdersTable($tableGateway);
        	return $table;
        },
        'OdersTableGateway' => function ($sm) {
        	$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
        	$resultSetPrototype = new ResultSet();
        	$resultSetPrototype->setArrayObjectPrototype(new Oders());
        	return new TableGateway('oders', $dbAdapter, null, $resultSetPrototype);
        },
        
        'OdersdetailsTable' => function($sm) {
        	$tableGateway = $sm->get('OdersdetailsTableGateway');
        	$table = new OdersdetailsTable($tableGateway);
        	return $table;
        },
        'OdersdetailsTableGateway' => function ($sm) {
        	$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
        	$resultSetPrototype = new ResultSet();
        	$resultSetPrototype->setArrayObjectPrototype(new Odersdetails());
        	return new TableGateway('odersdetails', $dbAdapter, null, $resultSetPrototype);
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
        	return new TableGateway('BuyerTable', $dbAdapter, null, $resultSetPrototype);
        },
        
        'ContactTable' => function($sm) {
        	$tableGateway = $sm->get('ContactTableGateway');
        	$table = new ContactTable($tableGateway);
        	return $table;
        },
        'ContactTableGateway' => function ($sm) {
        	$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
        	$resultSetPrototype = new ResultSet();
        	$resultSetPrototype->setArrayObjectPrototype(new Contact());
        	return new TableGateway('contact', $dbAdapter, null, $resultSetPrototype);
        },
        
        'LangueTable' => function($sm) {
        	$tableGateway = $sm->get('LangueTableGateway');
        	$table = new LangueTable($tableGateway);
        	return $table;
        },
        'LangueTableGateway' => function ($sm) {
        	$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
        	$resultSetPrototype = new ResultSet();
        	$resultSetPrototype->setArrayObjectPrototype(new Langue());
        	return new TableGateway('langgues', $dbAdapter, null, $resultSetPrototype);
        },
        
        'CountrynTable' => function($sm) {
        	$tableGateway = $sm->get('CountrynTableGateway');
        	$table = new LangueTable($tableGateway);
        	return $table;
        },
        'CountrynTableGateway' => function ($sm) {
        	$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
        	$resultSetPrototype = new ResultSet();
        	$resultSetPrototype->setArrayObjectPrototype(new Countryn());
        	return new TableGateway('countryn', $dbAdapter, null, $resultSetPrototype);
        },
        
        
        
        'AbuseTable' => function($sm) {
        	$tableGateway = $sm->get('AbuseTableGateway');
        	$table = new AbuseTable($tableGateway);
        	return $table;
        },
        'AbuseTableGateway' => function ($sm) {
        	$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
        	$resultSetPrototype = new ResultSet();
        	$resultSetPrototype->setArrayObjectPrototype(new Abuse());
        	return new TableGateway('abuse', $dbAdapter, null, $resultSetPrototype);
        },
        
        
        'Tags\Model\TagsTable' =>  function($sm) {
        	$tableGateway = $sm->get('TagsTableGateway');
        	$table = new TagsTable($tableGateway);
        	return $table;
        },
        'TagsTableGateway' => function ($sm) {
        	$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
        	$resultSetPrototype = new ResultSet();
        	$resultSetPrototype->setArrayObjectPrototype(new Tags());
        	return new TableGateway('tags', $dbAdapter, null, $resultSetPrototype);
        },
        
        
            ),
        );
    }

}
