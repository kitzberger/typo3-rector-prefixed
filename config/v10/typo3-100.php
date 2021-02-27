<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210227;

use Rector\Renaming\Rector\Namespace_\RenameNamespaceRector;
use Ssch\TYPO3Rector\Rector\v10\v0\BackendUtilityGetViewDomainToPageRouterRector;
use Ssch\TYPO3Rector\Rector\v10\v0\ChangeDefaultCachingFrameworkNamesRector;
use Ssch\TYPO3Rector\Rector\v10\v0\ConfigurationManagerAddControllerConfigurationMethodRector;
use Ssch\TYPO3Rector\Rector\v10\v0\ForceTemplateParsingInTsfeAndTemplateServiceRector;
use Ssch\TYPO3Rector\Rector\v10\v0\RefactorIdnaEncodeMethodToNativeFunctionRector;
use Ssch\TYPO3Rector\Rector\v10\v0\RemoveFormatConstantsEmailFinisherRector;
use Ssch\TYPO3Rector\Rector\v10\v0\RemovePropertyExtensionNameRector;
use Ssch\TYPO3Rector\Rector\v10\v0\SetSystemLocaleFromSiteLanguageRector;
use Ssch\TYPO3Rector\Rector\v10\v0\UseControllerClassesInExtbasePluginsAndModulesRector;
use Ssch\TYPO3Rector\Rector\v10\v0\UseMetaDataAspectRector;
use Ssch\TYPO3Rector\Rector\v10\v0\UseNativePhpHex2binMethodRector;
use Ssch\TYPO3Rector\Rector\v10\v0\UseTwoLetterIsoCodeFromSiteLanguageRector;
use Typo3RectorPrefix20210227\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210227\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $containerConfigurator->import(__DIR__ . '/../services.php');
    $services = $containerConfigurator->services();
    $services->set(\Ssch\TYPO3Rector\Rector\v10\v0\RemovePropertyExtensionNameRector::class);
    $services->set(\Ssch\TYPO3Rector\Rector\v10\v0\UseNativePhpHex2binMethodRector::class);
    $services->set(\Ssch\TYPO3Rector\Rector\v10\v0\RefactorIdnaEncodeMethodToNativeFunctionRector::class);
    $services->set('rename_namespace_backend_controller_file_to_filelist_controller_file')->class(\Rector\Renaming\Rector\Namespace_\RenameNamespaceRector::class)->call('configure', [[\Rector\Renaming\Rector\Namespace_\RenameNamespaceRector::OLD_TO_NEW_NAMESPACES => ['TYPO3\\CMS\\Backend\\Controller\\File' => 'TYPO3\\CMS\\Filelist\\Controller\\File']]]);
    $services->set(\Ssch\TYPO3Rector\Rector\v10\v0\UseMetaDataAspectRector::class);
    $services->set(\Ssch\TYPO3Rector\Rector\v10\v0\ForceTemplateParsingInTsfeAndTemplateServiceRector::class);
    $services->set(\Ssch\TYPO3Rector\Rector\v10\v0\BackendUtilityGetViewDomainToPageRouterRector::class);
    $services->set(\Ssch\TYPO3Rector\Rector\v10\v0\SetSystemLocaleFromSiteLanguageRector::class);
    $services->set(\Ssch\TYPO3Rector\Rector\v10\v0\ConfigurationManagerAddControllerConfigurationMethodRector::class);
    $services->set(\Ssch\TYPO3Rector\Rector\v10\v0\RemoveFormatConstantsEmailFinisherRector::class);
    $services->set(\Ssch\TYPO3Rector\Rector\v10\v0\UseTwoLetterIsoCodeFromSiteLanguageRector::class);
    $services->set(\Ssch\TYPO3Rector\Rector\v10\v0\UseControllerClassesInExtbasePluginsAndModulesRector::class);
    $services->set(\Ssch\TYPO3Rector\Rector\v10\v0\ChangeDefaultCachingFrameworkNamesRector::class);
};
