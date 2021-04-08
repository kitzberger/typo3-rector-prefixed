<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210408;

use Rector\Symfony\Rector\ClassMethod\NormalizeAutowireMethodNamingRector;
use Typo3RectorPrefix20210408\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210408\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\Symfony\Rector\ClassMethod\NormalizeAutowireMethodNamingRector::class);
};
