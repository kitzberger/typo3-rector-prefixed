<?php

namespace Typo3RectorPrefix20210412;

use Typo3RectorPrefix20210412\PHPUnit\Framework\TestCase;
use Rector\CodingStyle\Rector\MethodCall\PreferThisOrSelfMethodCallRector;
use Rector\CodingStyle\ValueObject\PreferenceSelfThis;
use Rector\Tests\CodingStyle\Rector\MethodCall\PreferThisOrSelfMethodCallRector\Source\AbstractTestCase;
use Rector\Tests\CodingStyle\Rector\MethodCall\PreferThisOrSelfMethodCallRector\Source\BeLocalClass;
use Typo3RectorPrefix20210412\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210412\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\CodingStyle\Rector\MethodCall\PreferThisOrSelfMethodCallRector::class)->call('configure', [[\Rector\CodingStyle\Rector\MethodCall\PreferThisOrSelfMethodCallRector::TYPE_TO_PREFERENCE => [\Rector\Tests\CodingStyle\Rector\MethodCall\PreferThisOrSelfMethodCallRector\Source\AbstractTestCase::class => \Rector\CodingStyle\ValueObject\PreferenceSelfThis::PREFER_SELF, \Rector\Tests\CodingStyle\Rector\MethodCall\PreferThisOrSelfMethodCallRector\Source\BeLocalClass::class => \Rector\CodingStyle\ValueObject\PreferenceSelfThis::PREFER_THIS, \Typo3RectorPrefix20210412\PHPUnit\Framework\TestCase::class => \Rector\CodingStyle\ValueObject\PreferenceSelfThis::PREFER_SELF]]]);
};
