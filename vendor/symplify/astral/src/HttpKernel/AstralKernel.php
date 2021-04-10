<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210410\Symplify\Astral\HttpKernel;

use Typo3RectorPrefix20210410\Symfony\Component\Config\Loader\LoaderInterface;
use Typo3RectorPrefix20210410\Symplify\SymplifyKernel\HttpKernel\AbstractSymplifyKernel;
final class AstralKernel extends \Typo3RectorPrefix20210410\Symplify\SymplifyKernel\HttpKernel\AbstractSymplifyKernel
{
    public function registerContainerConfiguration(\Typo3RectorPrefix20210410\Symfony\Component\Config\Loader\LoaderInterface $loader) : void
    {
        $loader->load(__DIR__ . '/../../config/config.php');
    }
}
