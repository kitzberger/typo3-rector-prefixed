<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210316;

use Rector\DeadCode\Rector\Class_\RemoveEmptyAbstractClassRector;
use Rector\DeadCode\Rector\ClassMethod\RemoveUnusedPublicMethodRector;
use Typo3RectorPrefix20210316\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210316\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\DeadCode\Rector\ClassMethod\RemoveUnusedPublicMethodRector::class);
    $services->set(\Rector\DeadCode\Rector\Class_\RemoveEmptyAbstractClassRector::class);
};
