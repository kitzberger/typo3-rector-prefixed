<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210422;

use Rector\CodeQuality\Rector\If_\SimplifyIfElseToTernaryRector;
use Typo3RectorPrefix20210422\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210422\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\CodeQuality\Rector\If_\SimplifyIfElseToTernaryRector::class);
};
