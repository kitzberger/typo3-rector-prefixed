<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210413;

use Rector\Symfony\Rector\ClassMethod\RemoveServiceFromSensioRouteRector;
use Rector\Symfony\Rector\ClassMethod\ReplaceSensioRouteAnnotationWithSymfonyRector;
use Typo3RectorPrefix20210413\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210413\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\Symfony\Rector\ClassMethod\ReplaceSensioRouteAnnotationWithSymfonyRector::class);
    $services->set(\Rector\Symfony\Rector\ClassMethod\RemoveServiceFromSensioRouteRector::class);
};
