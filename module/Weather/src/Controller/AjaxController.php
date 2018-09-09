<?php

/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Weather\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;

class AjaxController extends AbstractActionController {

    private $weatherService;

    public function __construct($weatherService) {
        $this->weatherService = $weatherService;
    }
/*
 * Get the weather data action
 */
    public function getWeatherDataAction() {
        
        $weatherData = $this->weatherService->getWeatherInfo();
        $weatherForecastData = $this->weatherService->getWeatherForecastInfo();
        $succes = true;
        
        return new JsonModel(
                [
                    'succes' => $succes,
                    'weatherData' => $weatherData,
                    'weatherForecastData' => $weatherForecastData,
                ]
        );
    }
}
