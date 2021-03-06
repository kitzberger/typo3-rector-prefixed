<?php

namespace Typo3RectorPrefix20210423;

use Rector\Tests\Transform\Rector\New_\NewToMethodCallRector\Source\MyClass;
use Rector\Tests\Transform\Rector\New_\NewToMethodCallRector\Source\MyClassFactory;
use Rector\Transform\Rector\New_\NewToMethodCallRector;
use Rector\Transform\ValueObject\NewToMethodCall;
use Typo3RectorPrefix20210423\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symplify\SymfonyPhpConfig\ValueObjectInliner;
return static function (\Typo3RectorPrefix20210423\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\Transform\Rector\New_\NewToMethodCallRector::class)->call('configure', [[\Rector\Transform\Rector\New_\NewToMethodCallRector::NEWS_TO_METHOD_CALLS => \Symplify\SymfonyPhpConfig\ValueObjectInliner::inline([new \Rector\Transform\ValueObject\NewToMethodCall(\Rector\Tests\Transform\Rector\New_\NewToMethodCallRector\Source\MyClass::class, \Rector\Tests\Transform\Rector\New_\NewToMethodCallRector\Source\MyClassFactory::class, 'create')])]]);
};
