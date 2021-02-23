<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210223;

use Typo3RectorPrefix20210223\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210223\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->defaults()->public()->autowire()->autoconfigure();
    $services->load('Rector\\Php73\\', __DIR__ . '/../src')->exclude([__DIR__ . '/../src/Rector']);
};
