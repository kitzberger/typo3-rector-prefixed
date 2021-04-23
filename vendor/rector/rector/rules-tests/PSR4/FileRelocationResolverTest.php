<?php

declare (strict_types=1);
namespace Rector\Tests\PSR4;

use Iterator;
use Rector\PSR4\FileRelocationResolver;
use Rector\Testing\PHPUnit\AbstractTestCase;
use Rector\Tests\PSR4\Source\SomeFile;
use Typo3RectorPrefix20210423\Symplify\SmartFileSystem\SmartFileInfo;
final class FileRelocationResolverTest extends \Rector\Testing\PHPUnit\AbstractTestCase
{
    /**
     * @var FileRelocationResolver
     */
    private $fileRelocationResolver;
    protected function setUp() : void
    {
        $this->boot();
        $this->fileRelocationResolver = $this->getService(\Rector\PSR4\FileRelocationResolver::class);
    }
    /**
     * @dataProvider provideData()
     */
    public function test(string $file, string $oldClass, string $newClass, string $expectedNewFileLocation) : void
    {
        $smartFileInfo = new \Typo3RectorPrefix20210423\Symplify\SmartFileSystem\SmartFileInfo($file);
        $newFileLocation = $this->fileRelocationResolver->resolveNewFileLocationFromOldClassToNewClass($smartFileInfo, $oldClass, $newClass);
        $this->assertSame($expectedNewFileLocation, $newFileLocation);
    }
    /**
     * @return Iterator<mixed>
     */
    public function provideData() : \Iterator
    {
        (yield [__DIR__ . '/Source/SomeFile.php', \Rector\Tests\PSR4\Source\SomeFile::class, 'Rector\\Tests\\PSR10\\Source\\SomeFile', 'rules-tests/PSR10/Source/SomeFile.php']);
    }
}
