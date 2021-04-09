<?php

namespace Typo3RectorPrefix20210409;

use Rector\Tests\Transform\Rector\Class_\AddInterfaceByParentRector\Source\SomeInterface;
use Rector\Tests\Transform\Rector\Class_\AddInterfaceByParentRector\Source\SomeParent;
use Rector\Transform\Rector\Class_\AddInterfaceByParentRector;
use Typo3RectorPrefix20210409\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210409\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\Transform\Rector\Class_\AddInterfaceByParentRector::class)->call('configure', [[\Rector\Transform\Rector\Class_\AddInterfaceByParentRector::INTERFACE_BY_PARENT => [\Rector\Tests\Transform\Rector\Class_\AddInterfaceByParentRector\Source\SomeParent::class => \Rector\Tests\Transform\Rector\Class_\AddInterfaceByParentRector\Source\SomeInterface::class]]]);
};
