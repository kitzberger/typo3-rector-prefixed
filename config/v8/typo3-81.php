<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210330;

use Ssch\TYPO3Rector\Rector\v8\v1\Array2XmlCsToArray2XmlRector;
use Ssch\TYPO3Rector\Rector\v8\v1\RefactorDbConstantsRector;
use Ssch\TYPO3Rector\Rector\v8\v1\TypoScriptFrontendControllerCharsetConverterRector;
use Typo3RectorPrefix20210330\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210330\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $containerConfigurator->import(__DIR__ . '/../services.php');
    $services = $containerConfigurator->services();
    $services->set(\Ssch\TYPO3Rector\Rector\v8\v1\RefactorDbConstantsRector::class);
    $services->set(\Ssch\TYPO3Rector\Rector\v8\v1\Array2XmlCsToArray2XmlRector::class);
    $services->set(\Ssch\TYPO3Rector\Rector\v8\v1\TypoScriptFrontendControllerCharsetConverterRector::class);
};
