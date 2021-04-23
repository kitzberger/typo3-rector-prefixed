<?php

declare (strict_types=1);
namespace Rector\Tests\BetterPhpDocParser\PhpDocParser;

use Iterator;
use PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode;
use PHPStan\PhpDocParser\Ast\Type\IntersectionTypeNode;
use PHPStan\PhpDocParser\Ast\Type\NullableTypeNode;
use PHPStan\PhpDocParser\Ast\Type\TypeNode;
use Rector\BetterPhpDocParser\PhpDocParser\TypeNodeAnalyzer;
use Rector\Testing\PHPUnit\AbstractTestCase;
final class TypeNodeAnalyzerTest extends \Rector\Testing\PHPUnit\AbstractTestCase
{
    /**
     * @var string
     */
    private const INT = 'int';
    /**
     * @var TypeNodeAnalyzer
     */
    private $typeNodeAnalyzer;
    protected function setUp() : void
    {
        $this->boot();
        $this->typeNodeAnalyzer = $this->getService(\Rector\BetterPhpDocParser\PhpDocParser\TypeNodeAnalyzer::class);
    }
    /**
     * @dataProvider provideDataForIntersectionAndNotNullable()
     */
    public function testIsIntersectionAndNotNullable(\PHPStan\PhpDocParser\Ast\Type\TypeNode $typeNode, bool $expectedIs) : void
    {
        $isIntersection = $this->typeNodeAnalyzer->isIntersectionAndNotNullable($typeNode);
        $this->assertSame($expectedIs, $isIntersection);
    }
    /**
     * @return Iterator<IntersectionTypeNode[]|bool[]>
     */
    public function provideDataForIntersectionAndNotNullable() : \Iterator
    {
        (yield [new \PHPStan\PhpDocParser\Ast\Type\IntersectionTypeNode([new \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode(self::INT)]), \true]);
        (yield [new \PHPStan\PhpDocParser\Ast\Type\IntersectionTypeNode([new \PHPStan\PhpDocParser\Ast\Type\NullableTypeNode(new \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode(self::INT))]), \false]);
    }
}
