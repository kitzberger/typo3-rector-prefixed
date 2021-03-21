<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210321;

use Rector\Removing\Rector\Class_\RemoveTraitRector;
use Typo3RectorPrefix20210321\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210321\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\Removing\Rector\Class_\RemoveTraitRector::class)->call('configure', [[\Rector\Removing\Rector\Class_\RemoveTraitRector::TRAITS_TO_REMOVE => [
        # see https://laravel.com/docs/5.3/upgrade
        'Typo3RectorPrefix20210321\\Illuminate\\Foundation\\Auth\\Access\\AuthorizesResources',
    ]]]);
};
