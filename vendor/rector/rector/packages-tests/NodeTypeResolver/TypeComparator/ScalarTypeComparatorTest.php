<?php

declare (strict_types=1);
namespace Rector\Tests\NodeTypeResolver\TypeComparator;

use Iterator;
use PHPStan\Type\BooleanType;
use PHPStan\Type\ClassStringType;
use PHPStan\Type\StringType;
use PHPStan\Type\Type;
use Rector\NodeTypeResolver\TypeComparator\ScalarTypeComparator;
use Rector\Testing\PHPUnit\AbstractTestCase;
final class ScalarTypeComparatorTest extends \Rector\Testing\PHPUnit\AbstractTestCase
{
    /**
     * @var ScalarTypeComparator
     */
    private $scalarTypeComparator;
    protected function setUp() : void
    {
        $this->boot();
        $this->scalarTypeComparator = $this->getService(\Rector\NodeTypeResolver\TypeComparator\ScalarTypeComparator::class);
    }
    /**
     * @dataProvider provideData()
     */
    public function test(\PHPStan\Type\Type $firstType, \PHPStan\Type\Type $secondType, bool $areExpectedEqual) : void
    {
        $areEqual = $this->scalarTypeComparator->areEqualScalar($firstType, $secondType);
        $this->assertSame($areExpectedEqual, $areEqual);
    }
    public function provideData() : \Iterator
    {
        (yield [new \PHPStan\Type\StringType(), new \PHPStan\Type\BooleanType(), \false]);
        (yield [new \PHPStan\Type\StringType(), new \PHPStan\Type\StringType(), \true]);
        (yield [new \PHPStan\Type\StringType(), new \PHPStan\Type\ClassStringType(), \false]);
    }
}
