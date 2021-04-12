<?php

declare (strict_types=1);
namespace Rector\PHPStanExtensions\Tests\Rule\NoInstanceOfStaticReflectionRule\Fixture;

use PhpParser\Node;
use Rector\NodeTypeResolver\Node\AttributeKey;
use Typo3RectorPrefix20210412\Webmozart\Assert\Assert;
final class SkipIsAGenericClassString
{
    /**
     * @template T of Node
     * @param class-string<T> $type
     */
    public function findParentType(\PhpParser\Node $parent, string $type)
    {
        do {
            if (\is_a($parent, $type, \true)) {
                return $parent;
            }
        } while ($parent = $parent->getAttribute(\Rector\NodeTypeResolver\Node\AttributeKey::PARENT_NODE));
    }
}
