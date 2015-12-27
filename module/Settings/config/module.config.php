<?php

return array(
    'controllers' => array(
        'invokables' => array(
            'Settings\Controller\Settings' => 'Settings\Controller\SettingsController',
        )
    ),
    'router' => array(
        'routes' => array(
            'Contactp' => array(
                'type' => 'Segment',
            		'options' => array(
            				'route' => '/setting-site[/:action[/:id][/:status][/page-:page]][.html]',
            				'constraints' => array(
            						'action' => '[a-zA-Z][a-zA-Z0-9-]*',
            						'id' => '[1-9][0-9]*',
            						'status' => '[0-9]*',
            						'page' => '[1-9][0-9]*'
            				),
            				'defaults' => array(
            						'__NAMESPACE__' => 'Settings\Controller',
            						'controller' => 'Settings\Controller\Settings',
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
