<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210411;

use Rector\Transform\Rector\Class_\ChangeSingletonToServiceRector;
use Typo3RectorPrefix20210411\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210411\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\Transform\Rector\Class_\ChangeSingletonToServiceRector::class);
};
