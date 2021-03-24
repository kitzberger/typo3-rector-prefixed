<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210324;

use Rector\Core\Configuration\Option;
use Rector\Symfony3\Rector\MethodCall\StringFormTypeToClassRector;
use Typo3RectorPrefix20210324\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210324\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $parameters = $containerConfigurator->parameters();
    $parameters->set(\Rector\Core\Configuration\Option::SYMFONY_CONTAINER_XML_PATH_PARAMETER, __DIR__ . '/../Source/custom_container.xml');
    $services = $containerConfigurator->services();
    $services->set(\Rector\Symfony3\Rector\MethodCall\StringFormTypeToClassRector::class);
};
