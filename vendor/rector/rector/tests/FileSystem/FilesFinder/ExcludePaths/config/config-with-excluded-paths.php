<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210413;

use Rector\Core\Configuration\Option;
use Typo3RectorPrefix20210413\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210413\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $parameters = $containerConfigurator->parameters();
    $parameters->set(\Rector\Core\Configuration\Option::SKIP, ['*/ShouldBeExcluded/*']);
};
