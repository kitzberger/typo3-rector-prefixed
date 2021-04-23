<?php

declare (strict_types=1);
namespace Rector\Tests\Transform\Rector\FileWithoutNamespace\FunctionToStaticMethodRector;

use Iterator;
use Typo3RectorPrefix20210423\Nette\Utils\FileSystem;
use Rector\FileSystemRector\ValueObject\AddedFileWithContent;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;
use Typo3RectorPrefix20210423\Symplify\SmartFileSystem\SmartFileInfo;
final class FunctionToStaticMethodRectorTest extends \Rector\Testing\PHPUnit\AbstractRectorTestCase
{
    /**
     * @dataProvider provideData()
     */
    public function test(\Typo3RectorPrefix20210423\Symplify\SmartFileSystem\SmartFileInfo $smartFileInfo) : void
    {
        $this->doTestFileInfo($smartFileInfo);
        $addedFileWithContent = new \Rector\FileSystemRector\ValueObject\AddedFileWithContent($this->originalTempFileInfo->getRealPathDirectory() . '/StaticFunctions.php', \Typo3RectorPrefix20210423\Nette\Utils\FileSystem::read(__DIR__ . '/Source/ExpectedStaticFunctions.php'));
        $this->assertFileWasAdded($addedFileWithContent);
    }
    /**
     * @return Iterator<SmartFileInfo>
     */
    public function provideData() : \Iterator
    {
        return $this->yieldFilesFromDirectory(__DIR__ . '/Fixture');
    }
    public function provideConfigFilePath() : string
    {
        return __DIR__ . '/config/configured_rule.php';
    }
}
