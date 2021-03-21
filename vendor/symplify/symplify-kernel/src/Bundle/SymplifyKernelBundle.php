<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210321\Symplify\SymplifyKernel\Bundle;

use Typo3RectorPrefix20210321\Symfony\Component\DependencyInjection\ContainerBuilder;
use Typo3RectorPrefix20210321\Symfony\Component\HttpKernel\Bundle\Bundle;
use Typo3RectorPrefix20210321\Symplify\AutowireArrayParameter\DependencyInjection\CompilerPass\AutowireArrayParameterCompilerPass;
use Typo3RectorPrefix20210321\Symplify\SymplifyKernel\DependencyInjection\CompilerPass\PrepareConsoleApplicationCompilerPass;
use Typo3RectorPrefix20210321\Symplify\SymplifyKernel\DependencyInjection\Extension\SymplifyKernelExtension;
final class SymplifyKernelBundle extends \Typo3RectorPrefix20210321\Symfony\Component\HttpKernel\Bundle\Bundle
{
    public function build(\Typo3RectorPrefix20210321\Symfony\Component\DependencyInjection\ContainerBuilder $containerBuilder) : void
    {
        $containerBuilder->addCompilerPass(new \Typo3RectorPrefix20210321\Symplify\SymplifyKernel\DependencyInjection\CompilerPass\PrepareConsoleApplicationCompilerPass());
        $containerBuilder->addCompilerPass(new \Typo3RectorPrefix20210321\Symplify\AutowireArrayParameter\DependencyInjection\CompilerPass\AutowireArrayParameterCompilerPass());
    }
    protected function createContainerExtension() : \Typo3RectorPrefix20210321\Symplify\SymplifyKernel\DependencyInjection\Extension\SymplifyKernelExtension
    {
        return new \Typo3RectorPrefix20210321\Symplify\SymplifyKernel\DependencyInjection\Extension\SymplifyKernelExtension();
    }
}
