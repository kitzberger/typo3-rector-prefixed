<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210407\Symplify\SimplePhpDocParser\Tests\HttpKernel;

use Typo3RectorPrefix20210407\Symfony\Component\Config\Loader\LoaderInterface;
use Typo3RectorPrefix20210407\Symplify\SymplifyKernel\HttpKernel\AbstractSymplifyKernel;
final class SimplePhpDocParserKernel extends \Typo3RectorPrefix20210407\Symplify\SymplifyKernel\HttpKernel\AbstractSymplifyKernel
{
    public function registerContainerConfiguration(\Typo3RectorPrefix20210407\Symfony\Component\Config\Loader\LoaderInterface $loader) : void
    {
        $loader->load(__DIR__ . '/../../config/config.php');
    }
}
