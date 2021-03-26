<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210326;

use Rector\Renaming\Rector\MethodCall\RenameMethodRector;
use Rector\Renaming\Rector\Namespace_\RenameNamespaceRector;
use Rector\Renaming\ValueObject\MethodCallRename;
use Rector\Transform\Rector\MethodCall\MethodCallToStaticCallRector;
use Rector\Transform\ValueObject\MethodCallToStaticCall;
use Ssch\TYPO3Rector\Rector\General\ExtEmConfRector;
use Ssch\TYPO3Rector\Rector\v10\v0\BackendUtilityGetViewDomainToPageRouterRector;
use Ssch\TYPO3Rector\Rector\v10\v0\ChangeDefaultCachingFrameworkNamesRector;
use Ssch\TYPO3Rector\Rector\v10\v0\ConfigurationManagerAddControllerConfigurationMethodRector;
use Ssch\TYPO3Rector\Rector\v10\v0\ForceTemplateParsingInTsfeAndTemplateServiceRector;
use Ssch\TYPO3Rector\Rector\v10\v0\RefactorIdnaEncodeMethodToNativeFunctionRector;
use Ssch\TYPO3Rector\Rector\v10\v0\RemoveFormatConstantsEmailFinisherRector;
use Ssch\TYPO3Rector\Rector\v10\v0\RemovePropertyExtensionNameRector;
use Ssch\TYPO3Rector\Rector\v10\v0\SetSystemLocaleFromSiteLanguageRector;
use Ssch\TYPO3Rector\Rector\v10\v0\SwiftMailerBasedMailMessageToMailerBasedMessageRector;
use Ssch\TYPO3Rector\Rector\v10\v0\UseControllerClassesInExtbasePluginsAndModulesRector;
use Ssch\TYPO3Rector\Rector\v10\v0\UseMetaDataAspectRector;
use Ssch\TYPO3Rector\Rector\v10\v0\UseNativePhpHex2binMethodRector;
use Ssch\TYPO3Rector\Rector\v10\v0\UseTwoLetterIsoCodeFromSiteLanguageRector;
use Typo3RectorPrefix20210326\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symplify\SymfonyPhpConfig\ValueObjectInliner;
use TYPO3\CMS\Backend\Utility\BackendUtility;
use TYPO3\CMS\Recordlist\RecordList\DatabaseRecordList;
return static function (\Typo3RectorPrefix20210326\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
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
    $services->set(\Ssch\TYPO3Rector\Rector\General\ExtEmConfRector::class)->call('configure', [[\Ssch\TYPO3Rector\Rector\General\ExtEmConfRector::ADDITIONAL_VALUES_TO_BE_REMOVED => ['createDirs', 'uploadfolder']]]);
    $services->set(\Ssch\TYPO3Rector\Rector\v10\v0\SwiftMailerBasedMailMessageToMailerBasedMessageRector::class);
    $services->set('rename_database_record_list_thumb_code_backend_utility_thumb_code')->class(\Rector\Transform\Rector\MethodCall\MethodCallToStaticCallRector::class)->call('configure', [[\Rector\Transform\Rector\MethodCall\MethodCallToStaticCallRector::METHOD_CALLS_TO_STATIC_CALLS => \Symplify\SymfonyPhpConfig\ValueObjectInliner::inline([new \Rector\Transform\ValueObject\MethodCallToStaticCall(\TYPO3\CMS\Recordlist\RecordList\DatabaseRecordList::class, 'thumbCode', \TYPO3\CMS\Backend\Utility\BackendUtility::class, 'thumbCode')])]]);
    $services->set('rename_database_record_list_request_uri_to_list_url')->class(\Rector\Renaming\Rector\MethodCall\RenameMethodRector::class)->call('configure', [[\Rector\Renaming\Rector\MethodCall\RenameMethodRector::METHOD_CALL_RENAMES => \Symplify\SymfonyPhpConfig\ValueObjectInliner::inline([new \Rector\Renaming\ValueObject\MethodCallRename(\TYPO3\CMS\Recordlist\RecordList\DatabaseRecordList::class, 'requestUri', 'listURL')])]]);
};
