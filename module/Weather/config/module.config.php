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
        'language' => 'nl', //Default is english
        'country' => 'nl',
        'positionType' => 'z', // z = zipcode, c = city
        'zip' => '1363',
        'city' => 'Amsterdam',
        'icons' => [
            "01d" => "wi-day-sunny",
            "02d" => "wi-day-cloudy",
            "03d" => "wi-cloudy",
            "04d" => "wi-cloudy-windy",
            "09d" => "wi-showers",
            "10d" => "wi-rain",
            "11d" => "wi-thunderstorm",
            "13d" => "wi-snow",
            "50d" => "wi-fog",
            "01n" => "wi-night-clear",
            "02n" => "wi-night-cloudy",
            "03n" => "wi-night-cloudy",
            "04n" => "wi-night-cloudy",
            "09n" => "wi-night-showers",
            "10n" => "wi-night-rain",
            "11n" => "wi-night-thunderstorm",
            "13n" => "wi-night-snow",
            "50n" => "wi-night-alt-cloudy-windy"
        ],
    ],
];
