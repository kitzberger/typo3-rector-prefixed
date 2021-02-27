<?php

declare (strict_types=1);
namespace Ssch\TYPO3Rector\Rector\v10\v4;

use PhpParser\Node;
use PhpParser\Node\Expr\ConstFetch;
use PhpParser\Node\Expr\StaticCall;
use Rector\Core\Rector\AbstractRector;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;
use TYPO3\CMS\Core\Resource\Security\FileNameValidator;
use TYPO3\CMS\Core\Utility\GeneralUtility;
/**
 * @see https://docs.typo3.org/c/typo3/cms-core/master/en-us/Changelog/10.4/Deprecation-90147-UnifiedFileNameValidator.html
 * @see \Ssch\TYPO3Rector\Tests\Rector\v10\v4\UnifiedFileNameValidatorRector\UnifiedFileNameValidatorRectorTest
 */
final class UnifiedFileNameValidatorRector extends \Rector\Core\Rector\AbstractRector
{
    public function getNodeTypes() : array
    {
        return [\PhpParser\Node\Expr\ConstFetch::class, \PhpParser\Node\Expr\StaticCall::class];
    }
    /**
     * @param ConstFetch|StaticCall $node
     */
    public function refactor(\PhpParser\Node $node) : ?\PhpParser\Node
    {
        if ($this->shouldSkip($node)) {
            return null;
        }
        if ($node instanceof \PhpParser\Node\Expr\StaticCall && $this->isMethodVerifyFilenameAgainstDenyPattern($node)) {
            return $this->nodeFactory->createMethodCall($this->nodeFactory->createStaticCall(\TYPO3\CMS\Core\Utility\GeneralUtility::class, 'makeInstance', [$this->nodeFactory->createClassConstReference(\TYPO3\CMS\Core\Resource\Security\FileNameValidator::class)]), 'isValid', $node->args);
        }
        if ($this->isConstFileDenyPatternDefault($node)) {
            return $this->nodeFactory->createClassConstFetch(\TYPO3\CMS\Core\Resource\Security\FileNameValidator::class, 'DEFAULT_FILE_DENY_PATTERN');
        }
        return null;
    }
    /**
     * @codeCoverageIgnore
     */
    public function getRuleDefinition() : \Symplify\RuleDocGenerator\ValueObject\RuleDefinition
    {
        return new \Symplify\RuleDocGenerator\ValueObject\RuleDefinition('GeneralUtility::verifyFilenameAgainstDenyPattern GeneralUtility::makeInstance(FileNameValidator::class)->isValid($filename)', [new \Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample(<<<'CODE_SAMPLE'
use TYPO3\CMS\Core\Utility\GeneralUtility;

$filename = 'somefile.php';
if(!GeneralUtility::verifyFilenameAgainstDenyPattern($filename)) {
}

if ($GLOBALS['TYPO3_CONF_VARS']['BE']['fileDenyPattern'] != FILE_DENY_PATTERN_DEFAULT)
{
}
CODE_SAMPLE
, <<<'CODE_SAMPLE'
use TYPO3\CMS\Core\Resource\Security\FileNameValidator;
use TYPO3\CMS\Core\Utility\GeneralUtility;

$filename = 'somefile.php';
if(!GeneralUtility::makeInstance(FileNameValidator::class)->isValid($filename)) {
}

if ($GLOBALS['TYPO3_CONF_VARS']['BE']['fileDenyPattern'] != FileNameValidator::DEFAULT_FILE_DENY_PATTERN)
{
}
CODE_SAMPLE
)]);
    }
    /**
     * @param ConstFetch|StaticCall $node
     */
    public function isMethodVerifyFilenameAgainstDenyPattern(\PhpParser\Node $node) : bool
    {
        return $node instanceof \PhpParser\Node\Expr\StaticCall && $this->nodeTypeResolver->isMethodStaticCallOrClassMethodObjectType($node, \TYPO3\CMS\Core\Utility\GeneralUtility::class) && $this->isName($node->name, 'verifyFilenameAgainstDenyPattern');
    }
    /**
     * @param ConstFetch|StaticCall $node
     */
    private function shouldSkip(\PhpParser\Node $node) : bool
    {
        if ($this->isMethodVerifyFilenameAgainstDenyPattern($node)) {
            return \false;
        }
        return !$this->isConstFileDenyPatternDefault($node);
    }
    /**
     * @param ConstFetch|StaticCall $node
     */
    private function isConstFileDenyPatternDefault(\PhpParser\Node $node) : bool
    {
        return $node instanceof \PhpParser\Node\Expr\ConstFetch && $this->isName($node->name, 'FILE_DENY_PATTERN_DEFAULT');
    }
}
