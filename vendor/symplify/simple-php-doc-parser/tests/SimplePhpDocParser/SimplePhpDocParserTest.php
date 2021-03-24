<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210324\Symplify\SimplePhpDocParser\Tests\SimplePhpDocParser;

use Typo3RectorPrefix20210324\Symplify\PackageBuilder\Testing\AbstractKernelTestCase;
use Typo3RectorPrefix20210324\Symplify\SimplePhpDocParser\SimplePhpDocParser;
use Typo3RectorPrefix20210324\Symplify\SimplePhpDocParser\Tests\HttpKernel\SimplePhpDocParserKernel;
use Typo3RectorPrefix20210324\Symplify\SimplePhpDocParser\ValueObject\Ast\PhpDoc\SimplePhpDocNode;
use Typo3RectorPrefix20210324\Symplify\SmartFileSystem\SmartFileInfo;
final class SimplePhpDocParserTest extends \Typo3RectorPrefix20210324\Symplify\PackageBuilder\Testing\AbstractKernelTestCase
{
    /**
     * @var SimplePhpDocParser
     */
    private $simplePhpDocParser;
    protected function setUp() : void
    {
        $this->bootKernel(\Typo3RectorPrefix20210324\Symplify\SimplePhpDocParser\Tests\HttpKernel\SimplePhpDocParserKernel::class);
        $this->simplePhpDocParser = $this->getService(\Typo3RectorPrefix20210324\Symplify\SimplePhpDocParser\SimplePhpDocParser::class);
    }
    public function testVar() : void
    {
        $smartFileInfo = new \Typo3RectorPrefix20210324\Symplify\SmartFileSystem\SmartFileInfo(__DIR__ . '/Fixture/var_int.txt');
        $phpDocNode = $this->simplePhpDocParser->parseDocBlock($smartFileInfo->getContents());
        $this->assertInstanceOf(\Typo3RectorPrefix20210324\Symplify\SimplePhpDocParser\ValueObject\Ast\PhpDoc\SimplePhpDocNode::class, $phpDocNode);
        $varTagValues = $phpDocNode->getVarTagValues();
        $this->assertCount(1, $varTagValues);
    }
    public function testParam() : void
    {
        $smartFileInfo = new \Typo3RectorPrefix20210324\Symplify\SmartFileSystem\SmartFileInfo(__DIR__ . '/Fixture/param_string_name.txt');
        $phpDocNode = $this->simplePhpDocParser->parseDocBlock($smartFileInfo->getContents());
        $this->assertInstanceOf(\Typo3RectorPrefix20210324\Symplify\SimplePhpDocParser\ValueObject\Ast\PhpDoc\SimplePhpDocNode::class, $phpDocNode);
        // DX friendly
        $paramType = $phpDocNode->getParamType('name');
        $withDollarParamType = $phpDocNode->getParamType('$name');
        $this->assertSame($paramType, $withDollarParamType);
    }
}
