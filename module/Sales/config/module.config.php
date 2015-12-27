<?php

return array(
    'controllers' => array(
        'invokables' => array(
          'Sales\Controller\Index' => 'Sales\Controller\IndexController',
        	
        )
    ),
    'router' => array(
        'routes' => array(
            'Sales' => array(
                'type' => 'Segment',
            		'options' => array(
            				'route' => '/sales[/:action[/:id][/:status][/page-:page]]',
            				'constraints' => array(
            						'action' => '[a-zA-Z][a-zA-Z0-9-]*',
            						'id' => '[1-9][0-9]*',
            						'status' => '[0-9]*',
            						'page' => '[1-9][0-9]*'
            				),
            				'defaults' => array(
            						'__NAMESPACE__' => 'Sales\Controller',
            						'controller' => 'Sales\Controller\Index',
            						'action' => 'index',
            						'page' => '1'
            				)
            		)
            ),
        		
        		
        		//
        		'Downloadableproducts' => array(
        				'type' => 'Segment',
        				'options' => array(
        						'route' => '/downloadableproducts[/:action[/:id][/:status][/page-:page]]',
        						'constraints' => array(
        								'action' => '[a-zA-Z][a-zA-Z0-9-]*',
        								'id' => '[1-9][0-9]*',
        								'status' => '[0-9]*',
        								'page' => '[1-9][0-9]*'
        						),
        						'defaults' => array(
        								'__NAMESPACE__' => 'Sales\Controller',
        								'controller' => 'Sales\Controller\Index',
        								'action' => 'downloadableproducts',
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
