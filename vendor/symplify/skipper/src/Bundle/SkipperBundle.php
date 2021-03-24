<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210324\Symplify\Skipper\Bundle;

use Typo3RectorPrefix20210324\Symfony\Component\HttpKernel\Bundle\Bundle;
use Typo3RectorPrefix20210324\Symplify\Skipper\DependencyInjection\Extension\SkipperExtension;
final class SkipperBundle extends \Typo3RectorPrefix20210324\Symfony\Component\HttpKernel\Bundle\Bundle
{
    protected function createContainerExtension() : \Typo3RectorPrefix20210324\Symplify\Skipper\DependencyInjection\Extension\SkipperExtension
    {
        return new \Typo3RectorPrefix20210324\Symplify\Skipper\DependencyInjection\Extension\SkipperExtension();
    }
}
