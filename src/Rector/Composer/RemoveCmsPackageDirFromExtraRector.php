<?php

declare (strict_types=1);
namespace Ssch\TYPO3Rector\Rector\Composer;

use BadMethodCallException;
use Rector\Composer\Contract\Rector\ComposerRectorInterface;
use Typo3RectorPrefix20210423\Symplify\ComposerJsonManipulator\ValueObject\ComposerJson;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;
/**
 * @see \Ssch\TYPO3Rector\Tests\Rector\Composer\RemoveCmsPackageDirFromExtraRector\RemoveCmsPackageDirFromExtraRectorTest
 */
final class RemoveCmsPackageDirFromExtraRector implements \Rector\Composer\Contract\Rector\ComposerRectorInterface
{
    /**
     * @var string
     */
    private const TYPO3_CMS = 'typo3/cms';
    public function refactor(\Typo3RectorPrefix20210423\Symplify\ComposerJsonManipulator\ValueObject\ComposerJson $composerJson) : void
    {
        $extra = $composerJson->getExtra();
        if (!isset($extra[self::TYPO3_CMS])) {
            return;
        }
        if (!isset($extra[self::TYPO3_CMS]['cms-package-dir'])) {
            return;
        }
        unset($extra[self::TYPO3_CMS]['cms-package-dir']);
        $composerJson->setExtra($extra);
    }
    public function configure(array $configuration) : void
    {
        throw new \BadMethodCallException('Not allowed. No configuration option available');
    }
    public function getRuleDefinition() : \Symplify\RuleDocGenerator\ValueObject\RuleDefinition
    {
        return new \Symplify\RuleDocGenerator\ValueObject\RuleDefinition('Change package name in `composer.json`', [new \Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample(<<<'CODE_SAMPLE'
{
    "extra": {
        "typo3/cms": {
            "cms-package-dir": "{$vendor-dir}/typo3/cms"
        }
    }
}
CODE_SAMPLE
, <<<'CODE_SAMPLE'
{
    "extra": {
        "typo3/cms": {
        }
    }
}
CODE_SAMPLE
)]);
    }
}
