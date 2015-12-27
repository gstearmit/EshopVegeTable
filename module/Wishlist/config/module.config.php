<?php

return array(
    'controllers' => array(
        'invokables' => array(
            'Wishlist\Controller\Wishlist' => 'Wishlist\Controller\WishlistController',
        	'Wishlist\Controller\Index' => 'Wishlist\Controller\IndexController',
        	'Wishlist\Controller\Ajax' => 'Wishlist\Controller\AjaxController',
        )
    ),
    'router' => array(
        'routes' => array(
            'Wishlist' => array(
                'type' => 'Segment',
            		'options' => array(
            				'route' => '/wishlist[/:controller][/:action[/:id][/:status][/page-:page]]',
            				'constraints' => array(
            						'controller' => '[a-zA-Z][a-zA-Z0-9-]*',
            						'action' => '[a-zA-Z][a-zA-Z0-9-]*',
            						'id' => '[1-9][0-9]*',
            						'status' => '[0-9]*',
            						'page' => '[1-9][0-9]*'
            				),
            				'defaults' => array(
            						'__NAMESPACE__' => 'Wishlist\Controller',
            						'controller' => 'Wishlist\Controller\Wishlist',
            						'action' => 'index',
            						'page' => '1'
            				)
            		)
            ),

        		//
        		'WishlistAddProduct' => array(
        				'type' => 'Segment',
        				'options' => array(
        					            	//  /wishlistaddproduct/index/add/30/z9LuJOHYJ67WDth
        						'route' => '/wishlistaddproduct[/:controller][/:action[/:product][/:form_key][/page-:page]]',
        						'constraints' => array(
        								'controller' => '[a-zA-Z][a-zA-Z0-9-]*',
        								'action' => '[a-zA-Z][a-zA-Z0-9-]*',
        								'product' => '[1-9][0-9]*',
        								'form_key' => '[a-zA-Z][a-zA-Z0-9-]*',
        								'page' => '[1-9][0-9]*'
        						),
        						'defaults' => array(
        								'__NAMESPACE__' => 'Wishlist\Controller',
        								'controller' => 'Wishlist\Controller\Index',
        								'action' => 'add',
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
