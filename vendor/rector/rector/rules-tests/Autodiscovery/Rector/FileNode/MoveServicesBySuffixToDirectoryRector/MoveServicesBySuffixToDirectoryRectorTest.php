<?php

declare (strict_types=1);
namespace Rector\Tests\Autodiscovery\Rector\FileNode\MoveServicesBySuffixToDirectoryRector;

use Iterator;
use Rector\FileSystemRector\ValueObject\AddedFileWithContent;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;
use Typo3RectorPrefix20210410\Symplify\SmartFileSystem\SmartFileInfo;
use Typo3RectorPrefix20210410\Symplify\SmartFileSystem\SmartFileSystem;
final class MoveServicesBySuffixToDirectoryRectorTest extends \Rector\Testing\PHPUnit\AbstractRectorTestCase
{
    /**
     * @dataProvider provideData()
     */
    public function test(\Typo3RectorPrefix20210410\Symplify\SmartFileSystem\SmartFileInfo $originalFileInfo, ?\Rector\FileSystemRector\ValueObject\AddedFileWithContent $expectedAddedFileWithContent) : void
    {
        $this->doTestFileInfo($originalFileInfo);
        if ($expectedAddedFileWithContent === null) {
            // no change - file should have the original location
            $this->assertFileWasNotChanged($this->originalTempFileInfo);
        } else {
            $this->assertFileWithContentWasAdded($expectedAddedFileWithContent);
        }
    }
    /**
     * @return Iterator<mixed>
     */
    public function provideData() : \Iterator
    {
        $smartFileSystem = new \Typo3RectorPrefix20210410\Symplify\SmartFileSystem\SmartFileSystem();
        (yield [new \Typo3RectorPrefix20210410\Symplify\SmartFileSystem\SmartFileInfo(__DIR__ . '/Source/Entity/AppleRepository.php'), new \Rector\FileSystemRector\ValueObject\AddedFileWithContent($this->getFixtureTempDirectory() . '/Source/Repository/AppleRepository.php', $smartFileSystem->readFile(__DIR__ . '/Expected/Repository/ExpectedAppleRepository.php'))]);
        (yield [new \Typo3RectorPrefix20210410\Symplify\SmartFileSystem\SmartFileInfo(__DIR__ . '/Source/Controller/BananaCommand.php'), new \Rector\FileSystemRector\ValueObject\AddedFileWithContent($this->getFixtureTempDirectory() . '/Source/Command/BananaCommand.php', $smartFileSystem->readFile(__DIR__ . '/Expected/Command/ExpectedBananaCommand.php'))]);
        (yield [new \Typo3RectorPrefix20210410\Symplify\SmartFileSystem\SmartFileInfo(__DIR__ . '/Source/Command/MissPlacedController.php'), new \Rector\FileSystemRector\ValueObject\AddedFileWithContent($this->getFixtureTempDirectory() . '/Source/Controller/MissPlacedController.php', $smartFileSystem->readFile(__DIR__ . '/Expected/Controller/MissPlacedController.php'))]);
        // nothing changes
        (yield [new \Typo3RectorPrefix20210410\Symplify\SmartFileSystem\SmartFileInfo(__DIR__ . '/Source/Mapper/SkipCorrectMapper.php'), null]);
        (yield [new \Typo3RectorPrefix20210410\Symplify\SmartFileSystem\SmartFileInfo(__DIR__ . '/Source/Controller/Nested/AbstractBaseWithSpaceMapper.php'), new \Rector\FileSystemRector\ValueObject\AddedFileWithContent($this->getFixtureTempDirectory() . '/Source/Mapper/Nested/AbstractBaseWithSpaceMapper.php', $smartFileSystem->readFile(__DIR__ . '/Expected/Mapper/Nested/AbstractBaseWithSpaceMapper.php.inc'))]);
        // inversed order, but should have the same effect
        (yield [new \Typo3RectorPrefix20210410\Symplify\SmartFileSystem\SmartFileInfo(__DIR__ . '/Source/Entity/UserMapper.php'), new \Rector\FileSystemRector\ValueObject\AddedFileWithContent($this->getFixtureTempDirectory() . '/Source/Mapper/UserMapper.php', $smartFileSystem->readFile(__DIR__ . '/Expected/Mapper/UserMapper.php.inc'))]);
    }
    public function provideConfigFilePath() : string
    {
        return __DIR__ . '/config/configured_rule.php';
    }
}
