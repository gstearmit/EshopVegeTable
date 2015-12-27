<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'RestAlbum\Controller\RestAlbum' => 'RestAlbum\Controller\RestAlbumController',
        ),
    ),

    // The following section is new` and should be added to your file
    'router' => array(
        'routes' => array(
            'vender-album-rest' => array(
                'type'    => 'Segment',
                'options' => array(
                    'route'    => '/v1-rest-album[/:id]',
                    'constraints' => array(
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'RestAlbum\Controller\RestAlbum',
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
    				'rest-album' => __DIR__ . '/../view',
    		),
    		'template_map' => array(
    				//'paginator-album' => __DIR__ . '/../view/layout/slidePaginator.phtml',
    		),
    ),
);