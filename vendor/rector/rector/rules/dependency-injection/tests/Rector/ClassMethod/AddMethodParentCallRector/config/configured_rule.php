<?php

namespace Typo3RectorPrefix20210323;

use Rector\DependencyInjection\Rector\ClassMethod\AddMethodParentCallRector;
use Rector\DependencyInjection\Tests\Rector\ClassMethod\AddMethodParentCallRector\Source\ParentClassWithNewConstructor;
use Typo3RectorPrefix20210323\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210323\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\DependencyInjection\Rector\ClassMethod\AddMethodParentCallRector::class)->call('configure', [[\Rector\DependencyInjection\Rector\ClassMethod\AddMethodParentCallRector::METHODS_BY_PARENT_TYPES => [\Rector\DependencyInjection\Tests\Rector\ClassMethod\AddMethodParentCallRector\Source\ParentClassWithNewConstructor::class => '__construct']]]);
};
