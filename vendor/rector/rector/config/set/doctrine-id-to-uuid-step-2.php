<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210326;

use Rector\Doctrine\Rector\Class_\AlwaysInitializeUuidInEntityRector;
use Typo3RectorPrefix20210326\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210326\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\Doctrine\Rector\Class_\AlwaysInitializeUuidInEntityRector::class);
};
