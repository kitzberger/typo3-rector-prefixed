<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210411;

use Rector\Core\Configuration\Option;
use Rector\RemovingStatic\Rector\Property\DesiredPropertyClassMethodTypeToDynamicRector;
use Rector\Tests\RemovingStatic\Rector\Property\DesiredPropertyClassMethodTypeToDynamicRector\Fixture\StaticProperty;
use Typo3RectorPrefix20210411\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210411\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $parameters = $containerConfigurator->parameters();
    $parameters->set(\Rector\Core\Configuration\Option::TYPES_TO_REMOVE_STATIC_FROM, [\Rector\Tests\RemovingStatic\Rector\Property\DesiredPropertyClassMethodTypeToDynamicRector\Fixture\StaticProperty::class]);
    $services = $containerConfigurator->services();
    $services->set(\Rector\RemovingStatic\Rector\Property\DesiredPropertyClassMethodTypeToDynamicRector::class);
};
