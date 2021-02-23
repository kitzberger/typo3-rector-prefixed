<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210223;

use Rector\Transform\Rector\MethodCall\ServiceGetterToConstructorInjectionRector;
use Rector\Transform\Tests\Rector\MethodCall\ServiceGetterToConstructorInjectionRector\Source\AnotherService;
use Rector\Transform\Tests\Rector\MethodCall\ServiceGetterToConstructorInjectionRector\Source\FirstService;
use Rector\Transform\ValueObject\ServiceGetterToConstructorInjection;
use Typo3RectorPrefix20210223\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symplify\SymfonyPhpConfig\ValueObjectInliner;
return static function (\Typo3RectorPrefix20210223\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\Transform\Rector\MethodCall\ServiceGetterToConstructorInjectionRector::class)->call('configure', [[\Rector\Transform\Rector\MethodCall\ServiceGetterToConstructorInjectionRector::METHOD_CALL_TO_SERVICES => \Symplify\SymfonyPhpConfig\ValueObjectInliner::inline([new \Rector\Transform\ValueObject\ServiceGetterToConstructorInjection(\Rector\Transform\Tests\Rector\MethodCall\ServiceGetterToConstructorInjectionRector\Source\FirstService::class, 'getAnotherService', \Rector\Transform\Tests\Rector\MethodCall\ServiceGetterToConstructorInjectionRector\Source\AnotherService::class)])]]);
};