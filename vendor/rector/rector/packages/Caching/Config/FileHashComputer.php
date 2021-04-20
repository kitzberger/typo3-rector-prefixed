<?php

declare (strict_types=1);
namespace Rector\Caching\Config;

use Rector\Core\Exception\ShouldNotHappenException;
use Typo3RectorPrefix20210420\Symfony\Component\Config\FileLocator;
use Typo3RectorPrefix20210420\Symfony\Component\Config\Loader\LoaderInterface;
use Typo3RectorPrefix20210420\Symfony\Component\Config\Loader\LoaderResolver;
use Typo3RectorPrefix20210420\Symfony\Component\DependencyInjection\ContainerBuilder;
use Typo3RectorPrefix20210420\Symfony\Component\DependencyInjection\Loader\GlobFileLoader;
use Typo3RectorPrefix20210420\Symfony\Component\DependencyInjection\Loader\PhpFileLoader;
use Typo3RectorPrefix20210420\Symplify\SmartFileSystem\SmartFileInfo;
/**
 * Inspired by https://github.com/symplify/easy-coding-standard/blob/e598ab54686e416788f28fcfe007fd08e0f371d9/packages/changed-files-detector/src/FileHashComputer.php
 * @see \Rector\Caching\Tests\Config\FileHashComputerTest
 */
final class FileHashComputer
{
    public function compute(\Typo3RectorPrefix20210420\Symplify\SmartFileSystem\SmartFileInfo $fileInfo) : string
    {
        $this->ensureIsPhp($fileInfo);
        $containerBuilder = new \Typo3RectorPrefix20210420\Symfony\Component\DependencyInjection\ContainerBuilder();
        $fileLoader = $this->createFileLoader($fileInfo, $containerBuilder);
        $fileLoader->load($fileInfo->getRealPath());
        $parameterBag = $containerBuilder->getParameterBag();
        return $this->arrayToHash($containerBuilder->getDefinitions()) . $this->arrayToHash($parameterBag->all());
    }
    private function ensureIsPhp(\Typo3RectorPrefix20210420\Symplify\SmartFileSystem\SmartFileInfo $fileInfo) : void
    {
        if ($fileInfo->hasSuffixes(['php'])) {
            return;
        }
        throw new \Rector\Core\Exception\ShouldNotHappenException(\sprintf(
            // getRealPath() cannot be used, as it breaks in phar
            'Provide only PHP file, ready for Symfony Dependency Injection. "%s" given',
            $fileInfo->getRelativeFilePath()
        ));
    }
    private function createFileLoader(\Typo3RectorPrefix20210420\Symplify\SmartFileSystem\SmartFileInfo $fileInfo, \Typo3RectorPrefix20210420\Symfony\Component\DependencyInjection\ContainerBuilder $containerBuilder) : \Typo3RectorPrefix20210420\Symfony\Component\Config\Loader\LoaderInterface
    {
        $fileLocator = new \Typo3RectorPrefix20210420\Symfony\Component\Config\FileLocator([$fileInfo->getPath()]);
        $fileLoaders = [new \Typo3RectorPrefix20210420\Symfony\Component\DependencyInjection\Loader\GlobFileLoader($containerBuilder, $fileLocator), new \Typo3RectorPrefix20210420\Symfony\Component\DependencyInjection\Loader\PhpFileLoader($containerBuilder, $fileLocator)];
        $loaderResolver = new \Typo3RectorPrefix20210420\Symfony\Component\Config\Loader\LoaderResolver($fileLoaders);
        $loader = $loaderResolver->resolve($fileInfo->getRealPath());
        if (!$loader) {
            throw new \Rector\Core\Exception\ShouldNotHappenException();
        }
        return $loader;
    }
    /**
     * @param mixed[] $array
     */
    private function arrayToHash(array $array) : string
    {
        $serializedArray = \serialize($array);
        return \md5($serializedArray);
    }
}
