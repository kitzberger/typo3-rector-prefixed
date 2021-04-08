<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210408\Symplify\PhpConfigPrinter\HttpKernel;

use Typo3RectorPrefix20210408\Symfony\Component\Config\Loader\LoaderInterface;
use Typo3RectorPrefix20210408\Symfony\Component\HttpKernel\Bundle\BundleInterface;
use Typo3RectorPrefix20210408\Symplify\PackageBuilder\Contract\HttpKernel\ExtraConfigAwareKernelInterface;
use Typo3RectorPrefix20210408\Symplify\PhpConfigPrinter\Bundle\PhpConfigPrinterBundle;
use Typo3RectorPrefix20210408\Symplify\SymplifyKernel\HttpKernel\AbstractSymplifyKernel;
final class PhpConfigPrinterKernel extends \Typo3RectorPrefix20210408\Symplify\SymplifyKernel\HttpKernel\AbstractSymplifyKernel implements \Typo3RectorPrefix20210408\Symplify\PackageBuilder\Contract\HttpKernel\ExtraConfigAwareKernelInterface
{
    /**
     * @var string[]
     */
    private $configs = [];
    public function registerContainerConfiguration(\Typo3RectorPrefix20210408\Symfony\Component\Config\Loader\LoaderInterface $loader) : void
    {
        $loader->load(__DIR__ . '/../../config/config.php');
        foreach ($this->configs as $config) {
            $loader->load($config);
        }
    }
    /**
     * @return BundleInterface[]
     */
    public function registerBundles() : iterable
    {
        return [new \Typo3RectorPrefix20210408\Symplify\PhpConfigPrinter\Bundle\PhpConfigPrinterBundle()];
    }
    /**
     * @param string[] $configs
     */
    public function setConfigs(array $configs) : void
    {
        $this->configs = $configs;
    }
}
