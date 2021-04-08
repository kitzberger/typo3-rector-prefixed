<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210408\Symplify\SmartFileSystem\Tests\FileSystemFilter;

use Typo3RectorPrefix20210408\PHPUnit\Framework\TestCase;
use Typo3RectorPrefix20210408\Symplify\SmartFileSystem\FileSystemFilter;
final class FileSystemFilterTest extends \Typo3RectorPrefix20210408\PHPUnit\Framework\TestCase
{
    /**
     * @var FileSystemFilter
     */
    private $fileSystemFilter;
    protected function setUp() : void
    {
        $this->fileSystemFilter = new \Typo3RectorPrefix20210408\Symplify\SmartFileSystem\FileSystemFilter();
    }
    public function testSeparateFilesAndDirectories() : void
    {
        $sources = [__DIR__, __DIR__ . '/FileSystemFilterTest.php'];
        $files = $this->fileSystemFilter->filterFiles($sources);
        $directories = $this->fileSystemFilter->filterDirectories($sources);
        $this->assertCount(1, $files);
        $this->assertCount(1, $directories);
        $this->assertSame($files, [__DIR__ . '/FileSystemFilterTest.php']);
        $this->assertSame($directories, [__DIR__]);
    }
}
