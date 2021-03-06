<?php

namespace Typo3RectorPrefix20210423;

use Rector\Php74\Rector\Function_\ReservedFnFunctionRector;
use Typo3RectorPrefix20210423\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210423\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\Php74\Rector\Function_\ReservedFnFunctionRector::class)->call('configure', [[\Rector\Php74\Rector\Function_\ReservedFnFunctionRector::RESERVED_NAMES_TO_NEW_ONES => [
        // for testing purposes of "fn" even on PHP 7.3-
        'reservedFn' => 'f',
    ]]]);
};
