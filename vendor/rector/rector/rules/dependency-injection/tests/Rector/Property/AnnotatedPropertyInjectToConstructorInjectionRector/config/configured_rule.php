<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210326;

use Rector\Core\Configuration\Option;
use Rector\DependencyInjection\Rector\Property\AnnotatedPropertyInjectToConstructorInjectionRector;
use Typo3RectorPrefix20210326\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210326\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $parameters = $containerConfigurator->parameters();
    $parameters->set(\Rector\Core\Configuration\Option::SYMFONY_CONTAINER_XML_PATH_PARAMETER, __DIR__ . '/../../../../../../symfony/tests/Rector/MethodCall/GetToConstructorInjectionRector/xml/services.xml');
    $services = $containerConfigurator->services();
    $services->set(\Rector\DependencyInjection\Rector\Property\AnnotatedPropertyInjectToConstructorInjectionRector::class);
};
