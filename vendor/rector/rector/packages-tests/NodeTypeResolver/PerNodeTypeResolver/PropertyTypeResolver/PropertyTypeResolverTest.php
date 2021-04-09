<?php

declare (strict_types=1);
namespace Rector\Tests\NodeTypeResolver\PerNodeTypeResolver\PropertyTypeResolver;

use Iterator;
use PhpParser\Node\Stmt\Property;
use PHPStan\Type\NullType;
use PHPStan\Type\ObjectType;
use PHPStan\Type\Type;
use PHPStan\Type\VerbosityLevel;
use Rector\StaticTypeMapper\TypeFactory\UnionTypeFactory;
use Rector\Tests\NodeTypeResolver\PerNodeTypeResolver\AbstractNodeTypeResolverTest;
use Rector\Tests\NodeTypeResolver\PerNodeTypeResolver\PropertyTypeResolver\Source\ClassThatExtendsHtml;
use Rector\Tests\NodeTypeResolver\PerNodeTypeResolver\PropertyTypeResolver\Source\Html;
use Rector\Tests\NodeTypeResolver\PerNodeTypeResolver\PropertyTypeResolver\Source\SomeChild;
/**
 * @see \Rector\NodeTypeResolver\NodeTypeResolver\PropertyTypeResolver
 */
final class PropertyTypeResolverTest extends \Rector\Tests\NodeTypeResolver\PerNodeTypeResolver\AbstractNodeTypeResolverTest
{
    /**
     * @dataProvider provideData()
     */
    public function test(string $file, int $nodePosition, \PHPStan\Type\Type $expectedType) : void
    {
        $propertyNodes = $this->getNodesForFileOfType($file, \PhpParser\Node\Stmt\Property::class);
        $resolvedType = $this->nodeTypeResolver->resolve($propertyNodes[$nodePosition]);
        // type is as expected
        $expectedTypeClass = \get_class($expectedType);
        $this->assertInstanceOf($expectedTypeClass, $resolvedType);
        $expectedTypeAsString = $this->getStringFromType($expectedType);
        $resolvedTypeAsString = $this->getStringFromType($resolvedType);
        $this->assertEquals($expectedTypeAsString, $resolvedTypeAsString);
    }
    public function provideData() : \Iterator
    {
        $unionTypeFactory = new \Rector\StaticTypeMapper\TypeFactory\UnionTypeFactory();
        (yield [__DIR__ . '/Source/MethodParamDocBlock.php', 0, new \PHPStan\Type\ObjectType(\Rector\Tests\NodeTypeResolver\PerNodeTypeResolver\PropertyTypeResolver\Source\Html::class)]);
        (yield [__DIR__ . '/Source/MethodParamDocBlock.php', 1, new \PHPStan\Type\ObjectType(\Rector\Tests\NodeTypeResolver\PerNodeTypeResolver\PropertyTypeResolver\Source\ClassThatExtendsHtml::class)]);
        // mimics failing test from DomainDrivenDesign set
        $unionType = $unionTypeFactory->createUnionObjectType([\Rector\Tests\NodeTypeResolver\PerNodeTypeResolver\PropertyTypeResolver\Source\SomeChild::class, new \PHPStan\Type\NullType()]);
        (yield [__DIR__ . '/Source/ActionClass.php', 0, $unionType]);
    }
    private function getStringFromType(\PHPStan\Type\Type $type) : string
    {
        return $type->describe(\PHPStan\Type\VerbosityLevel::precise());
    }
}
