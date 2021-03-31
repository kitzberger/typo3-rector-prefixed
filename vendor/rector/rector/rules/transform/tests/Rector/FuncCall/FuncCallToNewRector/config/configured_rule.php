<?php

namespace Typo3RectorPrefix20210331;

use Rector\Transform\Rector\FuncCall\FuncCallToNewRector;
use Typo3RectorPrefix20210331\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210331\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\Transform\Rector\FuncCall\FuncCallToNewRector::class)->call('configure', [[\Rector\Transform\Rector\FuncCall\FuncCallToNewRector::FUNCTIONS_TO_NEWS => ['collection' => ['Collection']]]]);
};
