<?php

namespace Typo3RectorPrefix20210315;

use Rector\Renaming\Rector\String_\RenameStringRector;
use Typo3RectorPrefix20210315\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210315\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\Renaming\Rector\String_\RenameStringRector::class)->call('configure', [[\Rector\Renaming\Rector\String_\RenameStringRector::STRING_CHANGES => ['ROLE_PREVIOUS_ADMIN' => 'IS_IMPERSONATOR']]]);
};
