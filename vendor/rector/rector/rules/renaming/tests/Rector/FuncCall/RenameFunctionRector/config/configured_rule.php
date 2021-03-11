<?php

namespace Typo3RectorPrefix20210311;

use Rector\Renaming\Rector\FuncCall\RenameFunctionRector;
use Typo3RectorPrefix20210311\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210311\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\Renaming\Rector\FuncCall\RenameFunctionRector::class)->call('configure', [[\Rector\Renaming\Rector\FuncCall\RenameFunctionRector::OLD_FUNCTION_TO_NEW_FUNCTION => ['view' => 'Typo3RectorPrefix20210311\\Laravel\\Templating\\render', 'sprintf' => 'Typo3RectorPrefix20210311\\Safe\\sprintf']]]);
};
