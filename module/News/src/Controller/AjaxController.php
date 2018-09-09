<?php

/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace News\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;

class AjaxController extends AbstractActionController {

    private $newsService;

    public function __construct($newsService) {
        $this->newsService = $newsService;
    }
/*
 * Get the news data action
 */
    public function getNewsDataAction() {
        
        $newsData = $this->newsService->getNewsInfo();
        $succes = true;
        
        return new JsonModel(
                [
                    'succes' => $succes,
                    'newsData' => $newsData,
                ]
        );
    }
}
