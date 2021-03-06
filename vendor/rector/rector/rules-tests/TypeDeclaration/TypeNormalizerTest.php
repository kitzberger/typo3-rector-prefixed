<?php

declare (strict_types=1);
namespace Rector\Tests\TypeDeclaration;

use Iterator;
use PHPStan\Type\ArrayType;
use PHPStan\Type\IntegerType;
use PHPStan\Type\MixedType;
use PHPStan\Type\StringType;
use PHPStan\Type\UnionType;
use Rector\Testing\PHPUnit\AbstractTestCase;
use Rector\TypeDeclaration\TypeNormalizer;
final class TypeNormalizerTest extends \Rector\Testing\PHPUnit\AbstractTestCase
{
    /**
     * @var TypeNormalizer
     */
    private $typeNormalizer;
    protected function setUp() : void
    {
        $this->boot();
        $this->typeNormalizer = $this->getService(\Rector\TypeDeclaration\TypeNormalizer::class);
    }
    /**
     * @dataProvider provideDataNormalizeArrayOfUnionToUnionArray()
     */
    public function testNormalizeArrayOfUnionToUnionArray(\PHPStan\Type\ArrayType $arrayType, string $expectedDocString) : void
    {
        $unionType = $this->typeNormalizer->normalizeArrayOfUnionToUnionArray($arrayType);
        $this->assertInstanceOf(\PHPStan\Type\UnionType::class, $unionType);
    }
    /**
     * @return Iterator<mixed>
     */
    public function provideDataNormalizeArrayOfUnionToUnionArray() : \Iterator
    {
        $unionType = new \PHPStan\Type\UnionType([new \PHPStan\Type\StringType(), new \PHPStan\Type\IntegerType()]);
        $arrayType = new \PHPStan\Type\ArrayType(new \PHPStan\Type\MixedType(), $unionType);
        (yield [$arrayType, 'int[]|string[]']);
        $arrayType = new \PHPStan\Type\ArrayType(new \PHPStan\Type\MixedType(), $unionType);
        $moreNestedArrayType = new \PHPStan\Type\ArrayType(new \PHPStan\Type\MixedType(), $arrayType);
        (yield [$moreNestedArrayType, 'int[][]|string[][]']);
        $evenMoreNestedArrayType = new \PHPStan\Type\ArrayType(new \PHPStan\Type\MixedType(), $moreNestedArrayType);
        (yield [$evenMoreNestedArrayType, 'int[][][]|string[][][]']);
    }
}
