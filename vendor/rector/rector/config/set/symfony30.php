<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210402;

use Rector\Renaming\Rector\ClassConstFetch\RenameClassConstFetchRector;
use Rector\Renaming\Rector\MethodCall\RenameMethodRector;
use Rector\Renaming\Rector\Name\RenameClassRector;
use Rector\Renaming\ValueObject\MethodCallRename;
use Rector\Renaming\ValueObject\RenameClassConstFetch;
use Rector\Symfony3\Rector\ClassMethod\FormTypeGetParentRector;
use Rector\Symfony3\Rector\ClassMethod\GetRequestRector;
use Rector\Symfony3\Rector\ClassMethod\RemoveDefaultGetBlockPrefixRector;
use Rector\Symfony3\Rector\MethodCall\CascadeValidationFormBuilderRector;
use Rector\Symfony3\Rector\MethodCall\ChangeCollectionTypeOptionNameFromTypeToEntryTypeRector;
use Rector\Symfony3\Rector\MethodCall\ChangeStringCollectionOptionToConstantRector;
use Rector\Symfony3\Rector\MethodCall\FormTypeInstanceToClassConstRector;
use Rector\Symfony3\Rector\MethodCall\OptionNameRector;
use Rector\Symfony3\Rector\MethodCall\ReadOnlyOptionToAttributeRector;
use Rector\Symfony3\Rector\MethodCall\StringFormTypeToClassRector;
use Typo3RectorPrefix20210402\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symplify\SymfonyPhpConfig\ValueObjectInliner;
return static function (\Typo3RectorPrefix20210402\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    # resources:
    # - https://github.com/symfony/symfony/blob/3.4/UPGRADE-3.0.md
    # php
    $services->set(\Rector\Symfony3\Rector\ClassMethod\GetRequestRector::class);
    $services->set(\Rector\Symfony3\Rector\ClassMethod\FormTypeGetParentRector::class);
    $services->set(\Rector\Symfony3\Rector\MethodCall\OptionNameRector::class);
    $services->set(\Rector\Symfony3\Rector\MethodCall\ReadOnlyOptionToAttributeRector::class);
    # forms
    $services->set(\Rector\Symfony3\Rector\MethodCall\FormTypeInstanceToClassConstRector::class);
    $services->set(\Rector\Symfony3\Rector\MethodCall\StringFormTypeToClassRector::class);
    $services->set(\Rector\Symfony3\Rector\MethodCall\CascadeValidationFormBuilderRector::class);
    $services->set(\Rector\Symfony3\Rector\ClassMethod\RemoveDefaultGetBlockPrefixRector::class);
    # forms - collection
    $services->set(\Rector\Symfony3\Rector\MethodCall\ChangeStringCollectionOptionToConstantRector::class);
    $services->set(\Rector\Symfony3\Rector\MethodCall\ChangeCollectionTypeOptionNameFromTypeToEntryTypeRector::class);
    $services->set(\Rector\Renaming\Rector\ClassConstFetch\RenameClassConstFetchRector::class)->call('configure', [[\Rector\Renaming\Rector\ClassConstFetch\RenameClassConstFetchRector::CLASS_CONSTANT_RENAME => \Symplify\SymfonyPhpConfig\ValueObjectInliner::inline([new \Rector\Renaming\ValueObject\RenameClassConstFetch('Typo3RectorPrefix20210402\\Symfony\\Component\\Form\\FormEvents', 'PRE_BIND', 'PRE_SUBMIT'), new \Rector\Renaming\ValueObject\RenameClassConstFetch('Typo3RectorPrefix20210402\\Symfony\\Component\\Form\\FormEvents', 'BIND', 'SUBMIT'), new \Rector\Renaming\ValueObject\RenameClassConstFetch('Typo3RectorPrefix20210402\\Symfony\\Component\\Form\\FormEvents', 'POST_BIND', 'POST_SUBMIT'), new \Rector\Renaming\ValueObject\RenameClassConstFetch('Typo3RectorPrefix20210402\\Symfony\\Component\\Form\\Extension\\Core\\DataTransformer', 'ROUND_HALFEVEN', 'ROUND_HALF_EVEN'), new \Rector\Renaming\ValueObject\RenameClassConstFetch('Typo3RectorPrefix20210402\\Symfony\\Component\\Form\\Extension\\Core\\DataTransformer', 'ROUND_HALFUP', 'ROUND_HALF_UP'), new \Rector\Renaming\ValueObject\RenameClassConstFetch('Typo3RectorPrefix20210402\\Symfony\\Component\\Form\\Extension\\Core\\DataTransformer', 'ROUND_HALFDOWN', 'ROUND_HALF_DOWN')])]]);
    $services->set(\Rector\Renaming\Rector\MethodCall\RenameMethodRector::class)->call('configure', [[\Rector\Renaming\Rector\MethodCall\RenameMethodRector::METHOD_CALL_RENAMES => \Symplify\SymfonyPhpConfig\ValueObjectInliner::inline([
        new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210402\\Symfony\\Component\\ClassLoader\\UniversalClassLoader\\UniversalClassLoader', 'registerNamespaces', 'addPrefixes'),
        new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210402\\Symfony\\Component\\ClassLoader\\UniversalClassLoader\\UniversalClassLoader', 'registerPrefixes', 'addPrefixes'),
        new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210402\\Symfony\\Component\\ClassLoader\\UniversalClassLoader\\UniversalClassLoader', 'registerNamespace', 'addPrefix'),
        new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210402\\Symfony\\Component\\ClassLoader\\UniversalClassLoader\\UniversalClassLoader', 'registerPrefix', 'addPrefix'),
        new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210402\\Symfony\\Component\\ClassLoader\\UniversalClassLoader\\UniversalClassLoader', 'getNamespaces', 'getPrefixes'),
        new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210402\\Symfony\\Component\\ClassLoader\\UniversalClassLoader\\UniversalClassLoader', 'getNamespaceFallbacks', 'getFallbackDirs'),
        new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210402\\Symfony\\Component\\ClassLoader\\UniversalClassLoader\\UniversalClassLoader', 'getPrefixFallbacks', 'getFallbackDirs'),
        // form
        new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210402\\Symfony\\Component\\Form\\AbstractType', 'getName', 'getBlockPrefix'),
        new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210402\\Symfony\\Component\\Form\\AbstractType', 'setDefaultOptions', 'configureOptions'),
        new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210402\\Symfony\\Component\\Form\\FormTypeInterface', 'getName', 'getBlockPrefix'),
        new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210402\\Symfony\\Component\\Form\\FormTypeInterface', 'setDefaultOptions', 'configureOptions'),
        new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210402\\Symfony\\Component\\Form\\ResolvedFormTypeInterface', 'getName', 'getBlockPrefix'),
        new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210402\\Symfony\\Component\\Form\\AbstractTypeExtension', 'setDefaultOptions', 'configureOptions'),
        new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210402\\Symfony\\Component\\Form\\Form', 'bind', 'submit'),
        new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210402\\Symfony\\Component\\Form\\Form', 'isBound', 'isSubmitted'),
        // process
        new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210402\\Symfony\\Component\\Process\\Process', 'setStdin', 'setInput'),
        new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210402\\Symfony\\Component\\Process\\Process', 'getStdin', 'getInput'),
        // monolog
        new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210402\\Symfony\\Bridge\\Monolog\\Logger', 'emerg', 'emergency'),
        new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210402\\Symfony\\Bridge\\Monolog\\Logger', 'crit', 'critical'),
        new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210402\\Symfony\\Bridge\\Monolog\\Logger', 'err', 'error'),
        new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210402\\Symfony\\Bridge\\Monolog\\Logger', 'warn', 'warning'),
        # http kernel
        new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210402\\Symfony\\Component\\HttpKernel\\Log\\LoggerInterface', 'emerg', 'emergency'),
        new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210402\\Symfony\\Component\\HttpKernel\\Log\\LoggerInterface', 'crit', 'critical'),
        new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210402\\Symfony\\Component\\HttpKernel\\Log\\LoggerInterface', 'err', 'error'),
        new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210402\\Symfony\\Component\\HttpKernel\\Log\\LoggerInterface', 'warn', 'warning'),
        new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210402\\Symfony\\Component\\HttpKernel\\Log\\NullLogger', 'emerg', 'emergency'),
        new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210402\\Symfony\\Component\\HttpKernel\\Log\\NullLogger', 'crit', 'critical'),
        new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210402\\Symfony\\Component\\HttpKernel\\Log\\NullLogger', 'err', 'error'),
        new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210402\\Symfony\\Component\\HttpKernel\\Log\\NullLogger', 'warn', 'warning'),
        // property access
        new \Rector\Renaming\ValueObject\MethodCallRename('getPropertyAccessor', 'Typo3RectorPrefix20210402\\Symfony\\Component\\PropertyAccess\\PropertyAccess', 'createPropertyAccessor'),
        // translator
        new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210402\\Symfony\\Component\\Translation\\Dumper\\FileDumper', 'format', 'formatCatalogue'),
        new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210402\\Symfony\\Component\\Translation\\Translator', 'getMessages', 'getCatalogue'),
        // validator
        new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210402\\Symfony\\Component\\Validator\\ConstraintViolationInterface', 'getMessageParameters', 'getParameters'),
        new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210402\\Symfony\\Component\\Validator\\ConstraintViolationInterface', 'getMessagePluralization', 'getPlural'),
        new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210402\\Symfony\\Component\\Validator\\ConstraintViolation', 'getMessageParameters', 'getParameters'),
        new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210402\\Symfony\\Component\\Validator\\ConstraintViolation', 'getMessagePluralization', 'getPlural'),
    ])]]);
    $services->set(\Rector\Renaming\Rector\Name\RenameClassRector::class)->call('configure', [[\Rector\Renaming\Rector\Name\RenameClassRector::OLD_TO_NEW_CLASSES => [
        # class loader
        # partial with method rename
        'Typo3RectorPrefix20210402\\Symfony\\Component\\ClassLoader\\UniversalClassLoader\\UniversalClassLoader' => 'Typo3RectorPrefix20210402\\Symfony\\Component\\ClassLoader\\ClassLoader',
        # console
        'Typo3RectorPrefix20210402\\Symfony\\Component\\Console\\Helper\\ProgressHelper' => 'Typo3RectorPrefix20210402\\Symfony\\Component\\Console\\Helper\\ProgressBar',
        # form
        'Typo3RectorPrefix20210402\\Symfony\\Component\\Form\\Util\\VirtualFormAwareIterator' => 'Typo3RectorPrefix20210402\\Symfony\\Component\\Form\\Util\\InheritDataAwareIterator',
        'Typo3RectorPrefix20210402\\Symfony\\Component\\Form\\Tests\\Extension\\Core\\Type\\TypeTestCase' => 'Typo3RectorPrefix20210402\\Symfony\\Component\\Form\\Test\\TypeTestCase',
        'Typo3RectorPrefix20210402\\Symfony\\Component\\Form\\Tests\\FormIntegrationTestCase' => 'Typo3RectorPrefix20210402\\Symfony\\Component\\Form\\Test\\FormIntegrationTestCase',
        'Typo3RectorPrefix20210402\\Symfony\\Component\\Form\\Tests\\FormPerformanceTestCase' => 'Typo3RectorPrefix20210402\\Symfony\\Component\\Form\\Test\\FormPerformanceTestCase',
        'Typo3RectorPrefix20210402\\Symfony\\Component\\Form\\Extension\\Core\\ChoiceList\\ChoiceListInterface' => 'Typo3RectorPrefix20210402\\Symfony\\Component\\Form\\ChoiceList\\ChoiceListInterface',
        'Typo3RectorPrefix20210402\\Symfony\\Component\\Form\\Extension\\Core\\View\\ChoiceView' => 'Typo3RectorPrefix20210402\\Symfony\\Component\\Form\\ChoiceList\\View\\ChoiceView',
        'Typo3RectorPrefix20210402\\Symfony\\Component\\Form\\Extension\\Csrf\\CsrfProvider\\CsrfProviderInterface' => 'Typo3RectorPrefix20210402\\Symfony\\Component\\Security\\Csrf\\CsrfTokenManagerInterface',
        'Typo3RectorPrefix20210402\\Symfony\\Component\\Form\\Extension\\Core\\ChoiceList\\ChoiceList' => 'Typo3RectorPrefix20210402\\Symfony\\Component\\Form\\ChoiceList\\ArrayChoiceList',
        'Typo3RectorPrefix20210402\\Symfony\\Component\\Form\\Extension\\Core\\ChoiceList\\LazyChoiceList' => 'Typo3RectorPrefix20210402\\Symfony\\Component\\Form\\ChoiceList\\LazyChoiceList',
        'Typo3RectorPrefix20210402\\Symfony\\Component\\Form\\Extension\\Core\\ChoiceList\\ObjectChoiceList' => 'Typo3RectorPrefix20210402\\Symfony\\Component\\Form\\ChoiceList\\ArrayChoiceList',
        'Typo3RectorPrefix20210402\\Symfony\\Component\\Form\\Extension\\Core\\ChoiceList\\SimpleChoiceList' => 'Typo3RectorPrefix20210402\\Symfony\\Component\\Form\\ChoiceList\\ArrayChoiceList',
        'Typo3RectorPrefix20210402\\Symfony\\Component\\Form\\ChoiceList\\ArrayKeyChoiceList' => 'Typo3RectorPrefix20210402\\Symfony\\Component\\Form\\ChoiceList\\ArrayChoiceList',
        # http kernel
        'Typo3RectorPrefix20210402\\Symfony\\Component\\HttpKernel\\Debug\\ErrorHandler' => 'Typo3RectorPrefix20210402\\Symfony\\Component\\Debug\\ErrorHandler',
        'Typo3RectorPrefix20210402\\Symfony\\Component\\HttpKernel\\Debug\\ExceptionHandler' => 'Typo3RectorPrefix20210402\\Symfony\\Component\\Debug\\ExceptionHandler',
        'Typo3RectorPrefix20210402\\Symfony\\Component\\HttpKernel\\Exception\\FatalErrorException' => 'Typo3RectorPrefix20210402\\Symfony\\Component\\Debug\\Exception\\FatalErrorException',
        'Typo3RectorPrefix20210402\\Symfony\\Component\\HttpKernel\\Exception\\FlattenException' => 'Typo3RectorPrefix20210402\\Symfony\\Component\\Debug\\Exception\\FlattenException',
        # partial with method rename
        'Typo3RectorPrefix20210402\\Symfony\\Component\\HttpKernel\\Log\\LoggerInterface' => 'Typo3RectorPrefix20210402\\Psr\\Log\\LoggerInterface',
        # event disptacher
        'Typo3RectorPrefix20210402\\Symfony\\Component\\HttpKernel\\DependencyInjection\\RegisterListenersPass' => 'Typo3RectorPrefix20210402\\Symfony\\Component\\EventDispatcher\\DependencyInjection\\RegisterListenersPass',
        # partial with methor rename
        'Typo3RectorPrefix20210402\\Symfony\\Component\\HttpKernel\\Log\\NullLogger' => 'Typo3RectorPrefix20210402\\Psr\\Log\\LoggerInterface',
        # monolog
        # partial with method rename
        'Typo3RectorPrefix20210402\\Symfony\\Bridge\\Monolog\\Logger' => 'Typo3RectorPrefix20210402\\Psr\\Log\\LoggerInterface',
        # security
        'Typo3RectorPrefix20210402\\Symfony\\Component\\Security\\Core\\Authorization\\Voter\\AbstractVoter' => 'Typo3RectorPrefix20210402\\Symfony\\Component\\Security\\Core\\Authorization\\Voter\\Voter',
        # translator
        # partial with class rename
        'Typo3RectorPrefix20210402\\Symfony\\Component\\Translation\\Translator' => 'Typo3RectorPrefix20210402\\Symfony\\Component\\Translation\\TranslatorBagInterface',
        # twig
        'Typo3RectorPrefix20210402\\Symfony\\Bundle\\TwigBundle\\TwigDefaultEscapingStrategy' => 'Twig_FileExtensionEscapingStrategy',
        # validator
        'Typo3RectorPrefix20210402\\Symfony\\Component\\Validator\\Constraints\\Collection\\Optional' => 'Typo3RectorPrefix20210402\\Symfony\\Component\\Validator\\Constraints\\Optional',
        'Typo3RectorPrefix20210402\\Symfony\\Component\\Validator\\Constraints\\Collection\\Required' => 'Typo3RectorPrefix20210402\\Symfony\\Component\\Validator\\Constraints\\Required',
        'Typo3RectorPrefix20210402\\Symfony\\Component\\Validator\\MetadataInterface' => 'Typo3RectorPrefix20210402\\Symfony\\Component\\Validator\\Mapping\\MetadataInterface',
        'Typo3RectorPrefix20210402\\Symfony\\Component\\Validator\\PropertyMetadataInterface' => 'Typo3RectorPrefix20210402\\Symfony\\Component\\Validator\\Mapping\\PropertyMetadataInterface',
        'Typo3RectorPrefix20210402\\Symfony\\Component\\Validator\\PropertyMetadataContainerInterface' => 'Typo3RectorPrefix20210402\\Symfony\\Component\\Validator\\Mapping\\ClassMetadataInterface',
        'Typo3RectorPrefix20210402\\Symfony\\Component\\Validator\\ClassBasedInterface' => 'Typo3RectorPrefix20210402\\Symfony\\Component\\Validator\\Mapping\\ClassMetadataInterface',
        'Typo3RectorPrefix20210402\\Symfony\\Component\\Validator\\Mapping\\ElementMetadata' => 'Typo3RectorPrefix20210402\\Symfony\\Component\\Validator\\Mapping\\GenericMetadata',
        'Typo3RectorPrefix20210402\\Symfony\\Component\\Validator\\ExecutionContextInterface' => 'Typo3RectorPrefix20210402\\Symfony\\Component\\Validator\\Context\\ExecutionContextInterface',
        'Typo3RectorPrefix20210402\\Symfony\\Component\\Validator\\Mapping\\ClassMetadataFactory' => 'Typo3RectorPrefix20210402\\Symfony\\Component\\Validator\\Mapping\\Factory\\LazyLoadingMetadataFactory',
        'Typo3RectorPrefix20210402\\Symfony\\Component\\Validator\\Mapping\\MetadataFactoryInterface' => 'Typo3RectorPrefix20210402\\Symfony\\Component\\Validator\\Mapping\\Factory\\MetadataFactoryInterface',
        # swift mailer
        'Typo3RectorPrefix20210402\\Symfony\\Bridge\\Swiftmailer\\DataCollector\\MessageDataCollector' => 'Typo3RectorPrefix20210402\\Symfony\\Bundle\\SwiftmailerBundle\\DataCollector\\MessageDataCollector',
    ]]]);
};
