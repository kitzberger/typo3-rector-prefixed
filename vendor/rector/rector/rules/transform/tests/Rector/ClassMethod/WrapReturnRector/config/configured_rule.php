<?php

namespace Typo3RectorPrefix20210323;

use Rector\Transform\Rector\ClassMethod\WrapReturnRector;
use Rector\Transform\Tests\Rector\ClassMethod\WrapReturnRector\Source\SomeReturnClass;
use Rector\Transform\ValueObject\WrapReturn;
use Typo3RectorPrefix20210323\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symplify\SymfonyPhpConfig\ValueObjectInliner;
return static function (\Typo3RectorPrefix20210323\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\Transform\Rector\ClassMethod\WrapReturnRector::class)->call('configure', [[\Rector\Transform\Rector\ClassMethod\WrapReturnRector::TYPE_METHOD_WRAPS => \Symplify\SymfonyPhpConfig\ValueObjectInliner::inline([new \Rector\Transform\ValueObject\WrapReturn(\Rector\Transform\Tests\Rector\ClassMethod\WrapReturnRector\Source\SomeReturnClass::class, 'getItem', \true)])]]);
};
