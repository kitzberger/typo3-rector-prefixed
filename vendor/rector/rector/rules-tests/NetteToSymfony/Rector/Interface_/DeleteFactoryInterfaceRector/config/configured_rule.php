<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210422;

use Rector\NetteToSymfony\Rector\Interface_\DeleteFactoryInterfaceRector;
use Typo3RectorPrefix20210422\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210422\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\NetteToSymfony\Rector\Interface_\DeleteFactoryInterfaceRector::class);
};
