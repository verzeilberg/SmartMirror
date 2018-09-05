<?php

namespace Weather;

use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;

return [
    'service_manager' => [
        'invokables' => [
            'Weather\Service\weatherServiceInterface' => 'Weather\Service\weatherService'
        ],
    ],
    'asset_manager' => [
        'resolver_configs' => [
            'paths' => [
                __DIR__ . '/../public',
            ],
        ],
    ],
    'weatherSettings' => [
        'apiKey' => '71fdc75871cf1eefb628051dee55ec31',
        'units' => 'metric', //standard, metric or imperial
        'lang' => 'nl', //Default is english
        'positionType' => 'z', // z = zipcode, c = city
        'zip' => '1363',
        'city' => 'Amsterdam'
    ],
];
