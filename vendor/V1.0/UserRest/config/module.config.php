<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'UserRest\Controller\UserRest' => 'UserRest\Controller\UserRestController',
        ),
    ),

    // The following section is new` and should be added to your file
    'router' => array(
        'routes' => array(
            'User-Rest-Empoly' => array(
                'type'    => 'Segment',
                'options' => array(
                    'route'    => '/v1-users[/:id]',
                    'constraints' => array(
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'UserRest\Controller\UserRest',
                    ),
                ),
            ),
        ),
    ),
    'view_manager' => array(
        'strategies' => array(
            'ViewJsonStrategy',
        ),
    	'template_path_stack' => array(
    				'user-rest' => __DIR__ . '/../view',
    		),
    		'template_map' => array(
    				//'paginator-album' => __DIR__ . '/../view/layout/slidePaginator.phtml',
    		),
    ),
);