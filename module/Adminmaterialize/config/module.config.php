<?php
return array(
     'controllers' => array(
         'invokables' => array(
             'Adminmaterialize\Controller\index' => 'Adminmaterialize\Controller\indexController',
         ),
     ),
	  // The following section is new and should be added to your file
     'router' => array(
         'routes' => array(
             'Adminmaterialize' => array(
                 'type'    => 'segment',
                 'options' => array(
                     'route'    => '/materialize[/][:action][/:id]',
                     'constraints' => array(
                         'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                         'id'     => '[0-9]+',
                     ),
                     'defaults' => array(
                            '__NAMESPACE__' => 'Adminmaterialize\Controller',
                         'controller' => 'Adminmaterialize\Controller\index',
                         'action'     => 'dashboard',
                     ),
                 ),
             ),
         		//logout
//          		'Adminmaterializelogout' => array(
//          				'type'    => 'segment',
//          				'options' => array(
//          						'route'    => '/logout',
//          						'constraints' => array(
//          						),
//          						'defaults' => array(
//          								'__NAMESPACE__' => 'Adminmaterialize\Controller',
//          								'controller' => 'Adminmaterialize\Controller\index',
//          								'action'     => 'logout',
//          						),
//          				),
//          		),
//          		//accountchangepass
//          		'Adminmaterializeaccountchangepass' => array(
//          				'type'    => 'segment',
//          				'options' => array(
//          						'route'    => '/accountchangepass[/:id]',
//          						'constraints' => array(
//          								'id'     => '[0-9]+',
//          						),
//          						'defaults' => array(
//          								'__NAMESPACE__' => 'Adminmaterialize\Controller',
//          								'controller' => 'Adminmaterialize\Controller\index',
//          								'action'     => 'accountchangepass',
//          						),
//          				),
//          		),
         		
//          		//loginnoform
//          		'Adminmaterializeloginnoform' => array(
//          				'type'    => 'segment',
//          				'options' => array(
//          						'route'    => '/login/',
//          						'constraints' => array(
//          						),
//          						'defaults' => array(
//          								'__NAMESPACE__' => 'Adminmaterialize\Controller',
//          								'controller' => 'Adminmaterialize\Controller\index',
//          								'action'     => 'loginnoform',
//          						),
//          				),
//          		),
//          		//MY DASHBOARD
//          		'MYDASHBOARD' => array(
//          				'type'    => 'segment',
//          				'options' => array(
//          						'route'    => '/mydashboard',
//          						'constraints' => array(
//          						),
//          						'defaults' => array(
//          								'__NAMESPACE__' => 'Adminmaterialize\Controller',
//          								'controller' => 'Adminmaterialize\Controller\index',
//          								'action'     => 'mydashboard',
//          						),
//          				),
//          		),
//          		//account/edit
//          		'Accountedit' => array(
//          				'type'    => 'segment',
//          				'options' => array(
//          						'route'    => '/accountedit',
//          						'constraints' => array(
//          						),
//          						'defaults' => array(
//          								'__NAMESPACE__' => 'Adminmaterialize\Controller',
//          								'controller' => 'Adminmaterialize\Controller\index',
//          								'action'     => 'accountedit',
//          						),
//          				),
//          		),
         		
//          		//loginpost
//          		'Adminmaterializeloginpost' => array(
//          				'type'    => 'segment',
//          				'options' => array(
//          						'route'    => '/loginpost',
//          						'constraints' => array(
//          						),
//          						'defaults' => array(
//          								'__NAMESPACE__' => 'Adminmaterialize\Controller',
//          								'controller' => 'Adminmaterialize\Controller\index',
//          								'action'     => 'loginpost',
//          						),
//          				),
//          		),
         		
//          		//address/new
//          		'Addressnew' => array(
//          				'type'    => 'segment',
//          				'options' => array(
//          						'route'    => '/addressnew',
//          						'constraints' => array(
//          						),
//          						'defaults' => array(
//          								'__NAMESPACE__' => 'Adminmaterialize\Controller',
//          								'controller' => 'Adminmaterialize\Controller\index',
//          								'action'     => 'addressnew',
//          						),
//          				),
//          		),
         		
//          		'Addressedit' => array(
//          				'type'    => 'segment',
//          				'options' => array(
//          						'route'    => '/addressedit',
//          						'constraints' => array(
//          						),
//          						'defaults' => array(
//          								'__NAMESPACE__' => 'Adminmaterialize\Controller',
//          								'controller' => 'Adminmaterialize\Controller\index',
//          								'action'     => 'addressedit',
//          						),
//          				),
//          		),
         		
//          		//

//          		'Addressmanage' => array(
//          				'type'    => 'segment',
//          				'options' => array(
//          						'route'    => '/addressmanage',
//          						'constraints' => array(
//          						),
//          						'defaults' => array(
//          								'__NAMESPACE__' => 'Adminmaterialize\Controller',
//          								'controller' => 'Adminmaterialize\Controller\index',
//          								'action'     => 'addressmanage',
//          						),
//          				),
//          		),
         		
//          		//createaccount
//          		'Adminmaterializecreateaccount' => array(
//          				'type'    => 'segment',
//          				'options' => array(
//          						'route'    => '/createaccount',
//          						'constraints' => array(
//          						),
//          						'defaults' => array(
//          								'__NAMESPACE__' => 'Adminmaterialize\Controller',
//          								'controller' => 'Adminmaterialize\Controller\index',
//          								'action'     => 'createaccount',
//          						),
//          				),
//          		),
         		
//          		//forgotpassword
//          		'Adminmaterializeforgotpassword' => array(
//          				'type'    => 'segment',
//          				'options' => array(
//          						'route'    => '/forgotpassword',
//          						'constraints' => array(
//          						),
//          						'defaults' => array(
//          								'__NAMESPACE__' => 'Adminmaterialize\Controller',
//          								'controller' => 'Adminmaterialize\Controller\index',
//          								'action'     => 'forgotpassword',
//          						),
//          				),
//          		),
         		
//          		'AdsmanageKind' => array(
//          				'type'    => 'segment',
//          				'options' => array(
//          						'route'    => '/adminadsmanage[/:kind]',
//          						'constraints' => array(
//          								'kind' => '[a-zA-Z][a-zA-Z0-9_-]*',
         								
//          						),
//          						'defaults' => array(
//          								'__NAMESPACE__' => 'Adminmaterialize\Controller',
//          								'controller' => 'Adminmaterialize\Controller\index',
//          								'action'     => 'adsmanage',
//          						),
//          				),
//          		),
         		
         		
         		
         ),
     ),
     'view_manager' => array(
             'template_map' => array(
           //'layout/layoutadmin'        => __DIR__ . '/../view/layout/layout.phtml',
               ),
         'template_path_stack' => array(
             'adminmaterialize' => __DIR__ . '/../view',
             //'layout'=> __DIR__ . '/../view',
         ),
     ),
 );

 ?>