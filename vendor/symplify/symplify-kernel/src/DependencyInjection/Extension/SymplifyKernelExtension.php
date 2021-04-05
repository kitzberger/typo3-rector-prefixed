<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210405\Symplify\SymplifyKernel\DependencyInjection\Extension;

use Typo3RectorPrefix20210405\Symfony\Component\Config\FileLocator;
use Typo3RectorPrefix20210405\Symfony\Component\DependencyInjection\ContainerBuilder;
use Typo3RectorPrefix20210405\Symfony\Component\DependencyInjection\Extension\Extension;
use Typo3RectorPrefix20210405\Symfony\Component\DependencyInjection\Loader\PhpFileLoader;
final class SymplifyKernelExtension extends \Typo3RectorPrefix20210405\Symfony\Component\DependencyInjection\Extension\Extension
{
    /**
     * @param string[] $configs
     */
    public function load(array $configs, \Typo3RectorPrefix20210405\Symfony\Component\DependencyInjection\ContainerBuilder $containerBuilder) : void
    {
        $phpFileLoader = new \Typo3RectorPrefix20210405\Symfony\Component\DependencyInjection\Loader\PhpFileLoader($containerBuilder, new \Typo3RectorPrefix20210405\Symfony\Component\Config\FileLocator(__DIR__ . '/../../../config'));
        $phpFileLoader->load('common-config.php');
    }
}
