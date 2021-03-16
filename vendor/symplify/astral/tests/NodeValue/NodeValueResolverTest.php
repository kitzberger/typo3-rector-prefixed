<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210316\Symplify\Astral\Tests\NodeValue;

use Iterator;
use PhpParser\Node\Expr;
use PhpParser\Node\Scalar\String_;
use PhpParser\NodeFinder;
use Typo3RectorPrefix20210316\PHPUnit\Framework\TestCase;
use Typo3RectorPrefix20210316\Symplify\Astral\NodeFinder\SimpleNodeFinder;
use Typo3RectorPrefix20210316\Symplify\Astral\NodeValue\NodeValueResolver;
use Typo3RectorPrefix20210316\Symplify\Astral\StaticFactory\SimpleNameResolverStaticFactory;
use Typo3RectorPrefix20210316\Symplify\PackageBuilder\Php\TypeChecker;
final class NodeValueResolverTest extends \Typo3RectorPrefix20210316\PHPUnit\Framework\TestCase
{
    /**
     * @var NodeValueResolver
     */
    private $nodeValueResolver;
    protected function setUp() : void
    {
        $simpleNameResolver = \Typo3RectorPrefix20210316\Symplify\Astral\StaticFactory\SimpleNameResolverStaticFactory::create();
        $simpleNodeFinder = new \Typo3RectorPrefix20210316\Symplify\Astral\NodeFinder\SimpleNodeFinder(new \Typo3RectorPrefix20210316\Symplify\PackageBuilder\Php\TypeChecker(), new \PhpParser\NodeFinder());
        $this->nodeValueResolver = new \Typo3RectorPrefix20210316\Symplify\Astral\NodeValue\NodeValueResolver($simpleNameResolver, new \Typo3RectorPrefix20210316\Symplify\PackageBuilder\Php\TypeChecker(), $simpleNodeFinder);
    }
    /**
     * @dataProvider provideData()
     */
    public function test(\PhpParser\Node\Expr $expr, string $expectedValue) : void
    {
        $resolvedValue = $this->nodeValueResolver->resolve($expr, __FILE__);
        $this->assertSame($expectedValue, $resolvedValue);
    }
    /**
     * @return Iterator<string[]|String_[]>
     */
    public function provideData() : \Iterator
    {
        (yield [new \PhpParser\Node\Scalar\String_('value'), 'value']);
    }
}
