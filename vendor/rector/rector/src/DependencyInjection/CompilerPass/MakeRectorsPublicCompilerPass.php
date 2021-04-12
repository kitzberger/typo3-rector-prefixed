<?php

declare (strict_types=1);
namespace Rector\Core\DependencyInjection\CompilerPass;

use Rector\Core\Contract\Rector\RectorInterface;
use Typo3RectorPrefix20210412\Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Typo3RectorPrefix20210412\Symfony\Component\DependencyInjection\ContainerBuilder;
final class MakeRectorsPublicCompilerPass implements \Typo3RectorPrefix20210412\Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface
{
    public function process(\Typo3RectorPrefix20210412\Symfony\Component\DependencyInjection\ContainerBuilder $containerBuilder) : void
    {
        foreach ($containerBuilder->getDefinitions() as $definition) {
            if ($definition->getClass() === null) {
                continue;
            }
            if (!\is_a($definition->getClass(), \Rector\Core\Contract\Rector\RectorInterface::class, \true)) {
                continue;
            }
            $definition->setPublic(\true);
        }
    }
}
