<?php

namespace Typo3RectorPrefix20210415;

use Rector\Restoration\Rector\New_\CompleteMissingDependencyInNewRector;
use Rector\Tests\Restoration\Rector\New_\CompleteMissingDependencyInNewRector\Source\RandomDependency;
use Typo3RectorPrefix20210415\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210415\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\Restoration\Rector\New_\CompleteMissingDependencyInNewRector::class)->call('configure', [[\Rector\Restoration\Rector\New_\CompleteMissingDependencyInNewRector::CLASS_TO_INSTANTIATE_BY_TYPE => [\Rector\Tests\Restoration\Rector\New_\CompleteMissingDependencyInNewRector\Source\RandomDependency::class => \Rector\Tests\Restoration\Rector\New_\CompleteMissingDependencyInNewRector\Source\RandomDependency::class]]]);
};
