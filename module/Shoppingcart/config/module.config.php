<?php
return array(
     'controllers' => array(
         'invokables' => array(
             'Shoppingcart\Controller\Index' => 'Shoppingcart\Controller\IndexController',
             'Shoppingcart\Controller\Lazadashopping' => 'Shoppingcart\Controller\LazadashoppingController',
         ),
     ),
	  // The following section is new and should be added to your file
     'router' => array(
         'routes' => array(
             'Shoppingcart' => array(
                 'type'    => 'segment',
                 'options' => array(
                     'route'    => '/shoppingcart[/:action][/:id][/status=:status][/:uenc][/page/:page][/order_by/:order_by][/:order][/search_by/:search_by]',
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
                         'controller' => 'Shoppingcart\Controller\index',
                         'action'     => 'index',
                     ),
                 ),
             ),
              'LazadaShoppingcart' => array(
                 'type'    => 'segment',
                 'options' => array(
                     'route'    => '/shoppingcart/lazada[/:action][/:id][/status=:status][/:uenc][/page/:page][/order_by/:order_by][/:order][/search_by/:search_by]',
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
                         'controller' => 'Shoppingcart\Controller\Lazadashopping',
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