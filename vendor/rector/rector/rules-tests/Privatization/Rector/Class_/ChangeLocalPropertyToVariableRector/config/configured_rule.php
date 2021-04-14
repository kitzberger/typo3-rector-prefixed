<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210414;

use Rector\Privatization\Rector\Class_\ChangeLocalPropertyToVariableRector;
use Typo3RectorPrefix20210414\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210414\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\Privatization\Rector\Class_\ChangeLocalPropertyToVariableRector::class);
};
