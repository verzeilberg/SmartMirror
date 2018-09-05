<?php

namespace News;

use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;

return [
    'service_manager' => [
        'invokables' => [
            'News\Service\newsServiceInterface' => 'News\Service\newsService'
        ],
    ],
    'newsSettings' => [
        'RSS-Feed-Link' => 'https://www.ad.nl/home/rss.xml'

    ],
];
