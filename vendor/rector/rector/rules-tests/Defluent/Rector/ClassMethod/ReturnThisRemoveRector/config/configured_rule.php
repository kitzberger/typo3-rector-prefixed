<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210411;

use Rector\Defluent\Rector\ClassMethod\ReturnThisRemoveRector;
use Typo3RectorPrefix20210411\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210411\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\Defluent\Rector\ClassMethod\ReturnThisRemoveRector::class);
};
