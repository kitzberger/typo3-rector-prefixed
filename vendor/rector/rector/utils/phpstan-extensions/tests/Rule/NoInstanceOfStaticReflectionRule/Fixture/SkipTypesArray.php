<?php

declare (strict_types=1);
namespace Rector\PHPStanExtensions\Tests\Rule\NoInstanceOfStaticReflectionRule\Fixture;

use PhpParser\Node;
use PhpParser\Node\Expr\Array_;
use PhpParser\Node\Expr\ClassConstFetch;
use PhpParser\Node\Expr\MethodCall;
use PhpParser\Node\Expr\New_;
use PhpParser\Node\Expr\StaticCall;
use PhpParser\Node\Param;
use PhpParser\Node\Stmt\Class_;
use PhpParser\Node\Stmt\ClassConst;
use PhpParser\Node\Stmt\ClassMethod;
use PhpParser\Node\Stmt\Interface_;
use PhpParser\Node\Stmt\Trait_;
final class SkipTypesArray
{
    /**
     * @var array<class-string<Node>>
     */
    private const COLLECTABLE_NODE_TYPES = [\PhpParser\Node\Stmt\Class_::class, \PhpParser\Node\Stmt\Interface_::class, \PhpParser\Node\Stmt\ClassConst::class, \PhpParser\Node\Expr\ClassConstFetch::class, \PhpParser\Node\Expr\New_::class, \PhpParser\Node\Expr\StaticCall::class, \PhpParser\Node\Expr\MethodCall::class, \PhpParser\Node\Expr\Array_::class, \PhpParser\Node\Param::class];
    public function isCollectableNode(\PhpParser\Node $node) : bool
    {
        foreach (self::COLLECTABLE_NODE_TYPES as $collectableNodeType) {
            /** @var class-string<Node> $collectableNodeType */
            if (\is_a($node, $collectableNodeType, \true)) {
                return \true;
            }
        }
        return \false;
    }
}
