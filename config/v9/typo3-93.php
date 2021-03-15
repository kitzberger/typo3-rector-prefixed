<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210315;

use Rector\Renaming\Rector\MethodCall\RenameMethodRector;
use Rector\Renaming\ValueObject\MethodCallRename;
use Ssch\TYPO3Rector\Rector\v9\v3\BackendUserAuthenticationSimplelogRector;
use Ssch\TYPO3Rector\Rector\v9\v3\BackendUtilityGetModuleUrlRector;
use Ssch\TYPO3Rector\Rector\v9\v3\CopyMethodGetPidForModTSconfigRector;
use Ssch\TYPO3Rector\Rector\v9\v3\MoveLanguageFilesFromExtensionLangRector;
use Ssch\TYPO3Rector\Rector\v9\v3\PropertyUserTsToMethodGetTsConfigOfBackendUserAuthenticationRector;
use Ssch\TYPO3Rector\Rector\v9\v3\RefactorTsConfigRelatedMethodsRector;
use Ssch\TYPO3Rector\Rector\v9\v3\RemoveColPosParameterRector;
use Ssch\TYPO3Rector\Rector\v9\v3\UseMethodGetPageShortcutDirectlyFromSysPageRector;
use Ssch\TYPO3Rector\Rector\v9\v3\ValidateAnnotationRector;
use Typo3RectorPrefix20210315\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symplify\SymfonyPhpConfig\ValueObjectInliner;
use TYPO3\CMS\Backend\Controller\Page\LocalizationController;
use TYPO3\CMS\Extbase\Mvc\Controller\Argument;
use TYPO3\CMS\Extbase\Mvc\Controller\Arguments;
return static function (\Typo3RectorPrefix20210315\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $containerConfigurator->import(__DIR__ . '/../services.php');
    $services = $containerConfigurator->services();
    $services->set(\Ssch\TYPO3Rector\Rector\v9\v3\RemoveColPosParameterRector::class);
    $services->set(\Ssch\TYPO3Rector\Rector\v9\v3\ValidateAnnotationRector::class);
    $services->set('localization_controller_get_used_languages_in_page_and_column_to_get_used_languages_in_page')->class(\Rector\Renaming\Rector\MethodCall\RenameMethodRector::class)->call('configure', [[\Rector\Renaming\Rector\MethodCall\RenameMethodRector::METHOD_CALL_RENAMES => \Symplify\SymfonyPhpConfig\ValueObjectInliner::inline([new \Rector\Renaming\ValueObject\MethodCallRename(\TYPO3\CMS\Backend\Controller\Page\LocalizationController::class, 'getUsedLanguagesInPageAndColumn', 'getUsedLanguagesInPage')])]]);
    $services->set(\Ssch\TYPO3Rector\Rector\v9\v3\BackendUtilityGetModuleUrlRector::class);
    $services->set(\Ssch\TYPO3Rector\Rector\v9\v3\PropertyUserTsToMethodGetTsConfigOfBackendUserAuthenticationRector::class);
    $services->set(\Ssch\TYPO3Rector\Rector\v9\v3\UseMethodGetPageShortcutDirectlyFromSysPageRector::class);
    $services->set(\Ssch\TYPO3Rector\Rector\v9\v3\CopyMethodGetPidForModTSconfigRector::class);
    $services->set(\Ssch\TYPO3Rector\Rector\v9\v3\BackendUserAuthenticationSimplelogRector::class);
    $services->set(\Ssch\TYPO3Rector\Rector\v9\v3\MoveLanguageFilesFromExtensionLangRector::class);
    $services->set('get_validation_results_to_validate')->class(\Rector\Renaming\Rector\MethodCall\RenameMethodRector::class)->call('configure', [[\Rector\Renaming\Rector\MethodCall\RenameMethodRector::METHOD_CALL_RENAMES => \Symplify\SymfonyPhpConfig\ValueObjectInliner::inline([new \Rector\Renaming\ValueObject\MethodCallRename(\TYPO3\CMS\Extbase\Mvc\Controller\Argument::class, 'getValidationResults', 'validate'), new \Rector\Renaming\ValueObject\MethodCallRename(\TYPO3\CMS\Extbase\Mvc\Controller\Arguments::class, 'getValidationResults', 'validate')])]]);
    $services->set(\Ssch\TYPO3Rector\Rector\v9\v3\RefactorTsConfigRelatedMethodsRector::class);
};
