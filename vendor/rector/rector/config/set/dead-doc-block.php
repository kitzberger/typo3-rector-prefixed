<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210401;

use Rector\DeadDocBlock\Rector\ClassMethod\RemoveUselessParamTagRector;
use Rector\DeadDocBlock\Rector\ClassMethod\RemoveUselessReturnTagRector;
use Rector\DeadDocBlock\Rector\Node\RemoveNonExistingVarAnnotationRector;
use Typo3RectorPrefix20210401\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210401\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\DeadDocBlock\Rector\ClassMethod\RemoveUselessParamTagRector::class);
    $services->set(\Rector\DeadDocBlock\Rector\ClassMethod\RemoveUselessReturnTagRector::class);
    $services->set(\Rector\DeadDocBlock\Rector\Node\RemoveNonExistingVarAnnotationRector::class);
};
