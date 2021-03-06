<?php

return array(
    'controllers' => array(
        'invokables' => array(
            'Persons\Controller\Persons' => 'Persons\Controller\PersonsController',
        )
    ),
    'router' => array(
        'routes' => array(
            'Persons' => array(
                'type' => 'Segment',
            		'options' => array(
            				'route' => '/persons[/:action[/:id][/:status][/page-:page]][.html]',
            				'constraints' => array(
            						'action' => '[a-zA-Z][a-zA-Z0-9-]*',
            						'id' => '[1-9][0-9]*',
            						'status' => '[0-9]*',
            						'page' => '[1-9][0-9]*'
            				),
            				'defaults' => array(
            						'__NAMESPACE__' => 'Persons\Controller',
            						'controller' => 'Persons\Controller\Persons',
            						'action' => 'list',
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
