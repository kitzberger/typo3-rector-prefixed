<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

use Rector\Tests\Transform\Rector\Assign\GetAndSetToMethodCallRector\Source\Klarka;
use Rector\Tests\Transform\Rector\Assign\GetAndSetToMethodCallRector\Source\SomeContainer;
use Rector\Transform\Rector\Assign\GetAndSetToMethodCallRector;
use Rector\Transform\ValueObject\GetAndSetToMethodCall;
use Typo3RectorPrefix20210423\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symplify\SymfonyPhpConfig\ValueObjectInliner;
return static function (\Typo3RectorPrefix20210423\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\Transform\Rector\Assign\GetAndSetToMethodCallRector::class)->call('configure', [[\Rector\Transform\Rector\Assign\GetAndSetToMethodCallRector::TYPE_TO_METHOD_CALLS => \Symplify\SymfonyPhpConfig\ValueObjectInliner::inline([new \Rector\Transform\ValueObject\GetAndSetToMethodCall(\Rector\Tests\Transform\Rector\Assign\GetAndSetToMethodCallRector\Source\SomeContainer::class, 'getService', 'addService'), new \Rector\Transform\ValueObject\GetAndSetToMethodCall(\Rector\Tests\Transform\Rector\Assign\GetAndSetToMethodCallRector\Source\Klarka::class, 'get', 'set')])]]);
};
