<?php

namespace Weather\Service;

interface weatherServiceInterface {

    /**
     *
     * Get array of weathers
     *
     * @return      array
     *
     */
    public function getWeatherInfo($locationType = 'z');
    
}
