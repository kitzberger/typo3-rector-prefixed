<?php

declare (strict_types=1);
namespace Rector\Core\DependencyInjection\CompilerPass;

use Typo3RectorPrefix20210420\Nette\Utils\Strings;
use Rector\Core\Contract\Rector\RectorInterface;
use Rector\Core\Exception\ShouldNotHappenException;
use Typo3RectorPrefix20210420\Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Typo3RectorPrefix20210420\Symfony\Component\DependencyInjection\ContainerBuilder;
final class VerifyRectorServiceExistsCompilerPass implements \Typo3RectorPrefix20210420\Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface
{
    public function process(\Typo3RectorPrefix20210420\Symfony\Component\DependencyInjection\ContainerBuilder $containerBuilder) : void
    {
        foreach ($containerBuilder->getDefinitions() as $definition) {
            $class = $definition->getClass();
            if ($class === null) {
                continue;
            }
            if (!\Typo3RectorPrefix20210420\Nette\Utils\Strings::endsWith($class, 'Rector')) {
                continue;
            }
            if (!\is_a($class, \Rector\Core\Contract\Rector\RectorInterface::class, \true)) {
                throw new \Rector\Core\Exception\ShouldNotHappenException(\sprintf('Rector rule "%s" not found, please verify that the rule exists', $class));
            }
        }
    }
}
