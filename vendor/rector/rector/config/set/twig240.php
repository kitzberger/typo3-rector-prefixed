<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210228;

use Typo3RectorPrefix20210228\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210228\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $containerConfigurator->import(__DIR__ . '/twig-underscore-to-namespace.php');
};
