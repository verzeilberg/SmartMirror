<?php

/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController {

    private $vhm;
    private $weatherService;
    private $newsService;

    public function __construct($vhm, $weatherService, $newsService) {
        $this->vhm = $vhm;
        $this->weatherService = $weatherService;
        $this->newsService = $newsService;
    }

    public function indexAction() {

        $weatherData = $this->weatherService->getWeatherInfo();
        $newsData = $this->newsService->getNewsInfo();
        
        return new ViewModel(
                [
                    'weatherData' => $weatherData,
                    'newsData' => $newsData
                ]
        );
    }

}
