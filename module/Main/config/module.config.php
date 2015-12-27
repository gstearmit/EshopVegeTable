<?php

return array(
    'controllers' => array(
        'invokables' => array(
            'Main\Controller\Index' => 'Main\Controller\IndexController',
            'Main\Controller\Eshopbags' => 'Main\Controller\EshopbagsController',
        ),
    ),
    // The following section is new and should be added to your file
    'router' => array(
        'routes' => array(
            'main' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/main[/][:action][/:id][/page/:page][/order/:order_by][/:order]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]+',
                        'page' => '[0-9]+',
                        'order_by' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'order' => 'ASC|DESC',
                    ),
                    'defaults' => array(
                        '__NAMESPACE__' => 'Main\Controller',
                        'controller' => 'Main\Controller\Index',
                        'action' => 'index',
                    ),
                ),
            ),
            'Eshopbags' => array(
                'type' => 'segment',
                'options' => array(
                    //'route'    => '[/eshopbags][/:slug]',
                    'route' => '/eshopbags[/:slug]',
                    'constraints' => array(
                        'slug' => '[a-zA-Z0-9][a-zA-Z0-9_-]*',
                    ),
                    'defaults' => array(
                        '__NAMESPACE__' => 'Main\Controller',
                        'controller' => 'Main\Controller\Eshopbags',
                        'action' => 'index',
                    ),
                ),
            ),
            'EshopbagsClick' => array(
                'type' => 'segment',
                'options' => array(
                    //'route'    => '[/eshopbags][/:slug].:format',
                    'route' => '/eshopbags[/:slug].:format',
                    'constraints' => array(
                        'slug' => '[a-zA-Z0-9][a-zA-Z0-9_-]*',
                        'format' => '(xml|json|html|adflinkeu|php|asp|java|ads)',
                    ),
                    'defaults' => array(
                        '__NAMESPACE__' => 'Main\Controller',
                        'controller' => 'Main\Controller\Eshopbags',
                        'action' => 'index',
                    ),
                ),
            ),
            'Mainnewproduct' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/newproduct[/:getservicer]',
                    'constraints' => array(
                        'getservicer' => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ),
                    'defaults' => array(
                        '__NAMESPACE__' => 'Main\Controller',
                        'controller' => 'Main\Controller\Index',
                        'action' => 'newproduct',
                    ),
                ),
            ),
            //
            'Mainbestsellers' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/bestsellers[/:urlget]',
                    'constraints' => array(
                        'urlget' => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ),
                    'defaults' => array(
                        '__NAMESPACE__' => 'Main\Controller',
                        'controller' => 'Main\Controller\Index',
                        'action' => 'bestselleraction',
                    ),
                ),
            ),
            //saleproduct	
            'Mainsaleproduct' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/saleproduct[/:urlget]',
                    'constraints' => array(
                        'urlget' => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ),
                    'defaults' => array(
                        '__NAMESPACE__' => 'Main\Controller',
                        'controller' => 'Main\Controller\Index',
                        'action' => 'saleproduct',
                    ),
                ),
            ),
            //Blog.html
            'Mainblog' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/blog.html',
                    'constraints' => array(
                        'urlget' => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ),
                    'defaults' => array(
                        '__NAMESPACE__' => 'Main\Controller',
                        'controller' => 'Main\Controller\Index',
                        'action' => 'blog',
                    ),
                ),
            ),
            //Blog.html
            'Mainblogdetail' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/blogdetail[/:paramater].:format',
                    'constraints' => array(
                        'paramater' => '[a-zA-Z0-9][a-zA-Z0-9_-]*',
                        'format' => '(xml|json|html|adflinkeu|php|asp|java|ads)',
                    ),
                    'defaults' => array(
                        '__NAMESPACE__' => 'Main\Controller',
                        'controller' => 'Main\Controller\Index',
                        'action' => 'blogdetail',
                    ),
                ),
            ),
            //testimonial
            'Maintestimonial' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/testimonial[/:limit]',
                    'constraints' => array(
                        'limit' => '[0-9]+',
                    ),
                    'defaults' => array(
                        '__NAMESPACE__' => 'Main\Controller',
                        'controller' => 'Main\Controller\Index',
                        'action' => 'testimonial',
                    ),
                ),
            ),
            //testimonial
            'Maincreattestimonial' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/creattestimonial',
                    'constraints' => array(),
                    'defaults' => array(
                        '__NAMESPACE__' => 'Main\Controller',
                        'controller' => 'Main\Controller\Index',
                        'action' => 'creattestimonial',
                    ),
                ),
            ),
            //Accessories
            'MainAccessories' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/accessories[/:urlget]',
                    'constraints' => array(
                        'urlget' => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ),
                    'defaults' => array(
                        '__NAMESPACE__' => 'Main\Controller',
                        'controller' => 'Main\Controller\Index',
                        'action' => 'accessories',
                    ),
                ),
            ),
            //shirts.html	
            'Mainshirts' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/shirts.html',
                    'constraints' => array(
                        'urlget' => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ),
                    'defaults' => array(
                        '__NAMESPACE__' => 'Main\Controller',
                        'controller' => 'Main\Controller\Index',
                        'action' => 'shirts',
                    ),
                ),
            ),
            //tops.html
            'Maintops' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/tops.html',
                    'constraints' => array(
                        'urlget' => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ),
                    'defaults' => array(
                        '__NAMESPACE__' => 'Main\Controller',
                        'controller' => 'Main\Controller\Index',
                        'action' => 'tops',
                    ),
                ),
            ),
            //outerwear.html
            'Mainouterwear' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/outerwear.html',
                    'constraints' => array(
                        'urlget' => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ),
                    'defaults' => array(
                        '__NAMESPACE__' => 'Main\Controller',
                        'controller' => 'Main\Controller\Index',
                        'action' => 'outerwear',
                    ),
                ),
            ),
            //contact-us
            'Contactus' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/contact-us[/:id][/page/:page][/order/:order_by][/:order]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]+',
                        'page' => '[0-9]+',
                        'order_by' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'order' => 'ASC|DESC',
                    ),
                    'defaults' => array(
                        '__NAMESPACE__' => 'Main\Controller',
                        'controller' => 'Main\Controller\Index',
                        'action' => 'contactus',
                    ),
                ),
            ),
        ),
    ),
    'view_manager' => array(
        'template_map' => array(
            'layout/home' => __DIR__ . '/../view/layout/home.phtml',
            'layout/none' => __DIR__ . '/../view/layout/none.phtml',
            'layout/visa' => __DIR__ . '/../view/layout/visatheme.phtml',
            'layout/bags' => __DIR__ . '/../view/layout/bags.phtml',
        ),
        'template_path_stack' => array(
            'Main' => __DIR__ . '/../view',
        //'layout'=> __DIR__ . '/../view',
        ),
    ),
);
?>