<?php

declare (strict_types=1);
namespace Rector\Tests\BetterPhpDocParser;

use PHPStan\PhpDocParser\Ast\PhpDoc\ParamTagValueNode;
use PHPStan\PhpDocParser\Ast\PhpDoc\PhpDocNode;
use PHPStan\PhpDocParser\Ast\PhpDoc\PhpDocTagNode;
use PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode;
use PHPStan\PhpDocParser\Ast\Type\NullableTypeNode;
use Rector\BetterPhpDocParser\PhpDocNodeMapper;
use Rector\BetterPhpDocParser\ValueObject\Parser\BetterTokenIterator;
use Rector\BetterPhpDocParser\ValueObject\PhpDoc\VariadicAwareParamTagValueNode;
use Rector\Core\HttpKernel\RectorKernel;
use Typo3RectorPrefix20210420\Symplify\PackageBuilder\Testing\AbstractKernelTestCase;
final class PhpDocNodeMapperTest extends \Typo3RectorPrefix20210420\Symplify\PackageBuilder\Testing\AbstractKernelTestCase
{
    /**
     * @var PhpDocNodeMapper
     */
    private $phpDocNodeMapper;
    protected function setUp() : void
    {
        $this->bootKernel(\Rector\Core\HttpKernel\RectorKernel::class);
        $this->phpDocNodeMapper = $this->getService(\Rector\BetterPhpDocParser\PhpDocNodeMapper::class);
    }
    public function testParamTag() : void
    {
        $phpDocNode = $this->createParamDocNode();
        $this->phpDocNodeMapper->transform($phpDocNode, new \Rector\BetterPhpDocParser\ValueObject\Parser\BetterTokenIterator([]));
        $childNode = $phpDocNode->children[0];
        $this->assertInstanceOf(\PHPStan\PhpDocParser\Ast\PhpDoc\PhpDocTagNode::class, $childNode);
        // test param tag
        /** @var PhpDocTagNode $childNode */
        $propertyTagValueNode = $childNode->value;
        $this->assertInstanceOf(\Rector\BetterPhpDocParser\ValueObject\PhpDoc\VariadicAwareParamTagValueNode::class, $propertyTagValueNode);
    }
    /**
     * Creates doc block for:
     * @property string|null $name
     */
    private function createParamDocNode() : \PHPStan\PhpDocParser\Ast\PhpDoc\PhpDocNode
    {
        $nullableTypeNode = new \PHPStan\PhpDocParser\Ast\Type\NullableTypeNode(new \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode('string'));
        $paramTagValueNode = new \PHPStan\PhpDocParser\Ast\PhpDoc\ParamTagValueNode($nullableTypeNode, \true, 'name', '');
        $children = [new \PHPStan\PhpDocParser\Ast\PhpDoc\PhpDocTagNode('@param', $paramTagValueNode)];
        return new \PHPStan\PhpDocParser\Ast\PhpDoc\PhpDocNode($children);
    }
}
