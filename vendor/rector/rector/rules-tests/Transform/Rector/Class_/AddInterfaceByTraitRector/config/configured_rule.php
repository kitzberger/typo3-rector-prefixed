<?php

namespace Typo3RectorPrefix20210418;

use Rector\Tests\Transform\Rector\Class_\AddInterfaceByTraitRector\Source\SomeInterface;
use Rector\Tests\Transform\Rector\Class_\AddInterfaceByTraitRector\Source\SomeTrait;
use Rector\Transform\Rector\Class_\AddInterfaceByTraitRector;
use Typo3RectorPrefix20210418\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210418\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\Transform\Rector\Class_\AddInterfaceByTraitRector::class)->call('configure', [[\Rector\Transform\Rector\Class_\AddInterfaceByTraitRector::INTERFACE_BY_TRAIT => [\Rector\Tests\Transform\Rector\Class_\AddInterfaceByTraitRector\Source\SomeTrait::class => \Rector\Tests\Transform\Rector\Class_\AddInterfaceByTraitRector\Source\SomeInterface::class]]]);
};
