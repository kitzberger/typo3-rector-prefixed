<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210409;

use Rector\RemovingStatic\Rector\ClassMethod\LocallyCalledStaticMethodToNonStaticRector;
use Typo3RectorPrefix20210409\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210409\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\RemovingStatic\Rector\ClassMethod\LocallyCalledStaticMethodToNonStaticRector::class);
};
