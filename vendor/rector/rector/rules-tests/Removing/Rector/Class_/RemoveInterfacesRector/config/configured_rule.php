<?php

namespace Typo3RectorPrefix20210412;

use Rector\Removing\Rector\Class_\RemoveInterfacesRector;
use Rector\Tests\Removing\Rector\Class_\RemoveInterfacesRector\Source\SomeInterface;
use Typo3RectorPrefix20210412\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210412\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\Removing\Rector\Class_\RemoveInterfacesRector::class)->call('configure', [[\Rector\Removing\Rector\Class_\RemoveInterfacesRector::INTERFACES_TO_REMOVE => [\Rector\Tests\Removing\Rector\Class_\RemoveInterfacesRector\Source\SomeInterface::class]]]);
};
