<?php

namespace Typo3RectorPrefix20210423;

use Rector\CodingStyle\Rector\ClassMethod\YieldClassMethodToArrayClassMethodRector;
use Rector\Tests\CodingStyle\Rector\ClassMethod\YieldClassMethodToArrayClassMethodRector\Source\EventSubscriberInterface;
use Typo3RectorPrefix20210423\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210423\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\CodingStyle\Rector\ClassMethod\YieldClassMethodToArrayClassMethodRector::class)->call('configure', [[\Rector\CodingStyle\Rector\ClassMethod\YieldClassMethodToArrayClassMethodRector::METHODS_BY_TYPE => [\Rector\Tests\CodingStyle\Rector\ClassMethod\YieldClassMethodToArrayClassMethodRector\Source\EventSubscriberInterface::class => ['getSubscribedEvents']]]]);
};
