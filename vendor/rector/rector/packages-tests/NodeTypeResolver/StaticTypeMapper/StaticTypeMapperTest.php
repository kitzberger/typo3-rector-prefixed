<?php

declare (strict_types=1);
namespace Rector\Tests\NodeTypeResolver\StaticTypeMapper;

use Iterator;
use PhpParser\Node;
use PhpParser\Node\Identifier;
use PhpParser\Node\Scalar\String_;
use PHPStan\PhpDocParser\Ast\Type\ArrayTypeNode;
use PHPStan\PhpDocParser\Ast\Type\GenericTypeNode;
use PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode;
use PHPStan\PhpDocParser\Ast\Type\TypeNode;
use PHPStan\Type\ClassStringType;
use PHPStan\Type\Generic\GenericObjectType;
use PHPStan\Type\IterableType;
use PHPStan\Type\MixedType;
use Rector\StaticTypeMapper\StaticTypeMapper;
use Rector\Testing\PHPUnit\AbstractTestCase;
final class StaticTypeMapperTest extends \Rector\Testing\PHPUnit\AbstractTestCase
{
    /**
     * @var StaticTypeMapper
     */
    private $staticTypeMapper;
    protected function setUp() : void
    {
        $this->boot();
        $this->staticTypeMapper = $this->getService(\Rector\StaticTypeMapper\StaticTypeMapper::class);
    }
    /**
     * @dataProvider provideDataForMapPHPStanPhpDocTypeNodeToPHPStanType()
     */
    public function testMapPHPStanPhpDocTypeNodeToPHPStanType(\PHPStan\PhpDocParser\Ast\Type\TypeNode $typeNode, string $expectedType) : void
    {
        $string = new \PhpParser\Node\Scalar\String_('hey');
        $phpStanType = $this->staticTypeMapper->mapPHPStanPhpDocTypeNodeToPHPStanType($typeNode, $string);
        $this->assertInstanceOf($expectedType, $phpStanType);
    }
    public function provideDataForMapPHPStanPhpDocTypeNodeToPHPStanType() : \Iterator
    {
        $genericTypeNode = new \PHPStan\PhpDocParser\Ast\Type\GenericTypeNode(new \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode('Traversable'), []);
        (yield [$genericTypeNode, \PHPStan\Type\Generic\GenericObjectType::class]);
        $genericTypeNode = new \PHPStan\PhpDocParser\Ast\Type\GenericTypeNode(new \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode('iterable'), [new \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode('string')]);
        (yield [$genericTypeNode, \PHPStan\Type\IterableType::class]);
        (yield [new \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode('mixed'), \PHPStan\Type\MixedType::class]);
    }
    public function testMapPHPStanTypeToPHPStanPhpDocTypeNode() : void
    {
        $iterableType = new \PHPStan\Type\IterableType(new \PHPStan\Type\MixedType(), new \PHPStan\Type\ClassStringType());
        $phpStanDocTypeNode = $this->staticTypeMapper->mapPHPStanTypeToPHPStanPhpDocTypeNode($iterableType);
        $this->assertInstanceOf(\PHPStan\PhpDocParser\Ast\Type\ArrayTypeNode::class, $phpStanDocTypeNode);
        /** @var ArrayTypeNode $phpStanDocTypeNode */
        $this->assertInstanceOf(\PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::class, $phpStanDocTypeNode->type);
    }
    public function testMixed() : void
    {
        $mixedType = new \PHPStan\Type\MixedType();
        $phpStanDocTypeNode = $this->staticTypeMapper->mapPHPStanTypeToPHPStanPhpDocTypeNode($mixedType);
        $this->assertInstanceOf(\PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::class, $phpStanDocTypeNode);
    }
    /**
     * @dataProvider provideDataForMapPhpParserNodePHPStanType()
     */
    public function testMapPhpParserNodePHPStanType(\PhpParser\Node $node, string $expectedType) : void
    {
        $phpStanType = $this->staticTypeMapper->mapPhpParserNodePHPStanType($node);
        $this->assertInstanceOf($expectedType, $phpStanType);
    }
    /**
     * @return Iterator<class-string<IterableType>[]|Identifier[]>
     */
    public function provideDataForMapPhpParserNodePHPStanType() : \Iterator
    {
        (yield [new \PhpParser\Node\Identifier('iterable'), \PHPStan\Type\IterableType::class]);
    }
}
