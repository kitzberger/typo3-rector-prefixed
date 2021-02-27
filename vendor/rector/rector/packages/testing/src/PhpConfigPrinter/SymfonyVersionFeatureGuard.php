<?php

declare (strict_types=1);
namespace Rector\Testing\PhpConfigPrinter;

use Typo3RectorPrefix20210227\Symplify\PhpConfigPrinter\Contract\SymfonyVersionFeatureGuardInterface;
final class SymfonyVersionFeatureGuard implements \Typo3RectorPrefix20210227\Symplify\PhpConfigPrinter\Contract\SymfonyVersionFeatureGuardInterface
{
    public function isAtLeastSymfonyVersion(float $symfonyVersion) : bool
    {
        return \true;
    }
}
