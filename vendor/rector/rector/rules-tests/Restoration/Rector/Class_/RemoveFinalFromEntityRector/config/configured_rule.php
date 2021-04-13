<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210413;

use Rector\Restoration\Rector\Class_\RemoveFinalFromEntityRector;
use Typo3RectorPrefix20210413\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210413\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\Restoration\Rector\Class_\RemoveFinalFromEntityRector::class);
};
