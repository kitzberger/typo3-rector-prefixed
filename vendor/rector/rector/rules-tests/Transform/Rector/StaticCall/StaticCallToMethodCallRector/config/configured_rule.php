<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

use Rector\Transform\Rector\StaticCall\StaticCallToMethodCallRector;
use Rector\Transform\ValueObject\StaticCallToMethodCall;
use Typo3RectorPrefix20210423\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symplify\SymfonyPhpConfig\ValueObjectInliner;
return static function (\Typo3RectorPrefix20210423\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\Transform\Rector\StaticCall\StaticCallToMethodCallRector::class)->call('configure', [[\Rector\Transform\Rector\StaticCall\StaticCallToMethodCallRector::STATIC_CALLS_TO_METHOD_CALLS => \Symplify\SymfonyPhpConfig\ValueObjectInliner::inline([new \Rector\Transform\ValueObject\StaticCallToMethodCall('Nette\\Utils\\FileSystem', 'write', 'Symplify\\SmartFileSystem\\SmartFileSystem', 'dumpFile'), new \Rector\Transform\ValueObject\StaticCallToMethodCall('Illuminate\\Support\\Facades\\Response', '*', 'Illuminate\\Contracts\\Routing\\ResponseFactory', '*')])]]);
};
