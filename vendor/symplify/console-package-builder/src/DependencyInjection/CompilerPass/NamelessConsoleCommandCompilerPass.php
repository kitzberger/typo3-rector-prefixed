<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210318\Symplify\ConsolePackageBuilder\DependencyInjection\CompilerPass;

use Typo3RectorPrefix20210318\Symfony\Component\Console\Command\Command;
use Typo3RectorPrefix20210318\Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Typo3RectorPrefix20210318\Symfony\Component\DependencyInjection\ContainerBuilder;
use Typo3RectorPrefix20210318\Symplify\PackageBuilder\Console\Command\CommandNaming;
/**
 * @see \Symplify\ConsolePackageBuilder\Tests\DependencyInjection\CompilerPass\NamelessConsoleCommandCompilerPassTest
 */
final class NamelessConsoleCommandCompilerPass implements \Typo3RectorPrefix20210318\Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface
{
    public function process(\Typo3RectorPrefix20210318\Symfony\Component\DependencyInjection\ContainerBuilder $containerBuilder) : void
    {
        foreach ($containerBuilder->getDefinitions() as $definition) {
            $definitionClass = $definition->getClass();
            if ($definitionClass === null) {
                continue;
            }
            if (!\is_a($definitionClass, \Typo3RectorPrefix20210318\Symfony\Component\Console\Command\Command::class, \true)) {
                continue;
            }
            $commandName = \Typo3RectorPrefix20210318\Symplify\PackageBuilder\Console\Command\CommandNaming::classToName($definitionClass);
            $definition->addMethodCall('setName', [$commandName]);
        }
    }
}
