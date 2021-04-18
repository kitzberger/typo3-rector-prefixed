<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210418\Symplify\AutowireArrayParameter\Tests\HttpKernel;

use Typo3RectorPrefix20210418\Symfony\Component\Config\Loader\LoaderInterface;
use Typo3RectorPrefix20210418\Symfony\Component\DependencyInjection\ContainerBuilder;
use Typo3RectorPrefix20210418\Symfony\Component\HttpKernel\Bundle\BundleInterface;
use Typo3RectorPrefix20210418\Symfony\Component\HttpKernel\Kernel;
use Typo3RectorPrefix20210418\Symplify\AutowireArrayParameter\DependencyInjection\CompilerPass\AutowireArrayParameterCompilerPass;
final class AutowireArrayParameterHttpKernel extends \Typo3RectorPrefix20210418\Symfony\Component\HttpKernel\Kernel
{
    public function __construct()
    {
        // to invoke container override for test re-run
        parent::__construct('dev' . \random_int(0, 10000), \true);
    }
    public function registerContainerConfiguration(\Typo3RectorPrefix20210418\Symfony\Component\Config\Loader\LoaderInterface $loader) : void
    {
        $loader->load(__DIR__ . '/../config/autowire_array_parameter.php');
    }
    public function getCacheDir() : string
    {
        return \sys_get_temp_dir() . '/autowire_array_parameter_test';
    }
    public function getLogDir() : string
    {
        return \sys_get_temp_dir() . '/autowire_array_parameter_test_log';
    }
    /**
     * @return BundleInterface[]
     */
    public function registerBundles() : iterable
    {
        return [];
    }
    protected function build(\Typo3RectorPrefix20210418\Symfony\Component\DependencyInjection\ContainerBuilder $containerBuilder) : void
    {
        $containerBuilder->addCompilerPass(new \Typo3RectorPrefix20210418\Symplify\AutowireArrayParameter\DependencyInjection\CompilerPass\AutowireArrayParameterCompilerPass());
    }
}
