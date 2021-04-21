<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210421\Symplify\PackageBuilder\Testing;

use Typo3RectorPrefix20210421\PHPUnit\Framework\TestCase;
use ReflectionClass;
use Typo3RectorPrefix20210421\Symfony\Component\Console\Output\OutputInterface;
use Typo3RectorPrefix20210421\Symfony\Component\Console\Style\SymfonyStyle;
use Typo3RectorPrefix20210421\Symfony\Component\DependencyInjection\Container;
use Typo3RectorPrefix20210421\Symfony\Component\DependencyInjection\ContainerInterface;
use Typo3RectorPrefix20210421\Symfony\Component\HttpKernel\KernelInterface;
use Typo3RectorPrefix20210421\Symfony\Contracts\Service\ResetInterface;
use Typo3RectorPrefix20210421\Symplify\PackageBuilder\Contract\HttpKernel\ExtraConfigAwareKernelInterface;
use Typo3RectorPrefix20210421\Symplify\PackageBuilder\Exception\HttpKernel\MissingInterfaceException;
use Typo3RectorPrefix20210421\Symplify\SmartFileSystem\SmartFileInfo;
use Typo3RectorPrefix20210421\Symplify\SymplifyKernel\Exception\ShouldNotHappenException;
/**
 * Inspiration
 *
 * @see https://github.com/symfony/symfony/blob/master/src/Symfony/Bundle/FrameworkBundle/Test/KernelTestCase.php
 */
