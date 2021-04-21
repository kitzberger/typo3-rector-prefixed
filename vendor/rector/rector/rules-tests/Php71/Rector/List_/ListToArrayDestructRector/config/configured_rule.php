<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210421;

use Rector\Php71\Rector\List_\ListToArrayDestructRector;
use Typo3RectorPrefix20210421\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210421\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\Php71\Rector\List_\ListToArrayDestructRector::class);
};
