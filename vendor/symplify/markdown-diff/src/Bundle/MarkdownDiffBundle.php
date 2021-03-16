<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210316\Symplify\MarkdownDiff\Bundle;

use Typo3RectorPrefix20210316\Symfony\Component\HttpKernel\Bundle\Bundle;
use Typo3RectorPrefix20210316\Symplify\MarkdownDiff\DependencyInjection\Extension\MarkdownDiffExtension;
final class MarkdownDiffBundle extends \Typo3RectorPrefix20210316\Symfony\Component\HttpKernel\Bundle\Bundle
{
    protected function createContainerExtension() : \Typo3RectorPrefix20210316\Symplify\MarkdownDiff\DependencyInjection\Extension\MarkdownDiffExtension
    {
        return new \Typo3RectorPrefix20210316\Symplify\MarkdownDiff\DependencyInjection\Extension\MarkdownDiffExtension();
    }
}
