<?php

namespace News;

use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;

return [
    'router' => [
        'routes' => [
            'news' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/news[/:action]',
                    'defaults' => [
                        'controller' => Controller\AjaxController::class,
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\AjaxController::class => Factory\AjaxControllerFactory::class,
        ],
    ],
    'service_manager' => [
        'invokables' => [
            'News\Service\newsServiceInterface' => 'News\Service\newsService'
        ],
    ],
    'asset_manager' => [
        'resolver_configs' => [
            'paths' => [
                __DIR__ . '/../public',
            ],
        ],
    ],
    'newsSettings' => [
        'feeds' => [
            'telegraaf.nl' => 'https://www.telegraaf.nl/rss',
            'nu.nl' => 'https://www.nu.nl/rss',
            'ad.nl' => 'https://www.ad.nl/home/rss.xml',
        ],
    ],
];
