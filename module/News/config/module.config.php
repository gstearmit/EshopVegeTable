<?php

return array(
    'controllers' => array(
        'invokables' => array(
            'News\Controller\News' => 'News\Controller\NewsController',
        )
    ),
    'router' => array(
        'routes' => array(
            'News' => array(
                'type' => 'Segment',
                'options' => array(
                   // 'route' => '/news[/:controller][/:action[/:id][/page-:page]][.html]',
					 'route' => '/news[/:action[/:id][/page-:page]]',
                    'constraints' => array(
                        //'controller' => '[a-zA-Z][a-zA-Z0-9-]*',
                        'action' => '[a-zA-Z][a-zA-Z0-9-]*',
                        'id' => '[1-9][0-9]*',
                        'page' => '[1-9][0-9]*'
                    ),
                    'defaults' => array(
                        '__NAMESPACE__' => 'News\Controller',
                        'controller' => 'News\Controller\News',
                        'action' => 'add-news',
                        'page' => '1'
                    )
                )
            ),
        		
        		'NewsDetail' => array(
        				'type' => 'Segment',
        				'options' => array('route' => '/newsview[/:code]',
        						'constraints' => array(
        								'code' => '[a-zA-Z][a-zA-Z0-9-]*',
        						),
        						'defaults' => array(
        								'__NAMESPACE__' => 'News\Controller',
        								'controller' => 'News\Controller\News',
        								'action' => 'news-view',
        								
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
