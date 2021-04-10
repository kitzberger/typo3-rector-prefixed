<?php

namespace Typo3RectorPrefix20210410;

use Rector\RemovingStatic\Rector\Class_\StaticTypeToSetterInjectionRector;
use Rector\Tests\RemovingStatic\Rector\Class_\StaticTypeToSetterInjectionRector\Source\GenericEntityFactory;
use Rector\Tests\RemovingStatic\Rector\Class_\StaticTypeToSetterInjectionRector\Source\GenericEntityFactoryWithInterface;
use Typo3RectorPrefix20210410\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210410\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\RemovingStatic\Rector\Class_\StaticTypeToSetterInjectionRector::class)->call('configure', [[\Rector\RemovingStatic\Rector\Class_\StaticTypeToSetterInjectionRector::STATIC_TYPES => [
        \Rector\Tests\RemovingStatic\Rector\Class_\StaticTypeToSetterInjectionRector\Source\GenericEntityFactory::class,
        // with adding a parent interface to the class
        'ParentSetterEnforcingInterface' => \Rector\Tests\RemovingStatic\Rector\Class_\StaticTypeToSetterInjectionRector\Source\GenericEntityFactoryWithInterface::class,
    ]]]);
};
