<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210415\Symplify\Skipper\HttpKernel;

use Typo3RectorPrefix20210415\Symfony\Component\Config\Loader\LoaderInterface;
use Typo3RectorPrefix20210415\Symfony\Component\HttpKernel\Bundle\BundleInterface;
use Typo3RectorPrefix20210415\Symplify\Skipper\Bundle\SkipperBundle;
use Typo3RectorPrefix20210415\Symplify\SymplifyKernel\Bundle\SymplifyKernelBundle;
use Typo3RectorPrefix20210415\Symplify\SymplifyKernel\HttpKernel\AbstractSymplifyKernel;
final class SkipperKernel extends \Typo3RectorPrefix20210415\Symplify\SymplifyKernel\HttpKernel\AbstractSymplifyKernel
{
    public function registerContainerConfiguration(\Typo3RectorPrefix20210415\Symfony\Component\Config\Loader\LoaderInterface $loader) : void
    {
        $loader->load(__DIR__ . '/../../config/config.php');
        parent::registerContainerConfiguration($loader);
    }
    /**
     * @return BundleInterface[]
     */
    public function registerBundles() : iterable
    {
        return [new \Typo3RectorPrefix20210415\Symplify\Skipper\Bundle\SkipperBundle(), new \Typo3RectorPrefix20210415\Symplify\SymplifyKernel\Bundle\SymplifyKernelBundle()];
    }
}
