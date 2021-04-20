<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210420;

use Rector\Defluent\Rector\MethodCall\NewFluentChainMethodCallToNonFluentRector;
use Typo3RectorPrefix20210420\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210420\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\Defluent\Rector\MethodCall\NewFluentChainMethodCallToNonFluentRector::class);
};
