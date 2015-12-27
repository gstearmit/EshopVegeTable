<?php
return array(
     'controllers' => array(
         'invokables' => array(
             'Search\Controller\Index' => 'Search\Controller\IndexController',
         ),
     ),
	  // The following section is new and should be added to your file
     'router' => array(
         'routes' => array(
             'Search' => array(
                 'type'    => 'segment',
                 'options' => array(
                     'route'    => '/search[/][:action][/page/:page][/order/:order_by][/:order][?keywork=:keywork]',
                     'constraints' => array(
                         'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                         'id'     => '[0-9]+',
                         'page' => '[0-9]+',
                        'order_by' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'order' => 'ASC|DESC',
                        'keywork'=>'[a-zA-Z][a-zA-Z0-9_-]*',
                     ),
                     'defaults' => array(
                         'controller' => 'Search\Controller\index',
                         'action'     => 'index',
                     ),
                 ),
             ),
         ),
     ),
     'view_manager' => array(
         'template_path_stack' => array(
             'Search' => __DIR__ . '/../view',
         ),
     ),
 );
 ?>