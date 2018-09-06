<?php

namespace Weather\Service;

use Zend\ServiceManager\ServiceLocatorInterface;

class weatherService implements weatherServiceInterface {

    private $config;
    private $apiKey;
    private $units;
    private $lang;
    private $country;
    private $zip;
    private $icons;

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
        $dateSunrise = new \DateTime();
        $dateSunrise->setTimestamp($weatherData->sys->sunrise);
        $sunRise = $dateSunrise;
        $dateSunset = new \DateTime();
        $dateSunset->setTimestamp($weatherData->sys->sunset);
        $sunSet = $dateSunset;

        $data = [];
        $data['temp'] = round($weatherData->main->temp, 1);
        $data['tempMin'] = round($weatherData->main->temp_min, 1);
        $data['tempMax'] = round($weatherData->main->temp_max, 1);
        $data['icon'] = $this->icons[$weatherData->weather[0]->icon];
        $data['sunSet'] = $sunSet->format('H:i');
        $data['sunRise'] = $sunRise->format('H:i');
        $data['windSpeed'] = $weatherData->wind->speed;
        $data['windDegree'] = $weatherData->wind->deg;

        return $data;
    }

    /**
     *
     * Get array of forecast weather info
     *
     * @return      array
     *
     */
    public function getWeatherForecastInfo($locationType = 'z') {


        $weatherData = file_get_contents('http://api.openweathermap.org/data/2.5/forecast?zip=' . $this->zip . ',' . $this->country . '&units=' . $this->units . '&lang=' . $this->lang . '&appid=' . $this->apiKey);
        $weatherData = json_decode($weatherData);

        $currentDateObject = new \DateTime();
        $currentDateObject->add(new \DateInterval('P1D'));
        $currentDate = $currentDateObject->format('Y-m-d');
        var_dump($currentDate);

        foreach($weatherData->list AS $day){
            $dayDate = new \DateTime();
            $dayDate->setTimestamp($day->dt);
            $dayDate = $dayDate->format('Y-m-d');


            echo '<pre>';
            if($currentDate == $dayDate) {
                echo 'ja';
            }

        }

        die;

        return $weatherData;
    }

}
