<?php
return array(
     'controllers' => array(
         'invokables' => array(
             'Channels\Controller\Index' => 'Channels\Controller\IndexController',
			 //'Channel\Controller\Index' => 'Channel\Controller\IndexController',
         ),
     ),
	  // The following section is new and should be added to your file
     'router' => array(
         'routes' => array(
             'Channels' => array(
                 'type'    => 'segment',
                 'options' => array(
                     'route'    => '/channels[][/:user][/:type]',
                     'constraints' => array(
                         'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                         'user'     => '[a-zA-Z][a-zA-Z0-9_-]*',
						 'type'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                     ),
                     'defaults' => array(
                         'controller' => 'Channels\Controller\index',
                         'action'     => 'index',
                     ),
                 ),

			
             ),
			 	
         ),
     ),
     'view_manager' => array(
         'template_path_stack' => array(
             'Channels' => __DIR__ . '/../view',
         ),
     ),
 );
 ?>