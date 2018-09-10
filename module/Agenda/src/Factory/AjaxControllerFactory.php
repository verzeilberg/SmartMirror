<?php

namespace Agenda\Factory;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Agenda\Controller\AjaxController;
use Agenda\Service\agendaService;

/**
 * This is the factory for AjaxController. Its purpose is to instantiate the controller
 * and inject dependencies into its constructor.
 */
class AjaxControllerFactory implements FactoryInterface {

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null) {
        $config = $container->get('config');
        $agendaService = new agendaService($config);
        return new AjaxController($agendaService);
    }
}
