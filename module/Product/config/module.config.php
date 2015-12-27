<?php

return array(
    'controllers' => array(
        'invokables' => array(
            //  'Product\Controller\Product' => 'Product\Controller\ProductController',
            'Product\Controller\Index' => 'Product\Controller\IndexController',
        //'Product\Controller\Oder' => 'Product\Controller\OderController',
        )
    ),
    'router' => array(
        'routes' => array(
            'Oder' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/oder[/:controller][/:action[/:id][/:status][/page-:page]]',
                    'constraints' => array(
                        'controller' => '[a-zA-Z][a-zA-Z0-9-]*',
                        'action' => '[a-zA-Z][a-zA-Z0-9-]*',
                        'id' => '[1-9][0-9]*',
                        'status' => '[0-9]*',
                        'page' => '[1-9][0-9]*'
                    ),
                    'defaults' => array(
                        '__NAMESPACE__' => 'Product\Controller',
                        'controller' => 'Product\Controller\Oder',
                        'action' => 'list',
                        'page' => '1'
                    )
                )
            ),            
            'Product' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/product[/:controller][/:action[/:id][/:status][/page-:page]][.html]',
                    'constraints' => array(
                        'controller' => '[a-zA-Z][a-zA-Z0-9-]*',
                        'action' => '[a-zA-Z][a-zA-Z0-9-]*',
                        'id' => '[1-9][0-9]*',
                        'status' => '[0-9]*',
                        'page' => '[1-9][0-9]*'
                    ),
                    'defaults' => array(
                        '__NAMESPACE__' => 'Product\Controller',
                        'controller' => 'Product\Controller\Index',
                        'action' => 'add',
                        'page' => '1'
                    )
                )
            ),
//             'ProductView' => array(
//                 'type' => 'Segment',
//                 'options' => array(
//                     'route' => '/productview[/:controller][/:action[/:id][/page-:page]][.html]',
//                     'constraints' => array(
//                         'controller' => '[a-zA-Z][a-zA-Z0-9-]*',
//                         'action' => '[a-zA-Z][a-zA-Z0-9-]*',
//                         'id' => '[1-9][0-9]*',
//                         'page' => '[1-9][0-9]*'
//                     ),
//                     'defaults' => array(
//                         '__NAMESPACE__' => 'Product\Controller',
//                         'controller' => 'Product\Controller\Product',
//                         'action' => 'index',
//                         'page' => '1'
//                     )
//                 )
//             ),
        		
           'Quickview' => array(
        				'type' => 'Segment',
        				'options' => array(
        						'route' => '/quickview[/:path][/:id]',
        						'constraints' => array( 
        								'path' => '[a-zA-Z][a-zA-Z0-9-]*',
        								'id' => '[1-9][0-9]*', 
        						),
        						'defaults' => array(
        								'__NAMESPACE__' => 'Product\Controller',
        								'controller' => 'Product\Controller\Index',
        								'action' => 'quickview', 
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
