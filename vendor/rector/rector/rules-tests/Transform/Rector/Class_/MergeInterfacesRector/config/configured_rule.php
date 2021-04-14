<?php

namespace Typo3RectorPrefix20210414;

use Rector\Tests\Transform\Rector\Class_\MergeInterfacesRector\Source\SomeInterface;
use Rector\Tests\Transform\Rector\Class_\MergeInterfacesRector\Source\SomeOldInterface;
use Rector\Transform\Rector\Class_\MergeInterfacesRector;
use Typo3RectorPrefix20210414\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210414\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\Transform\Rector\Class_\MergeInterfacesRector::class)->call('configure', [[\Rector\Transform\Rector\Class_\MergeInterfacesRector::OLD_TO_NEW_INTERFACES => [\Rector\Tests\Transform\Rector\Class_\MergeInterfacesRector\Source\SomeOldInterface::class => \Rector\Tests\Transform\Rector\Class_\MergeInterfacesRector\Source\SomeInterface::class]]]);
};
