<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
// 'controller' => 'Main\Controller\Index', // <-- change here
return array(
    'router' => array(
        'routes' => array(
            'home' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/',
                    'defaults' => array(
                        'controller' => 'Lazada\Controller\Index', 
                        'action'     => 'index',
                    ),
                ),
            ),
            // The following is a route to simplify getting started creating
            // new controllers and actions without needing to create a new
            // module. Simply drop new controllers in, and you can access them
            // using the path /application/:controller/:action
            'application' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/application',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller'    => 'Index',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'service_manager' => array(
        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',
        ),
        'aliases' => array(
            'translator' => 'MvcTranslator',
        ),
    ),
    'translator' => array(
        'locale' => 'en_US',
        'translation_file_patterns' => array(
            array(
                'type'     => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern'  => '%s.mo',
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(			 'Lazada\Controller\Index' => 'Lazada\Controller\IndexController',
            'Application\Controller\Index' => 'Application\Controller\IndexController'
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'layout/admintheme'       => __DIR__ . '/../view/layout/admin.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
			'error/amin'			  => __DIR__ . '/../view/error/admin.phtml',
			'layout/ctalogprinter'           => __DIR__ . '/../view/layout/ctalogprinter.phtml',
			'layout/paginatorcatalogue'           => __DIR__ . '/../view/layout/paginatorcatalogue.phtml',
			'layout/dragdrop'          => __DIR__ . '/../view/layout/dragdrop.phtml',
			'layout/albumdrag'         => __DIR__ . '/../view/layout/albumdrag.phtml',
			'layout/rohliklangdingpage'         => __DIR__ . '/../view/layout/rohliklangdingpage.phtml',
			'layout/apotravinytheme'         => __DIR__ . '/../view/layout/apotravinytheme.phtml',
			'layout/apotravinyadmin'         => __DIR__ . '/../view/layout/apotravinyadmin.phtml',
			'layout/lazadatheme'         => __DIR__ . '/../view/layout/lazadatheme.phtml',   
                        'layout/lazadacheckout'         => __DIR__ . '/../view/layout/lazadacheckout.phtml',
			'layout/apoadminlogin'         => __DIR__ . '/../view/layout/apoadminlogin.phtml',
                        'layout/addalbumadmin'         => __DIR__ . '/../view/layout/addalbumadmin.phtml',
     
			
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    // Placeholder for console routes
    'console' => array(
        'router' => array(
            'routes' => array(
            ),
        ),
    ),
);
