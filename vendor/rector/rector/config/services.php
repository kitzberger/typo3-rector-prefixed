<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210421;

use Typo3RectorPrefix20210421\Composer\Semver\VersionParser;
use Typo3RectorPrefix20210421\Doctrine\Inflector\Inflector;
use Typo3RectorPrefix20210421\Doctrine\Inflector\Rules\English\InflectorFactory;
use Typo3RectorPrefix20210421\Nette\Caching\Cache;
use PhpParser\BuilderFactory;
use PhpParser\Lexer;
use PhpParser\NodeFinder;
use PhpParser\NodeVisitor\CloningVisitor;
use PhpParser\NodeVisitor\NodeConnectingVisitor;
use PhpParser\Parser;
use PhpParser\ParserFactory;
use PHPStan\Analyser\NodeScopeResolver;
use PHPStan\Analyser\ScopeFactory;
use PHPStan\Dependency\DependencyResolver;
use PHPStan\File\FileHelper;
use PHPStan\PhpDoc\TypeNodeResolver;
use PHPStan\PhpDocParser\Parser\PhpDocParser;
use PHPStan\PhpDocParser\Parser\TypeParser;
use PHPStan\Reflection\ReflectionProvider;
use Rector\BetterPhpDocParser\PhpDocParser\BetterPhpDocParser;
use Rector\BetterPhpDocParser\PhpDocParser\BetterTypeParser;
use Rector\Caching\Cache\NetteCacheFactory;
use Rector\Core\Console\ConsoleApplication;
use Rector\Core\PhpParser\Parser\NikicPhpParserFactory;
use Rector\Core\PhpParser\Parser\PhpParserLexerFactory;
use Rector\NodeTypeResolver\DependencyInjection\PHPStanServicesFactory;
use Rector\NodeTypeResolver\Reflection\BetterReflection\SourceLocator\IntermediateSourceLocator;
use Rector\NodeTypeResolver\Reflection\BetterReflection\SourceLocatorProvider\DynamicSourceLocatorProvider;
use Typo3RectorPrefix20210421\Symfony\Component\Console\Application as SymfonyApplication;
use Typo3RectorPrefix20210421\Symfony\Component\Console\Style\SymfonyStyle;
use Typo3RectorPrefix20210421\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use function Typo3RectorPrefix20210421\Symfony\Component\DependencyInjection\Loader\Configurator\service;
use Typo3RectorPrefix20210421\Symplify\Astral\NodeTraverser\SimpleCallableNodeTraverser;
use Typo3RectorPrefix20210421\Symplify\PackageBuilder\Console\Command\CommandNaming;
use Typo3RectorPrefix20210421\Symplify\PackageBuilder\Console\Style\SymfonyStyleFactory;
use Typo3RectorPrefix20210421\Symplify\PackageBuilder\Parameter\ParameterProvider;
use Typo3RectorPrefix20210421\Symplify\PackageBuilder\Php\TypeChecker;
use Typo3RectorPrefix20210421\Symplify\PackageBuilder\Reflection\PrivatesAccessor;
use Typo3RectorPrefix20210421\Symplify\PackageBuilder\Reflection\PrivatesCaller;
use Typo3RectorPrefix20210421\Symplify\PackageBuilder\Strings\StringFormatConverter;
use Typo3RectorPrefix20210421\Symplify\SmartFileSystem\FileSystemFilter;
use Typo3RectorPrefix20210421\Symplify\SmartFileSystem\FileSystemGuard;
use Typo3RectorPrefix20210421\Symplify\SmartFileSystem\Finder\FinderSanitizer;
use Typo3RectorPrefix20210421\Symplify\SmartFileSystem\Json\JsonFileSystem;
use Typo3RectorPrefix20210421\Symplify\SmartFileSystem\SmartFileSystem;
return static function (\Typo3RectorPrefix20210421\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->defaults()->public()->autowire()->autoconfigure();
    $services->load('Rector\\Core\\', __DIR__ . '/../src')->exclude([__DIR__ . '/../src/Rector', __DIR__ . '/../src/Exception', __DIR__ . '/../src/DependencyInjection/CompilerPass', __DIR__ . '/../src/DependencyInjection/Loader', __DIR__ . '/../src/HttpKernel', __DIR__ . '/../src/ValueObject', __DIR__ . '/../src/Bootstrap', __DIR__ . '/../src/PhpParser/Node/CustomNode']);
    $services->alias(\Typo3RectorPrefix20210421\Symfony\Component\Console\Application::class, \Rector\Core\Console\ConsoleApplication::class);
    $services->set(\Typo3RectorPrefix20210421\Symplify\SmartFileSystem\FileSystemGuard::class);
    $services->set(\Typo3RectorPrefix20210421\Symplify\Astral\NodeTraverser\SimpleCallableNodeTraverser::class);
    $services->set(\PhpParser\ParserFactory::class);
    $services->set(\PhpParser\BuilderFactory::class);
    $services->set(\PhpParser\NodeVisitor\CloningVisitor::class);
    $services->set(\PhpParser\NodeFinder::class);
    $services->set(\PhpParser\Parser::class)->factory([\Typo3RectorPrefix20210421\Symfony\Component\DependencyInjection\Loader\Configurator\service(\Rector\Core\PhpParser\Parser\NikicPhpParserFactory::class), 'create']);
    $services->set(\PhpParser\Lexer::class)->factory([\Typo3RectorPrefix20210421\Symfony\Component\DependencyInjection\Loader\Configurator\service(\Rector\Core\PhpParser\Parser\PhpParserLexerFactory::class), 'create']);
    // symplify/package-builder
    $services->set(\Typo3RectorPrefix20210421\Symplify\PackageBuilder\Reflection\PrivatesAccessor::class);
    $services->set(\Typo3RectorPrefix20210421\Symplify\PackageBuilder\Reflection\PrivatesCaller::class);
    $services->set(\Typo3RectorPrefix20210421\Symplify\SmartFileSystem\Finder\FinderSanitizer::class);
    $services->set(\Typo3RectorPrefix20210421\Symplify\SmartFileSystem\FileSystemFilter::class);
    $services->set(\Typo3RectorPrefix20210421\Symplify\PackageBuilder\Parameter\ParameterProvider::class)->arg('$container', \Typo3RectorPrefix20210421\Symfony\Component\DependencyInjection\Loader\Configurator\service('service_container'));
    $services->set(\Typo3RectorPrefix20210421\Symplify\PackageBuilder\Console\Command\CommandNaming::class);
    $services->set(\Typo3RectorPrefix20210421\Symplify\SmartFileSystem\SmartFileSystem::class);
    $services->set(\Typo3RectorPrefix20210421\Symplify\PackageBuilder\Strings\StringFormatConverter::class);
    $services->set(\Typo3RectorPrefix20210421\Symplify\PackageBuilder\Console\Style\SymfonyStyleFactory::class);
    $services->set(\Typo3RectorPrefix20210421\Symfony\Component\Console\Style\SymfonyStyle::class)->factory([\Typo3RectorPrefix20210421\Symfony\Component\DependencyInjection\Loader\Configurator\service(\Typo3RectorPrefix20210421\Symplify\PackageBuilder\Console\Style\SymfonyStyleFactory::class), 'create']);
    $services->set(\Typo3RectorPrefix20210421\Symplify\SmartFileSystem\Json\JsonFileSystem::class);
    $services->set(\PhpParser\NodeVisitor\NodeConnectingVisitor::class);
    $services->set(\Typo3RectorPrefix20210421\Doctrine\Inflector\Rules\English\InflectorFactory::class);
    $services->set(\Typo3RectorPrefix20210421\Doctrine\Inflector\Inflector::class)->factory([\Typo3RectorPrefix20210421\Symfony\Component\DependencyInjection\Loader\Configurator\service(\Typo3RectorPrefix20210421\Doctrine\Inflector\Rules\English\InflectorFactory::class), 'build']);
    $services->set(\Typo3RectorPrefix20210421\Composer\Semver\VersionParser::class);
    $services->set(\Typo3RectorPrefix20210421\Symplify\PackageBuilder\Php\TypeChecker::class);
    // phpdoc parser
    $services->set(\PHPStan\PhpDocParser\Lexer\Lexer::class);
    $services->alias(\PHPStan\PhpDocParser\Parser\PhpDocParser::class, \Rector\BetterPhpDocParser\PhpDocParser\BetterPhpDocParser::class);
    // cache
    $services->set(\PHPStan\Dependency\DependencyResolver::class)->factory([\Typo3RectorPrefix20210421\Symfony\Component\DependencyInjection\Loader\Configurator\service(\Rector\NodeTypeResolver\DependencyInjection\PHPStanServicesFactory::class), 'createDependencyResolver']);
    $services->set(\PHPStan\File\FileHelper::class)->factory([\Typo3RectorPrefix20210421\Symfony\Component\DependencyInjection\Loader\Configurator\service(\Rector\NodeTypeResolver\DependencyInjection\PHPStanServicesFactory::class), 'createFileHelper']);
    $services->set(\Typo3RectorPrefix20210421\Nette\Caching\Cache::class)->factory([\Typo3RectorPrefix20210421\Symfony\Component\DependencyInjection\Loader\Configurator\service(\Rector\Caching\Cache\NetteCacheFactory::class), 'create']);
    // type resolving
    $services->set(\Rector\NodeTypeResolver\Reflection\BetterReflection\SourceLocator\IntermediateSourceLocator::class);
    $services->alias(\PHPStan\PhpDocParser\Parser\TypeParser::class, \Rector\BetterPhpDocParser\PhpDocParser\BetterTypeParser::class);
    // PHPStan services
    $services->set(\PHPStan\Reflection\ReflectionProvider::class)->factory([\Typo3RectorPrefix20210421\Symfony\Component\DependencyInjection\Loader\Configurator\service(\Rector\NodeTypeResolver\DependencyInjection\PHPStanServicesFactory::class), 'createReflectionProvider']);
    $services->set(\PHPStan\Analyser\NodeScopeResolver::class)->factory([\Typo3RectorPrefix20210421\Symfony\Component\DependencyInjection\Loader\Configurator\service(\Rector\NodeTypeResolver\DependencyInjection\PHPStanServicesFactory::class), 'createNodeScopeResolver']);
    $services->set(\PHPStan\Analyser\ScopeFactory::class)->factory([\Typo3RectorPrefix20210421\Symfony\Component\DependencyInjection\Loader\Configurator\service(\Rector\NodeTypeResolver\DependencyInjection\PHPStanServicesFactory::class), 'createScopeFactory']);
    $services->set(\PHPStan\PhpDoc\TypeNodeResolver::class)->factory([\Typo3RectorPrefix20210421\Symfony\Component\DependencyInjection\Loader\Configurator\service(\Rector\NodeTypeResolver\DependencyInjection\PHPStanServicesFactory::class), 'createTypeNodeResolver']);
    $services->set(\Rector\NodeTypeResolver\Reflection\BetterReflection\SourceLocatorProvider\DynamicSourceLocatorProvider::class)->factory([\Typo3RectorPrefix20210421\Symfony\Component\DependencyInjection\Loader\Configurator\service(\Rector\NodeTypeResolver\DependencyInjection\PHPStanServicesFactory::class), 'createDynamicSourceLocatorProvider']);
};
