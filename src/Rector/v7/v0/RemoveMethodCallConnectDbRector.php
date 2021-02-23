<?php

declare (strict_types=1);
namespace Ssch\TYPO3Rector\Rector\v7\v0;

use PhpParser\Node;
use PhpParser\Node\Expr\StaticCall;
use Rector\Core\Rector\AbstractRector;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;
use TYPO3\CMS\Frontend\Utility\EidUtility;
/**
 * @see https://docs.typo3.org/c/typo3/cms-core/master/en-us/Changelog/7.0/Breaking-61863-ConnectDbFunctionRemoved.html
 */
final class RemoveMethodCallConnectDbRector extends \Rector\Core\Rector\AbstractRector
{
    public function getNodeTypes() : array
    {
        return [\PhpParser\Node\Expr\StaticCall::class];
    }
    /**
     * @param StaticCall $node
     */
    public function refactor(\PhpParser\Node $node) : ?\PhpParser\Node
    {
        if (!$this->nodeTypeResolver->isMethodStaticCallOrClassMethodObjectType($node, \TYPO3\CMS\Frontend\Utility\EidUtility::class)) {
            return null;
        }
        if (!$this->isName($node->name, 'connectDB')) {
            return null;
        }
        $this->removeNode($node);
        return $node;
    }
    /**
     * @codeCoverageIgnore
     */
    public function getRuleDefinition() : \Symplify\RuleDocGenerator\ValueObject\RuleDefinition
    {
        return new \Symplify\RuleDocGenerator\ValueObject\RuleDefinition('Remove EidUtility::connectDB() call', [new \Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample('EidUtility::connectDB()', '')]);
    }
}