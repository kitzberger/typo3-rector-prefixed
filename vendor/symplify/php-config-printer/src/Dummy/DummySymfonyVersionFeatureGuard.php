<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210227\Symplify\PhpConfigPrinter\Dummy;

use Typo3RectorPrefix20210227\Symplify\PhpConfigPrinter\Contract\SymfonyVersionFeatureGuardInterface;
final class DummySymfonyVersionFeatureGuard implements \Typo3RectorPrefix20210227\Symplify\PhpConfigPrinter\Contract\SymfonyVersionFeatureGuardInterface
{
    public function isAtLeastSymfonyVersion(float $symfonyVersion) : bool
    {
        return \true;
    }
}
