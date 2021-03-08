<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210308;

use PHPStan\Dependency\DependencyResolver;
use PHPStan\File\FileHelper;
use Typo3RectorPrefix20210308\Psr\Cache\CacheItemPoolInterface;
use Typo3RectorPrefix20210308\Psr\SimpleCache\CacheInterface;
use Rector\Caching\Cache\Adapter\FilesystemAdapterFactory;
use Rector\Core\Configuration\Option;
use Rector\NodeTypeResolver\DependencyInjection\PHPStanServicesFactory;
use Typo3RectorPrefix20210308\Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Typo3RectorPrefix20210308\Symfony\Component\Cache\Adapter\TagAwareAdapter;
use Typo3RectorPrefix20210308\Symfony\Component\Cache\Adapter\TagAwareAdapterInterface;
use Typo3RectorPrefix20210308\Symfony\Component\Cache\Psr16Cache;
use Typo3RectorPrefix20210308\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use function Typo3RectorPrefix20210308\Symfony\Component\DependencyInjection\Loader\Configurator\service;
return static function (\Typo3RectorPrefix20210308\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $parameters = $containerConfigurator->parameters();
    $parameters->set(\Rector\Core\Configuration\Option::ENABLE_CACHE, \false);
    $parameters->set(\Rector\Core\Configuration\Option::CACHE_DIR, \sys_get_temp_dir() . '/_rector_cached_files');
    $services = $containerConfigurator->services();
    $services->defaults()->autowire()->public()->autoconfigure();
    $services->load('Rector\\Caching\\', __DIR__ . '/../src');
    $services->set(\PHPStan\Dependency\DependencyResolver::class)->factory([\Typo3RectorPrefix20210308\Symfony\Component\DependencyInjection\Loader\Configurator\service(\Rector\NodeTypeResolver\DependencyInjection\PHPStanServicesFactory::class), 'createDependencyResolver']);
    $services->set(\PHPStan\File\FileHelper::class)->factory([\Typo3RectorPrefix20210308\Symfony\Component\DependencyInjection\Loader\Configurator\service(\Rector\NodeTypeResolver\DependencyInjection\PHPStanServicesFactory::class), 'createFileHelper']);
    $services->set(\Typo3RectorPrefix20210308\Symfony\Component\Cache\Psr16Cache::class);
    $services->alias(\Typo3RectorPrefix20210308\Psr\SimpleCache\CacheInterface::class, \Typo3RectorPrefix20210308\Symfony\Component\Cache\Psr16Cache::class);
    $services->set(\Typo3RectorPrefix20210308\Symfony\Component\Cache\Adapter\FilesystemAdapter::class)->factory([\Typo3RectorPrefix20210308\Symfony\Component\DependencyInjection\Loader\Configurator\service(\Rector\Caching\Cache\Adapter\FilesystemAdapterFactory::class), 'create']);
    $services->set(\Typo3RectorPrefix20210308\Symfony\Component\Cache\Adapter\TagAwareAdapter::class)->arg('$itemsPool', \Typo3RectorPrefix20210308\Symfony\Component\DependencyInjection\Loader\Configurator\service(\Typo3RectorPrefix20210308\Symfony\Component\Cache\Adapter\FilesystemAdapter::class));
    $services->alias(\Typo3RectorPrefix20210308\Psr\Cache\CacheItemPoolInterface::class, \Typo3RectorPrefix20210308\Symfony\Component\Cache\Adapter\FilesystemAdapter::class);
    $services->alias(\Typo3RectorPrefix20210308\Symfony\Component\Cache\Adapter\TagAwareAdapterInterface::class, \Typo3RectorPrefix20210308\Symfony\Component\Cache\Adapter\TagAwareAdapter::class);
};
