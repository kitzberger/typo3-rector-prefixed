<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

use Rector\Symfony\Rector\Attribute\ExtractAttributeRouteNameConstantsRector;
use Rector\Symfony\Rector\BinaryOp\ResponseStatusCodeRector;
use Rector\Symfony\Rector\Class_\EventListenerToEventSubscriberRector;
use Rector\Symfony\Rector\Class_\MakeCommandLazyRector;
use Typo3RectorPrefix20210423\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210423\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\Symfony\Rector\BinaryOp\ResponseStatusCodeRector::class);
    $services->set(\Rector\Symfony\Rector\Class_\MakeCommandLazyRector::class);
    $services->set(\Rector\Symfony\Rector\Class_\EventListenerToEventSubscriberRector::class);
    $services->set(\Rector\Symfony\Rector\Attribute\ExtractAttributeRouteNameConstantsRector::class);
};
