<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210408;

use Typo3RectorPrefix20210408\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210408\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->defaults()->public()->autowire()->autoconfigure();
    $services->load('Rector\\Testing\\', __DIR__ . '/../src')->exclude([__DIR__ . '/../src/PHPUnit/Runnable/NodeVisitor', __DIR__ . '/../src/ValueObject', __DIR__ . '/../src/PHPUnit']);
};
