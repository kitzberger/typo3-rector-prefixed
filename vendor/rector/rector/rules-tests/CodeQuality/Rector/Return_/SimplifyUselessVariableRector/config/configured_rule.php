<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210411;

use Rector\CodeQuality\Rector\Return_\SimplifyUselessVariableRector;
use Typo3RectorPrefix20210411\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210411\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\CodeQuality\Rector\Return_\SimplifyUselessVariableRector::class);
};
