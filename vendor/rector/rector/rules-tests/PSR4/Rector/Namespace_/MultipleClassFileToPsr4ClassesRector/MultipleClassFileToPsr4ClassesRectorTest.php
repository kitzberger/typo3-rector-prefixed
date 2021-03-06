<?php

declare (strict_types=1);
namespace Rector\Tests\PSR4\Rector\Namespace_\MultipleClassFileToPsr4ClassesRector;

use Iterator;
use Rector\FileSystemRector\ValueObject\AddedFileWithContent;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;
use Typo3RectorPrefix20210423\Symplify\SmartFileSystem\SmartFileInfo;
use Typo3RectorPrefix20210423\Symplify\SmartFileSystem\SmartFileSystem;
final class MultipleClassFileToPsr4ClassesRectorTest extends \Rector\Testing\PHPUnit\AbstractRectorTestCase
{
    /**
     * @param AddedFileWithContent[] $expectedFilePathsWithContents
     * @dataProvider provideData()
     */
    public function test(\Typo3RectorPrefix20210423\Symplify\SmartFileSystem\SmartFileInfo $originalFileInfo, array $expectedFilePathsWithContents) : void
    {
        $this->doTestFileInfo($originalFileInfo);
        $this->assertCount($this->removedAndAddedFilesCollector->getAddedFileCount(), $expectedFilePathsWithContents);
        $this->assertFilesWereAdded($expectedFilePathsWithContents);
    }
    /**
     * @return Iterator<mixed>
     */
    public function provideData() : \Iterator
    {
        $smartFileSystem = new \Typo3RectorPrefix20210423\Symplify\SmartFileSystem\SmartFileSystem();
        // source: https://github.com/nette/utils/blob/798f8c1626a8e0e23116d90e588532725cce7d0e/src/Utils/exceptions.php
        $filePathsWithContents = [new \Rector\FileSystemRector\ValueObject\AddedFileWithContent($this->getFixtureTempDirectory() . '/RegexpException.php', $smartFileSystem->readFile(__DIR__ . '/Expected/RegexpException.php')), new \Rector\FileSystemRector\ValueObject\AddedFileWithContent($this->getFixtureTempDirectory() . '/UnknownImageFileException.php', $smartFileSystem->readFile(__DIR__ . '/Expected/UnknownImageFileException.php'))];
        (yield [new \Typo3RectorPrefix20210423\Symplify\SmartFileSystem\SmartFileInfo(__DIR__ . '/Fixture/nette_exceptions.php.inc'), $filePathsWithContents]);
        $filePathsWithContents = [new \Rector\FileSystemRector\ValueObject\AddedFileWithContent($this->getFixtureTempDirectory() . '/SkipWithoutNamespace.php', $smartFileSystem->readFile(__DIR__ . '/Expected/SkipWithoutNamespace.php')), new \Rector\FileSystemRector\ValueObject\AddedFileWithContent($this->getFixtureTempDirectory() . '/JustTwoExceptionWithoutNamespace.php', $smartFileSystem->readFile(__DIR__ . '/Expected/JustTwoExceptionWithoutNamespace.php'))];
        (yield [new \Typo3RectorPrefix20210423\Symplify\SmartFileSystem\SmartFileInfo(__DIR__ . '/Fixture/skip_without_namespace.php.inc'), $filePathsWithContents]);
        $filePathsWithContents = [new \Rector\FileSystemRector\ValueObject\AddedFileWithContent($this->getFixtureTempDirectory() . '/MyTrait.php', $smartFileSystem->readFile(__DIR__ . '/Expected/MyTrait.php')), new \Rector\FileSystemRector\ValueObject\AddedFileWithContent($this->getFixtureTempDirectory() . '/ClassTraitAndInterface.php', $smartFileSystem->readFile(__DIR__ . '/Expected/ClassTraitAndInterface.php')), new \Rector\FileSystemRector\ValueObject\AddedFileWithContent($this->getFixtureTempDirectory() . '/MyInterface.php', $smartFileSystem->readFile(__DIR__ . '/Expected/MyInterface.php'))];
        (yield [new \Typo3RectorPrefix20210423\Symplify\SmartFileSystem\SmartFileInfo(__DIR__ . '/Fixture/class_trait_and_interface.php.inc'), $filePathsWithContents]);
    }
    public function provideConfigFilePath() : string
    {
        return __DIR__ . '/config/configured_rule.php';
    }
}
