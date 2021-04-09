<?php

declare (strict_types=1);
namespace Rector\Tests\PhpSpecToPHPUnit\Rector\FileNode\RenameSpecFileToTestFileRector;

use Iterator;
use Typo3RectorPrefix20210409\Nette\Utils\Strings;
use Rector\FileSystemRector\Contract\MovedFileInterface;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;
use Typo3RectorPrefix20210409\Symplify\SmartFileSystem\SmartFileInfo;
final class RenameSpecFileToTestFileRectorTest extends \Rector\Testing\PHPUnit\AbstractRectorTestCase
{
    /**
     * @dataProvider provideData()
     */
    public function test(\Typo3RectorPrefix20210409\Symplify\SmartFileSystem\SmartFileInfo $fileInfo) : void
    {
        $this->doTestFileInfo($fileInfo);
        // test file is moved
        $movedFile = $this->matchMovedFile($this->originalTempFileInfo);
        $this->assertInstanceOf(\Rector\FileSystemRector\Contract\MovedFileInterface::class, $movedFile);
        $this->assertTrue(\Typo3RectorPrefix20210409\Nette\Utils\Strings::endsWith($movedFile->getNewPathname(), 'Test.php'));
    }
    /**
     * @return Iterator<SmartFileInfo>
     */
    public function provideData() : \Iterator
    {
        return $this->yieldFilesFromDirectory(__DIR__ . '/Fixture', '*.php');
    }
    public function provideConfigFilePath() : string
    {
        return __DIR__ . '/config/configured_rule.php';
    }
}
