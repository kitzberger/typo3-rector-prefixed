<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210318\Symplify\PhpConfigPrinter\Bundle;

use Typo3RectorPrefix20210318\Symfony\Component\DependencyInjection\ContainerBuilder;
use Typo3RectorPrefix20210318\Symfony\Component\HttpKernel\Bundle\Bundle;
use Typo3RectorPrefix20210318\Symplify\AutowireArrayParameter\DependencyInjection\CompilerPass\AutowireArrayParameterCompilerPass;
use Typo3RectorPrefix20210318\Symplify\PhpConfigPrinter\Contract\SymfonyVersionFeatureGuardInterface;
use Typo3RectorPrefix20210318\Symplify\PhpConfigPrinter\Contract\YamlFileContentProviderInterface;
use Typo3RectorPrefix20210318\Symplify\PhpConfigPrinter\DependencyInjection\Extension\PhpConfigPrinterExtension;
use Typo3RectorPrefix20210318\Symplify\PhpConfigPrinter\Dummy\DummySymfonyVersionFeatureGuard;
use Typo3RectorPrefix20210318\Symplify\PhpConfigPrinter\Dummy\DummyYamlFileContentProvider;
/**
 * This class is dislocated in non-standard location, so it's not added by symfony/flex to bundles.php and cause app to
 * crash. See https://github.com/symplify/symplify/issues/1952#issuecomment-628765364
 */
final class PhpConfigPrinterBundle extends \Typo3RectorPrefix20210318\Symfony\Component\HttpKernel\Bundle\Bundle
{
    public function build(\Typo3RectorPrefix20210318\Symfony\Component\DependencyInjection\ContainerBuilder $containerBuilder) : void
    {
        $this->registerDefaultImplementations($containerBuilder);
        $containerBuilder->addCompilerPass(new \Typo3RectorPrefix20210318\Symplify\AutowireArrayParameter\DependencyInjection\CompilerPass\AutowireArrayParameterCompilerPass());
    }
    protected function createContainerExtension() : \Typo3RectorPrefix20210318\Symplify\PhpConfigPrinter\DependencyInjection\Extension\PhpConfigPrinterExtension
    {
        return new \Typo3RectorPrefix20210318\Symplify\PhpConfigPrinter\DependencyInjection\Extension\PhpConfigPrinterExtension();
    }
    private function registerDefaultImplementations(\Typo3RectorPrefix20210318\Symfony\Component\DependencyInjection\ContainerBuilder $containerBuilder) : void
    {
        // set default implementations, if none provided - for better developer experience out of the box
        if (!$containerBuilder->has(\Typo3RectorPrefix20210318\Symplify\PhpConfigPrinter\Contract\YamlFileContentProviderInterface::class)) {
            $containerBuilder->autowire(\Typo3RectorPrefix20210318\Symplify\PhpConfigPrinter\Dummy\DummyYamlFileContentProvider::class)->setPublic(\true);
            $containerBuilder->setAlias(\Typo3RectorPrefix20210318\Symplify\PhpConfigPrinter\Contract\YamlFileContentProviderInterface::class, \Typo3RectorPrefix20210318\Symplify\PhpConfigPrinter\Dummy\DummyYamlFileContentProvider::class);
        }
        if (!$containerBuilder->has(\Typo3RectorPrefix20210318\Symplify\PhpConfigPrinter\Contract\SymfonyVersionFeatureGuardInterface::class)) {
            $containerBuilder->autowire(\Typo3RectorPrefix20210318\Symplify\PhpConfigPrinter\Dummy\DummySymfonyVersionFeatureGuard::class)->setPublic(\true);
            $containerBuilder->setAlias(\Typo3RectorPrefix20210318\Symplify\PhpConfigPrinter\Contract\SymfonyVersionFeatureGuardInterface::class, \Typo3RectorPrefix20210318\Symplify\PhpConfigPrinter\Dummy\DummySymfonyVersionFeatureGuard::class);
        }
    }
}
