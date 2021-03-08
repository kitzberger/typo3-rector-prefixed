<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210308;

use Rector\Core\ValueObject\FrameworkName;
use Rector\DependencyInjection\Rector\Class_\MultiParentingToAbstractDependencyRector;
use Typo3RectorPrefix20210308\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210308\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\DependencyInjection\Rector\Class_\MultiParentingToAbstractDependencyRector::class)->call('configure', [[\Rector\DependencyInjection\Rector\Class_\MultiParentingToAbstractDependencyRector::FRAMEWORK => \Rector\Core\ValueObject\FrameworkName::SYMFONY]]);
};
