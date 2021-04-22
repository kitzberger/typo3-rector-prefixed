<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210422\Symplify\SimplePhpDocParser\Tests\HttpKernel;

use Typo3RectorPrefix20210422\Symfony\Component\Config\Loader\LoaderInterface;
use Typo3RectorPrefix20210422\Symplify\SymplifyKernel\HttpKernel\AbstractSymplifyKernel;
final class SimplePhpDocParserKernel extends \Typo3RectorPrefix20210422\Symplify\SymplifyKernel\HttpKernel\AbstractSymplifyKernel
{
    public function registerContainerConfiguration(\Typo3RectorPrefix20210422\Symfony\Component\Config\Loader\LoaderInterface $loader) : void
    {
        $loader->load(__DIR__ . '/../../config/config.php');
    }
}
