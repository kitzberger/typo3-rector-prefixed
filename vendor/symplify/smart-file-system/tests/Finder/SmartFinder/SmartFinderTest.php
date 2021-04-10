<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210410\Symplify\SmartFileSystem\Tests\Finder\SmartFinder;

use Iterator;
use Typo3RectorPrefix20210410\PHPUnit\Framework\TestCase;
use Typo3RectorPrefix20210410\Symplify\SmartFileSystem\FileSystemFilter;
use Typo3RectorPrefix20210410\Symplify\SmartFileSystem\Finder\FinderSanitizer;
use Typo3RectorPrefix20210410\Symplify\SmartFileSystem\Finder\SmartFinder;
final class SmartFinderTest extends \Typo3RectorPrefix20210410\PHPUnit\Framework\TestCase
{
    /**
     * @var SmartFinder
     */
    private $smartFinder;
    protected function setUp() : void
    {
        $this->smartFinder = new \Typo3RectorPrefix20210410\Symplify\SmartFileSystem\Finder\SmartFinder(new \Typo3RectorPrefix20210410\Symplify\SmartFileSystem\Finder\FinderSanitizer(), new \Typo3RectorPrefix20210410\Symplify\SmartFileSystem\FileSystemFilter());
    }
    /**
     * @param string[] $paths
     * @dataProvider provideData()
     */
    public function test(array $paths, string $suffix, int $expectedCount) : void
    {
        $fileInfos = $this->smartFinder->find($paths, $suffix);
        $this->assertCount($expectedCount, $fileInfos);
    }
    public function provideData() : \Iterator
    {
        (yield [[__DIR__ . '/Fixture'], '*.twig', 2]);
        (yield [[__DIR__ . '/Fixture'], '*.txt', 1]);
        (yield [[__DIR__ . '/Fixture/some_file.twig'], '*.txt', 1]);
        (yield [[__DIR__ . '/Fixture/some_file.twig', __DIR__ . '/Fixture/nested_path'], '*.txt', 2]);
    }
}
