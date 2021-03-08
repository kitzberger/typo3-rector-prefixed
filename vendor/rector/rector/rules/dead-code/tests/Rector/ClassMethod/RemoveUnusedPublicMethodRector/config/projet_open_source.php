<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210308;

use Rector\Core\Configuration\Option;
use Rector\Core\ValueObject\ProjectType;
use Rector\DeadCode\Rector\ClassMethod\RemoveUnusedPublicMethodRector;
use Typo3RectorPrefix20210308\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210308\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $parameters = $containerConfigurator->parameters();
    $parameters->set(\Rector\Core\Configuration\Option::PROJECT_TYPE, \Rector\Core\ValueObject\ProjectType::OPEN_SOURCE);
    $services = $containerConfigurator->services();
    $services->set(\Rector\DeadCode\Rector\ClassMethod\RemoveUnusedPublicMethodRector::class);
};
