<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

use Rector\MysqlToMysqli\Rector\Assign\MysqlAssignToMysqliRector;
use Typo3RectorPrefix20210423\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210423\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\MysqlToMysqli\Rector\Assign\MysqlAssignToMysqliRector::class);
};
