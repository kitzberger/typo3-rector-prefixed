<?php

namespace Typo3RectorPrefix20210414;

use Rector\Tests\Transform\Rector\Assign\GetAndSetToMethodCallRector\Source\Klarka;
use Rector\Tests\Transform\Rector\Assign\GetAndSetToMethodCallRector\Source\SomeContainer;
use Rector\Transform\Rector\Assign\GetAndSetToMethodCallRector;
use Typo3RectorPrefix20210414\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210414\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\Transform\Rector\Assign\GetAndSetToMethodCallRector::class)->call('configure', [[\Rector\Transform\Rector\Assign\GetAndSetToMethodCallRector::TYPE_TO_METHOD_CALLS => [\Rector\Tests\Transform\Rector\Assign\GetAndSetToMethodCallRector\Source\SomeContainer::class => ['get' => 'getService', 'set' => 'addService'], \Rector\Tests\Transform\Rector\Assign\GetAndSetToMethodCallRector\Source\Klarka::class => ['get' => 'get']]]]);
};
