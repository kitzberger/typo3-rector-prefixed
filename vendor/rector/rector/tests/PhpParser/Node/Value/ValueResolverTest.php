<?php

declare (strict_types=1);
namespace Rector\Core\Tests\PhpParser\Node\Value;

use Iterator;
use PhpParser\BuilderFactory;
use PhpParser\Node\Expr;
use PhpParser\Node\Expr\BinaryOp\Plus;
use PhpParser\Node\Name\FullyQualified;
use Rector\Core\PhpParser\Node\Value\ValueResolver;
use Rector\NodeTypeResolver\Node\AttributeKey;
use Rector\Testing\PHPUnit\AbstractTestCase;
final class ValueResolverTest extends \Rector\Testing\PHPUnit\AbstractTestCase
{
    /**
     * @var ValueResolver
     */
    private $valueResolver;
    protected function setUp() : void
    {
        $this->boot();
        $this->valueResolver = $this->getService(\Rector\Core\PhpParser\Node\Value\ValueResolver::class);
    }
    /**
     * @param mixed $expectedValue
     * @dataProvider dataProvider
     */
    public function test(\PhpParser\Node\Expr $expr, $expectedValue) : void
    {
        $resolvedValue = $this->valueResolver->getValue($expr);
        $this->assertSame($expectedValue, $resolvedValue);
    }
    public function dataProvider() : \Iterator
    {
        $builderFactory = new \PhpParser\BuilderFactory();
        $classConstFetchNode = $builderFactory->classConstFetch('SomeClass', 'SOME_CONSTANT');
        $classConstFetchNode->class->setAttribute(\Rector\NodeTypeResolver\Node\AttributeKey::RESOLVED_NAME, new \PhpParser\Node\Name\FullyQualified('SomeClassResolveName'));
        (yield [$classConstFetchNode, 'SomeClassResolveName::SOME_CONSTANT']);
        (yield [$builderFactory->val(\true), \true]);
        (yield [$builderFactory->val(1), 1]);
        (yield [$builderFactory->val(1.0), 1.0]);
        (yield [$builderFactory->var('foo'), null]);
        (yield [new \PhpParser\Node\Expr\BinaryOp\Plus($builderFactory->val(1), $builderFactory->val(1)), 2]);
        (yield [new \PhpParser\Node\Expr\BinaryOp\Plus($builderFactory->val(1), $builderFactory->var('foo')), null]);
    }
}
