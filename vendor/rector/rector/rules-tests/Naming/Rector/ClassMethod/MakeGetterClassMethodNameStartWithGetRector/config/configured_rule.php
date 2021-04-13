<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210413;

use Rector\Naming\Rector\ClassMethod\MakeGetterClassMethodNameStartWithGetRector;
use Typo3RectorPrefix20210413\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210413\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\Naming\Rector\ClassMethod\MakeGetterClassMethodNameStartWithGetRector::class);
};
