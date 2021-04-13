<?php

namespace Typo3RectorPrefix20210413;

use Rector\Transform\Rector\String_\ToStringToMethodCallRector;
use Typo3RectorPrefix20210413\Symfony\Component\Config\ConfigCache;
use Typo3RectorPrefix20210413\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210413\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\Transform\Rector\String_\ToStringToMethodCallRector::class)->call('configure', [[\Rector\Transform\Rector\String_\ToStringToMethodCallRector::METHOD_NAMES_BY_TYPE => [\Typo3RectorPrefix20210413\Symfony\Component\Config\ConfigCache::class => 'getPath']]]);
};
