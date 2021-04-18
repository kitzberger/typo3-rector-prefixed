<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210418;

use Rector\Php74\Rector\FuncCall\GetCalledClassToStaticClassRector;
use Typo3RectorPrefix20210418\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210418\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\Php74\Rector\FuncCall\GetCalledClassToStaticClassRector::class);
};
