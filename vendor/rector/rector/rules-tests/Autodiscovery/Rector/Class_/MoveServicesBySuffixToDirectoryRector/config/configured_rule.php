<?php

namespace Typo3RectorPrefix20210422;

use Rector\Autodiscovery\Rector\Class_\MoveServicesBySuffixToDirectoryRector;
use Typo3RectorPrefix20210422\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210422\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\Autodiscovery\Rector\Class_\MoveServicesBySuffixToDirectoryRector::class)->call('configure', [[\Rector\Autodiscovery\Rector\Class_\MoveServicesBySuffixToDirectoryRector::GROUP_NAMES_BY_SUFFIX => ['Repository', 'Command', 'Mapper', 'Controller']]]);
};
