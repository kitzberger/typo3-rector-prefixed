<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210410\Symplify\Astral\NodeNameResolver;

use PhpParser\Node;
use PhpParser\Node\Arg;
use Typo3RectorPrefix20210410\Symplify\Astral\Contract\NodeNameResolverInterface;
final class ArgNodeNameResolver implements \Typo3RectorPrefix20210410\Symplify\Astral\Contract\NodeNameResolverInterface
{
    public function match(\PhpParser\Node $node) : bool
    {
        return $node instanceof \PhpParser\Node\Arg;
    }
    /**
     * @param Arg $node
     */
    public function resolve(\PhpParser\Node $node) : ?string
    {
        if ($node->name === null) {
            return null;
        }
        return (string) $node->name;
    }
}
