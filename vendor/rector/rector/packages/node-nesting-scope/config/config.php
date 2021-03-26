<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210326;

use Typo3RectorPrefix20210326\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210326\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->defaults()->public()->autowire()->autoconfigure();
    $services->load('Rector\\NodeNestingScope\\', __DIR__ . '/../src')->exclude([__DIR__ . '/../src/ValueObject']);
};
