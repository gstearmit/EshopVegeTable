<?php

return array(
    'controllers' => array(
        'invokables' => array(
          'Magiccategory\Controller\Index' => 'Magiccategory\Controller\IndexController',
        	
        )
    ),
    'router' => array(
        'routes' => array(
            'Magiccategory' => array(
                'type' => 'Segment',
            		'options' => array(
            				'route' => '/magiccategory[/:controller][/:action[/:id][/:status][/page-:page]]',
            				'constraints' => array(
            						'controller' => '[a-zA-Z][a-zA-Z0-9-]*',
            						'action' => '[a-zA-Z][a-zA-Z0-9-]*',
            						'id' => '[1-9][0-9]*',
            						'status' => '[0-9]*',
            						'page' => '[1-9][0-9]*'
            				),
            				'defaults' => array(
            						'__NAMESPACE__' => 'Magiccategory\Controller',
            						'controller' => 'Magiccategory\Controller\Index',
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
