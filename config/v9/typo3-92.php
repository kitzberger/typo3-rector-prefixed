<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210418;

use Rector\Renaming\Rector\Name\RenameClassRector;
use Ssch\TYPO3Rector\Rector\v9\v2\GeneralUtilityGetUrlRequestHeadersRector;
use Ssch\TYPO3Rector\Rector\v9\v2\PageNotFoundAndErrorHandlingRector;
use Ssch\TYPO3Rector\Rector\v9\v2\RenameMethodCallToEnvironmentMethodCallRector;
use Typo3RectorPrefix20210418\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use TYPO3\CMS\Core\Cache\Frontend\StringFrontend;
use TYPO3\CMS\Core\Cache\Frontend\VariableFrontend;
return static function (\Typo3RectorPrefix20210418\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $containerConfigurator->import(__DIR__ . '/../config.php');
    $services = $containerConfigurator->services();
    $services->set(\Ssch\TYPO3Rector\Rector\v9\v2\RenameMethodCallToEnvironmentMethodCallRector::class);
    $services->set('string_frontend_to_variable_frontend')->class(\Rector\Renaming\Rector\Name\RenameClassRector::class)->call('configure', [[\Rector\Renaming\Rector\Name\RenameClassRector::OLD_TO_NEW_CLASSES => [\TYPO3\CMS\Core\Cache\Frontend\StringFrontend::class => \TYPO3\CMS\Core\Cache\Frontend\VariableFrontend::class]]]);
    $services->set(\Ssch\TYPO3Rector\Rector\v9\v2\GeneralUtilityGetUrlRequestHeadersRector::class);
    $services->set(\Ssch\TYPO3Rector\Rector\v9\v2\PageNotFoundAndErrorHandlingRector::class);
};
