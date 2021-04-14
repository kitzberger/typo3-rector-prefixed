<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210414\Symplify\Astral\NodeNameResolver;

use PhpParser\Node;
use PhpParser\Node\Stmt\Property;
use Typo3RectorPrefix20210414\Symplify\Astral\Contract\NodeNameResolverInterface;
final class PropertyNodeNameResolver implements \Typo3RectorPrefix20210414\Symplify\Astral\Contract\NodeNameResolverInterface
{
    public function match(\PhpParser\Node $node) : bool
    {
        return $node instanceof \PhpParser\Node\Stmt\Property;
    }
    /**
     * @param Property $node
     */
    public function resolve(\PhpParser\Node $node) : ?string
    {
        $propertyProperty = $node->props[0];
        return (string) $propertyProperty->name;
    }
}
