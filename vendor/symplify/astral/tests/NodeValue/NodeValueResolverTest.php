<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210311\Symplify\Astral\Tests\NodeValue;

use Iterator;
use PhpParser\Node\Expr;
use PhpParser\Node\Scalar\String_;
use Typo3RectorPrefix20210311\PHPUnit\Framework\TestCase;
use Typo3RectorPrefix20210311\Symplify\Astral\NodeFinder\ParentNodeFinder;
use Typo3RectorPrefix20210311\Symplify\Astral\NodeValue\NodeValueResolver;
use Typo3RectorPrefix20210311\Symplify\Astral\StaticFactory\SimpleNameResolverStaticFactory;
use Typo3RectorPrefix20210311\Symplify\PackageBuilder\Php\TypeChecker;
final class NodeValueResolverTest extends \Typo3RectorPrefix20210311\PHPUnit\Framework\TestCase
{
    /**
     * @var NodeValueResolver
     */
    private $nodeValueResolver;
    protected function setUp() : void
    {
        $simpleNameResolver = \Typo3RectorPrefix20210311\Symplify\Astral\StaticFactory\SimpleNameResolverStaticFactory::create();
        $parentNodeFinder = new \Typo3RectorPrefix20210311\Symplify\Astral\NodeFinder\ParentNodeFinder(new \Typo3RectorPrefix20210311\Symplify\PackageBuilder\Php\TypeChecker());
        $this->nodeValueResolver = new \Typo3RectorPrefix20210311\Symplify\Astral\NodeValue\NodeValueResolver($simpleNameResolver, new \Typo3RectorPrefix20210311\Symplify\PackageBuilder\Php\TypeChecker(), $parentNodeFinder);
    }
    /**
     * @dataProvider provideData()
     * @param mixed $expectedValue
     */
    public function test(\PhpParser\Node\Expr $expr, $expectedValue) : void
    {
        $resolvedValue = $this->nodeValueResolver->resolve($expr, __FILE__);
        $this->assertSame($expectedValue, $resolvedValue);
    }
    public function provideData() : \Iterator
    {
        (yield [new \PhpParser\Node\Scalar\String_('value'), 'value']);
    }
}
