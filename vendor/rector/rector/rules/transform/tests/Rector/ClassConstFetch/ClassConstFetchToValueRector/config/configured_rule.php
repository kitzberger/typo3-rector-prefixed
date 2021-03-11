<?php

namespace Typo3RectorPrefix20210311;

use Rector\Transform\Rector\ClassConstFetch\ClassConstFetchToValueRector;
use Rector\Transform\Tests\Rector\ClassConstFetch\ClassConstFetchToValueRector\Source\OldClassWithConstants;
use Rector\Transform\ValueObject\ClassConstFetchToValue;
use Typo3RectorPrefix20210311\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symplify\SymfonyPhpConfig\ValueObjectInliner;
return static function (\Typo3RectorPrefix20210311\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\Transform\Rector\ClassConstFetch\ClassConstFetchToValueRector::class)->call('configure', [[\Rector\Transform\Rector\ClassConstFetch\ClassConstFetchToValueRector::CLASS_CONST_FETCHES_TO_VALUES => \Symplify\SymfonyPhpConfig\ValueObjectInliner::inline([new \Rector\Transform\ValueObject\ClassConstFetchToValue(\Rector\Transform\Tests\Rector\ClassConstFetch\ClassConstFetchToValueRector\Source\OldClassWithConstants::class, 'DEVELOPMENT', 'development'), new \Rector\Transform\ValueObject\ClassConstFetchToValue(\Rector\Transform\Tests\Rector\ClassConstFetch\ClassConstFetchToValueRector\Source\OldClassWithConstants::class, 'PRODUCTION', 'production')])]]);
};
