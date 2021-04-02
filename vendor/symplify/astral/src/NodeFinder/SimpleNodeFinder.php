<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210402\Symplify\Astral\NodeFinder;

use PhpParser\Node;
use PhpParser\NodeFinder;
use Typo3RectorPrefix20210402\Symplify\Astral\ValueObject\CommonAttributeKey;
use Typo3RectorPrefix20210402\Symplify\PackageBuilder\Php\TypeChecker;
final class SimpleNodeFinder
{
    /**
     * @var TypeChecker
     */
    private $typeChecker;
    /**
     * @var NodeFinder
     */
    private $nodeFinder;
    public function __construct(\Typo3RectorPrefix20210402\Symplify\PackageBuilder\Php\TypeChecker $typeChecker, \PhpParser\NodeFinder $nodeFinder)
    {
        $this->typeChecker = $typeChecker;
        $this->nodeFinder = $nodeFinder;
    }
    /**
     * @template T of Node
     * @param class-string<T> $nodeClass
     * @return T[]
     */
    public function findByType(\PhpParser\Node $node, string $nodeClass) : array
    {
        return $this->nodeFinder->findInstanceOf($node, $nodeClass);
    }
    /**
     * @see https://phpstan.org/blog/generics-in-php-using-phpdocs for template
     *
     * @template T of Node
     * @param class-string<T> $nodeClass
     * @return T|null
     */
    public function findFirstParentByType(\PhpParser\Node $node, string $nodeClass) : ?\PhpParser\Node
    {
        $node = $node->getAttribute(\Typo3RectorPrefix20210402\Symplify\Astral\ValueObject\CommonAttributeKey::PARENT);
        while ($node) {
            if (\is_a($node, $nodeClass, \true)) {
                return $node;
            }
            $node = $node->getAttribute(\Typo3RectorPrefix20210402\Symplify\Astral\ValueObject\CommonAttributeKey::PARENT);
        }
        return null;
    }
    /**
     * @template T of Node
     * @param class-string<T>[] $nodeTypes
     * @return T|null
     */
    public function findFirstParentByTypes(\PhpParser\Node $node, array $nodeTypes) : ?\PhpParser\Node
    {
        $node = $node->getAttribute(\Typo3RectorPrefix20210402\Symplify\Astral\ValueObject\CommonAttributeKey::PARENT);
        while ($node) {
            if ($this->typeChecker->isInstanceOf($node, $nodeTypes)) {
                return $node;
            }
            $node = $node->getAttribute(\Typo3RectorPrefix20210402\Symplify\Astral\ValueObject\CommonAttributeKey::PARENT);
        }
        return null;
    }
}
