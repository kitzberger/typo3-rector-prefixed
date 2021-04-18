<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210418;

use Rector\DeadCode\Rector\Stmt\RemoveUnreachableStatementRector;
use Typo3RectorPrefix20210418\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210418\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\DeadCode\Rector\Stmt\RemoveUnreachableStatementRector::class);
};
