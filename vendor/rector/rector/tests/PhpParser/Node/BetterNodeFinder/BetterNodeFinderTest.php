<?php

declare (strict_types=1);
namespace Rector\Core\Tests\PhpParser\Node\BetterNodeFinder;

use PhpParser\Node;
use PhpParser\Node\Expr\Array_;
use PhpParser\Node\Expr\Variable;
use PhpParser\Node\Stmt\Class_;
use PhpParser\Node\Stmt\ClassLike;
use Rector\Core\PhpParser\Node\BetterNodeFinder;
use Rector\Core\PhpParser\Parser\SimplePhpParser;
use Rector\Testing\PHPUnit\AbstractTestCase;
final class BetterNodeFinderTest extends \Rector\Testing\PHPUnit\AbstractTestCase
{
    /**
     * @var Node[]
     */
    private $nodes = [];
    /**
     * @var BetterNodeFinder
     */
    private $betterNodeFinder;
    protected function setUp() : void
    {
        $this->boot();
        $this->betterNodeFinder = $this->getService(\Rector\Core\PhpParser\Node\BetterNodeFinder::class);
        /** @var SimplePhpParser $simplePhpParser */
        $simplePhpParser = $this->getService(\Rector\Core\PhpParser\Parser\SimplePhpParser::class);
        $this->nodes = $simplePhpParser->parseFile(__DIR__ . '/Source/SomeFile.php.inc');
    }
    public function testFindFirstAncestorInstanceOf() : void
    {
        $variable = $this->betterNodeFinder->findFirstInstanceOf($this->nodes, \PhpParser\Node\Expr\Variable::class);
        $class = $this->betterNodeFinder->findFirstInstanceOf($this->nodes, \PhpParser\Node\Stmt\Class_::class);
        $this->assertNotNull($variable);
        $this->assertNotNull($class);
        $this->assertInstanceOf(\PhpParser\Node\Expr\Variable::class, $variable);
        $this->assertInstanceOf(\PhpParser\Node\Stmt\Class_::class, $class);
        /** @var Variable $variable */
        $classLikeNode = $this->betterNodeFinder->findParentType($variable, \PhpParser\Node\Stmt\ClassLike::class);
        $this->assertSame($classLikeNode, $class);
    }
    public function testFindMissingFirstAncestorInstanceOf() : void
    {
        /** @var Variable $variableNode */
        $variableNode = $this->betterNodeFinder->findFirstInstanceOf($this->nodes, \PhpParser\Node\Expr\Variable::class);
        $this->assertNull($this->betterNodeFinder->findParentType($variableNode, \PhpParser\Node\Expr\Array_::class));
    }
}
