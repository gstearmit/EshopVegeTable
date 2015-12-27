<?php
return array(
     'controllers' => array(
         'invokables' => array(
             'Tags\Controller\Index' => 'Tags\Controller\IndexController',
         ),
     ),
	  // The following section is new and should be added to your file
     'router' => array(
         'routes' => array(
             'Tags' => array(
                 'type'    => 'segment',
                 'options' => array(
                     'route'    => '/tags[/:action][/:id][/status=:status][/:uenc][/page/:page][/order_by/:order_by][/:order][/search_by/:search_by]',
                     'constraints' => array(
                         'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                         'id'     => '[0-9]+',
                         'status'     => '[0-9]+',
                     	 'uenc' => '[a-zA-Z][a-zA-Z0-9_-]*',
                     		'page' => '[0-9]+',
                     		'order_by' => '[a-zA-Z][a-zA-Z0-9_-]*',
                     		'order' => 'ASC|DESC',
                     ),
                     'defaults' => array(
                         'controller' => 'Tags\Controller\index',
                         'action'     => 'index',
                     ),
                 ),
             ),
         	
         ),
     ),
     'view_manager' => array(
         'template_path_stack' => array(
            __DIR__ . '/../view',
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
 ?>