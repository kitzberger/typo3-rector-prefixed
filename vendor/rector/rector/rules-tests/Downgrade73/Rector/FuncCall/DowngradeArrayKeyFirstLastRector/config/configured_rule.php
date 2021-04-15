<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210415;

use Rector\Downgrade73\Rector\FuncCall\DowngradeArrayKeyFirstLastRector;
use Typo3RectorPrefix20210415\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210415\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\Downgrade73\Rector\FuncCall\DowngradeArrayKeyFirstLastRector::class);
};