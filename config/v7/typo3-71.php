<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210331;

use Ssch\TYPO3Rector\Rector\v7\v1\GetTemporaryImageWithTextRector;
use Typo3RectorPrefix20210331\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210331\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $containerConfigurator->import(__DIR__ . '/../services.php');
    $services = $containerConfigurator->services();
    $services->set(\Ssch\TYPO3Rector\Rector\v7\v1\GetTemporaryImageWithTextRector::class);
};
