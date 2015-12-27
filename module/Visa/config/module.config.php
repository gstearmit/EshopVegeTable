<?php

return array(
    'controllers' => array(
        'invokables' => array(
            'Visa\Controller\Visa' => 'Visa\Controller\VisaController',
        )
    ),
    'router' => array(
        'routes' => array(
            'Visa' => array(
                'type' => 'Segment',
//                 'options' => array(
//                    // 'route' => '/news[/:controller][/:action[/:id][/page-:page]][.html]',
// 					 'route' => '/contact[/:action[/:id][/page-:page]]',
//                     'constraints' => array(
//                         //'controller' => '[a-zA-Z][a-zA-Z0-9-]*',
//                         'action' => '[a-zA-Z][a-zA-Z0-9-]*',
//                         'id' => '[1-9][0-9]*',
//                         'page' => '[1-9][0-9]*'
//                     ),
//                     'defaults' => array(
//                         '__NAMESPACE__' => 'Visa\Controller',
//                         'controller' => 'Visa\Controller\Visa',
//                         'action' => 'add-news',
//                         'page' => '1'
//                     )
//                 )
            		'options' => array(
            				'route' => '/visa[/:action[/:id][/:status][/page-:page]][.html]',
            				'constraints' => array(
            						'action' => '[a-zA-Z][a-zA-Z0-9-]*',
            						'id' => '[1-9][0-9]*',
            						'status' => '[0-9]*',
            						'page' => '[1-9][0-9]*'
            				),
            				'defaults' => array(
            						'__NAMESPACE__' => 'Visa\Controller',
            						'controller' => 'Visa\Controller\Visa',
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
