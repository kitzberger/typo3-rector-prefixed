<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

use Rector\CodingStyle\Rector\ClassMethod\ReturnArrayClassMethodToYieldRector;
use Rector\PHPUnit\Rector\Class_\AddSeeTestAnnotationRector;
use Rector\PHPUnit\Rector\Class_\ConstructClassMethodToSetUpTestCaseRector;
use Rector\PHPUnit\Rector\MethodCall\AssertSameTrueFalseToAssertTrueFalseRector;
use Rector\PHPUnit\Rector\MethodCall\RemoveExpectAnyFromMockRector;
use Typo3RectorPrefix20210423\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210423\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\PHPUnit\Rector\MethodCall\RemoveExpectAnyFromMockRector::class);
    $services->set(\Rector\PHPUnit\Rector\Class_\AddSeeTestAnnotationRector::class);
    $services->set(\Rector\CodingStyle\Rector\ClassMethod\ReturnArrayClassMethodToYieldRector::class);
    $services->set(\Rector\PHPUnit\Rector\Class_\ConstructClassMethodToSetUpTestCaseRector::class);
    $services->set(\Rector\PHPUnit\Rector\MethodCall\AssertSameTrueFalseToAssertTrueFalseRector::class);
};
