<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210411;

use Rector\CodeQuality\Rector\BooleanAnd\SimplifyEmptyArrayCheckRector;
use Typo3RectorPrefix20210411\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210411\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\CodeQuality\Rector\BooleanAnd\SimplifyEmptyArrayCheckRector::class);
};
