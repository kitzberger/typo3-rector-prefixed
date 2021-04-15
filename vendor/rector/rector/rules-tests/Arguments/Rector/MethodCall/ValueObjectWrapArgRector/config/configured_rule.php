<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210415;

use Rector\Arguments\Rector\MethodCall\ValueObjectWrapArgRector;
use Rector\Arguments\ValueObject\ValueObjectWrapArg;
use Typo3RectorPrefix20210415\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symplify\SymfonyPhpConfig\ValueObjectInliner;
return static function (\Typo3RectorPrefix20210415\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\Arguments\Rector\MethodCall\ValueObjectWrapArgRector::class)->call('configure', [[\Rector\Arguments\Rector\MethodCall\ValueObjectWrapArgRector::VALUE_OBJECT_WRAP_ARGS => \Symplify\SymfonyPhpConfig\ValueObjectInliner::inline([new \Rector\Arguments\ValueObject\ValueObjectWrapArg('Rector\\Tests\\Arguments\\Rector\\MethodCall\\ValueObjectWrapArgRector\\Fixture\\SomeClass', 'something', 0, 'Number'), new \Rector\Arguments\ValueObject\ValueObjectWrapArg('Rector\\Tests\\Arguments\\Rector\\MethodCall\\ValueObjectWrapArgRector\\Fixture\\SkipAlreadyNew', 'something', 0, 'Number')])]]);
};
