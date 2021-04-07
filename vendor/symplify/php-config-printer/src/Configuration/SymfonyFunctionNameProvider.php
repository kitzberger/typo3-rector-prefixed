<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210407\Symplify\PhpConfigPrinter\Configuration;

use Typo3RectorPrefix20210407\Symplify\PhpConfigPrinter\Contract\SymfonyVersionFeatureGuardInterface;
use Typo3RectorPrefix20210407\Symplify\PhpConfigPrinter\ValueObject\FunctionName;
use Typo3RectorPrefix20210407\Symplify\PhpConfigPrinter\ValueObject\SymfonyVersionFeature;
final class SymfonyFunctionNameProvider
{
    /**
     * @var SymfonyVersionFeatureGuardInterface
     */
    private $symfonyVersionFeatureGuard;
    public function __construct(\Typo3RectorPrefix20210407\Symplify\PhpConfigPrinter\Contract\SymfonyVersionFeatureGuardInterface $symfonyVersionFeatureGuard)
    {
        $this->symfonyVersionFeatureGuard = $symfonyVersionFeatureGuard;
    }
    public function provideRefOrService() : string
    {
        if ($this->symfonyVersionFeatureGuard->isAtLeastSymfonyVersion(\Typo3RectorPrefix20210407\Symplify\PhpConfigPrinter\ValueObject\SymfonyVersionFeature::REF_OVER_SERVICE)) {
            return \Typo3RectorPrefix20210407\Symplify\PhpConfigPrinter\ValueObject\FunctionName::SERVICE;
        }
        return \Typo3RectorPrefix20210407\Symplify\PhpConfigPrinter\ValueObject\FunctionName::REF;
    }
}
