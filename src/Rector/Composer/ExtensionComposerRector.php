<?php

declare (strict_types=1);
namespace Ssch\TYPO3Rector\Rector\Composer;

use Rector\Composer\Contract\Rector\ComposerRectorInterface;
use Typo3RectorPrefix20210311\Symplify\ComposerJsonManipulator\ValueObject\ComposerJson;
use Symplify\RuleDocGenerator\Contract\DocumentedRuleInterface;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\ConfiguredCodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;
use Typo3RectorPrefix20210311\Symplify\SmartFileSystem\SmartFileInfo;
/**
 * @see https://docs.typo3.org/m/typo3/reference-coreapi/master/en-us/ExtensionArchitecture/ComposerJson/Index.html#extra
 * @see \Ssch\TYPO3Rector\Tests\Rector\Composer\ExtensionComposerRector\ExtensionComposerRectorTest
 */
final class ExtensionComposerRector implements \Rector\Composer\Contract\Rector\ComposerRectorInterface, \Symplify\RuleDocGenerator\Contract\DocumentedRuleInterface
{
    /**
     * @var string
     */
    public const TYPO3_VERSION_CONSTRAINT = 'typo3_version_constraint';
    /**
     * @var mixed|string|string[]
     */
    private $defaultTypo3VersionConstraint = '';
    public function refactor(\Typo3RectorPrefix20210311\Symplify\ComposerJsonManipulator\ValueObject\ComposerJson $composerJson) : void
    {
        if ('typo3-cms-extension' !== $composerJson->getType()) {
            return;
        }
        if ('' !== $this->defaultTypo3VersionConstraint) {
            $composerJson->addRequiredPackage('typo3/cms-core', $this->defaultTypo3VersionConstraint);
            $composerJson->changePackageVersion('typo3/cms-core', $this->defaultTypo3VersionConstraint);
        }
        $extra = $composerJson->getExtra();
        if (isset($extra['typo3/cms']['extension-key'])) {
            return;
        }
        $fileInfo = $composerJson->getFileInfo();
        if (!$fileInfo instanceof \Typo3RectorPrefix20210311\Symplify\SmartFileSystem\SmartFileInfo) {
            return;
        }
        $extra['typo3/cms'] = ['extension-key' => \basename(\dirname($fileInfo->getRealPath()))];
        $composerJson->setExtra($extra);
    }
    /**
     * @param array<string, string[]> $configuration
     */
    public function configure(array $configuration) : void
    {
        $this->defaultTypo3VersionConstraint = $configuration[self::TYPO3_VERSION_CONSTRAINT] ?? '*';
    }
    public function getRuleDefinition() : \Symplify\RuleDocGenerator\ValueObject\RuleDefinition
    {
        return new \Symplify\RuleDocGenerator\ValueObject\RuleDefinition('Add extra extension_key in `composer.json` and add option default constraint', [new \Symplify\RuleDocGenerator\ValueObject\CodeSample\ConfiguredCodeSample(<<<'CODE_SAMPLE'
{
    "require": {
      "typo3/cms-core": "^9.5"
   },
    "extra": {}
}
CODE_SAMPLE
, <<<'CODE_SAMPLE'
{
   "require": {
      "typo3/cms-core": "^10.4"
   },
   "extra": {
      "typo3/cms": {
         "extension-key": "my_extension"
      }
   }
}
CODE_SAMPLE
, [self::TYPO3_VERSION_CONSTRAINT => '^10.4'])]);
    }
}
