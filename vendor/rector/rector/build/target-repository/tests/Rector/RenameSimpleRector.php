<?php

namespace Typo3RectorPrefix20210423;

use PhpParser\Node;
use PhpParser\Node\Expr\Variable;
use Rector\Core\Rector\AbstractRector;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;
/**
 * @see \RenameSimpleRectorTest
 */
final class RenameSimpleRector extends \Rector\Core\Rector\AbstractRector
{
    /**
     * @return array<class-string<\PhpParser\Node>>
     */
    public function getNodeTypes() : array
    {
        return [\PhpParser\Node\Expr\Variable::class];
    }
    /**
     * @param Variable $node
     */
    public function refactor(\PhpParser\Node $node) : ?\PhpParser\Node
    {
        $node->name = 'newValue';
        return $node;
    }
    public function getRuleDefinition() : \Symplify\RuleDocGenerator\ValueObject\RuleDefinition
    {
        // ...
    }
}
/**
 * @see \RenameSimpleRectorTest
 */
\class_alias('RenameSimpleRector', 'RenameSimpleRector', \false);
