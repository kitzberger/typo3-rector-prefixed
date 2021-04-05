<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210405\Symplify\SymplifyKernel\HttpKernel;

use Typo3RectorPrefix20210405\Symfony\Component\Config\Loader\LoaderInterface;
use Typo3RectorPrefix20210405\Symfony\Component\HttpKernel\Bundle\BundleInterface;
use Typo3RectorPrefix20210405\Symfony\Component\HttpKernel\Kernel;
use Typo3RectorPrefix20210405\Symplify\PackageBuilder\Contract\HttpKernel\ExtraConfigAwareKernelInterface;
use Typo3RectorPrefix20210405\Symplify\SmartFileSystem\SmartFileInfo;
use Typo3RectorPrefix20210405\Symplify\SymplifyKernel\Bundle\SymplifyKernelBundle;
use Typo3RectorPrefix20210405\Symplify\SymplifyKernel\Strings\KernelUniqueHasher;
abstract class AbstractSymplifyKernel extends \Typo3RectorPrefix20210405\Symfony\Component\HttpKernel\Kernel implements \Typo3RectorPrefix20210405\Symplify\PackageBuilder\Contract\HttpKernel\ExtraConfigAwareKernelInterface
{
    /**
     * @var string[]
     */
    private $configs = [];
    public function getCacheDir() : string
    {
        return \sys_get_temp_dir() . '/' . $this->getUniqueKernelHash();
    }
    public function getLogDir() : string
    {
        return \sys_get_temp_dir() . '/' . $this->getUniqueKernelHash() . '_log';
    }
    /**
     * @return BundleInterface[]
     */
    public function registerBundles() : iterable
    {
        return [new \Typo3RectorPrefix20210405\Symplify\SymplifyKernel\Bundle\SymplifyKernelBundle()];
    }
    /**
     * @param string[]|SmartFileInfo[] $configs
     */
    public function setConfigs(array $configs) : void
    {
        foreach ($configs as $config) {
            if ($config instanceof \Typo3RectorPrefix20210405\Symplify\SmartFileSystem\SmartFileInfo) {
                $config = $config->getRealPath();
            }
            $this->configs[] = $config;
        }
    }
    public function registerContainerConfiguration(\Typo3RectorPrefix20210405\Symfony\Component\Config\Loader\LoaderInterface $loader) : void
    {
        foreach ($this->configs as $config) {
            $loader->load($config);
        }
    }
    private function getUniqueKernelHash() : string
    {
        $kernelUniqueHasher = new \Typo3RectorPrefix20210405\Symplify\SymplifyKernel\Strings\KernelUniqueHasher();
        return $kernelUniqueHasher->hashKernelClass(static::class);
    }
}
