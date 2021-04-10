<?php

namespace Typo3RectorPrefix20210410;

use Rector\Removing\Rector\Class_\RemoveTraitRector;
use Rector\Tests\Removing\Rector\Class_\RemoveTraitRector\Source\TraitToBeRemoved;
use Typo3RectorPrefix20210410\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210410\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\Removing\Rector\Class_\RemoveTraitRector::class)->call('configure', [[\Rector\Removing\Rector\Class_\RemoveTraitRector::TRAITS_TO_REMOVE => [\Rector\Tests\Removing\Rector\Class_\RemoveTraitRector\Source\TraitToBeRemoved::class]]]);
};
