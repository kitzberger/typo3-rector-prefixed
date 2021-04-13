<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210413;

use Rector\Php56\Rector\FunctionLike\AddDefaultValueForUndefinedVariableRector;
use Typo3RectorPrefix20210413\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210413\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\Php56\Rector\FunctionLike\AddDefaultValueForUndefinedVariableRector::class);
};
