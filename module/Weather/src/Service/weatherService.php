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
        $this->lang = $config['weatherSettings']['language'];
        $this->country = $config['weatherSettings']['country'];
        $this->zip = $config['weatherSettings']['zip'];
        $this->icons = $config['weatherSettings']['icons'];
    }

    /**
     *
     * Get array of weather info
     *
     * @return      array
     *
     */
    public function getWeatherInfo($locationType = 'z') {


        $weatherData = file_get_contents('http://api.openweathermap.org/data/2.5/weather?zip=' . $this->zip . ',' . $this->country . '&units=' . $this->units . '&lang=' . $this->lang . '&appid=' . $this->apiKey);
        $weatherData = json_decode($weatherData);

        $data = [];
        $data['temp'] = round($weatherData->main->temp, 1);
        $data['icon'] = $this->icons[$weatherData->weather[0]->icon];


        return $data;
    }

    /**
     *
     * Get array of weathers
     *
     * @return      array
     *
     */
    public function getWeatherForecastInfo($locationType = 'z') {


        $weatherData = file_get_contents('http://api.openweathermap.org/data/2.5/forecast?zip=' . $this->zip . ',' . $this->country . '&units=' . $this->units . '&lang=' . $this->lang . '&appid=' . $this->apiKey);
        $weatherData = json_decode($weatherData);

        return $weatherData;
    }

}
