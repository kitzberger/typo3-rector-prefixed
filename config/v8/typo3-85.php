<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210302;

use Rector\Renaming\Rector\MethodCall\RenameMethodRector;
use Rector\Renaming\Rector\StaticCall\RenameStaticMethodRector;
use Rector\Renaming\ValueObject\MethodCallRename;
use Rector\Renaming\ValueObject\RenameStaticMethod;
use Ssch\TYPO3Rector\Rector\v8\v5\CharsetConverterToMultiByteFunctionsRector;
use Typo3RectorPrefix20210302\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symplify\SymfonyPhpConfig\ValueObjectInliner;
use TYPO3\CMS\Backend\Clipboard\ClipBoard;
use TYPO3\CMS\Core\Utility\ArrayUtility as CoreArrayUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Utility\ArrayUtility;
return static function (\Typo3RectorPrefix20210302\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $containerConfigurator->import(__DIR__ . '/../services.php');
    $services = $containerConfigurator->services();
    $services->set('clip_board_print_content_from_tab_to_get_content_from_tab')->class(\Rector\Renaming\Rector\MethodCall\RenameMethodRector::class)->call('configure', [[\Rector\Renaming\Rector\MethodCall\RenameMethodRector::METHOD_CALL_RENAMES => \Symplify\SymfonyPhpConfig\ValueObjectInliner::inline([new \Rector\Renaming\ValueObject\MethodCallRename(\TYPO3\CMS\Backend\Clipboard\ClipBoard::class, 'printContentFromTab', 'getContentFromTab')])]]);
    $services->set(\Ssch\TYPO3Rector\Rector\v8\v5\CharsetConverterToMultiByteFunctionsRector::class);
    $services->set('extbase_array_utility_methods_to_core_array_utility_methods')->class(\Rector\Renaming\Rector\StaticCall\RenameStaticMethodRector::class)->call('configure', [[\Rector\Renaming\Rector\StaticCall\RenameStaticMethodRector::OLD_TO_NEW_METHODS_BY_CLASSES => \Symplify\SymfonyPhpConfig\ValueObjectInliner::inline([new \Rector\Renaming\ValueObject\RenameStaticMethod(\TYPO3\CMS\Extbase\Utility\ArrayUtility::class, 'integerExplode', \TYPO3\CMS\Core\Utility\GeneralUtility::class, 'intExplode'), new \Rector\Renaming\ValueObject\RenameStaticMethod(\TYPO3\CMS\Extbase\Utility\ArrayUtility::class, 'trimExplode', \TYPO3\CMS\Core\Utility\GeneralUtility::class, 'trimExplode'), new \Rector\Renaming\ValueObject\RenameStaticMethod(\TYPO3\CMS\Extbase\Utility\ArrayUtility::class, 'getValueByPath', \TYPO3\CMS\Core\Utility\ArrayUtility::class, 'getValueByPath'), new \Rector\Renaming\ValueObject\RenameStaticMethod(\TYPO3\CMS\Extbase\Utility\ArrayUtility::class, 'setValueByPath', \TYPO3\CMS\Core\Utility\ArrayUtility::class, 'setValueByPath'), new \Rector\Renaming\ValueObject\RenameStaticMethod(\TYPO3\CMS\Extbase\Utility\ArrayUtility::class, 'unsetValueByPath', \TYPO3\CMS\Core\Utility\ArrayUtility::class, 'removeByPath'), new \Rector\Renaming\ValueObject\RenameStaticMethod(\TYPO3\CMS\Extbase\Utility\ArrayUtility::class, 'sortArrayWithIntegerKeys', \TYPO3\CMS\Core\Utility\ArrayUtility::class, 'sortArrayWithIntegerKeys')])]]);
};
