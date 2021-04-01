<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210401;

use Typo3RectorPrefix20210401\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210401\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->defaults()->autowire()->public()->autoconfigure();
    $services->load('Rector\\CodeQualityStrict\\', __DIR__ . '/../src')->exclude([__DIR__ . '/../src/Rector']);
};
