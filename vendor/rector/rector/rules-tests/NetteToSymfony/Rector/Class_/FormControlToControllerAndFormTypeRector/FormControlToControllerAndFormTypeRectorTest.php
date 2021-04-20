<?php

declare (strict_types=1);
namespace Rector\Tests\NetteToSymfony\Rector\Class_\FormControlToControllerAndFormTypeRector;

use Iterator;
use Typo3RectorPrefix20210420\Nette\Utils\FileSystem;
use Rector\FileSystemRector\ValueObject\AddedFileWithContent;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;
use Typo3RectorPrefix20210420\Symplify\SmartFileSystem\SmartFileInfo;
final class FormControlToControllerAndFormTypeRectorTest extends \Rector\Testing\PHPUnit\AbstractRectorTestCase
{
    /**
     * @dataProvider provideData()
     */
    public function test(\Typo3RectorPrefix20210420\Symplify\SmartFileSystem\SmartFileInfo $fileInfo, \Rector\FileSystemRector\ValueObject\AddedFileWithContent $expectedAddedFileWithContent) : void
    {
        $this->doTestFileInfo($fileInfo);
        $this->assertFileWasAdded($expectedAddedFileWithContent);
    }
    /**
     * @return Iterator<string[]|SmartFileInfo[]>
     */
    public function provideData() : \Iterator
    {
        (yield [new \Typo3RectorPrefix20210420\Symplify\SmartFileSystem\SmartFileInfo(__DIR__ . '/Fixture/fixture.php.inc'), new \Rector\FileSystemRector\ValueObject\AddedFileWithContent('src/Controller/SomeFormController.php', \Typo3RectorPrefix20210420\Nette\Utils\FileSystem::read(__DIR__ . '/Source/extra_file.php'))]);
    }
    public function provideConfigFilePath() : string
    {
        return __DIR__ . '/config/configured_rule.php';
    }
}
