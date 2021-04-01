<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210401\Symplify\SymplifyKernel\DependencyInjection\CompilerPass;

use Typo3RectorPrefix20210401\Symfony\Component\Console\Application;
use Typo3RectorPrefix20210401\Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Typo3RectorPrefix20210401\Symfony\Component\DependencyInjection\ContainerBuilder;
use Typo3RectorPrefix20210401\Symfony\Component\DependencyInjection\Reference;
use Typo3RectorPrefix20210401\Symplify\SymplifyKernel\Console\AutowiredConsoleApplication;
use Typo3RectorPrefix20210401\Symplify\SymplifyKernel\Console\ConsoleApplicationFactory;
final class PrepareConsoleApplicationCompilerPass implements \Typo3RectorPrefix20210401\Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface
{
    public function process(\Typo3RectorPrefix20210401\Symfony\Component\DependencyInjection\ContainerBuilder $containerBuilder) : void
    {
        $consoleApplicationClass = $this->resolveConsoleApplicationClass($containerBuilder);
        if ($consoleApplicationClass === null) {
            $this->registerAutowiredSymfonyConsole($containerBuilder);
            return;
        }
        // add console application alias
        if ($consoleApplicationClass === \Typo3RectorPrefix20210401\Symfony\Component\Console\Application::class) {
            return;
        }
        $containerBuilder->setAlias(\Typo3RectorPrefix20210401\Symfony\Component\Console\Application::class, $consoleApplicationClass)->setPublic(\true);
        // calls
        // resolve name
        // resolve version
    }
    private function resolveConsoleApplicationClass(\Typo3RectorPrefix20210401\Symfony\Component\DependencyInjection\ContainerBuilder $containerBuilder) : ?string
    {
        foreach ($containerBuilder->getDefinitions() as $definition) {
            if (!\is_a((string) $definition->getClass(), \Typo3RectorPrefix20210401\Symfony\Component\Console\Application::class, \true)) {
                continue;
            }
            return $definition->getClass();
        }
        return null;
    }
    /**
     * Missing console application? add basic one
     */
    private function registerAutowiredSymfonyConsole(\Typo3RectorPrefix20210401\Symfony\Component\DependencyInjection\ContainerBuilder $containerBuilder) : void
    {
        $containerBuilder->autowire(\Typo3RectorPrefix20210401\Symplify\SymplifyKernel\Console\AutowiredConsoleApplication::class, \Typo3RectorPrefix20210401\Symplify\SymplifyKernel\Console\AutowiredConsoleApplication::class)->setFactory([new \Typo3RectorPrefix20210401\Symfony\Component\DependencyInjection\Reference(\Typo3RectorPrefix20210401\Symplify\SymplifyKernel\Console\ConsoleApplicationFactory::class), 'create']);
        $containerBuilder->setAlias(\Typo3RectorPrefix20210401\Symfony\Component\Console\Application::class, \Typo3RectorPrefix20210401\Symplify\SymplifyKernel\Console\AutowiredConsoleApplication::class)->setPublic(\true);
    }
}
