<?php

return array(
    'controllers' => array(
        'invokables' => array(
           'Lazada\Controller\Index' => 'Lazada\Controller\IndexController',
        	
        )
    ),
		
		
		
		
    'router' => array(
        'routes' => array(
        	
            'Lazada' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/lazada[/:controller][/:action[/:id][/:status][/page-:page]][.html]',
                    'constraints' => array(
                        'controller' => '[a-zA-Z][a-zA-Z0-9-]*',
                        'action' => '[a-zA-Z][a-zA-Z0-9-]*',
                        'id' => '[1-9][0-9]*',
                    	'status' => '[0-9]*',
                        'page' => '[1-9][0-9]*'
                    ),
                    'defaults' => array(
                        '__NAMESPACE__' => 'Lazada\Controller',
                        'controller' => 'Lazada\Controller\Lazada',
                        'action' => 'index',
                        'page' => '1'
                    )
                )
            ),
        		
        		'LazadaView' => array(
        				'type' => 'Segment',
        				'options' => array(
        						'route' => '/productview[/:controller][/:action[/:id][/page-:page]][.html]',
        						'constraints' => array(
        								'controller' => '[a-zA-Z][a-zA-Z0-9-]*',
        								'action' => '[a-zA-Z][a-zA-Z0-9-]*',
        								'id' => '[1-9][0-9]*',
        								'page' => '[1-9][0-9]*'
        						),
        						'defaults' => array(
        								'__NAMESPACE__' => 'Lazada\Controller',
        								'controller' => 'Lazada\Controller\Lazada',
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
