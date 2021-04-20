<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210420;

use Rector\Autodiscovery\Rector\Class_\MoveValueObjectsToValueObjectDirectoryRector;
use Rector\Tests\Autodiscovery\Rector\Class_\MoveValueObjectsToValueObjectDirectoryRector\Source\ObviousValueObjectInterface;
use Typo3RectorPrefix20210420\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210420\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\Autodiscovery\Rector\Class_\MoveValueObjectsToValueObjectDirectoryRector::class)->call('configure', [[\Rector\Autodiscovery\Rector\Class_\MoveValueObjectsToValueObjectDirectoryRector::TYPES => [\Rector\Tests\Autodiscovery\Rector\Class_\MoveValueObjectsToValueObjectDirectoryRector\Source\ObviousValueObjectInterface::class], \Rector\Autodiscovery\Rector\Class_\MoveValueObjectsToValueObjectDirectoryRector::SUFFIXES => ['Search'], \Rector\Autodiscovery\Rector\Class_\MoveValueObjectsToValueObjectDirectoryRector::ENABLE_VALUE_OBJECT_GUESSING => \true]]);
};
