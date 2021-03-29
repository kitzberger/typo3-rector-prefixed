<?php

declare (strict_types=1);
namespace Symplify\RuleDocGenerator\HttpKernel;

use Typo3RectorPrefix20210329\Symfony\Component\Config\Loader\LoaderInterface;
use Typo3RectorPrefix20210329\Symfony\Component\HttpKernel\Bundle\BundleInterface;
use Typo3RectorPrefix20210329\Symplify\MarkdownDiff\Bundle\MarkdownDiffBundle;
use Typo3RectorPrefix20210329\Symplify\PhpConfigPrinter\Bundle\PhpConfigPrinterBundle;
use Typo3RectorPrefix20210329\Symplify\SymplifyKernel\Bundle\SymplifyKernelBundle;
use Typo3RectorPrefix20210329\Symplify\SymplifyKernel\HttpKernel\AbstractSymplifyKernel;
final class RuleDocGeneratorKernel extends \Typo3RectorPrefix20210329\Symplify\SymplifyKernel\HttpKernel\AbstractSymplifyKernel
{
    public function registerContainerConfiguration(\Typo3RectorPrefix20210329\Symfony\Component\Config\Loader\LoaderInterface $loader) : void
    {
        $loader->load(__DIR__ . '/../../config/config.php');
        parent::registerContainerConfiguration($loader);
    }
    /**
     * @return BundleInterface[]
     */
    public function registerBundles() : iterable
    {
        return [new \Typo3RectorPrefix20210329\Symplify\SymplifyKernel\Bundle\SymplifyKernelBundle(), new \Typo3RectorPrefix20210329\Symplify\MarkdownDiff\Bundle\MarkdownDiffBundle(), new \Typo3RectorPrefix20210329\Symplify\PhpConfigPrinter\Bundle\PhpConfigPrinterBundle()];
    }
}
