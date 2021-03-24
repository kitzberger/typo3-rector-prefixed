<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210324;

use Rector\CodeQuality\Rector\Isset_\IssetOnPropertyObjectToPropertyExistsRector;
use Rector\Core\Configuration\Option;
use Rector\Core\ValueObject\PhpVersionFeature;
use Typo3RectorPrefix20210324\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210324\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $parameters = $containerConfigurator->parameters();
    $parameters->set(\Rector\Core\Configuration\Option::PHP_VERSION_FEATURES, \Rector\Core\ValueObject\PhpVersionFeature::TYPED_PROPERTIES);
    $services = $containerConfigurator->services();
    $services->set(\Rector\CodeQuality\Rector\Isset_\IssetOnPropertyObjectToPropertyExistsRector::class);
};
