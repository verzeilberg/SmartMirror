<?php

namespace Weather\Service;

use Zend\ServiceManager\ServiceLocatorInterface;

class weatherService implements weatherServiceInterface {

    private $config;
    private $apiKey;
    
    /**
     * Constructor.
     */
    public function __construct($config) {
        $this->config = $config;
        $this->apiKey = $config['weatherSettings']['apiKey'];
        $this->units = $config['weatherSettings']['units'];
    }

    /**
     *
     * Get array of weathers
     *
     * @return      array
     *
     */
    public function getWeatherInfo($locationType = 'z') {
        
        
        $weatherData = file_get_contents('http://api.openweathermap.org/data/2.5/weather?zip=1363,nl&units='.$this->units.'&lang=nl&appid='.$this->apiKey);
        $weatherData = json_decode($weatherData);
        
        return $weatherData;
        
    }

}
