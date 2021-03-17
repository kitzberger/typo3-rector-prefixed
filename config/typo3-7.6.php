<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210317;

use Typo3RectorPrefix20210317\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210317\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $containerConfigurator->import(__DIR__ . '/general/*');
    $containerConfigurator->import(__DIR__ . '/v7/*');
};
