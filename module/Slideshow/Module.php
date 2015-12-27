<?php
namespace Slideshow;

use Slideshow\Model\Slide;
use Slideshow\Model\SlideTable;
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
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__
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
                'Slideshow\Model\SlideTable' =>  function($sm) {
                    $tableGateway = $sm->get('SlideTableGateway');
                    $table = new SlideTable($tableGateway);
                    return $table;
                },
                'SlideTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Slide());
                    return new TableGateway('slideshow', $dbAdapter, null, $resultSetPrototype);
                },
            ),
        );
    }
}
 ?>