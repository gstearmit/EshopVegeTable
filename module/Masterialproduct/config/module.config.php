<?php

return array(
    'controllers' => array(
        'invokables' => array(
            'Masterialproduct\Controller\Index' => 'Masterialproduct\Controller\IndexController',
        )
    ),
    'router' => array(
        'routes' => array(
            'Masterialproduct' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/masteproduct[/:controller][/:action[/:id][/:status][/page-:page]][.html]',
                    'constraints' => array(
                        'controller' => '[a-zA-Z][a-zA-Z0-9-]*',
                        'action' => '[a-zA-Z][a-zA-Z0-9-]*',
                        'id' => '[1-9][0-9]*',
                        'status' => '[0-9]*',
                        'page' => '[1-9][0-9]*'
                    ),
                    'defaults' => array(
                        '__NAMESPACE__' => 'Masterialproduct\Controller',
                        'controller' => 'Masterialproduct\Controller\Index',
                        'action' => 'index',
                        'page' => '1'
                    )
                )
            ),
            'MasterialproductView' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/masteproductview[/:controller][/:action[/:id][/page-:page]][.html]',
                    'constraints' => array(
                        'controller' => '[a-zA-Z][a-zA-Z0-9-]*',
                        'action' => '[a-zA-Z][a-zA-Z0-9-]*',
                        'id' => '[1-9][0-9]*',
                        'page' => '[1-9][0-9]*'
                    ),
                    'defaults' => array(
                        '__NAMESPACE__' => 'Masterialproduct\Controller',
                        'controller' => 'Masterialproduct\Controller\Indexproduct',
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
