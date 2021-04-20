<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210420;

use Rector\Generics\Rector\Class_\GenericsPHPStormMethodAnnotationRector;
use Typo3RectorPrefix20210420\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210420\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\Generics\Rector\Class_\GenericsPHPStormMethodAnnotationRector::class);
};
