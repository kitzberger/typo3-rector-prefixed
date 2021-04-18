<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210418;

use Rector\Renaming\Rector\MethodCall\RenameMethodRector;
use Rector\Renaming\Rector\Name\RenameClassRector;
use Rector\Renaming\ValueObject\MethodCallRename;
use Typo3RectorPrefix20210418\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symplify\SymfonyPhpConfig\ValueObjectInliner;
return static function (\Typo3RectorPrefix20210418\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\Renaming\Rector\MethodCall\RenameMethodRector::class)->call('configure', [[\Rector\Renaming\Rector\MethodCall\RenameMethodRector::METHOD_CALL_RENAMES => \Symplify\SymfonyPhpConfig\ValueObjectInliner::inline([
        // @see http://www.phpspec.net/en/stable/manual/upgrading-to-phpspec-3.html
        new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210418\\PhpSpec\\ServiceContainer', 'set', 'define'),
        new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210418\\PhpSpec\\ServiceContainer', 'setShared', 'define'),
    ])]]);
    $services->set(\Rector\Renaming\Rector\Name\RenameClassRector::class)->call('configure', [[\Rector\Renaming\Rector\Name\RenameClassRector::OLD_TO_NEW_CLASSES => ['Typo3RectorPrefix20210418\\PhpSpec\\Console\\IO' => 'Typo3RectorPrefix20210418\\PhpSpec\\Console\\ConsoleIO', 'Typo3RectorPrefix20210418\\PhpSpec\\IO\\IOInterface' => 'Typo3RectorPrefix20210418\\PhpSpec\\IO\\IO', 'Typo3RectorPrefix20210418\\PhpSpec\\Locator\\ResourceInterface' => 'Typo3RectorPrefix20210418\\PhpSpec\\Locator\\Resource', 'Typo3RectorPrefix20210418\\PhpSpec\\Locator\\ResourceLocatorInterface' => 'Typo3RectorPrefix20210418\\PhpSpec\\Locator\\ResourceLocator', 'Typo3RectorPrefix20210418\\PhpSpec\\Formatter\\Presenter\\PresenterInterface' => 'Typo3RectorPrefix20210418\\PhpSpec\\Formatter\\Presenter\\Presenter', 'Typo3RectorPrefix20210418\\PhpSpec\\CodeGenerator\\Generator\\GeneratorInterface' => 'Typo3RectorPrefix20210418\\PhpSpec\\CodeGenerator\\Generator\\Generator', 'Typo3RectorPrefix20210418\\PhpSpec\\Extension\\ExtensionInterface' => 'Typo3RectorPrefix20210418\\PhpSpec\\Extension', 'Typo3RectorPrefix20210418\\Phpspec\\CodeAnalysis\\AccessInspectorInterface' => 'Typo3RectorPrefix20210418\\Phpspec\\CodeAnalysis\\AccessInspector', 'Typo3RectorPrefix20210418\\Phpspec\\Event\\EventInterface' => 'Typo3RectorPrefix20210418\\Phpspec\\Event\\PhpSpecEvent', 'Typo3RectorPrefix20210418\\PhpSpec\\Formatter\\Presenter\\Differ\\EngineInterface' => 'Typo3RectorPrefix20210418\\PhpSpec\\Formatter\\Presenter\\Differ\\DifferEngine', 'Typo3RectorPrefix20210418\\PhpSpec\\Matcher\\MatcherInterface' => 'Typo3RectorPrefix20210418\\PhpSpec\\Matcher\\Matcher', 'Typo3RectorPrefix20210418\\PhpSpec\\Matcher\\MatchersProviderInterface' => 'Typo3RectorPrefix20210418\\PhpSpec\\Matcher\\MatchersProvider', 'Typo3RectorPrefix20210418\\PhpSpec\\SpecificationInterface' => 'Typo3RectorPrefix20210418\\PhpSpec\\Specification', 'Typo3RectorPrefix20210418\\PhpSpec\\Runner\\Maintainer\\MaintainerInterface' => 'Typo3RectorPrefix20210418\\PhpSpec\\Runner\\Maintainer\\Maintainer']]]);
};
