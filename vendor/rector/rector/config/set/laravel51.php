<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210324;

use Rector\Renaming\Rector\Name\RenameClassRector;
use Typo3RectorPrefix20210324\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
# see: https://laravel.com/docs/5.1/upgrade
return static function (\Typo3RectorPrefix20210324\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\Renaming\Rector\Name\RenameClassRector::class)->call('configure', [[\Rector\Renaming\Rector\Name\RenameClassRector::OLD_TO_NEW_CLASSES => ['Typo3RectorPrefix20210324\\Illuminate\\Validation\\Validator' => 'Typo3RectorPrefix20210324\\Illuminate\\Contracts\\Validation\\Validator']]]);
};
