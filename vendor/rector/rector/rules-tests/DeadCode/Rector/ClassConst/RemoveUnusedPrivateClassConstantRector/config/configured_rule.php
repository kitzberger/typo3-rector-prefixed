<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210409;

use Rector\DeadCode\Rector\ClassConst\RemoveUnusedPrivateClassConstantRector;
use Typo3RectorPrefix20210409\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210409\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\DeadCode\Rector\ClassConst\RemoveUnusedPrivateClassConstantRector::class);
};
