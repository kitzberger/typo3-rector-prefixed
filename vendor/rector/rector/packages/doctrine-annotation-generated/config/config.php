<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210227;

use Typo3RectorPrefix20210227\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210227\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->defaults()->public()->autowire()->autoconfigure();
    $services->load('Rector\\DoctrineAnnotationGenerated\\', __DIR__ . '/../src');
};
