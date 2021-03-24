<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210324;

use Typo3RectorPrefix20210324\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210324\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->defaults()->autowire()->autoconfigure()->public();
    $services->load('Rector\\ChangesReporting\\', __DIR__ . '/../src')->exclude([__DIR__ . '/../src/Contract', __DIR__ . '/../src/ValueObject']);
};
