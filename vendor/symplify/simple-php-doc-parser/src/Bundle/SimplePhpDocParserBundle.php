<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210405\Symplify\SimplePhpDocParser\Bundle;

use Typo3RectorPrefix20210405\Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Typo3RectorPrefix20210405\Symfony\Component\HttpKernel\Bundle\Bundle;
use Typo3RectorPrefix20210405\Symplify\SimplePhpDocParser\Bundle\DependencyInjection\Extension\SimplePhpDocParserExtension;
final class SimplePhpDocParserBundle extends \Typo3RectorPrefix20210405\Symfony\Component\HttpKernel\Bundle\Bundle
{
    public function getContainerExtension() : ?\Typo3RectorPrefix20210405\Symfony\Component\DependencyInjection\Extension\ExtensionInterface
    {
        return new \Typo3RectorPrefix20210405\Symplify\SimplePhpDocParser\Bundle\DependencyInjection\Extension\SimplePhpDocParserExtension();
    }
}
