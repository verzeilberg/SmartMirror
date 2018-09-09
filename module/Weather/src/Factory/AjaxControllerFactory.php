<?php

namespace Weather\Factory;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Weather\Controller\AjaxController;
use Weather\Service\weatherService;

/**
 * This is the factory for AjaxController. Its purpose is to instantiate the controller
 * and inject dependencies into its constructor.
 */
class AjaxControllerFactory implements FactoryInterface {

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null) {
        $config = $container->get('config');
        $weatherService = new weatherService($config);
        return new AjaxController($weatherService);
    }
}
