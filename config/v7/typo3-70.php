<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210321;

use Rector\Renaming\Rector\MethodCall\RenameMethodRector;
use Rector\Renaming\Rector\Name\RenameClassRector;
use Rector\Renaming\Rector\StaticCall\RenameStaticMethodRector;
use Rector\Renaming\ValueObject\MethodCallRename;
use Rector\Renaming\ValueObject\RenameStaticMethod;
use Ssch\TYPO3Rector\Rector\v7\v0\RemoveMethodCallConnectDbRector;
use Ssch\TYPO3Rector\Rector\v7\v0\RemoveMethodCallLoadTcaRector;
use Ssch\TYPO3Rector\Rector\v7\v0\TypeHandlingServiceToTypeHandlingUtilityRector;
use Typo3RectorPrefix20210321\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symplify\SymfonyPhpConfig\ValueObjectInliner;
use TYPO3\CMS\Backend\Template\BigDocumentTemplate;
use TYPO3\CMS\Backend\Template\DocumentTemplate;
use TYPO3\CMS\Backend\Template\MediumDocumentTemplate;
use TYPO3\CMS\Backend\Template\SmallDocumentTemplate;
use TYPO3\CMS\Backend\Template\StandardDocumentTemplate;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Utility\VersionNumberUtility;
use TYPO3\CMS\Extbase\Object\ObjectManager;
use TYPO3\CMS\Extbase\Persistence\Generic\Typo3QuerySettings;
return static function (\Typo3RectorPrefix20210321\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $containerConfigurator->import(__DIR__ . '/../services.php');
    $services = $containerConfigurator->services();
    $services->set(\Ssch\TYPO3Rector\Rector\v7\v0\RemoveMethodCallConnectDbRector::class);
    $services->set(\Ssch\TYPO3Rector\Rector\v7\v0\RemoveMethodCallLoadTcaRector::class);
    $services->set('rename_class_templates_to_document_template')->class(\Rector\Renaming\Rector\Name\RenameClassRector::class)->call('configure', [[\Rector\Renaming\Rector\Name\RenameClassRector::OLD_TO_NEW_CLASSES => [\TYPO3\CMS\Backend\Template\MediumDocumentTemplate::class => \TYPO3\CMS\Backend\Template\DocumentTemplate::class, \TYPO3\CMS\Backend\Template\SmallDocumentTemplate::class => \TYPO3\CMS\Backend\Template\DocumentTemplate::class, \TYPO3\CMS\Backend\Template\StandardDocumentTemplate::class => \TYPO3\CMS\Backend\Template\DocumentTemplate::class, \TYPO3\CMS\Backend\Template\BigDocumentTemplate::class => \TYPO3\CMS\Backend\Template\DocumentTemplate::class]]]);
    $services->set('rename_static_method_generalUtility_int_from_ver_to_convert_version_number_to_integer')->class(\Rector\Renaming\Rector\StaticCall\RenameStaticMethodRector::class)->call('configure', [[\Rector\Renaming\Rector\StaticCall\RenameStaticMethodRector::OLD_TO_NEW_METHODS_BY_CLASSES => \Symplify\SymfonyPhpConfig\ValueObjectInliner::inline([new \Rector\Renaming\ValueObject\RenameStaticMethod(\TYPO3\CMS\Core\Utility\GeneralUtility::class, 'int_from_ver', \TYPO3\CMS\Core\Utility\VersionNumberUtility::class, 'convertVersionNumberToInteger')])]]);
    $services->set(\Ssch\TYPO3Rector\Rector\v7\v0\TypeHandlingServiceToTypeHandlingUtilityRector::class);
    $services->set('rename_method_typo3_query_settings')->class(\Rector\Renaming\Rector\MethodCall\RenameMethodRector::class)->call('configure', [[\Rector\Renaming\Rector\MethodCall\RenameMethodRector::METHOD_CALL_RENAMES => \Symplify\SymfonyPhpConfig\ValueObjectInliner::inline([new \Rector\Renaming\ValueObject\MethodCallRename(\TYPO3\CMS\Extbase\Persistence\Generic\Typo3QuerySettings::class, 'setSysLanguageUid', 'setLanguageUid'), new \Rector\Renaming\ValueObject\MethodCallRename(\TYPO3\CMS\Extbase\Persistence\Generic\Typo3QuerySettings::class, 'getSysLanguageUid', 'getLanguageUid'), new \Rector\Renaming\ValueObject\MethodCallRename(\TYPO3\CMS\Extbase\Object\ObjectManager::class, 'create', 'get')])]]);
};
