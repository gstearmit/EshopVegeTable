<?php
return array(
     'controllers' => array(
         'invokables' => array(
             'Admin\Controller\index' => 'Admin\Controller\indexController',
         ),
     ),
	  // The following section is new and should be added to your file
     'router' => array(
         'routes' => array(
             'admin' => array(
                 'type'    => 'segment',
                 'options' => array(
                     'route'    => '/admin[/][:action][/:id]',
                     'constraints' => array(
                         'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                         'id'     => '[0-9]+',
                     ),
                     'defaults' => array(
                            '__NAMESPACE__' => 'Admin\Controller',
                         'controller' => 'Admin\Controller\index',
                         'action'     => 'index',
                     ),
                 ),
             ),
         		//logout
         		'Adminlogout' => array(
         				'type'    => 'segment',
         				'options' => array(
         						'route'    => '/logout',
         						'constraints' => array(
         						),
         						'defaults' => array(
         								'__NAMESPACE__' => 'Admin\Controller',
         								'controller' => 'Admin\Controller\index',
         								'action'     => 'logout',
         						),
         				),
         		),
         		//accountchangepass
         		'Adminaccountchangepass' => array(
         				'type'    => 'segment',
         				'options' => array(
         						'route'    => '/accountchangepass[/:id]',
         						'constraints' => array(
         								'id'     => '[0-9]+',
         						),
         						'defaults' => array(
         								'__NAMESPACE__' => 'Admin\Controller',
         								'controller' => 'Admin\Controller\index',
         								'action'     => 'accountchangepass',
         						),
         				),
         		),
         		
         		//loginnoform
         		'Adminloginnoform' => array(
         				'type'    => 'segment',
         				'options' => array(
         						'route'    => '/login/',
         						'constraints' => array(
         						),
         						'defaults' => array(
         								'__NAMESPACE__' => 'Admin\Controller',
         								'controller' => 'Admin\Controller\index',
         								'action'     => 'loginnoform',
         						),
         				),
         		),
         		//MY DASHBOARD
         		'MYDASHBOARD' => array(
         				'type'    => 'segment',
         				'options' => array(
         						'route'    => '/mydashboard',
         						'constraints' => array(
         						),
         						'defaults' => array(
         								'__NAMESPACE__' => 'Admin\Controller',
         								'controller' => 'Admin\Controller\index',
         								'action'     => 'mydashboard',
         						),
         				),
         		),
         		//account/edit
         		'Accountedit' => array(
         				'type'    => 'segment',
         				'options' => array(
         						'route'    => '/accountedit',
         						'constraints' => array(
         						),
         						'defaults' => array(
         								'__NAMESPACE__' => 'Admin\Controller',
         								'controller' => 'Admin\Controller\index',
         								'action'     => 'accountedit',
         						),
         				),
         		),
         		
         		//loginpost
         		'Adminloginpost' => array(
         				'type'    => 'segment',
         				'options' => array(
         						'route'    => '/loginpost',
         						'constraints' => array(
         						),
         						'defaults' => array(
         								'__NAMESPACE__' => 'Admin\Controller',
         								'controller' => 'Admin\Controller\index',
         								'action'     => 'loginpost',
         						),
         				),
         		),
         		
         		//address/new
         		'Addressnew' => array(
         				'type'    => 'segment',
         				'options' => array(
         						'route'    => '/addressnew',
         						'constraints' => array(
         						),
         						'defaults' => array(
         								'__NAMESPACE__' => 'Admin\Controller',
         								'controller' => 'Admin\Controller\index',
         								'action'     => 'addressnew',
         						),
         				),
         		),
         		
         		'Addressedit' => array(
         				'type'    => 'segment',
         				'options' => array(
         						'route'    => '/addressedit',
         						'constraints' => array(
         						),
         						'defaults' => array(
         								'__NAMESPACE__' => 'Admin\Controller',
         								'controller' => 'Admin\Controller\index',
         								'action'     => 'addressedit',
         						),
         				),
         		),
         		
         		//

         		'Addressmanage' => array(
         				'type'    => 'segment',
         				'options' => array(
         						'route'    => '/addressmanage',
         						'constraints' => array(
         						),
         						'defaults' => array(
         								'__NAMESPACE__' => 'Admin\Controller',
         								'controller' => 'Admin\Controller\index',
         								'action'     => 'addressmanage',
         						),
         				),
         		),
         		
         		//createaccount
         		'Admincreateaccount' => array(
         				'type'    => 'segment',
         				'options' => array(
         						'route'    => '/createaccount',
         						'constraints' => array(
         						),
         						'defaults' => array(
         								'__NAMESPACE__' => 'Admin\Controller',
         								'controller' => 'Admin\Controller\index',
         								'action'     => 'createaccount',
         						),
         				),
         		),
         		
         		//forgotpassword
         		'Adminforgotpassword' => array(
         				'type'    => 'segment',
         				'options' => array(
         						'route'    => '/forgotpassword',
         						'constraints' => array(
         						),
         						'defaults' => array(
         								'__NAMESPACE__' => 'Admin\Controller',
         								'controller' => 'Admin\Controller\index',
         								'action'     => 'forgotpassword',
         						),
         				),
         		),
         		
         		'AdsmanageKind' => array(
         				'type'    => 'segment',
         				'options' => array(
         						'route'    => '/adminadsmanage[/:kind]',
         						'constraints' => array(
         								'kind' => '[a-zA-Z][a-zA-Z0-9_-]*',
         								
         						),
         						'defaults' => array(
         								'__NAMESPACE__' => 'Admin\Controller',
         								'controller' => 'Admin\Controller\index',
         								'action'     => 'adsmanage',
         						),
         				),
         		),
         ),
     ),
     'view_manager' => array(
             'template_map' => array(
           // 'layout/layoutadmin'        => __DIR__ . '/../view/layout/layout.phtml',
               ),
         'template_path_stack' => array(
             'admin' => __DIR__ . '/../view',
             //'layout'=> __DIR__ . '/../view',
         ),
     ),
 );

 ?>