<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210407;

use Rector\Symfony\Rector\Class_\ChangeFileLoaderInExtensionAndKernelRector;
use Typo3RectorPrefix20210407\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210407\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\Symfony\Rector\Class_\ChangeFileLoaderInExtensionAndKernelRector::class)->call('configure', [[\Rector\Symfony\Rector\Class_\ChangeFileLoaderInExtensionAndKernelRector::FROM => 'xml', \Rector\Symfony\Rector\Class_\ChangeFileLoaderInExtensionAndKernelRector::TO => 'yaml']]);
};