abstract class AbstractKernelTestCase extends \Typo3RectorPrefix20210421\PHPUnit\Framework\TestCase
{
    /**
     * @var KernelInterface
     */
    protected static $kernel;
    /**
     * @var ContainerInterface|Container
     */
    protected static $container;
    /**
     * @var array<string, KernelInterface>
     */
    private static $kernelsByHash = [];
    /**
     * @param class-string<KernelInterface> $kernelClass
     * @param string[]|SmartFileInfo[] $configs
     */
    protected function bootKernelWithConfigs(string $kernelClass, array $configs) : \Typo3RectorPrefix20210421\Symfony\Component\HttpKernel\KernelInterface
    {
        // unwrap file infos to real paths
        $configFilePaths = $this->resolveConfigFilePaths($configs);
        $configsHash = $this->resolveConfigsHash($configFilePaths);
        $this->ensureKernelShutdown();
        $bootedKernel = $this->createBootedKernelFromConfigs($kernelClass, $configsHash, $configFilePaths);
        static::$kernel = $bootedKernel;
        return $bootedKernel;
    }
    /**
     * @param class-string<KernelInterface> $kernelClass
     * @param string[]|SmartFileInfo[] $configs
     */
    protected function bootKernelWithConfigsAndStaticCache(string $kernelClass, array $configs) : \Typo3RectorPrefix20210421\Symfony\Component\HttpKernel\KernelInterface
    {
        // unwrap file infos to real paths
        $configFilePaths = $this->resolveConfigFilePaths($configs);
        $configsHash = $this->resolveConfigsHash($configFilePaths);
        if (isset(self::$kernelsByHash[$configsHash])) {
            static::$kernel = self::$kernelsByHash[$configsHash];
            self::$container = static::$kernel->getContainer();
        } else {
            $bootedKernel = $this->createBootedKernelFromConfigs($kernelClass, $configsHash, $configFilePaths);
            static::$kernel = $bootedKernel;
            self::$kernelsByHash[$configsHash] = $bootedKernel;
        }
        return static::$kernel;
    }
    /**
     * Syntax sugger to remove static from the test cases vission
     *
     * @template T of object
     * @param class-string<T> $type
     * @return T
     */
    protected function getService(string $type) : object
    {
        if (self::$container === null) {
            throw new \Typo3RectorPrefix20210421\Symplify\SymplifyKernel\Exception\ShouldNotHappenException('First, crewate container with booKernel(KernelClass::class)');
        }
        return self::$container->get($type);
    }
    protected function bootKernel(string $kernelClass) : void
    {
        $this->ensureKernelShutdown();
        $kernel = new $kernelClass('test', \true);
        if (!$kernel instanceof \Typo3RectorPrefix20210421\Symfony\Component\HttpKernel\KernelInterface) {
            throw new \Typo3RectorPrefix20210421\Symplify\SymplifyKernel\Exception\ShouldNotHappenException();
        }
        static::$kernel = $this->bootAndReturnKernel($kernel);
    }
    /**
     * Shuts the kernel down if it was used in the test.
     */
    protected function ensureKernelShutdown() : void
    {
        if (static::$kernel !== null) {
            // make sure boot() is called
            // @see https://github.com/symfony/symfony/pull/31202/files
            $kernelReflectionClass = new \ReflectionClass(static::$kernel);
            $containerReflectionProperty = $kernelReflectionClass->getProperty('container');
            $containerReflectionProperty->setAccessible(\true);
            $kernel = $containerReflectionProperty->getValue(static::$kernel);
            if ($kernel !== null) {
                $container = static::$kernel->getContainer();
                static::$kernel->shutdown();
                if ($container instanceof \Typo3RectorPrefix20210421\Symfony\Contracts\Service\ResetInterface) {
                    $container->reset();
                }
            }
        }
        static::$container = null;
    }
    /**
     * @param string[] $configs
     */
    protected function resolveConfigsHash(array $configs) : string
    {
        $configsHash = '';
        foreach ($configs as $config) {
            $configsHash .= \md5_file($config);
        }
        return \md5($configsHash);
    }
    /**
     * @param string[]|SmartFileInfo[] $configs
     * @return string[]
     */
    protected function resolveConfigFilePaths(array $configs) : array
    {
        $configFilePaths = [];
        foreach ($configs as $config) {
            $configFilePaths[] = $config instanceof \Typo3RectorPrefix20210421\Symplify\SmartFileSystem\SmartFileInfo ? $config->getRealPath() : $config;
        }
        return $configFilePaths;
    }
    private function ensureIsConfigAwareKernel(\Typo3RectorPrefix20210421\Symfony\Component\HttpKernel\KernelInterface $kernel) : void
    {
        if ($kernel instanceof \Typo3RectorPrefix20210421\Symplify\PackageBuilder\Contract\HttpKernel\ExtraConfigAwareKernelInterface) {
            return;
        }
        throw new \Typo3RectorPrefix20210421\Symplify\PackageBuilder\Exception\HttpKernel\MissingInterfaceException(\sprintf('"%s" is missing an "%s" interface', \get_class($kernel), \Typo3RectorPrefix20210421\Symplify\PackageBuilder\Contract\HttpKernel\ExtraConfigAwareKernelInterface::class));
    }
    private function bootAndReturnKernel(\Typo3RectorPrefix20210421\Symfony\Component\HttpKernel\KernelInterface $kernel) : \Typo3RectorPrefix20210421\Symfony\Component\HttpKernel\KernelInterface
    {
        $kernel->boot();
        $container = $kernel->getContainer();
        // private → public service hack?
        if ($container->has('test.service_container')) {
            $container = $container->get('test.service_container');
        }
        if (!$container instanceof \Typo3RectorPrefix20210421\Symfony\Component\DependencyInjection\ContainerInterface) {
            throw new \Typo3RectorPrefix20210421\Symplify\SymplifyKernel\Exception\ShouldNotHappenException();
        }
        // has output? keep it silent out of tests
        if ($container->has(\Typo3RectorPrefix20210421\Symfony\Component\Console\Style\SymfonyStyle::class)) {
            $symfonyStyle = $container->get(\Typo3RectorPrefix20210421\Symfony\Component\Console\Style\SymfonyStyle::class);
            $symfonyStyle->setVerbosity(\Typo3RectorPrefix20210421\Symfony\Component\Console\Output\OutputInterface::VERBOSITY_QUIET);
        }
        static::$container = $container;
        return $kernel;
    }
    /**
     * @param string[] $configFilePaths
     */
    private function createBootedKernelFromConfigs(string $kernelClass, string $configsHash, array $configFilePaths) : \Typo3RectorPrefix20210421\Symfony\Component\HttpKernel\KernelInterface
    {
        $kernel = new $kernelClass('test_' . $configsHash, \true);
        $this->ensureIsConfigAwareKernel($kernel);
        /** @var ExtraConfigAwareKernelInterface $kernel */
        $kernel->setConfigs($configFilePaths);
        return $this->bootAndReturnKernel($kernel);
    }
}
