<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210318;

use Rector\Arguments\Rector\ClassMethod\ArgumentAdderRector;
use Rector\Arguments\ValueObject\ArgumentAdder;
use Rector\Renaming\Rector\MethodCall\RenameMethodRector;
use Rector\Renaming\Rector\Name\RenameClassRector;
use Rector\Renaming\ValueObject\MethodCallRename;
use Rector\Symfony3\Rector\ClassConstFetch\ConsoleExceptionToErrorEventConstantRector;
use Typo3RectorPrefix20210318\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symplify\SymfonyPhpConfig\ValueObjectInliner;
return static function (\Typo3RectorPrefix20210318\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\Arguments\Rector\ClassMethod\ArgumentAdderRector::class)->call('configure', [[\Rector\Arguments\Rector\ClassMethod\ArgumentAdderRector::ADDED_ARGUMENTS => \Symplify\SymfonyPhpConfig\ValueObjectInliner::inline([new \Rector\Arguments\ValueObject\ArgumentAdder('Typo3RectorPrefix20210318\\Symfony\\Component\\DependencyInjection\\ContainerBuilder', 'compile', 2, '__unknown__', 0), new \Rector\Arguments\ValueObject\ArgumentAdder('Typo3RectorPrefix20210318\\Symfony\\Component\\DependencyInjection\\ContainerBuilder', 'addCompilerPass', 2, 'priority', 0), new \Rector\Arguments\ValueObject\ArgumentAdder('Typo3RectorPrefix20210318\\Symfony\\Component\\DependencyInjection\\Compiler\\ServiceReferenceGraph', 'connect', 6, 'weak', \false)])]]);
    $services->set(\Rector\Symfony3\Rector\ClassConstFetch\ConsoleExceptionToErrorEventConstantRector::class);
    $services->set(\Rector\Renaming\Rector\Name\RenameClassRector::class)->call('configure', [[\Rector\Renaming\Rector\Name\RenameClassRector::OLD_TO_NEW_CLASSES => [
        # console
        'Typo3RectorPrefix20210318\\Symfony\\Component\\Console\\Event\\ConsoleExceptionEvent' => 'Typo3RectorPrefix20210318\\Symfony\\Component\\Console\\Event\\ConsoleErrorEvent',
        # debug
        'Typo3RectorPrefix20210318\\Symfony\\Component\\Debug\\Exception\\ContextErrorException' => 'ErrorException',
        # dependency-injection
        'Typo3RectorPrefix20210318\\Symfony\\Component\\DependencyInjection\\DefinitionDecorator' => 'Typo3RectorPrefix20210318\\Symfony\\Component\\DependencyInjection\\ChildDefinition',
        # framework bundle
        'Typo3RectorPrefix20210318\\Symfony\\Bundle\\FrameworkBundle\\DependencyInjection\\Compiler\\AddConsoleCommandPass' => 'Typo3RectorPrefix20210318\\Symfony\\Component\\Console\\DependencyInjection\\AddConsoleCommandPass',
        'Typo3RectorPrefix20210318\\Symfony\\Bundle\\FrameworkBundle\\DependencyInjection\\Compiler\\SerializerPass' => 'Typo3RectorPrefix20210318\\Symfony\\Component\\Serializer\\DependencyInjection\\SerializerPass',
        'Typo3RectorPrefix20210318\\Symfony\\Bundle\\FrameworkBundle\\DependencyInjection\\Compiler\\FormPass' => 'Typo3RectorPrefix20210318\\Symfony\\Component\\Form\\DependencyInjection\\FormPass',
        'Typo3RectorPrefix20210318\\Symfony\\Bundle\\FrameworkBundle\\EventListener\\SessionListener' => 'Typo3RectorPrefix20210318\\Symfony\\Component\\HttpKernel\\EventListener\\SessionListener',
        'Typo3RectorPrefix20210318\\Symfony\\Bundle\\FrameworkBundle\\EventListener\\TestSessionListenr' => 'Typo3RectorPrefix20210318\\Symfony\\Component\\HttpKernel\\EventListener\\TestSessionListener',
        'Typo3RectorPrefix20210318\\Symfony\\Bundle\\FrameworkBundle\\DependencyInjection\\Compiler\\ConfigCachePass' => 'Typo3RectorPrefix20210318\\Symfony\\Component\\Config\\DependencyInjection\\ConfigCachePass',
        'Typo3RectorPrefix20210318\\Symfony\\Bundle\\FrameworkBundle\\DependencyInjection\\Compiler\\PropertyInfoPass' => 'Typo3RectorPrefix20210318\\Symfony\\Component\\PropertyInfo\\DependencyInjection\\PropertyInfoPass',
    ]]]);
    $services->set(\Rector\Renaming\Rector\MethodCall\RenameMethodRector::class)->call('configure', [[\Rector\Renaming\Rector\MethodCall\RenameMethodRector::METHOD_CALL_RENAMES => \Symplify\SymfonyPhpConfig\ValueObjectInliner::inline([new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210318\\Symfony\\Component\\DependencyInjection\\Container', 'isFrozen', 'isCompiled')])]]);
};
