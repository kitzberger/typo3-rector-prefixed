<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210329;

use Rector\Core\Configuration\Option;
use Rector\Privatization\Rector\Class_\FinalizeClassesWithoutChildrenRector;
use Typo3RectorPrefix20210329\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210329\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\Privatization\Rector\Class_\FinalizeClassesWithoutChildrenRector::class);
    $parameters = $containerConfigurator->parameters();
    $parameters->set(\Rector\Core\Configuration\Option::AUTOLOAD_PATHS, [__DIR__ . '/../tests/fixture-finalize']);
};
