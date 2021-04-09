<?php

namespace Typo3RectorPrefix20210409;

use Typo3RectorPrefix20210409\PHPUnit\Framework\TestCase;
use Rector\CodingStyle\Rector\ClassMethod\ReturnArrayClassMethodToYieldRector;
use Rector\CodingStyle\ValueObject\ReturnArrayClassMethodToYield;
use Rector\Tests\CodingStyle\Rector\ClassMethod\ReturnArrayClassMethodToYieldRector\Source\EventSubscriberInterface;
use Rector\Tests\CodingStyle\Rector\ClassMethod\ReturnArrayClassMethodToYieldRector\Source\ParentTestCase;
use Typo3RectorPrefix20210409\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symplify\SymfonyPhpConfig\ValueObjectInliner;
return static function (\Typo3RectorPrefix20210409\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\CodingStyle\Rector\ClassMethod\ReturnArrayClassMethodToYieldRector::class)->call('configure', [[\Rector\CodingStyle\Rector\ClassMethod\ReturnArrayClassMethodToYieldRector::METHODS_TO_YIELDS => \Symplify\SymfonyPhpConfig\ValueObjectInliner::inline([new \Rector\CodingStyle\ValueObject\ReturnArrayClassMethodToYield(\Rector\Tests\CodingStyle\Rector\ClassMethod\ReturnArrayClassMethodToYieldRector\Source\EventSubscriberInterface::class, 'getSubscribedEvents'), new \Rector\CodingStyle\ValueObject\ReturnArrayClassMethodToYield(\Rector\Tests\CodingStyle\Rector\ClassMethod\ReturnArrayClassMethodToYieldRector\Source\ParentTestCase::class, 'provide*'), new \Rector\CodingStyle\ValueObject\ReturnArrayClassMethodToYield(\Rector\Tests\CodingStyle\Rector\ClassMethod\ReturnArrayClassMethodToYieldRector\Source\ParentTestCase::class, 'dataProvider*'), new \Rector\CodingStyle\ValueObject\ReturnArrayClassMethodToYield(\Typo3RectorPrefix20210409\PHPUnit\Framework\TestCase::class, 'provideData')])]]);
};
