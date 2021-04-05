<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210405;

use Rector\Core\Configuration\Option;
use Rector\Php72\Rector\FuncCall\GetClassOnNullRector;
use Typo3RectorPrefix20210405\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210405\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $parameters = $containerConfigurator->parameters();
    $parameters->set(\Rector\Core\Configuration\Option::AUTO_IMPORT_NAMES, \true);
    $services = $containerConfigurator->services();
    $services->set(\Rector\Php72\Rector\FuncCall\GetClassOnNullRector::class);
};
