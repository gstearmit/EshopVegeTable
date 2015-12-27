<?php

return array(
    'controllers' => array(
        'invokables' => array(
            'Magicshop\Controller\Magicshop' => 'Magicshop\Controller\MagicshopController',
        	'Magicshop\Controller\Index' => 'Magicshop\Controller\IndexController',
        	'Magicshop\Controller\Ajax' => 'Magicshop\Controller\AjaxController',
        )
    ),
    'router' => array(
        'routes' => array(
            'Magicshop' => array(
                'type' => 'Segment',
            		'options' => array(
            				'route' => '/magicshop[/:controller][/:action[/:id][/:status][/page-:page]]',
            				'constraints' => array(
            						'controller' => '[a-zA-Z][a-zA-Z0-9-]*',
            						'action' => '[a-zA-Z][a-zA-Z0-9-]*',
            						'id' => '[1-9][0-9]*',
            						'status' => '[0-9]*',
            						'page' => '[1-9][0-9]*'
            				),
            				'defaults' => array(
            						'__NAMESPACE__' => 'Magicshop\Controller',
            						'controller' => 'Magicshop\Controller\Magicshop',
            						'action' => 'cart',
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
