<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210331;

use Typo3RectorPrefix20210331\Symfony\Component\Console\Style\SymfonyStyle;
use Typo3RectorPrefix20210331\Symfony\Component\DependencyInjection\ContainerInterface;
use Typo3RectorPrefix20210331\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Typo3RectorPrefix20210331\Symplify\ComposerJsonManipulator\ComposerJsonFactory;
use Typo3RectorPrefix20210331\Symplify\ComposerJsonManipulator\FileSystem\JsonFileManager;
use Typo3RectorPrefix20210331\Symplify\ComposerJsonManipulator\Json\JsonCleaner;
use Typo3RectorPrefix20210331\Symplify\ComposerJsonManipulator\Json\JsonInliner;
use Typo3RectorPrefix20210331\Symplify\PackageBuilder\Console\Style\SymfonyStyleFactory;
use Typo3RectorPrefix20210331\Symplify\PackageBuilder\Parameter\ParameterProvider;
use Typo3RectorPrefix20210331\Symplify\PackageBuilder\Reflection\PrivatesAccessor;
use Typo3RectorPrefix20210331\Symplify\SmartFileSystem\FileSystemFilter;
use Typo3RectorPrefix20210331\Symplify\SmartFileSystem\FileSystemGuard;
use Typo3RectorPrefix20210331\Symplify\SmartFileSystem\Finder\FinderSanitizer;
use Typo3RectorPrefix20210331\Symplify\SmartFileSystem\Finder\SmartFinder;
use Typo3RectorPrefix20210331\Symplify\SmartFileSystem\SmartFileSystem;
use Typo3RectorPrefix20210331\Symplify\SymplifyKernel\Console\ConsoleApplicationFactory;
use function Typo3RectorPrefix20210331\Symfony\Component\DependencyInjection\Loader\Configurator\service;
return static function (\Typo3RectorPrefix20210331\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->defaults()->public()->autowire()->autoconfigure();
    // symfony style
    $services->set(\Typo3RectorPrefix20210331\Symplify\PackageBuilder\Console\Style\SymfonyStyleFactory::class);
    $services->set(\Typo3RectorPrefix20210331\Symfony\Component\Console\Style\SymfonyStyle::class)->factory([\Typo3RectorPrefix20210331\Symfony\Component\DependencyInjection\Loader\Configurator\service(\Typo3RectorPrefix20210331\Symplify\PackageBuilder\Console\Style\SymfonyStyleFactory::class), 'create']);
    // filesystem
    $services->set(\Typo3RectorPrefix20210331\Symplify\SmartFileSystem\Finder\FinderSanitizer::class);
    $services->set(\Typo3RectorPrefix20210331\Symplify\SmartFileSystem\SmartFileSystem::class);
    $services->set(\Typo3RectorPrefix20210331\Symplify\SmartFileSystem\Finder\SmartFinder::class);
    $services->set(\Typo3RectorPrefix20210331\Symplify\SmartFileSystem\FileSystemGuard::class);
    $services->set(\Typo3RectorPrefix20210331\Symplify\SmartFileSystem\FileSystemFilter::class);
    $services->set(\Typo3RectorPrefix20210331\Symplify\PackageBuilder\Parameter\ParameterProvider::class)->args([\Typo3RectorPrefix20210331\Symfony\Component\DependencyInjection\Loader\Configurator\service(\Typo3RectorPrefix20210331\Symfony\Component\DependencyInjection\ContainerInterface::class)]);
    $services->set(\Typo3RectorPrefix20210331\Symplify\PackageBuilder\Reflection\PrivatesAccessor::class);
    $services->set(\Typo3RectorPrefix20210331\Symplify\SymplifyKernel\Console\ConsoleApplicationFactory::class);
    // composer json factory
    $services->set(\Typo3RectorPrefix20210331\Symplify\ComposerJsonManipulator\ComposerJsonFactory::class);
    $services->set(\Typo3RectorPrefix20210331\Symplify\ComposerJsonManipulator\FileSystem\JsonFileManager::class);
    $services->set(\Typo3RectorPrefix20210331\Symplify\ComposerJsonManipulator\Json\JsonCleaner::class);
    $services->set(\Typo3RectorPrefix20210331\Symplify\ComposerJsonManipulator\Json\JsonInliner::class);
};
