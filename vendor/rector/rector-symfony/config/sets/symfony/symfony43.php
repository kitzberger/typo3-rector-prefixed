<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210420;

use Rector\Arguments\Rector\ClassMethod\ArgumentAdderRector;
use Rector\Arguments\ValueObject\ArgumentAdder;
use Rector\Core\ValueObject\MethodName;
use Rector\DependencyInjection\Rector\ClassMethod\AddMethodParentCallRector;
use Rector\Renaming\Rector\MethodCall\RenameMethodRector;
use Rector\Renaming\Rector\Name\RenameClassRector;
use Rector\Renaming\ValueObject\MethodCallRename;
use Rector\Symfony\Rector\MethodCall\MakeDispatchFirstArgumentEventRector;
use Rector\Symfony\Rector\MethodCall\SimplifyWebTestCaseAssertionsRector;
use Typo3RectorPrefix20210420\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symplify\SymfonyPhpConfig\ValueObjectInliner;
# https://github.com/symfony/symfony/blob/4.4/UPGRADE-4.3.md
return static function (\Typo3RectorPrefix20210420\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    # https://symfony.com/blog/new-in-symfony-4-3-better-test-assertions
    $services->set(\Rector\Symfony\Rector\MethodCall\SimplifyWebTestCaseAssertionsRector::class);
    $services->set(\Rector\Renaming\Rector\MethodCall\RenameMethodRector::class)->call('configure', [[\Rector\Renaming\Rector\MethodCall\RenameMethodRector::METHOD_CALL_RENAMES => \Symplify\SymfonyPhpConfig\ValueObjectInliner::inline([new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210420\\Symfony\\Component\\BrowserKit\\Response', 'getStatus', 'getStatusCode'), new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210420\\Symfony\\Component\\Security\\Http\\Firewall', 'handleRequest', 'callListeners')])]]);
    $services->set(\Rector\Symfony\Rector\MethodCall\MakeDispatchFirstArgumentEventRector::class);
    $services->set(\Rector\Renaming\Rector\Name\RenameClassRector::class)->call('configure', [[\Rector\Renaming\Rector\Name\RenameClassRector::OLD_TO_NEW_CLASSES => [
        # https://symfony.com/blog/new-in-symfony-4-3-simpler-event-dispatching
        # Browser Kit
        'Typo3RectorPrefix20210420\\Symfony\\Component\\BrowserKit\\Client' => 'Typo3RectorPrefix20210420\\Symfony\\Component\\BrowserKit\\AbstractBrowser',
        # Cache
        # https://github.com/symfony/symfony/pull/29236
        'Typo3RectorPrefix20210420\\Symfony\\Component\\Cache\\Traits\\ApcuTrait\\ApcuCache' => 'Typo3RectorPrefix20210420\\Symfony\\Component\\Cache\\Traits\\ApcuTrait\\ApcuAdapter',
        'Typo3RectorPrefix20210420\\Symfony\\Component\\Cache\\Adapter\\SimpleCacheAdapter' => 'Typo3RectorPrefix20210420\\Symfony\\Component\\Cache\\Adapter\\Psr16Adapter',
        'Typo3RectorPrefix20210420\\Symfony\\Component\\Cache\\Simple\\ArrayCache' => 'Typo3RectorPrefix20210420\\Symfony\\Component\\Cache\\Adapter\\ArrayAdapter',
        'Typo3RectorPrefix20210420\\Symfony\\Component\\Cache\\Simple\\ChainCache' => 'Typo3RectorPrefix20210420\\Symfony\\Component\\Cache\\Adapter\\ChainAdapter',
        'Typo3RectorPrefix20210420\\Symfony\\Component\\Cache\\Simple\\DoctrineCache' => 'Typo3RectorPrefix20210420\\Symfony\\Component\\Cache\\Adapter\\DoctrineAdapter',
        'Typo3RectorPrefix20210420\\Symfony\\Component\\Cache\\Simple\\FilesystemCache' => 'Typo3RectorPrefix20210420\\Symfony\\Component\\Cache\\Adapter\\FilesystemAdapter',
        'Typo3RectorPrefix20210420\\Symfony\\Component\\Cache\\Simple\\MemcachedCache' => 'Typo3RectorPrefix20210420\\Symfony\\Component\\Cache\\Adapter\\MemcachedAdapter',
        'Typo3RectorPrefix20210420\\Symfony\\Component\\Cache\\Simple\\NullCache' => 'Typo3RectorPrefix20210420\\Symfony\\Component\\Cache\\Adapter\\NullAdapter',
        'Typo3RectorPrefix20210420\\Symfony\\Component\\Cache\\Simple\\PdoCache' => 'Typo3RectorPrefix20210420\\Symfony\\Component\\Cache\\Adapter\\PdoAdapter',
        'Typo3RectorPrefix20210420\\Symfony\\Component\\Cache\\Simple\\PhpArrayCache' => 'Typo3RectorPrefix20210420\\Symfony\\Component\\Cache\\Adapter\\PhpArrayAdapter',
        'Typo3RectorPrefix20210420\\Symfony\\Component\\Cache\\Simple\\PhpFilesCache' => 'Typo3RectorPrefix20210420\\Symfony\\Component\\Cache\\Adapter\\PhpFilesAdapter',
        'Typo3RectorPrefix20210420\\Symfony\\Component\\Cache\\Simple\\RedisCache' => 'Typo3RectorPrefix20210420\\Symfony\\Component\\Cache\\Adapter\\RedisAdapter',
        'Typo3RectorPrefix20210420\\Symfony\\Component\\Cache\\Simple\\TraceableCache' => 'Typo3RectorPrefix20210420\\Symfony\\Component\\Cache\\Adapter\\TraceableAdapterCache',
        'Typo3RectorPrefix20210420\\Symfony\\Component\\Cache\\Simple\\Psr6Cache' => 'Typo3RectorPrefix20210420\\Symfony\\Component\\Cache\\Psr16Cache',
        'Psr\\SimpleCache\\CacheInterface' => 'Typo3RectorPrefix20210420\\Symfony\\Contracts\\Cache\\CacheInterface',
        # EventDispatcher
        'Typo3RectorPrefix20210420\\Symfony\\Component\\HttpKernel\\Event\\FilterControllerArgumentsEvent' => 'Typo3RectorPrefix20210420\\Symfony\\Component\\HttpKernel\\Event\\ControllerArgumentsEvent',
        'Typo3RectorPrefix20210420\\Symfony\\Component\\HttpKernel\\Event\\FilterControllerEvent' => 'Typo3RectorPrefix20210420\\Symfony\\Component\\HttpKernel\\Event\\ControllerEvent',
        'Typo3RectorPrefix20210420\\Symfony\\Component\\HttpKernel\\Event\\FilterResponseEvent' => 'Typo3RectorPrefix20210420\\Symfony\\Component\\HttpKernel\\Event\\ResponseEvent',
        'Typo3RectorPrefix20210420\\Symfony\\Component\\HttpKernel\\Event\\GetResponseEvent' => 'Typo3RectorPrefix20210420\\Symfony\\Component\\HttpKernel\\Event\\RequestEvent',
        'Typo3RectorPrefix20210420\\Symfony\\Component\\HttpKernel\\Event\\GetResponseForControllerResultEvent' => 'Typo3RectorPrefix20210420\\Symfony\\Component\\HttpKernel\\Event\\ViewEvent',
        'Typo3RectorPrefix20210420\\Symfony\\Component\\HttpKernel\\Event\\GetResponseForExceptionEvent' => 'Typo3RectorPrefix20210420\\Symfony\\Component\\HttpKernel\\Event\\ExceptionEvent',
        'Typo3RectorPrefix20210420\\Symfony\\Component\\HttpKernel\\Event\\PostResponseEvent' => 'Typo3RectorPrefix20210420\\Symfony\\Component\\HttpKernel\\Event\\TerminateEvent',
        # has lowest priority, have to be last
        'Typo3RectorPrefix20210420\\Symfony\\Component\\EventDispatcher\\Event' => 'Typo3RectorPrefix20210420\\Symfony\\Contracts\\EventDispatcher\\Event',
        # MimeType
        'Typo3RectorPrefix20210420\\Symfony\\Component\\HttpFoundation\\File\\MimeType\\MimeTypeGuesserInterface' => 'Symfony\\Component\\Mime\\MimeTypesInterface',
        'Typo3RectorPrefix20210420\\Symfony\\Component\\HttpFoundation\\File\\MimeType\\ExtensionGuesserInterface' => 'Symfony\\Component\\Mime\\MimeTypesInterface',
        'Typo3RectorPrefix20210420\\Symfony\\Component\\HttpFoundation\\File\\MimeType\\MimeTypeExtensionGuesser' => 'Symfony\\Component\\Mime\\MimeTypes',
        'Typo3RectorPrefix20210420\\Symfony\\Component\\HttpFoundation\\File\\MimeType\\FileBinaryMimeTypeGuesser' => 'Symfony\\Component\\Mime\\FileBinaryMimeTypeGuesser',
        'Typo3RectorPrefix20210420\\Symfony\\Component\\HttpFoundation\\File\\MimeType\\FileinfoMimeTypeGuesser' => 'Symfony\\Component\\Mime\\FileinfoMimeTypeGuesser',
        # HttpKernel
        # @todo unpack after YAML to PHP migration, Symfony\Component\HttpKernel\Client: Symfony\Component\HttpKernel\HttpKernelBrowser
        'Typo3RectorPrefix20210420\\Symfony\\Component\\HttpKernel\\EventListener\\TranslatorListener' => 'Typo3RectorPrefix20210420\\Symfony\\Component\\HttpKernel\\EventListener\\LocaleAwareListener',
        # Security
        'Typo3RectorPrefix20210420\\Symfony\\Component\\Security\\Core\\Encoder\\Argon2iPasswordEncoder' => 'Typo3RectorPrefix20210420\\Symfony\\Component\\Security\\Core\\Encoder\\SodiumPasswordEncoder',
        'Typo3RectorPrefix20210420\\Symfony\\Component\\Security\\Core\\Encoder\\BCryptPasswordEncoder' => 'Typo3RectorPrefix20210420\\Symfony\\Component\\Security\\Core\\Encoder\\NativePasswordEncoder',
    ]]]);
    # https://github.com/symfony/symfony/blob/4.4/UPGRADE-4.3.md#workflow
    $services->set(\Rector\Arguments\Rector\ClassMethod\ArgumentAdderRector::class)->call('configure', [[\Rector\Arguments\Rector\ClassMethod\ArgumentAdderRector::ADDED_ARGUMENTS => \Symplify\SymfonyPhpConfig\ValueObjectInliner::inline([new \Rector\Arguments\ValueObject\ArgumentAdder('Typo3RectorPrefix20210420\\Symfony\\Component\\Workflow\\MarkingStore\\MarkingStoreInterface', 'setMarking', 2, 'context', [])])]]);
    $services->set(\Rector\DependencyInjection\Rector\ClassMethod\AddMethodParentCallRector::class)->call('configure', [[\Rector\DependencyInjection\Rector\ClassMethod\AddMethodParentCallRector::METHODS_BY_PARENT_TYPES => ['Typo3RectorPrefix20210420\\Symfony\\Component\\EventDispatcher\\EventDispatcher' => \Rector\Core\ValueObject\MethodName::CONSTRUCT]]]);
};
