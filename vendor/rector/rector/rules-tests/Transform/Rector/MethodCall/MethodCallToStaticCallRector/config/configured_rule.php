<?php

namespace Typo3RectorPrefix20210414;

use Rector\Tests\Transform\Rector\MethodCall\MethodCallToStaticCallRector\Source\AnotherDependency;
use Rector\Transform\Rector\MethodCall\MethodCallToStaticCallRector;
use Rector\Transform\ValueObject\MethodCallToStaticCall;
use Typo3RectorPrefix20210414\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symplify\SymfonyPhpConfig\ValueObjectInliner;
return static function (\Typo3RectorPrefix20210414\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\Transform\Rector\MethodCall\MethodCallToStaticCallRector::class)->call('configure', [[\Rector\Transform\Rector\MethodCall\MethodCallToStaticCallRector::METHOD_CALLS_TO_STATIC_CALLS => \Symplify\SymfonyPhpConfig\ValueObjectInliner::inline([new \Rector\Transform\ValueObject\MethodCallToStaticCall(\Rector\Tests\Transform\Rector\MethodCall\MethodCallToStaticCallRector\Source\AnotherDependency::class, 'process', 'StaticCaller', 'anotherMethod')])]]);
};
