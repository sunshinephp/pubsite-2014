<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

return array(
    'router' => array(
        'routes' => array(
            'home' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Pages',
                        'action'     => 'index',
                    ),
                ),
            ),
            'register' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/register',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Pages',
                        'action' => 'register',
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
            'events' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/events',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Pages',
                        'action' => 'events',
                    ),
                ),
            ),
            'uncon' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/uncon',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Pages',
                        'action' => 'uncon',
                    ),
                ),
            ),
            'venue' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/venue',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Pages',
                        'action' => 'venue',
                    ),
                ),
            ),
            'conduct' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/conduct',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Pages',
                        'action' => 'conduct',
                    ),
                ),
            ),
//            'expect' => array(
//                'type' => 'Literal',
//                'options' => array(
//                    'route' => '/expect',
//                    'defaults' => array(
//                        'controller' => 'Application\Controller\Pages',
//                        'action' => 'expect',
//                    ),
//                ),
//            ),
            'sitemap' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/sitemap',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Pages',
                        'action' => 'sitemap',
                    ),
                ),
            ),
        ),
    ),
    'navigation' => array(
        'default' => array(
            array(
                'label' => 'Home',
                'route' => 'home',
                'lastmod' => '2014-11-21',
                'changefreq' => 'monthly',
                'priority' => '1.0',
                'order' => '10',
            ),
            array(
                'label' => 'Venue',
                'route' => 'venue',
                'lastmod' => '2014-11-21',
                'changefreq' => 'monthly',
                'priority' => '0.5',
                'order' => '80',
            ),
            array(
                'label' => 'Events',
                'route' => 'events',
                'lastmod' => '2014-11-21',
                'changefreq' => 'monthly',
                'priority' => '0.5',
                'order' => '20',
            ),
            array(
                'label' => 'Uncon',
                'route' => 'uncon',
                'lastmod' => '2014-11-21',
                'changefreq' => 'monthly',
                'priority' => '0.5',
                'order' => '28',
            ),
            array(
                'label' => 'Tickets',
                'route' => 'register',
                'lastmod' => '2014-11-21',
                'changefreq' => 'daily',
                'priority' => '0.8',
                'order' => '90',
            ),
            array(
                'label' => 'Call for Papers',
                'uri' => 'https://cfp.sunshinephp.com',
                'order' => '1000',
            ),
        ),
    ),
    'service_manager' => array(
        'factories' => array(
            'navigation' => 'Zend\Navigation\Service\DefaultNavigationFactory',
        ),
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
        'invokables' => array(
            'Application\Controller\Pages' => 'Application\Controller\PagesController'
        ),
    ),
    'view_helpers' => array(
        'invokables' => array(
            'sidebar' => 'Application\View\Helper\Sidebar',
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => false,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
            'application-default-sidebar' => __DIR__ . '/../view/application/helper/default_sidebar.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
);
