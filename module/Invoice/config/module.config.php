<?php

return array(
    'controllers' => array(
        'invokables' => array(
            'Invoice\Controller\Invoice' => 'Invoice\Controller\InvoiceController',
            'Invoice\Controller\Order' => 'Invoice\Controller\OrderController',
        )
    ),
    'router' => array(
        'routes' => array(
            'Invoice' => array(
                'type' => 'Segment',
//                 'options' => array(
//                    // 'route' => '/news[/:controller][/:action[/:id][/page-:page]][.html]',
// 					 'route' => '/contact[/:action[/:id][/page-:page]]',
//                     'constraints' => array(
//                         //'controller' => '[a-zA-Z][a-zA-Z0-9-]*',
//                         'action' => '[a-zA-Z][a-zA-Z0-9-]*',
//                         'id' => '[1-9][0-9]*',
//                         'page' => '[1-9][0-9]*'
//                     ),
//                     'defaults' => array(
//                         '__NAMESPACE__' => 'Invoice\Controller',
//                         'controller' => 'Invoice\Controller\Invoice',
//                         'action' => 'add-news',
//                         'page' => '1'
//                     )
//                 )
                'options' => array(
                    'route' => '/invoice[/:action[/:id][/:status][/page-:page]][.html]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9-]*',
                        'id' => '[1-9][0-9]*',
                        'status' => '[0-9]*',
                        'page' => '[1-9][0-9]*'
                    ),
                    'defaults' => array(
                        '__NAMESPACE__' => 'Invoice\Controller',
                        'controller' => 'Invoice\Controller\Invoice',
                        'action' => 'list',
                        'page' => '1'
                    )
                )
            ),
            
            'Order' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/invoice/order[/:action[/:id][/:status][/page=:page]][.html]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9-]*',
                        'id' => '[1-9][0-9]*',
                        'status' => '[0-9]*',
                        'page' => '[1-9][0-9]*'
                    ),
                    'defaults' => array(
                        '__NAMESPACE__' => 'Invoice\Controller',
                        'controller' => 'Invoice\Controller\Order',
                        'action' => 'index',
                        'page' => '1'
                    )
                )
            ),
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view'
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
