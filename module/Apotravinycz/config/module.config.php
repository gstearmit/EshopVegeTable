<?php

return array(
    'controllers' => array(
        'invokables' => array(
            'Apotravinycz\Controller\Index' => 'Apotravinycz\Controller\IndexController',             
        )
    ),
    'router' => array(
        'routes' => array(
            'Apotravinycz' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/apotraviny[/:controller][/:action[/:id][/:status][/page-:page]][.html]',
                    'constraints' => array(
                        'controller' => '[a-zA-Z][a-zA-Z0-9-]*',
                        'action' => '[a-zA-Z][a-zA-Z0-9-]*',
                        'id' => '[1-9][0-9]*',
                        'status' => '[0-9]*',
                        'page' => '[1-9][0-9]*'
                    ),
                    'defaults' => array(
                        '__NAMESPACE__' => 'Apotravinycz\Controller',
                        'controller' => 'Apotravinycz\Controller\Apotravinycz',
                        'action' => 'index',
                        'page' => '1'
                    )
                )
            ),
            'ApotravinyczView' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/apotravinyview[/:controller][/:action[/:id][/page-:page]][.html]',
                    'constraints' => array(
                        'controller' => '[a-zA-Z][a-zA-Z0-9-]*',
                        'action' => '[a-zA-Z][a-zA-Z0-9-]*',
                        'id' => '[1-9][0-9]*',
                        'page' => '[1-9][0-9]*'
                    ),
                    'defaults' => array(
                        '__NAMESPACE__' => 'Apotravinycz\Controller',
                        'controller' => 'Apotravinycz\Controller\Apotravinycz',
                        'action' => 'index',
                        'page' => '1'
                    )
                )
            ),
            'loadproduct' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/loadproduct/loadproduct[/:action]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ),
                    'defaults' => array(
                         '__NAMESPACE__' => 'Apotravinycz\Controller',
                        'controller' => 'Apotravinycz\Controller\Index',
                        'action' => 'loadproduct',
                    ),
                ),
            ),
             'getproduct' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/getproduct/productdetail[/:action]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ),
                    'defaults' => array(
                         '__NAMESPACE__' => 'Apotravinycz\Controller',
                        'controller' => 'Apotravinycz\Controller\Index',
                        'action' => 'productdetail',
                    ),
                ),
            ),
            'getproductorange' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/getproductorange/productorange[/:action]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ),
                    'defaults' => array(
                         '__NAMESPACE__' => 'Apotravinycz\Controller',
                        'controller' => 'Apotravinycz\Controller\Index',
                        'action' => 'productorange',
                    ),
                ),
            ),
            //loginmater
            'Apologinmater' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/loginmaster',
                    'constraints' => array(
                    ),
                    'defaults' => array(
                        '__NAMESPACE__' => 'Apotravinycz\Controller',
                        'controller' => 'Apotravinycz\Controller\Index',
                        'action' => 'loginmaster',
                        'page' => '1'
                    )
                )
            ),
            //page-register
            'Pageregister' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/pageregister',
                    'constraints' => array(
                    ),
                    'defaults' => array(
                        '__NAMESPACE__' => 'Apotravinycz\Controller',
                        'controller' => 'Apotravinycz\Controller\Index',
                        'action' => 'pageregister',
                        'page' => '1'
                    )
                )
            ),
            //forgotpasswordmaster
            'forgotpasswordmaster' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/forgotpasswordmaster',
                    'constraints' => array(
                    ),
                    'defaults' => array(
                        '__NAMESPACE__' => 'Apotravinycz\Controller',
                        'controller' => 'Apotravinycz\Controller\Index',
                        'action' => 'forgotpasswordmaster',
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
