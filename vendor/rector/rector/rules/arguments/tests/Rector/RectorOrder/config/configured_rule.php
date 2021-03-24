<?php

namespace Typo3RectorPrefix20210324;

use Rector\PHPUnit\Rector\MethodCall\AssertComparisonToSpecificMethodRector;
use Rector\PHPUnit\Rector\MethodCall\AssertFalseStrposToContainsRector;
use Rector\PHPUnit\Rector\MethodCall\AssertSameBoolNullToSpecificMethodRector;
use Typo3RectorPrefix20210324\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210324\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\PHPUnit\Rector\MethodCall\AssertComparisonToSpecificMethodRector::class);
    $services->set(\Rector\PHPUnit\Rector\MethodCall\AssertSameBoolNullToSpecificMethodRector::class);
    $services->set(\Rector\PHPUnit\Rector\MethodCall\AssertFalseStrposToContainsRector::class);
};
