<?php

return array(
    'controllers' => array(
        'invokables' => array(
            'Crowler\Controller\Crowler' => 'Crowler\Controller\CrowlerController',
        	'Crowler\Controller\Index' => 'Crowler\Controller\IndexController',
        	'Crowler\Controller\Name' => 'Crowler\Controller\NameController',
        	//'Crowler\Controller\Async' => 'Crowler\Controller\Async',
        )
    ),
		
		
		
		
    'router' => array(
        'routes' => array(
        		
            'Crowler' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/crowler[/:controller][/:action[/:id][/:status][/page-:page]][.html]',
                    'constraints' => array(
                        'controller' => '[a-zA-Z][a-zA-Z0-9-]*',
                        'action' => '[a-zA-Z][a-zA-Z0-9-]*',
                        'id' => '[1-9][0-9]*',
                    	'status' => '[0-9]*',
                        'page' => '[1-9][0-9]*'
                    ),
                    'defaults' => array(
                        '__NAMESPACE__' => 'Crowler\Controller',
                        'controller' => 'Crowler\Controller\Index',
                        'action' => 'index',
                        'page' => '1'
                    )
                )
            ),
        		
        		'CrowlerView' => array(
        				'type' => 'Segment',
        				'options' => array(
        						'route' => '/crowlerview[/:controller][/:action[/:id][/page-:page]][.html]',
        						'constraints' => array(
        								'controller' => '[a-zA-Z][a-zA-Z0-9-]*',
        								'action' => '[a-zA-Z][a-zA-Z0-9-]*',
        								'id' => '[1-9][0-9]*',
        								'page' => '[1-9][0-9]*'
        						),
        						'defaults' => array(
        								'__NAMESPACE__' => 'Crowler\Controller',
        								'controller' => 'Crowler\Controller\Crowler',
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
         'invokables'=> array(
            'AutoEscapeHelper' => 'Crowler\View\Helper\HelloWorldHelper',
         	'test_helper' => 'Crowler\View\Helper\Testhelper'
        )
    ),
);
