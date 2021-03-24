<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210324;

use Ssch\TYPO3Rector\Rector\v9\v0\RemoveOptionLocalizeChildrenAtParentLocalizationRector;
use Typo3RectorPrefix20210324\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210324\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $containerConfigurator->import(__DIR__ . '/../services.php');
    $services = $containerConfigurator->services();
    $services->set(\Ssch\TYPO3Rector\Rector\v9\v0\RemoveOptionLocalizeChildrenAtParentLocalizationRector::class);
};
