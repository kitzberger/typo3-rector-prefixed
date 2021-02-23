<?php

declare (strict_types=1);
namespace Ssch\TYPO3Rector\Rector\v7\v1;

use PhpParser\Node;
use PhpParser\Node\Expr\MethodCall;
use Rector\Core\Rector\AbstractRector;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;
use TYPO3\CMS\Core\Imaging\GraphicalFunctions;
use TYPO3\CMS\Core\Resource\Processing\LocalImageProcessor;
use TYPO3\CMS\Core\Utility\GeneralUtility;
/**
 * @see https://docs.typo3.org/c/typo3/cms-core/master/en-us/Changelog/7.1/Deprecation-46770-LocalImageProcessorGraphicalFunctions.html
 */
final class GetTemporaryImageWithTextRector extends \Rector\Core\Rector\AbstractRector
{
    public function getNodeTypes() : array
    {
        return [\PhpParser\Node\Expr\MethodCall::class];
    }
    /**
     * @param MethodCall $node
     */
    public function refactor(\PhpParser\Node $node) : ?\PhpParser\Node
    {
        if (!$this->nodeTypeResolver->isMethodStaticCallOrClassMethodObjectType($node, \TYPO3\CMS\Core\Resource\Processing\LocalImageProcessor::class)) {
            return null;
        }
        if (!$this->isName($node->name, 'getTemporaryImageWithText')) {
            return null;
        }
        return $this->nodeFactory->createMethodCall($this->nodeFactory->createStaticCall(\TYPO3\CMS\Core\Utility\GeneralUtility::class, 'makeInstance', [$this->nodeFactory->createClassConstReference(\TYPO3\CMS\Core\Imaging\GraphicalFunctions::class)]), 'getTemporaryImageWithText', $node->args);
    }
    /**
     * @codeCoverageIgnore
     */
    public function getRuleDefinition() : \Symplify\RuleDocGenerator\ValueObject\RuleDefinition
    {
        return new \Symplify\RuleDocGenerator\ValueObject\RuleDefinition('Use GraphicalFunctions->getTemporaryImageWithText instead of LocalImageProcessor->getTemporaryImageWithText', [new \Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample('GeneralUtility::makeInstance(LocalImageProcessor::class)->getTemporaryImageWithText("foo", "bar", "baz", "foo")', 'GeneralUtility::makeInstance(GraphicalFunctions::class)->getTemporaryImageWithText("foo", "bar", "baz", "foo")')]);
    }
}
