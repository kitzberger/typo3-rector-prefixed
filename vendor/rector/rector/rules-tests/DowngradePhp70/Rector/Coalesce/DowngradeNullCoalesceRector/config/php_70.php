<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

use Rector\Core\Configuration\Option;
use Rector\Core\ValueObject\PhpVersionFeature;
use Rector\DowngradePhp70\Rector\Coalesce\DowngradeNullCoalesceRector;
use Typo3RectorPrefix20210423\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210423\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $parameters = $containerConfigurator->parameters();
    $parameters->set(\Rector\Core\Configuration\Option::PHP_VERSION_FEATURES, \Rector\Core\ValueObject\PhpVersionFeature::SCALAR_TYPES - 1);
    $services = $containerConfigurator->services();
    $services->set(\Rector\DowngradePhp70\Rector\Coalesce\DowngradeNullCoalesceRector::class);
};
