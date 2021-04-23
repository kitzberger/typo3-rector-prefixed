<?php

namespace Typo3RectorPrefix20210423;

use Rector\Defluent\Rector\ClassMethod\NormalToFluentRector;
use Rector\Defluent\ValueObject\NormalToFluent;
use Rector\Tests\Defluent\Rector\ClassMethod\NormalToFluentRector\Source\FluentInterfaceClass;
use Typo3RectorPrefix20210423\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symplify\SymfonyPhpConfig\ValueObjectInliner;
return static function (\Typo3RectorPrefix20210423\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\Defluent\Rector\ClassMethod\NormalToFluentRector::class)->call('configure', [[\Rector\Defluent\Rector\ClassMethod\NormalToFluentRector::CALLS_TO_FLUENT => \Symplify\SymfonyPhpConfig\ValueObjectInliner::inline([new \Rector\Defluent\ValueObject\NormalToFluent(\Rector\Tests\Defluent\Rector\ClassMethod\NormalToFluentRector\Source\FluentInterfaceClass::class, ['someFunction', 'otherFunction', 'joinThisAsWell'])])]]);
};
