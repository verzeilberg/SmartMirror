<?php

/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Agenda\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;

class AjaxController extends AbstractActionController {

    private $agendaService;

    public function __construct($agendaService) {
        $this->agendaService = $agendaService;
    }
/*
 * Get the agenda data action
 */
    public function getAgendaDataAction() {
        
        $agendaData = $this->agendaService->getAgendaInfo();
        $agendaForecastData = $this->agendaService->getAgendaForecastInfo();
        $succes = true;
        
        return new JsonModel(
                [
                    'succes' => $succes,
                    'agendaData' => $agendaData,
                    'agendaForecastData' => $agendaForecastData,
                ]
        );
    }
}
