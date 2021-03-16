<?php

declare (strict_types=1);
namespace Ssch\TYPO3Rector\Rector\Composer;

use Rector\Composer\Contract\Rector\ComposerRectorInterface;
use Ssch\TYPO3Rector\ValueObject\ReplacePackage;
use Typo3RectorPrefix20210316\Symplify\ComposerJsonManipulator\ValueObject\ComposerJson;
use Symplify\RuleDocGenerator\Contract\DocumentedRuleInterface;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\ConfiguredCodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;
/**
 * @see \Ssch\TYPO3Rector\Tests\Rector\Composer\ReplacePackageComposerRector\ReplacePackageComposerRectorTest
 */
final class ReplacePackageComposerRector implements \Rector\Composer\Contract\Rector\ComposerRectorInterface, \Symplify\RuleDocGenerator\Contract\DocumentedRuleInterface
{
    /**
     * @var string
     */
    public const REPLACE_PACKAGES = 'replace_packages';
    /**
     * @var ReplacePackage[]
     */
    private $replacePackages = [];
    public function refactor(\Typo3RectorPrefix20210316\Symplify\ComposerJsonManipulator\ValueObject\ComposerJson $composerJson) : void
    {
        foreach ($this->replacePackages as $replacePackage) {
            if ($composerJson->hasRequiredPackage($replacePackage->getOldPackageName())) {
                $version = $composerJson->getRequire()[$replacePackage->getOldPackageName()];
                $composerJson->replacePackage($replacePackage->getOldPackageName(), $replacePackage->getNewPackageName(), $version);
            }
            if ($composerJson->hasRequiredDevPackage($replacePackage->getOldPackageName())) {
                $version = $composerJson->getRequireDev()[$replacePackage->getOldPackageName()];
                $composerJson->replacePackage($replacePackage->getOldPackageName(), $replacePackage->getNewPackageName(), $version);
            }
        }
    }
    public function getRuleDefinition() : \Symplify\RuleDocGenerator\ValueObject\RuleDefinition
    {
        return new \Symplify\RuleDocGenerator\ValueObject\RuleDefinition('Change package name in `composer.json`', [new \Symplify\RuleDocGenerator\ValueObject\CodeSample\ConfiguredCodeSample(<<<'CODE_SAMPLE'
{
    "require": {
        "typo3-ter/news": "^8.0"
    }
}
CODE_SAMPLE
, <<<'CODE_SAMPLE'
{
    "require": {
        "georgringer/news": "^8.0"
    }
}
CODE_SAMPLE
, [self::REPLACE_PACKAGES => [new \Ssch\TYPO3Rector\ValueObject\ReplacePackage('typo3-ter/news', 'georgringer/news')]])]);
    }
    /**
     * @param array<string, ReplacePackage[]> $configuration
     */
    public function configure(array $configuration) : void
    {
        $this->replacePackages = $configuration[self::REPLACE_PACKAGES] ?? [];
    }
}
