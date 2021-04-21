<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210421;

use Rector\DeadCode\Rector\Node\RemoveNonExistingVarAnnotationRector;
use Typo3RectorPrefix20210421\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210421\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\DeadCode\Rector\Node\RemoveNonExistingVarAnnotationRector::class);
};
