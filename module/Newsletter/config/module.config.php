<?php

return array(
    'controllers' => array(
        'invokables' => array(
            'Newsletter\Controller\Newsletter' => 'Newsletter\Controller\NewsletterController',
        )
    ),
    'router' => array(
        'routes' => array(
            'Newsletter' => array(
                'type' => 'Segment',
            		'options' => array(
            				'route' => '/newsletter[/:action[/:id][/:status][/page-:page]][.html]',
            				'constraints' => array(
            						'action' => '[a-zA-Z][a-zA-Z0-9-]*',
            						'id' => '[1-9][0-9]*',
            						'status' => '[0-9]*',
            						'page' => '[1-9][0-9]*'
            				),
            				'defaults' => array(
            						'__NAMESPACE__' => 'Newsletter\Controller',
            						'controller' => 'Newsletter\Controller\Newsletter',
            						'action' => 'add-news',
            						'page' => '1'
            				)
            		)
            ),

        		//newslettermanage
        		'Newslettermanage' => array(
        				'type' => 'Segment',
        				'options' => array(
        						'route' => '/newslettermanage[/:action[/:id][/:status][/page-:page]]',
        						'constraints' => array(
        								'action' => '[a-zA-Z][a-zA-Z0-9-]*',
        								'id' => '[1-9][0-9]*',
        								'status' => '[0-9]*',
        								'page' => '[1-9][0-9]*'
        						),
        						'defaults' => array(
        								'__NAMESPACE__' => 'Newsletter\Controller',
	            						'controller' => 'Newsletter\Controller\Newsletter',
	            						'action' => 'newslettermanage',
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
