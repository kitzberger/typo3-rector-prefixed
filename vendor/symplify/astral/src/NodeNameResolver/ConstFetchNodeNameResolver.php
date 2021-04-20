<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210420\Symplify\Astral\NodeNameResolver;

use PhpParser\Node;
use PhpParser\Node\Expr\ConstFetch;
use Typo3RectorPrefix20210420\Symplify\Astral\Contract\NodeNameResolverInterface;
final class ConstFetchNodeNameResolver implements \Typo3RectorPrefix20210420\Symplify\Astral\Contract\NodeNameResolverInterface
{
    public function match(\PhpParser\Node $node) : bool
    {
        return $node instanceof \PhpParser\Node\Expr\ConstFetch;
    }
    /**
     * @param ConstFetch $node
     */
    public function resolve(\PhpParser\Node $node) : ?string
    {
        // convention to save uppercase and lowercase functions for each name
        return $node->name->toLowerString();
    }
}
