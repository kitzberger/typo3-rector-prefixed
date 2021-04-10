<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210410;

use Ssch\TYPO3Rector\Rector\v8\v2\UseHtmlSpecialCharsDirectlyForTranslationRector;
use Typo3RectorPrefix20210410\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210410\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $containerConfigurator->import(__DIR__ . '/../config.php');
    $services = $containerConfigurator->services();
    $services->set(\Ssch\TYPO3Rector\Rector\v8\v2\UseHtmlSpecialCharsDirectlyForTranslationRector::class);
};
