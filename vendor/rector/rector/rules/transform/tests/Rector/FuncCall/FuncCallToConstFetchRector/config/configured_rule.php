<?php

namespace Typo3RectorPrefix20210330;

use Rector\Transform\Rector\FuncCall\FuncCallToConstFetchRector;
use Typo3RectorPrefix20210330\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210330\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\Transform\Rector\FuncCall\FuncCallToConstFetchRector::class)->call('configure', [[\Rector\Transform\Rector\FuncCall\FuncCallToConstFetchRector::FUNCTIONS_TO_CONSTANTS => ['php_sapi_name' => 'PHP_SAPI', 'pi' => 'M_PI']]]);
};
