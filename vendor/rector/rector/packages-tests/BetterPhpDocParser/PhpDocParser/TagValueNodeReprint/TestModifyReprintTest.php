<?php

declare (strict_types=1);
namespace Rector\Tests\BetterPhpDocParser\PhpDocParser\TagValueNodeReprint;

use PhpParser\Node;
use PhpParser\Node\Stmt\ClassMethod;
use Rector\BetterPhpDocParser\PhpDoc\DoctrineAnnotationTagValueNode;
use Rector\BetterPhpDocParser\PhpDocInfo\PhpDocInfo;
use Rector\BetterPhpDocParser\PhpDocInfo\PhpDocInfoFactory;
use Rector\BetterPhpDocParser\Printer\PhpDocInfoPrinter;
use Rector\BetterPhpDocParser\ValueObject\PhpDoc\DoctrineAnnotation\CurlyListNode;
use Rector\Core\Exception\ShouldNotHappenException;
use Rector\Core\HttpKernel\RectorKernel;
use Rector\Core\PhpParser\Node\BetterNodeFinder;
use Rector\FileSystemRector\Parser\FileInfoParser;
use Typo3RectorPrefix20210409\Symplify\EasyTesting\StaticFixtureSplitter;
use Typo3RectorPrefix20210409\Symplify\PackageBuilder\Testing\AbstractKernelTestCase;
use Typo3RectorPrefix20210409\Symplify\SmartFileSystem\SmartFileInfo;
final class TestModifyReprintTest extends \Typo3RectorPrefix20210409\Symplify\PackageBuilder\Testing\AbstractKernelTestCase
{
    /**
     * @var FileInfoParser
     */
    private $fileInfoParser;
    /**
     * @var BetterNodeFinder
     */
    private $betterNodeFinder;
    /**
     * @var PhpDocInfoPrinter
     */
    private $phpDocInfoPrinter;
    /**
     * @var PhpDocInfoFactory
     */
    private $phpDocInfoFactory;
    protected function setUp() : void
    {
        $this->bootKernel(\Rector\Core\HttpKernel\RectorKernel::class);
        $this->fileInfoParser = $this->getService(\Rector\FileSystemRector\Parser\FileInfoParser::class);
        $this->betterNodeFinder = $this->getService(\Rector\Core\PhpParser\Node\BetterNodeFinder::class);
        $this->phpDocInfoPrinter = $this->getService(\Rector\BetterPhpDocParser\Printer\PhpDocInfoPrinter::class);
        $this->phpDocInfoFactory = $this->getService(\Rector\BetterPhpDocParser\PhpDocInfo\PhpDocInfoFactory::class);
    }
    public function test() : void
    {
        $fixtureFileInfo = new \Typo3RectorPrefix20210409\Symplify\SmartFileSystem\SmartFileInfo(__DIR__ . '/FixtureModify/route_with_extra_methods.php.inc');
        $inputFileInfoAndExpected = \Typo3RectorPrefix20210409\Symplify\EasyTesting\StaticFixtureSplitter::splitFileInfoToLocalInputAndExpected($fixtureFileInfo);
        $inputFileInfo = $inputFileInfoAndExpected->getInputFileInfo();
        $phpDocInfo = $this->parseFileAndGetFirstNodeOfType($inputFileInfo, \PhpParser\Node\Stmt\ClassMethod::class);
        /** @var DoctrineAnnotationTagValueNode $doctrineAnnotationTagValueNode */
        $doctrineAnnotationTagValueNode = $phpDocInfo->getByAnnotationClass('Typo3RectorPrefix20210409\\Symfony\\Component\\Routing\\Annotation\\Route');
        // this will extended tokens of first node
        $doctrineAnnotationTagValueNode->changeValue('methods', new \Rector\BetterPhpDocParser\ValueObject\PhpDoc\DoctrineAnnotation\CurlyListNode(['"GET"', '"HEAD"']));
        $expectedDocContent = \trim($inputFileInfoAndExpected->getExpected());
        $printedPhpDocInfo = $this->printPhpDocInfoToString($phpDocInfo);
        $this->assertSame($expectedDocContent, $printedPhpDocInfo);
    }
    /**
     * @param class-string<Node> $nodeType
     */
    private function parseFileAndGetFirstNodeOfType(\Typo3RectorPrefix20210409\Symplify\SmartFileSystem\SmartFileInfo $smartFileInfo, string $nodeType) : \Rector\BetterPhpDocParser\PhpDocInfo\PhpDocInfo
    {
        $nodes = $this->fileInfoParser->parseFileInfoToNodesAndDecorate($smartFileInfo);
        $node = $this->betterNodeFinder->findFirstInstanceOf($nodes, $nodeType);
        if (!$node instanceof \PhpParser\Node) {
            throw new \Rector\Core\Exception\ShouldNotHappenException($smartFileInfo->getRealPath());
        }
        return $this->phpDocInfoFactory->createFromNodeOrEmpty($node);
    }
    private function printPhpDocInfoToString(\Rector\BetterPhpDocParser\PhpDocInfo\PhpDocInfo $phpDocInfo) : string
    {
        $phpDocInfo->markAsChanged();
        return $this->phpDocInfoPrinter->printFormatPreserving($phpDocInfo);
    }
}
