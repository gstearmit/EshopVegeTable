<?php

return array(
    'controllers' => array(
        'invokables' => array(
          'Magicproduct\Controller\Magicproduct' => 'Magicproduct\Controller\MagicproductController',
          'Magicproduct\Controller\Index' => 'Magicproduct\Controller\IndexController',
          'Magicproduct\Controller\Ajax' => 'Magicproduct\Controller\AjaxController',
        )
    ),
    'router' => array(
        'routes' => array(
            'Magicproduct' => array(
                'type' => 'Segment',
            		'options' => array(
            				'route' => '/magicproduct[/:controller][/:action[/:id][/:status][/page-:page]]',
            				'constraints' => array(
            						'controller' => '[a-zA-Z][a-zA-Z0-9-]*',
            						'action' => '[a-zA-Z][a-zA-Z0-9-]*',
            						'id' => '[1-9][0-9]*',
            						'status' => '[0-9]*',
            						'page' => '[1-9][0-9]*'
            				),
            				'defaults' => array(
            						'__NAMESPACE__' => 'Magicproduct\Controller',
            						'controller' => 'Magicproduct\Controller\Index',
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
