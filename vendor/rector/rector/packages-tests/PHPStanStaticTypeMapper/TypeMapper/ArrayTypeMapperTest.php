<?php

declare (strict_types=1);
namespace Rector\Tests\PHPStanStaticTypeMapper\TypeMapper;

use Iterator;
use PHPStan\Type\ArrayType;
use PHPStan\Type\IntegerType;
use PHPStan\Type\MixedType;
use PHPStan\Type\StringType;
use PHPStan\Type\UnionType;
use Rector\PHPStanStaticTypeMapper\TypeMapper\ArrayTypeMapper;
use Rector\Testing\PHPUnit\AbstractTestCase;
final class ArrayTypeMapperTest extends \Rector\Testing\PHPUnit\AbstractTestCase
{
    /**
     * @var ArrayTypeMapper
     */
    private $arrayTypeMapper;
    protected function setUp() : void
    {
        $this->boot();
        $this->arrayTypeMapper = $this->getService(\Rector\PHPStanStaticTypeMapper\TypeMapper\ArrayTypeMapper::class);
    }
    /**
     * @dataProvider provideDataWithoutKeys()
     * @dataProvider provideDataUnionedWithoutKeys()
     */
    public function testWithoutKeys(\PHPStan\Type\ArrayType $arrayType, string $expectedResult) : void
    {
        $actualTypeNode = $this->arrayTypeMapper->mapToPHPStanPhpDocTypeNode($arrayType);
        $this->assertSame($expectedResult, (string) $actualTypeNode);
    }
    /**
     * @dataProvider provideDataWithKeys()
     */
    public function testWithKeys(\PHPStan\Type\ArrayType $arrayType, string $expectedResult) : void
    {
        $actualTypeNode = $this->arrayTypeMapper->mapToPHPStanPhpDocTypeNode($arrayType);
        $this->assertSame($expectedResult, (string) $actualTypeNode);
    }
    /**
     * @return Iterator<string[]|ArrayType[]>
     */
    public function provideDataWithoutKeys() : \Iterator
    {
        $arrayType = new \PHPStan\Type\ArrayType(new \PHPStan\Type\MixedType(), new \PHPStan\Type\StringType());
        (yield [$arrayType, 'string[]']);
        $stringStringUnionType = new \PHPStan\Type\UnionType([new \PHPStan\Type\StringType(), new \PHPStan\Type\StringType()]);
        $arrayType = new \PHPStan\Type\ArrayType(new \PHPStan\Type\MixedType(), $stringStringUnionType);
        (yield [$arrayType, 'string[]']);
    }
    public function provideDataUnionedWithoutKeys() : \Iterator
    {
        $stringAndIntegerUnionType = new \PHPStan\Type\UnionType([new \PHPStan\Type\StringType(), new \PHPStan\Type\IntegerType()]);
        $unionArrayType = new \PHPStan\Type\ArrayType(new \PHPStan\Type\MixedType(), $stringAndIntegerUnionType);
        (yield [$unionArrayType, 'int[]|string[]']);
        $moreNestedUnionArrayType = new \PHPStan\Type\ArrayType(new \PHPStan\Type\MixedType(), $unionArrayType);
        (yield [$moreNestedUnionArrayType, 'int[][]|string[][]']);
        $evenMoreNestedUnionArrayType = new \PHPStan\Type\ArrayType(new \PHPStan\Type\MixedType(), $moreNestedUnionArrayType);
        (yield [$evenMoreNestedUnionArrayType, 'int[][][]|string[][][]']);
    }
    public function provideDataWithKeys() : \Iterator
    {
        $arrayMixedToStringType = new \PHPStan\Type\ArrayType(new \PHPStan\Type\MixedType(), new \PHPStan\Type\StringType());
        $arrayType = new \PHPStan\Type\ArrayType(new \PHPStan\Type\StringType(), $arrayMixedToStringType);
        (yield [$arrayType, 'array<string, string[]>']);
        $stringAndIntegerUnionType = new \PHPStan\Type\UnionType([new \PHPStan\Type\StringType(), new \PHPStan\Type\IntegerType()]);
        $stringAndIntegerUnionArrayType = new \PHPStan\Type\ArrayType(new \PHPStan\Type\MixedType(), $stringAndIntegerUnionType);
        $arrayType = new \PHPStan\Type\ArrayType(new \PHPStan\Type\StringType(), $stringAndIntegerUnionArrayType);
        (yield [$arrayType, 'array<string, array<int|string>>']);
        $arrayType = new \PHPStan\Type\ArrayType(new \PHPStan\Type\StringType(), new \PHPStan\Type\IntegerType());
        (yield [$arrayType, 'array<string, int>']);
    }
}
