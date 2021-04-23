<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

use Rector\Privatization\Rector\MethodCall\ReplaceStringWithClassConstantRector;
use Rector\Privatization\ValueObject\ReplaceStringWithClassConstant;
use Rector\Tests\Privatization\Rector\MethodCall\ReplaceStringWithClassConstantRector\Source\Placeholder;
use Typo3RectorPrefix20210423\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symplify\SymfonyPhpConfig\ValueObjectInliner;
return static function (\Typo3RectorPrefix20210423\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\Privatization\Rector\MethodCall\ReplaceStringWithClassConstantRector::class)->call('configure', [[\Rector\Privatization\Rector\MethodCall\ReplaceStringWithClassConstantRector::REPLACE_STRING_WITH_CLASS_CONSTANT => \Symplify\SymfonyPhpConfig\ValueObjectInliner::inline([new \Rector\Privatization\ValueObject\ReplaceStringWithClassConstant('Rector\\Tests\\Privatization\\Rector\\MethodCall\\ReplaceStringWithClassConstantRector\\Fixture\\ReplaceWithConstant', 'call', 0, \Rector\Tests\Privatization\Rector\MethodCall\ReplaceStringWithClassConstantRector\Source\Placeholder::class)])]]);
};
