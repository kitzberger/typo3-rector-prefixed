<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210317;

use Rector\Core\Configuration\Option;
use Rector\Core\ValueObject\PhpVersionFeature;
use Rector\DeadCode\Rector\ClassMethod\RemoveDeadConstructorRector;
use Typo3RectorPrefix20210317\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210317\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $parameters = $containerConfigurator->parameters();
    $parameters->set(\Rector\Core\Configuration\Option::PHP_VERSION_FEATURES, \Rector\Core\ValueObject\PhpVersionFeature::PROPERTY_PROMOTION);
    $services = $containerConfigurator->services();
    $services->set(\Rector\DeadCode\Rector\ClassMethod\RemoveDeadConstructorRector::class);
};
