<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210401\Symplify\ConsoleColorDiff\Bundle;

use Typo3RectorPrefix20210401\Symfony\Component\HttpKernel\Bundle\Bundle;
use Typo3RectorPrefix20210401\Symplify\ConsoleColorDiff\DependencyInjection\Extension\ConsoleColorDiffExtension;
final class ConsoleColorDiffBundle extends \Typo3RectorPrefix20210401\Symfony\Component\HttpKernel\Bundle\Bundle
{
    protected function createContainerExtension() : \Typo3RectorPrefix20210401\Symplify\ConsoleColorDiff\DependencyInjection\Extension\ConsoleColorDiffExtension
    {
        return new \Typo3RectorPrefix20210401\Symplify\ConsoleColorDiff\DependencyInjection\Extension\ConsoleColorDiffExtension();
    }
}
