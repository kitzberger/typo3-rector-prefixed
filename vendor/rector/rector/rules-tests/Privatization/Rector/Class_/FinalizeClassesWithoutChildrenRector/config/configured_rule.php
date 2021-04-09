<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210409;

use Rector\Privatization\Rector\Class_\FinalizeClassesWithoutChildrenRector;
use Typo3RectorPrefix20210409\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210409\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\Privatization\Rector\Class_\FinalizeClassesWithoutChildrenRector::class);
};
