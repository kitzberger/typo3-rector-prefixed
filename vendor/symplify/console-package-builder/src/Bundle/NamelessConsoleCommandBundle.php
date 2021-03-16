<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210316\Symplify\ConsolePackageBuilder\Bundle;

use Typo3RectorPrefix20210316\Symfony\Component\DependencyInjection\ContainerBuilder;
use Typo3RectorPrefix20210316\Symfony\Component\HttpKernel\Bundle\Bundle;
use Typo3RectorPrefix20210316\Symplify\ConsolePackageBuilder\DependencyInjection\CompilerPass\NamelessConsoleCommandCompilerPass;
final class NamelessConsoleCommandBundle extends \Typo3RectorPrefix20210316\Symfony\Component\HttpKernel\Bundle\Bundle
{
    public function build(\Typo3RectorPrefix20210316\Symfony\Component\DependencyInjection\ContainerBuilder $containerBuilder) : void
    {
        $containerBuilder->addCompilerPass(new \Typo3RectorPrefix20210316\Symplify\ConsolePackageBuilder\DependencyInjection\CompilerPass\NamelessConsoleCommandCompilerPass());
    }
}
