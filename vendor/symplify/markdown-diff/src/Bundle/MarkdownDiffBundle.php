<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210228\Symplify\MarkdownDiff\Bundle;

use Typo3RectorPrefix20210228\Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Typo3RectorPrefix20210228\Symfony\Component\HttpKernel\Bundle\Bundle;
use Typo3RectorPrefix20210228\Symplify\MarkdownDiff\DependencyInjection\Extension\MarkdownDiffExtension;
final class MarkdownDiffBundle extends \Typo3RectorPrefix20210228\Symfony\Component\HttpKernel\Bundle\Bundle
{
    protected function createContainerExtension() : ?\Typo3RectorPrefix20210228\Symfony\Component\DependencyInjection\Extension\ExtensionInterface
    {
        return new \Typo3RectorPrefix20210228\Symplify\MarkdownDiff\DependencyInjection\Extension\MarkdownDiffExtension();
    }
}
