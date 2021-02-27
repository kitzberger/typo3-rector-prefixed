<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210227\Symplify\Skipper\Bundle;

use Typo3RectorPrefix20210227\Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Typo3RectorPrefix20210227\Symfony\Component\HttpKernel\Bundle\Bundle;
use Typo3RectorPrefix20210227\Symplify\Skipper\DependencyInjection\Extension\SkipperExtension;
final class SkipperBundle extends \Typo3RectorPrefix20210227\Symfony\Component\HttpKernel\Bundle\Bundle
{
    protected function createContainerExtension() : ?\Typo3RectorPrefix20210227\Symfony\Component\DependencyInjection\Extension\ExtensionInterface
    {
        return new \Typo3RectorPrefix20210227\Symplify\Skipper\DependencyInjection\Extension\SkipperExtension();
    }
}
