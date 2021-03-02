<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210302;

use Rector\Renaming\Rector\MethodCall\RenameMethodRector;
use Rector\Renaming\Rector\Name\RenameClassRector;
use Rector\Renaming\ValueObject\MethodCallRename;
use Rector\Renaming\ValueObject\MethodCallRenameWithArrayKey;
use Typo3RectorPrefix20210302\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symplify\SymfonyPhpConfig\ValueObjectInliner;
# https://github.com/symfony/symfony/blob/master/UPGRADE-4.1.md
return static function (\Typo3RectorPrefix20210302\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\Renaming\Rector\MethodCall\RenameMethodRector::class)->call('configure', [[\Rector\Renaming\Rector\MethodCall\RenameMethodRector::METHOD_CALL_RENAMES => \Symplify\SymfonyPhpConfig\ValueObjectInliner::inline([
        # https://github.com/symfony/symfony/commit/463f986c28a497571967e37c1314e9911f1ef6ba
        new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210302\\Symfony\\Component\\Console\\Helper\\TableStyle', 'setHorizontalBorderChar', 'setHorizontalBorderChars'),
        # https://github.com/symfony/symfony/commit/463f986c28a497571967e37c1314e9911f1ef6ba
        new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210302\\Symfony\\Component\\Console\\Helper\\TableStyle', 'setVerticalBorderChar', 'setVerticalBorderChars'),
        # https://github.com/symfony/symfony/commit/463f986c28a497571967e37c1314e9911f1ef6ba
        new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210302\\Symfony\\Component\\Console\\Helper\\TableStyle', 'setCrossingChar', 'setDefaultCrossingChar'),
        new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210302\\Symfony\\Component\\HttpFoundation\\File\\UploadedFile', 'getClientSize', 'getSize'),
        new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210302\\Symfony\\Component\\Workflow\\DefinitionBuilder', 'reset', 'clear'),
        new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210302\\Symfony\\Component\\Workflow\\DefinitionBuilder', 'add', 'addWorkflow'),
        # https://github.com/symfony/symfony/commit/463f986c28a497571967e37c1314e9911f1ef6ba
        new \Rector\Renaming\ValueObject\MethodCallRenameWithArrayKey(
            'Typo3RectorPrefix20210302\\Symfony\\Component\\Console\\Helper\\TableStyle',
            'getVerticalBorderChar',
            # special case to "getVerticalBorderChar" → "getBorderChars()[3]"
            'getBorderChars',
            3
        ),
        # https://github.com/symfony/symfony/commit/463f986c28a497571967e37c1314e9911f1ef6ba
        new \Rector\Renaming\ValueObject\MethodCallRenameWithArrayKey('Typo3RectorPrefix20210302\\Symfony\\Component\\Console\\Helper\\TableStyle', 'getHorizontalBorderChar', 'getBorderChars', 2),
    ])]]);
    $services->set(\Rector\Renaming\Rector\Name\RenameClassRector::class)->call('configure', [[\Rector\Renaming\Rector\Name\RenameClassRector::OLD_TO_NEW_CLASSES => [
        # https://github.com/symfony/symfony/commit/07dd09db59e2f2a86a291d00d978169d9059e307
        'Typo3RectorPrefix20210302\\Symfony\\Bundle\\FrameworkBundle\\DataCollector\\RequestDataCollector' => 'Typo3RectorPrefix20210302\\Symfony\\Component\\HttpKernel\\DataCollector\\RequestDataCollector',
        'Typo3RectorPrefix20210302\\Symfony\\Component\\Workflow\\SupportStrategy\\SupportStrategyInterface' => 'Typo3RectorPrefix20210302\\Symfony\\Component\\Workflow\\SupportStrategy\\WorkflowSupportStrategyInterface',
        'Typo3RectorPrefix20210302\\Symfony\\Component\\Workflow\\SupportStrategy\\ClassInstanceSupportStrategy' => 'Typo3RectorPrefix20210302\\Symfony\\Component\\Workflow\\SupportStrategy\\InstanceOfSupportStrategy',
    ]]]);
};
