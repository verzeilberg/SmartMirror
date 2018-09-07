<?php

namespace News\Factory;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use News\Controller\AjaxController;
use News\Service\newsService;

/**
 * This is the factory for AjaxController. Its purpose is to instantiate the controller
 * and inject dependencies into its constructor.
 */
class AjaxControllerFactory implements FactoryInterface {

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null) {
        $config = $container->get('config');
        $newsService = new newsService($config);
        return new AjaxController($newsService);
    }
}
