<?php

namespace Typo3RectorPrefix20210317;

use Rector\Transform\Rector\MethodCall\CallableInMethodCallToVariableRector;
use Rector\Transform\Tests\Rector\MethodCall\CallableInMethodCallToVariableRector\Source\DummyCache;
use Rector\Transform\ValueObject\CallableInMethodCallToVariable;
use Typo3RectorPrefix20210317\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symplify\SymfonyPhpConfig\ValueObjectInliner;
return static function (\Typo3RectorPrefix20210317\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\Transform\Rector\MethodCall\CallableInMethodCallToVariableRector::class)->call('configure', [[\Rector\Transform\Rector\MethodCall\CallableInMethodCallToVariableRector::CALLABLE_IN_METHOD_CALL_TO_VARIABLE => \Symplify\SymfonyPhpConfig\ValueObjectInliner::inline([new \Rector\Transform\ValueObject\CallableInMethodCallToVariable(\Rector\Transform\Tests\Rector\MethodCall\CallableInMethodCallToVariableRector\Source\DummyCache::class, 'save', 1)])]]);
};
