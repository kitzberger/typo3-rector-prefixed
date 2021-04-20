<?php

declare (strict_types=1);
namespace Rector\Tests\BetterPhpDocParser\PhpDocParser\TagValueNodeReprint;

use Iterator;
use PhpParser\Comment\Doc;
use PhpParser\Node;
use Rector\BetterPhpDocParser\PhpDocInfo\PhpDocInfoFactory;
use Rector\BetterPhpDocParser\Printer\PhpDocInfoPrinter;
use Rector\Core\Exception\ShouldNotHappenException;
use Rector\Core\HttpKernel\RectorKernel;
use Rector\Core\PhpParser\Node\BetterNodeFinder;
use Rector\FileSystemRector\Parser\FileInfoParser;
use Typo3RectorPrefix20210420\Symplify\EasyTesting\DataProvider\StaticFixtureFinder;
use Typo3RectorPrefix20210420\Symplify\EasyTesting\FixtureSplitter\TrioFixtureSplitter;
use Typo3RectorPrefix20210420\Symplify\EasyTesting\ValueObject\FixtureSplit\TrioContent;
use Typo3RectorPrefix20210420\Symplify\PackageBuilder\Testing\AbstractKernelTestCase;
use Typo3RectorPrefix20210420\Symplify\SmartFileSystem\SmartFileInfo;
use Typo3RectorPrefix20210420\Symplify\SmartFileSystem\SmartFileSystem;
final class TagValueNodeReprintTest extends \Typo3RectorPrefix20210420\Symplify\PackageBuilder\Testing\AbstractKernelTestCase
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
    /**
     * @dataProvider provideData()
     * @dataProvider provideDataNested()
     */
    public function test(\Typo3RectorPrefix20210420\Symplify\SmartFileSystem\SmartFileInfo $fixtureFileInfo) : void
    {
        $trioFixtureSplitter = new \Typo3RectorPrefix20210420\Symplify\EasyTesting\FixtureSplitter\TrioFixtureSplitter();
        $trioContent = $trioFixtureSplitter->splitFileInfo($fixtureFileInfo);
        $nodeClass = \trim($trioContent->getSecondValue());
        $tagValueNodeClasses = $this->splitListByEOL($trioContent->getExpectedResult());
        $fixtureFileInfo = $this->createFixtureFileInfo($trioContent, $fixtureFileInfo);
        foreach ($tagValueNodeClasses as $tagValueNodeClass) {
            $this->doTestPrintedPhpDocInfo($fixtureFileInfo, $tagValueNodeClass, $nodeClass);
        }
    }
    /**
     * @return Iterator<SmartFileInfo>
     */
    public function provideData() : \Iterator
    {
        return \Typo3RectorPrefix20210420\Symplify\EasyTesting\DataProvider\StaticFixtureFinder::yieldDirectory(__DIR__ . '/Fixture');
    }
    /**
     * @return Iterator<SmartFileInfo>
     */
    public function provideDataNested() : \Iterator
    {
        return \Typo3RectorPrefix20210420\Symplify\EasyTesting\DataProvider\StaticFixtureFinder::yieldDirectory(__DIR__ . '/FixtureNested');
    }
    /**
     * @param class-string $annotationClass
     * @param class-string<Node> $nodeClass
     */
    private function doTestPrintedPhpDocInfo(\Typo3RectorPrefix20210420\Symplify\SmartFileSystem\SmartFileInfo $smartFileInfo, string $annotationClass, string $nodeClass) : void
    {
        $nodeWithPhpDocInfo = $this->parseFileAndGetFirstNodeOfType($smartFileInfo, $nodeClass);
        $docComment = $nodeWithPhpDocInfo->getDocComment();
        if (!$docComment instanceof \PhpParser\Comment\Doc) {
            throw new \Rector\Core\Exception\ShouldNotHappenException(\sprintf('Doc comments for "%s" file cannot not be empty', $smartFileInfo));
        }
        $originalDocCommentText = $docComment->getText();
        $printedPhpDocInfo = $this->printNodePhpDocInfoToString($nodeWithPhpDocInfo);
        $this->assertSame($originalDocCommentText, $printedPhpDocInfo);
        $this->doTestContainsTagValueNodeType($nodeWithPhpDocInfo, $annotationClass, $smartFileInfo);
    }
    /**
     * @return string[]
     */
    private function splitListByEOL(string $content) : array
    {
        $trimmedContent = \trim($content);
        return \explode(\PHP_EOL, $trimmedContent);
    }
    private function createFixtureFileInfo(\Typo3RectorPrefix20210420\Symplify\EasyTesting\ValueObject\FixtureSplit\TrioContent $trioContent, \Typo3RectorPrefix20210420\Symplify\SmartFileSystem\SmartFileInfo $fixturefileInfo) : \Typo3RectorPrefix20210420\Symplify\SmartFileSystem\SmartFileInfo
    {
        $temporaryFileName = \sys_get_temp_dir() . '/rector/tests/' . $fixturefileInfo->getRelativePathname();
        $firstValue = $trioContent->getFirstValue();
        $smartFileSystem = new \Typo3RectorPrefix20210420\Symplify\SmartFileSystem\SmartFileSystem();
        $smartFileSystem->dumpFile($temporaryFileName, $firstValue);
        return new \Typo3RectorPrefix20210420\Symplify\SmartFileSystem\SmartFileInfo($temporaryFileName);
    }
    /**
     * @template T as Node
     * @param class-string<T> $nodeType
     * @return T
     */
    private function parseFileAndGetFirstNodeOfType(\Typo3RectorPrefix20210420\Symplify\SmartFileSystem\SmartFileInfo $smartFileInfo, string $nodeType) : \PhpParser\Node
    {
        $nodes = $this->fileInfoParser->parseFileInfoToNodesAndDecorate($smartFileInfo);
        $node = $this->betterNodeFinder->findFirstInstanceOf($nodes, $nodeType);
        if (!$node instanceof \PhpParser\Node) {
            throw new \Rector\Core\Exception\ShouldNotHappenException($smartFileInfo->getRealPath());
        }
        return $node;
    }
    private function printNodePhpDocInfoToString(\PhpParser\Node $node) : string
    {
        $phpDocInfo = $this->phpDocInfoFactory->createFromNodeOrEmpty($node);
        return $this->phpDocInfoPrinter->printFormatPreserving($phpDocInfo);
    }
    /**
     * @param class-string $annotationClass
     */
    private function doTestContainsTagValueNodeType(\PhpParser\Node $node, string $annotationClass, \Typo3RectorPrefix20210420\Symplify\SmartFileSystem\SmartFileInfo $smartFileInfo) : void
    {
        $phpDocInfo = $this->phpDocInfoFactory->createFromNodeOrEmpty($node);
        $hasByAnnotationClass = $phpDocInfo->hasByAnnotationClass($annotationClass);
        $this->assertTrue($hasByAnnotationClass, $smartFileInfo->getRelativeFilePathFromCwd());
    }
}
