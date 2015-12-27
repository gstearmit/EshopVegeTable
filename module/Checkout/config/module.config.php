<?php

return array(
    'controllers' => array(
        'invokables' => array(
          'Checkout\Controller\Checkout' => 'Checkout\Controller\CheckoutController',
          'Checkout\Controller\Index' => 'Checkout\Controller\IndexController',
          'Checkout\Controller\Cart' => 'Checkout\Controller\CartController',
          'Checkout\Controller\Ajax' => 'Checkout\Controller\AjaxController',
        )
    ),
    'router' => array(
        'routes' => array(
            'Checkout' => array(
                'type' => 'Segment',
            		'options' => array(
            				'route' => '/checkout[/:controller][/:action[/:id][/:status][/page-:page][/:uenc]]',
            				'constraints' => array(
            						'controller' => '[a-zA-Z][a-zA-Z0-9-]*',
            						'action' => '[a-zA-Z][a-zA-Z0-9-]*',
            						'id' => '[1-9][0-9]*',
            						'status' => '[0-9]*',
            						'page' => '[1-9][0-9]*'
            				),
            				'defaults' => array(
            						'__NAMESPACE__' => 'Checkout\Controller',
            						'controller' => 'Checkout\Controller\Index',
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
