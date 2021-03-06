<?php

declare (strict_types=1);
namespace Rector\Core\Tests\PhpParser\Node;

use Iterator;
use PhpParser\Node\Expr\Array_;
use PhpParser\Node\Expr\ArrayItem;
use PhpParser\Node\Scalar\LNumber;
use PhpParser\Node\Scalar\String_;
use Rector\Core\PhpParser\Node\NodeFactory;
use Rector\Testing\PHPUnit\AbstractTestCase;
final class NodeFactoryTest extends \Rector\Testing\PHPUnit\AbstractTestCase
{
    /**
     * @var NodeFactory
     */
    private $nodeFactory;
    protected function setUp() : void
    {
        $this->boot();
        $this->nodeFactory = $this->getService(\Rector\Core\PhpParser\Node\NodeFactory::class);
    }
    /**
     * @param int[]|array<string, int> $inputArray
     * @dataProvider provideDataForArray()
     */
    public function testCreateArray(array $inputArray, \PhpParser\Node\Expr\Array_ $expectedArrayNode) : void
    {
        $arrayNode = $this->nodeFactory->createArray($inputArray);
        $this->assertEquals($expectedArrayNode, $arrayNode);
    }
    /**
     * @return Iterator<int[][]|array<string, int>|Array_[]>
     */
    public function provideDataForArray() : \Iterator
    {
        $array = new \PhpParser\Node\Expr\Array_();
        $array->items[] = new \PhpParser\Node\Expr\ArrayItem(new \PhpParser\Node\Scalar\LNumber(1));
        (yield [[1], $array]);
        $array = new \PhpParser\Node\Expr\Array_();
        $array->items[] = new \PhpParser\Node\Expr\ArrayItem(new \PhpParser\Node\Scalar\LNumber(1), new \PhpParser\Node\Scalar\String_('a'));
        (yield [['a' => 1], $array]);
    }
}
