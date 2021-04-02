<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210402;

use Rector\Core\Configuration\Option;
use Rector\Core\ValueObject\ProjectType;
use Rector\Privatization\Rector\ClassMethod\MakeOnlyUsedByChildrenProtectedRector;
use Typo3RectorPrefix20210402\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210402\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $parameters = $containerConfigurator->parameters();
    $parameters->set(\Rector\Core\Configuration\Option::PROJECT_TYPE, \Rector\Core\ValueObject\ProjectType::OPEN_SOURCE);
    $services = $containerConfigurator->services();
    $services->set(\Rector\Privatization\Rector\ClassMethod\MakeOnlyUsedByChildrenProtectedRector::class);
};
