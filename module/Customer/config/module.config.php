<?php

return array(
    'controllers' => array(
        'invokables' => array(
            'Customer\Controller\Index' => 'Customer\Controller\IndexController',
            'Customer\Controller\Customerlazada' => 'Customer\Controller\CustomerlazadaController',
            
        ),
    ),
    'router' => array(
        'routes' => array(
             'Customer' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/customer[/:action[/:id][/:status][/page=:page]][.html]',
                    'constraints' => array(                        
                        'action' => '[a-zA-Z][a-zA-Z0-9-]*',
                        'id' => '[1-9][0-9]*',
                        'status' => '[0-9]*',
                        'page' => '[1-9][0-9]*'
                    ),
                    'defaults' => array(
                        '__NAMESPACE__' => 'Customer\Controller',
                        'controller' => 'Customer\Controller\Index',
                        'action' => 'index',
                        
                    )
                )
            ),
             'Customerlazada' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/customer/lazada[/:action[/:id][/:status][/page=:page]][.html]',
                    'constraints' => array(                        
                        'action' => '[a-zA-Z][a-zA-Z0-9-]*',
                        'id' => '[1-9][0-9]*',
                        'status' => '[0-9]*',
                        'page' => '[1-9][0-9]*'
                    ),
                    'defaults' => array(
                        '__NAMESPACE__' => 'Customer\Controller',
                        'controller' => 'Customer\Controller\Customerlazada',
                        'action' => 'index',
                        
                    )
                )
            ),
            
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        'template_map' => array(
            'error/404' => __DIR__ . '/../view/error/404.phtml',
            'error/index' => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    'view_helpers' => array(
        'invokables' => array(
            'action' => 'Eva\View\Helper\Action',
        ),
    ),
);
