<?php
return array(
     'controllers' => array(
         'invokables' => array(
             'Slideshow\Controller\Index' => 'Slideshow\Controller\IndexController',
         ),
     ),
	  // The following section is new and should be added to your file
     'router' => array(
         'routes' => array(             
         		'Slideshow' => array(
         				'type' => 'Segment',
         				'options' => array(
         						'route' => '/slideshow[/:action[/:id][/:status][/page-:page]][.html]',
         						'constraints' => array(
         								'controller' => '[a-zA-Z][a-zA-Z0-9-]*',
         								'action' => '[a-zA-Z][a-zA-Z0-9-]*',
         								'id' => '[1-9][0-9]*',
         								'status' => '[0-9]*',
         								'page' => '[1-9][0-9]*'
         						),
         						'defaults' => array(
         								'__NAMESPACE__' => 'Slideshow\Controller',
         								'controller' => 'Slideshow\Controller\Index',
         								'action' => 'index',
         								'page' => '1'
         						)
         				)
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