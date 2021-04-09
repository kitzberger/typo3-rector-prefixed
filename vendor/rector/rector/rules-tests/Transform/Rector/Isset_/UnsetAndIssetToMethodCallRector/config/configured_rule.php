<?php

namespace Typo3RectorPrefix20210409;

use Rector\Tests\Transform\Rector\Isset_\UnsetAndIssetToMethodCallRector\Source\LocalContainer;
use Rector\Transform\Rector\Isset_\UnsetAndIssetToMethodCallRector;
use Rector\Transform\ValueObject\UnsetAndIssetToMethodCall;
use Typo3RectorPrefix20210409\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symplify\SymfonyPhpConfig\ValueObjectInliner;
return static function (\Typo3RectorPrefix20210409\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\Transform\Rector\Isset_\UnsetAndIssetToMethodCallRector::class)->call('configure', [[\Rector\Transform\Rector\Isset_\UnsetAndIssetToMethodCallRector::ISSET_UNSET_TO_METHOD_CALL => \Symplify\SymfonyPhpConfig\ValueObjectInliner::inline([new \Rector\Transform\ValueObject\UnsetAndIssetToMethodCall(\Rector\Tests\Transform\Rector\Isset_\UnsetAndIssetToMethodCallRector\Source\LocalContainer::class, 'hasService', 'removeService')])]]);
};
