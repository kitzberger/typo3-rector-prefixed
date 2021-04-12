<?php

declare (strict_types=1);
namespace Rector\Tests\Autodiscovery\Rector\FileNode\MoveValueObjectsToValueObjectDirectoryRector;

use Iterator;
use Rector\FileSystemRector\ValueObject\AddedFileWithContent;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;
use Typo3RectorPrefix20210412\Symplify\SmartFileSystem\SmartFileInfo;
use Typo3RectorPrefix20210412\Symplify\SmartFileSystem\SmartFileSystem;
final class MoveValueObjectsToValueObjectDirectoryRectorTest extends \Rector\Testing\PHPUnit\AbstractRectorTestCase
{
    /**
     * @dataProvider provideData()
     */
    public function test(\Typo3RectorPrefix20210412\Symplify\SmartFileSystem\SmartFileInfo $fixtureFileInfo, ?\Rector\FileSystemRector\ValueObject\AddedFileWithContent $expectedAddedFileWithContent) : void
    {
        $this->doTestFileInfo($fixtureFileInfo);
        if ($expectedAddedFileWithContent !== null) {
            $this->assertFileWithContentWasAdded($expectedAddedFileWithContent);
        } else {
            $this->assertFileWasNotChanged($this->originalTempFileInfo);
        }
    }
    /**
     * @return Iterator<mixed>
     */
    public function provideData() : \Iterator
    {
        $smartFileSystem = new \Typo3RectorPrefix20210412\Symplify\SmartFileSystem\SmartFileSystem();
        (yield [new \Typo3RectorPrefix20210412\Symplify\SmartFileSystem\SmartFileInfo(__DIR__ . '/Source/Repository/PrimitiveValueObject.php'), new \Rector\FileSystemRector\ValueObject\AddedFileWithContent($this->getFixtureTempDirectory() . '/Source/ValueObject/PrimitiveValueObject.php', $smartFileSystem->readFile(__DIR__ . '/Expected/ValueObject/PrimitiveValueObject.php'))]);
        // type
        (yield [new \Typo3RectorPrefix20210412\Symplify\SmartFileSystem\SmartFileInfo(__DIR__ . '/Source/Command/SomeName.php'), new \Rector\FileSystemRector\ValueObject\AddedFileWithContent($this->getFixtureTempDirectory() . '/Source/ValueObject/SomeName.php', $smartFileSystem->readFile(__DIR__ . '/Expected/ValueObject/SomeName.php'))]);
        // suffix
        (yield [new \Typo3RectorPrefix20210412\Symplify\SmartFileSystem\SmartFileInfo(__DIR__ . '/Source/Command/MeSearch.php'), new \Rector\FileSystemRector\ValueObject\AddedFileWithContent($this->getFixtureTempDirectory() . '/Source/ValueObject/MeSearch.php', $smartFileSystem->readFile(__DIR__ . '/Expected/ValueObject/MeSearch.php'))]);
        // skip known service types
        (yield [new \Typo3RectorPrefix20210412\Symplify\SmartFileSystem\SmartFileInfo(__DIR__ . '/Source/Utils/SomeSuffixedTest.php.inc'), null]);
    }
    public function provideConfigFilePath() : string
    {
        return __DIR__ . '/config/configured_rule.php';
    }
}
