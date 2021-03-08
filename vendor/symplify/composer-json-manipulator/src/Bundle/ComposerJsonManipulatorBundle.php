<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210308\Symplify\ComposerJsonManipulator\Bundle;

use Typo3RectorPrefix20210308\Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Typo3RectorPrefix20210308\Symfony\Component\HttpKernel\Bundle\Bundle;
use Typo3RectorPrefix20210308\Symplify\ComposerJsonManipulator\DependencyInjection\Extension\ComposerJsonManipulatorExtension;
final class ComposerJsonManipulatorBundle extends \Typo3RectorPrefix20210308\Symfony\Component\HttpKernel\Bundle\Bundle
{
    protected function createContainerExtension() : ?\Typo3RectorPrefix20210308\Symfony\Component\DependencyInjection\Extension\ExtensionInterface
    {
        return new \Typo3RectorPrefix20210308\Symplify\ComposerJsonManipulator\DependencyInjection\Extension\ComposerJsonManipulatorExtension();
    }
}
