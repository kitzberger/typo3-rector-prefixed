<?php

declare (strict_types=1);
namespace Ssch\TYPO3Rector\Rector\v7\v6;

use PhpParser\BuilderHelpers;
use PhpParser\Node;
use PhpParser\Node\Expr\ArrayDimFetch;
use PhpParser\Node\Expr\MethodCall;
use PhpParser\Node\Identifier;
use Rector\Core\Rector\AbstractRector;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;
use TYPO3\CMS\IndexedSearch\Controller\SearchFormController;
/**
 * @see https://docs.typo3.org/c/typo3/cms-core/master/en-us/Changelog/7.6.x/Breaking-72931-SearchFormControllerpi_list_browseresultsHasBeenRenamed.html
 */
final class RenamePiListBrowserResultsRector extends \Rector\Core\Rector\AbstractRector
{
    /**
     * @return string[]
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
        if (!$this->isObjectType($node, \TYPO3\CMS\IndexedSearch\Controller\SearchFormController::class)) {
            return null;
        }
        if (!$this->isName($node->name, 'pi_list_browseresults')) {
            return null;
        }
        return $this->process($node, 'renderPagination');
    }
    /**
     * @codeCoverageIgnore
     */
    public function getRuleDefinition() : \Symplify\RuleDocGenerator\ValueObject\RuleDefinition
    {
        return new \Symplify\RuleDocGenerator\ValueObject\RuleDefinition('Rename pi_list_browseresults calls to renderPagination', [new \Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample('$this->pi_list_browseresults', '$this->renderPagination')]);
    }
    /**
     * @param string|mixed[] $newMethod
     *
     * @return MethodCall|ArrayDimFetch
     */
    private function process(\PhpParser\Node\Expr\MethodCall $node, $newMethod) : \PhpParser\Node
    {
        if (\is_string($newMethod)) {
            $node->name = new \PhpParser\Node\Identifier($newMethod);
            return $node;
        }
        // special case for array dim fetch
        $node->name = new \PhpParser\Node\Identifier($newMethod['name']);
        return new \PhpParser\Node\Expr\ArrayDimFetch($node, \PhpParser\BuilderHelpers::normalizeValue($newMethod['array_key']));
    }
}
