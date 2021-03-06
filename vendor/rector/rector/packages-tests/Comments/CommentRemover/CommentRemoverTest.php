<?php

declare (strict_types=1);
namespace Rector\Comments\Tests\CommentRemover;

use Iterator;
use Rector\Comments\CommentRemover;
use Rector\Core\PhpParser\Printer\BetterStandardPrinter;
use Rector\FileSystemRector\Parser\FileInfoParser;
use Rector\Testing\PHPUnit\AbstractTestCase;
use Typo3RectorPrefix20210423\Symplify\EasyTesting\DataProvider\StaticFixtureFinder;
use Typo3RectorPrefix20210423\Symplify\EasyTesting\StaticFixtureSplitter;
use Typo3RectorPrefix20210423\Symplify\SmartFileSystem\SmartFileInfo;
final class CommentRemoverTest extends \Rector\Testing\PHPUnit\AbstractTestCase
{
    /**
     * @var CommentRemover
     */
    private $commentRemover;
    /**
     * @var FileInfoParser
     */
    private $fileInfoParser;
    /**
     * @var BetterStandardPrinter
     */
    private $betterStandardPrinter;
    protected function setUp() : void
    {
        $this->boot();
        $this->commentRemover = $this->getService(\Rector\Comments\CommentRemover::class);
        $this->fileInfoParser = $this->getService(\Rector\FileSystemRector\Parser\FileInfoParser::class);
        $this->betterStandardPrinter = $this->getService(\Rector\Core\PhpParser\Printer\BetterStandardPrinter::class);
    }
    /**
     * @dataProvider provideData()
     */
    public function test(\Typo3RectorPrefix20210423\Symplify\SmartFileSystem\SmartFileInfo $smartFileInfo) : void
    {
        $fileInfoToLocalInputAndExpected = \Typo3RectorPrefix20210423\Symplify\EasyTesting\StaticFixtureSplitter::splitFileInfoToLocalInputAndExpected($smartFileInfo);
        $nodes = $this->fileInfoParser->parseFileInfoToNodesAndDecorate($fileInfoToLocalInputAndExpected->getInputFileInfo());
        $nodesWithoutComments = $this->commentRemover->removeFromNode($nodes);
        $fileContent = $this->betterStandardPrinter->print($nodesWithoutComments);
        $fileContent = \trim($fileContent);
        $expectedContent = \trim($fileInfoToLocalInputAndExpected->getExpected());
        $this->assertSame($fileContent, $expectedContent, $smartFileInfo->getRelativeFilePathFromCwd());
        // original nodes are not touched
        $originalContent = $this->betterStandardPrinter->print($nodes);
        $this->assertNotSame($expectedContent, $originalContent);
    }
    public function provideData() : \Iterator
    {
        return \Typo3RectorPrefix20210423\Symplify\EasyTesting\DataProvider\StaticFixtureFinder::yieldDirectory(__DIR__ . '/Fixture', '*.php.inc');
    }
}
