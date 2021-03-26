<?php

namespace Typo3RectorPrefix20210326;

use Rector\Transform\Rector\FuncCall\FuncCallToStaticCallRector;
use Rector\Transform\ValueObject\FuncCallToStaticCall;
use Typo3RectorPrefix20210326\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symplify\SymfonyPhpConfig\ValueObjectInliner;
return static function (\Typo3RectorPrefix20210326\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\Transform\Rector\FuncCall\FuncCallToStaticCallRector::class)->call('configure', [[\Rector\Transform\Rector\FuncCall\FuncCallToStaticCallRector::FUNC_CALLS_TO_STATIC_CALLS => \Symplify\SymfonyPhpConfig\ValueObjectInliner::inline([new \Rector\Transform\ValueObject\FuncCallToStaticCall('view', 'SomeStaticClass', 'render'), new \Rector\Transform\ValueObject\FuncCallToStaticCall('Typo3RectorPrefix20210326\\SomeNamespaced\\view', 'AnotherStaticClass', 'render')])]]);
};
