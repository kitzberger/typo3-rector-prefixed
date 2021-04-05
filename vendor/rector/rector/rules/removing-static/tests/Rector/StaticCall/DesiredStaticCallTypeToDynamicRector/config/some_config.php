<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210405;

use Rector\Core\Configuration\Option;
use Rector\RemovingStatic\Rector\StaticCall\DesiredStaticCallTypeToDynamicRector;
use Rector\RemovingStatic\Tests\Rector\StaticCall\DesiredStaticCallTypeToDynamicRector\Source\SomeStaticMethod;
use Typo3RectorPrefix20210405\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210405\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $parameters = $containerConfigurator->parameters();
    $parameters->set(\Rector\Core\Configuration\Option::TYPES_TO_REMOVE_STATIC_FROM, [\Rector\RemovingStatic\Tests\Rector\StaticCall\DesiredStaticCallTypeToDynamicRector\Source\SomeStaticMethod::class]);
    $services = $containerConfigurator->services();
    $services->set(\Rector\RemovingStatic\Rector\StaticCall\DesiredStaticCallTypeToDynamicRector::class);
};
