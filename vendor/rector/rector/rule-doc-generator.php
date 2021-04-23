<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

use Rector\RuleDocGenerator\Category\RectorCategoryInferer;
use Typo3RectorPrefix20210423\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210423\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->defaults()->autowire();
    $services->set(\Rector\RuleDocGenerator\Category\RectorCategoryInferer::class);
};
