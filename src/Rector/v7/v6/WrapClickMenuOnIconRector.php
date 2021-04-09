<?php

declare (strict_types=1);
namespace Ssch\TYPO3Rector\Rector\v7\v6;

use PhpParser\Node;
use PhpParser\Node\Expr\MethodCall;
use PHPStan\Type\ObjectType;
use Rector\Core\Rector\AbstractRector;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;
use TYPO3\CMS\Backend\Template\DocumentTemplate;
use TYPO3\CMS\Backend\Utility\BackendUtility;
/**
 * @see https://docs.typo3.org/c/typo3/cms-core/master/en-us/Changelog/7.6/Deprecation-70494-WrapClickMenuOnIcon.html
 */
final class WrapClickMenuOnIconRector extends \Rector\Core\Rector\AbstractRector
{
    /**
     * @return array<class-string<Node>>
     */
    public function getNodeTypes() : array
    {
        return [\PhpParser\Node\Expr\MethodCall::class];
    }
    /**
     * @param MethodCall $node
     */
    public function refactor(\PhpParser\Node $node) : ?\PhpParser\Node
    {
        if (!$this->nodeTypeResolver->isMethodStaticCallOrClassMethodObjectType($node, new \PHPStan\Type\ObjectType(\TYPO3\CMS\Backend\Template\DocumentTemplate::class))) {
            return null;
        }
        if (!$this->isName($node->name, 'wrapClickMenuOnIcon')) {
            return null;
        }
        return $this->nodeFactory->createStaticCall(\TYPO3\CMS\Backend\Utility\BackendUtility::class, 'wrapClickMenuOnIcon', $node->args);
    }
    /**
     * @codeCoverageIgnore
     */
    public function getRuleDefinition() : \Symplify\RuleDocGenerator\ValueObject\RuleDefinition
    {
        return new \Symplify\RuleDocGenerator\ValueObject\RuleDefinition('Use method wrapClickMenuOnIcon of class BackendUtility', [new \Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample('DocumentTemplate->wrapClickMenuOnIcon', 'BackendUtility::wrapClickMenuOnIcon()')]);
    }
}
