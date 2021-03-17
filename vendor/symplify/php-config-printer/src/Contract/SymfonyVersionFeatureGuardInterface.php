<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210317\Symplify\PhpConfigPrinter\Contract;

interface SymfonyVersionFeatureGuardInterface
{
    public function isAtLeastSymfonyVersion(float $symfonyVersion) : bool;
}
