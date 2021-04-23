<?php

declare (strict_types=1);
namespace Rector\Tests\StaticTypeMapper\PhpDoc;

use Iterator;
use PhpParser\Node\Stmt\Nop;
use PHPStan\PhpDocParser\Ast\Type\ArrayShapeItemNode;
use PHPStan\PhpDocParser\Ast\Type\ArrayShapeNode;
use PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode;
use PHPStan\PhpDocParser\Ast\Type\TypeNode;
use PHPStan\Type\ArrayType;
use Rector\StaticTypeMapper\Naming\NameScopeFactory;
use Rector\StaticTypeMapper\PhpDoc\PhpDocTypeMapper;
use Rector\Testing\PHPUnit\AbstractTestCase;
final class PhpDocTypeMapperTest extends \Rector\Testing\PHPUnit\AbstractTestCase
{
    /**
     * @var PhpDocTypeMapper
     */
    private $phpDocTypeMapper;
    /**
     * @var NameScopeFactory
     */
    private $nameScopeFactory;
    protected function setUp() : void
    {
        $this->boot();
        $this->phpDocTypeMapper = $this->getService(\Rector\StaticTypeMapper\PhpDoc\PhpDocTypeMapper::class);
        $this->nameScopeFactory = $this->getService(\Rector\StaticTypeMapper\Naming\NameScopeFactory::class);
    }
    /**
     * @dataProvider provideData()
     */
    public function test(\PHPStan\PhpDocParser\Ast\Type\TypeNode $typeNode, string $expectedPHPStanType) : void
    {
        $nop = new \PhpParser\Node\Stmt\Nop();
        $nameScope = $this->nameScopeFactory->createNameScopeFromNode($nop);
        $phpStanType = $this->phpDocTypeMapper->mapToPHPStanType($typeNode, $nop, $nameScope);
        $this->assertInstanceOf($expectedPHPStanType, $phpStanType);
    }
    /**
     * @return Iterator<class-string<ArrayType>[]|ArrayShapeNode[]>
     */
    public function provideData() : \Iterator
    {
        $arrayShapeNode = new \PHPStan\PhpDocParser\Ast\Type\ArrayShapeNode([new \PHPStan\PhpDocParser\Ast\Type\ArrayShapeItemNode(null, \true, new \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode('string'))]);
        (yield [$arrayShapeNode, \PHPStan\Type\ArrayType::class]);
    }
}
