<?php

namespace Typo3RectorPrefix20210331;

use Rector\Doctrine\Rector\MethodCall\EntityAliasToClassConstantReferenceRector;
use Typo3RectorPrefix20210331\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210331\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\Doctrine\Rector\MethodCall\EntityAliasToClassConstantReferenceRector::class)->call('configure', [[\Rector\Doctrine\Rector\MethodCall\EntityAliasToClassConstantReferenceRector::ALIASES_TO_NAMESPACES => ['App' => 'Typo3RectorPrefix20210331\\App\\Entity']]]);
};
