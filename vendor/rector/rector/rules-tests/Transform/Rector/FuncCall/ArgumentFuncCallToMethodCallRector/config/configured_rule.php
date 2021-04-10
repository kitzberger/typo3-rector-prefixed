<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210410;

use Rector\Transform\Rector\FuncCall\ArgumentFuncCallToMethodCallRector;
use Rector\Transform\ValueObject\ArgumentFuncCallToMethodCall;
use Rector\Transform\ValueObject\ArrayFuncCallToMethodCall;
use Typo3RectorPrefix20210410\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symplify\SymfonyPhpConfig\ValueObjectInliner;
return static function (\Typo3RectorPrefix20210410\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\Transform\Rector\FuncCall\ArgumentFuncCallToMethodCallRector::class)->call('configure', [[\Rector\Transform\Rector\FuncCall\ArgumentFuncCallToMethodCallRector::FUNCTIONS_TO_METHOD_CALLS => \Symplify\SymfonyPhpConfig\ValueObjectInliner::inline([new \Rector\Transform\ValueObject\ArgumentFuncCallToMethodCall('view', 'Typo3RectorPrefix20210410\\Illuminate\\Contracts\\View\\Factory', 'make'), new \Rector\Transform\ValueObject\ArgumentFuncCallToMethodCall('route', 'Typo3RectorPrefix20210410\\Illuminate\\Routing\\UrlGenerator', 'route'), new \Rector\Transform\ValueObject\ArgumentFuncCallToMethodCall('back', 'Typo3RectorPrefix20210410\\Illuminate\\Routing\\Redirector', 'back', 'back'), new \Rector\Transform\ValueObject\ArgumentFuncCallToMethodCall('broadcast', 'Typo3RectorPrefix20210410\\Illuminate\\Contracts\\Broadcasting\\Factory', 'event')]), \Rector\Transform\Rector\FuncCall\ArgumentFuncCallToMethodCallRector::ARRAY_FUNCTIONS_TO_METHOD_CALLS => \Symplify\SymfonyPhpConfig\ValueObjectInliner::inline([new \Rector\Transform\ValueObject\ArrayFuncCallToMethodCall('config', 'Typo3RectorPrefix20210410\\Illuminate\\Contracts\\Config\\Repository', 'set', 'get'), new \Rector\Transform\ValueObject\ArrayFuncCallToMethodCall('session', 'Typo3RectorPrefix20210410\\Illuminate\\Session\\SessionManager', 'put', 'get')])]]);
};
