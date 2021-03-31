<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210331\Symplify\Astral\Bundle;

use Typo3RectorPrefix20210331\Symfony\Component\DependencyInjection\ContainerBuilder;
use Typo3RectorPrefix20210331\Symfony\Component\HttpKernel\Bundle\Bundle;
use Typo3RectorPrefix20210331\Symplify\Astral\DependencyInjection\Extension\AstralExtension;
use Typo3RectorPrefix20210331\Symplify\AutowireArrayParameter\DependencyInjection\CompilerPass\AutowireArrayParameterCompilerPass;
final class AstralBundle extends \Typo3RectorPrefix20210331\Symfony\Component\HttpKernel\Bundle\Bundle
{
    public function build(\Typo3RectorPrefix20210331\Symfony\Component\DependencyInjection\ContainerBuilder $containerBuilder) : void
    {
        $containerBuilder->addCompilerPass(new \Typo3RectorPrefix20210331\Symplify\AutowireArrayParameter\DependencyInjection\CompilerPass\AutowireArrayParameterCompilerPass());
    }
    protected function createContainerExtension() : \Typo3RectorPrefix20210331\Symplify\Astral\DependencyInjection\Extension\AstralExtension
    {
        return new \Typo3RectorPrefix20210331\Symplify\Astral\DependencyInjection\Extension\AstralExtension();
    }
}
