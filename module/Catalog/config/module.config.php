<?php

return array(
    'controllers' => array(
        'invokables' => array(
            'Catalog\Controller\Index' => 'Catalog\Controller\IndexController',
        ),
    ),
    // The following section is new and should be added to your file
    'router' => array(
        'routes' => array(
            'Catalog' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/catalog[/:action][/:id][/:uenc][/:status][/page-:page][/order_by/:order_by][/:order][/search_by/:search_by]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]+',
                        'uenc' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'status' => '[0-9]*',
                        'page' => '[0-9]+',
                        'order_by' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'order' => 'ASC|DESC',
                    ),
                    'defaults' => array(
                        'controller' => 'Catalog\Controller\Index',
                        'action' => 'index',
                        'page' => '1'
                    ),
                ),
            ),
            //catalogitemscompare
            'Catalogitemscompare' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/catalogitemscompare[/:items][/:uenc]',
                    'constraints' => array(
                        'items' => '[0-9]+',
                        'uenc' => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ),
                    'defaults' => array(
                        'controller' => 'Catalog\Controller\Index',
                        'action' => 'catalogitemscompare',
                    ),
                ),
            ),
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
        'strategies' => array(
            'ViewJsonStrategy'
        ),
        'template_map' => array(
        )
    ),
    'module_layouts' => array(
    ),
    'controller_plugins' => array(
        'invokables' => array(
        )
    ),
    'view_helpers' => array(
        'invokables' => array(
        ),
    ),
);
?>