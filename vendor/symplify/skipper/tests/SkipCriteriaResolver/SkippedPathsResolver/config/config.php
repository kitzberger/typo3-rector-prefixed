<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210408;

use Typo3RectorPrefix20210408\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Typo3RectorPrefix20210408\Symplify\Skipper\ValueObject\Option;
return static function (\Typo3RectorPrefix20210408\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $parameters = $containerConfigurator->parameters();
    $parameters->set(\Typo3RectorPrefix20210408\Symplify\Skipper\ValueObject\Option::SKIP, [
        // windows slashes
        __DIR__ . '\\non-existing-path',
        __DIR__ . '/../Fixture',
        '*\\Mask\\*',
    ]);
};
