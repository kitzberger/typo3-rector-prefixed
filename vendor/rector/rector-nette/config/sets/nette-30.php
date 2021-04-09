<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210409;

use Rector\Arguments\Rector\ClassMethod\ArgumentDefaultValueReplacerRector;
use Rector\Arguments\ValueObject\ArgumentDefaultValueReplacer;
use Rector\DeadCode\Rector\StaticCall\RemoveParentCallWithoutParentRector;
use Rector\Nette\Rector\ArrayDimFetch\ChangeFormArrayAccessToAnnotatedControlVariableRector;
use Rector\Nette\Rector\Class_\MoveFinalGetUserToCheckRequirementsClassMethodRector;
use Rector\Nette\Rector\ClassMethod\RemoveParentAndNameFromComponentConstructorRector;
use Rector\Nette\Rector\MethodCall\AddNextrasDatePickerToDateControlRector;
use Rector\Nette\Rector\MethodCall\ConvertAddUploadWithThirdArgumentTrueToAddMultiUploadRector;
use Rector\Nette\Rector\MethodCall\MagicHtmlCallToAppendAttributeRector;
use Rector\Nette\Rector\MethodCall\MergeDefaultsInGetConfigCompilerExtensionRector;
use Rector\Nette\Rector\MethodCall\RequestGetCookieDefaultArgumentToCoalesceRector;
use Rector\Renaming\Rector\ClassConstFetch\RenameClassConstFetchRector;
use Rector\Renaming\Rector\MethodCall\RenameMethodRector;
use Rector\Renaming\Rector\Name\RenameClassRector;
use Rector\Renaming\ValueObject\MethodCallRename;
use Rector\Renaming\ValueObject\RenameClassConstFetch;
use Rector\Transform\Rector\StaticCall\StaticCallToMethodCallRector;
use Rector\Transform\ValueObject\StaticCallToMethodCall;
use Rector\TypeDeclaration\Rector\MethodCall\FormerNullableArgumentToScalarTypedRector;
use Typo3RectorPrefix20210409\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symplify\SymfonyPhpConfig\ValueObjectInliner;
return static function (\Typo3RectorPrefix20210409\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $containerConfigurator->import(__DIR__ . '/nette-30/nette-30-composer.php');
    $containerConfigurator->import(__DIR__ . '/nette-30/nette-30-dependency-injection.php');
    $containerConfigurator->import(__DIR__ . '/nette-30/nette-30-return-types.php');
    $containerConfigurator->import(__DIR__ . '/nette-30/nette-30-param-types.php');
    $services = $containerConfigurator->services();
    $services->set(\Rector\Nette\Rector\MethodCall\AddNextrasDatePickerToDateControlRector::class);
    $services->set(\Rector\Nette\Rector\ArrayDimFetch\ChangeFormArrayAccessToAnnotatedControlVariableRector::class);
    $services->set(\Rector\Nette\Rector\MethodCall\MergeDefaultsInGetConfigCompilerExtensionRector::class);
    // Control class has remove __construct(), e.g. https://github.com/Pixidos/GPWebPay/pull/16/files#diff-fdc8251950f85c5467c63c249df05786
    $services->set(\Rector\DeadCode\Rector\StaticCall\RemoveParentCallWithoutParentRector::class);
    // https://github.com/nette/utils/commit/d0041ba59f5d8bf1f5b3795fd76d43fb13ea2e15
    $services->set(\Rector\TypeDeclaration\Rector\MethodCall\FormerNullableArgumentToScalarTypedRector::class);
    $services->set(\Rector\Transform\Rector\StaticCall\StaticCallToMethodCallRector::class)->call('configure', [[\Rector\Transform\Rector\StaticCall\StaticCallToMethodCallRector::STATIC_CALLS_TO_METHOD_CALLS => \Symplify\SymfonyPhpConfig\ValueObjectInliner::inline([new \Rector\Transform\ValueObject\StaticCallToMethodCall('Typo3RectorPrefix20210409\\Nette\\Security\\Passwords', 'hash', 'Typo3RectorPrefix20210409\\Nette\\Security\\Passwords', 'hash'), new \Rector\Transform\ValueObject\StaticCallToMethodCall('Typo3RectorPrefix20210409\\Nette\\Security\\Passwords', 'verify', 'Typo3RectorPrefix20210409\\Nette\\Security\\Passwords', 'verify'), new \Rector\Transform\ValueObject\StaticCallToMethodCall('Typo3RectorPrefix20210409\\Nette\\Security\\Passwords', 'needsRehash', 'Typo3RectorPrefix20210409\\Nette\\Security\\Passwords', 'needsRehash')])]]);
    // https://github.com/contributte/event-dispatcher-extra/tree/v0.4.3 and higher
    $services->set(\Rector\Renaming\Rector\ClassConstFetch\RenameClassConstFetchRector::class)->call('configure', [[\Rector\Renaming\Rector\ClassConstFetch\RenameClassConstFetchRector::CLASS_CONSTANT_RENAME => \Symplify\SymfonyPhpConfig\ValueObjectInliner::inline([new \Rector\Renaming\ValueObject\RenameClassConstFetch('Typo3RectorPrefix20210409\\Contributte\\Events\\Extra\\Event\\Security\\LoggedInEvent', 'NAME', 'class'), new \Rector\Renaming\ValueObject\RenameClassConstFetch('Typo3RectorPrefix20210409\\Contributte\\Events\\Extra\\Event\\Security\\LoggedOutEvent', 'NAME', 'class'), new \Rector\Renaming\ValueObject\RenameClassConstFetch('Typo3RectorPrefix20210409\\Contributte\\Events\\Extra\\Event\\Application\\ShutdownEvent', 'NAME', 'class')])]]);
    $services->set(\Rector\Renaming\Rector\Name\RenameClassRector::class)->call('configure', [[\Rector\Renaming\Rector\Name\RenameClassRector::OLD_TO_NEW_CLASSES => [
        # nextras/forms was split into 2 packages
        'Typo3RectorPrefix20210409\\Nextras\\FormComponents\\Controls\\DatePicker' => 'Typo3RectorPrefix20210409\\Nextras\\FormComponents\\Controls\\DateControl',
        # @see https://github.com/nette/di/commit/a0d361192f8ac35f1d9f82aab7eb351e4be395ea
        'Typo3RectorPrefix20210409\\Nette\\DI\\ServiceDefinition' => 'Typo3RectorPrefix20210409\\Nette\\DI\\Definitions\\ServiceDefinition',
        'Typo3RectorPrefix20210409\\Nette\\DI\\Statement' => 'Typo3RectorPrefix20210409\\Nette\\DI\\Definitions\\Statement',
        'Typo3RectorPrefix20210409\\WebChemistry\\Forms\\Controls\\Multiplier' => 'Typo3RectorPrefix20210409\\Contributte\\FormMultiplier\\Multiplier',
    ]]]);
    $services->set(\Rector\Arguments\Rector\ClassMethod\ArgumentDefaultValueReplacerRector::class)->call('configure', [[\Rector\Arguments\Rector\ClassMethod\ArgumentDefaultValueReplacerRector::REPLACED_ARGUMENTS => \Symplify\SymfonyPhpConfig\ValueObjectInliner::inline([
        // json 2nd argument is now `int` typed
        new \Rector\Arguments\ValueObject\ArgumentDefaultValueReplacer('Typo3RectorPrefix20210409\\Nette\\Utils\\Json', 'decode', 1, \true, 'Nette\\Utils\\Json::FORCE_ARRAY'),
        // @see https://github.com/nette/forms/commit/574b97f9d5e7a902a224e57d7d584e7afc9fefec
        new \Rector\Arguments\ValueObject\ArgumentDefaultValueReplacer('Typo3RectorPrefix20210409\\Nette\\Forms\\Form', 'decode', 0, \true, 'array'),
    ])]]);
    $services->set(\Rector\Renaming\Rector\MethodCall\RenameMethodRector::class)->call('configure', [[\Rector\Renaming\Rector\MethodCall\RenameMethodRector::METHOD_CALL_RENAMES => \Symplify\SymfonyPhpConfig\ValueObjectInliner::inline([
        // see https://github.com/nette/forms/commit/b99385aa9d24d729a18f6397a414ea88eab6895a
        new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210409\\Nette\\Forms\\Controls\\BaseControl', 'setType', 'setHtmlType'),
        new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210409\\Nette\\Forms\\Controls\\BaseControl', 'setAttribute', 'setHtmlAttribute'),
        new \Rector\Renaming\ValueObject\MethodCallRename(
            'Typo3RectorPrefix20210409\\Nette\\DI\\Definitions\\ServiceDefinition',
            # see https://github.com/nette/di/commit/1705a5db431423fc610a6f339f88dead1b5dc4fb
            'setClass',
            'setType'
        ),
        new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210409\\Nette\\DI\\Definitions\\ServiceDefinition', 'getClass', 'getType'),
        new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210409\\Nette\\DI\\Definitions\\Definition', 'isAutowired', 'getAutowired'),
    ])]]);
    $services->set(\Rector\Nette\Rector\MethodCall\MagicHtmlCallToAppendAttributeRector::class);
    $services->set(\Rector\Nette\Rector\MethodCall\RequestGetCookieDefaultArgumentToCoalesceRector::class);
    $services->set(\Rector\Nette\Rector\ClassMethod\RemoveParentAndNameFromComponentConstructorRector::class);
    $services->set(\Rector\Nette\Rector\Class_\MoveFinalGetUserToCheckRequirementsClassMethodRector::class);
    $services->set(\Rector\Nette\Rector\MethodCall\ConvertAddUploadWithThirdArgumentTrueToAddMultiUploadRector::class);
};