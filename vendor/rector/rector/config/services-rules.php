<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

use Rector\Core\Configuration\Option;
use Rector\PSR4\Composer\PSR4NamespaceMatcher;
use Rector\PSR4\Contract\PSR4AutoloadNamespaceMatcherInterface;
use Typo3RectorPrefix20210423\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210423\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $parameters = $containerConfigurator->parameters();
    $parameters->set(\Rector\Core\Configuration\Option::TYPES_TO_REMOVE_STATIC_FROM, []);
    $services = $containerConfigurator->services();
    $services->defaults()->public()->autowire()->autoconfigure();
    // psr-4
    $services->alias(\Rector\PSR4\Contract\PSR4AutoloadNamespaceMatcherInterface::class, \Rector\PSR4\Composer\PSR4NamespaceMatcher::class);
    $services->load('Rector\\', __DIR__ . '/../rules')->exclude([__DIR__ . '/../rules/*/{ValueObject,Rector,Contract,Exception}']);
};
