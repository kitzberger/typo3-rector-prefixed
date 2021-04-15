<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210415;

use Rector\Php73\Rector\FuncCall\SensitiveDefineRector;
use Typo3RectorPrefix20210415\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210415\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\Php73\Rector\FuncCall\SensitiveDefineRector::class);
};
