<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423\Symplify\Astral\NodeNameResolver;

use PhpParser\Node;
use PhpParser\Node\Expr;
use PhpParser\Node\Param;
use Typo3RectorPrefix20210423\Symplify\Astral\Contract\NodeNameResolverInterface;
final class ParamNodeNameResolver implements \Typo3RectorPrefix20210423\Symplify\Astral\Contract\NodeNameResolverInterface
{
    public function match(\PhpParser\Node $node) : bool
    {
        return $node instanceof \PhpParser\Node\Param;
    }
    /**
     * @param Param $node
     */
    public function resolve(\PhpParser\Node $node) : ?string
    {
        $paramName = $node->var->name;
        if ($paramName instanceof \PhpParser\Node\Expr) {
            return null;
        }
        return $paramName;
    }
}
