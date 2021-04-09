<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210409;

use Rector\CodeQualityStrict\Rector\Variable\MoveVariableDeclarationNearReferenceRector;
use Typo3RectorPrefix20210409\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210409\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\CodeQualityStrict\Rector\Variable\MoveVariableDeclarationNearReferenceRector::class);
};
