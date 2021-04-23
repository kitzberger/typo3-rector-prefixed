<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

use Rector\CodeQuality\Rector\FuncCall\SingleInArrayToCompareRector;
use Typo3RectorPrefix20210423\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210423\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\CodeQuality\Rector\FuncCall\SingleInArrayToCompareRector::class);
};
