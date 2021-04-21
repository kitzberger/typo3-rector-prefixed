<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210421;

use Rector\Downgrade72\Rector\FuncCall\DowngradeStreamIsattyRector;
use Typo3RectorPrefix20210421\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210421\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\Downgrade72\Rector\FuncCall\DowngradeStreamIsattyRector::class);
};
