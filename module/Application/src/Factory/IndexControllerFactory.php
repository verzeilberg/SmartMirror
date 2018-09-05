<?php

namespace Application\Factory;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Application\Controller\IndexController;
use Weather\Service\weatherService;

/**
 * This is the factory for AuthController. Its purpose is to instantiate the controller
 * and inject dependencies into its constructor.
 */
class IndexControllerFactory implements FactoryInterface {

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null) {

        $vhm = $container->get('ViewHelperManager');
        $config = $container->get('config');
        $weatherService = new weatherService($config);
        
        return new IndexController($vhm, $weatherService);
    }
}
