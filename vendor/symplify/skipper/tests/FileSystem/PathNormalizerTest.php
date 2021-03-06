<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423\Symplify\Skipper\Tests\FileSystem;

use Iterator;
use Typo3RectorPrefix20210423\Symplify\PackageBuilder\Testing\AbstractKernelTestCase;
use Typo3RectorPrefix20210423\Symplify\Skipper\FileSystem\PathNormalizer;
use Typo3RectorPrefix20210423\Symplify\Skipper\HttpKernel\SkipperKernel;
final class PathNormalizerTest extends \Typo3RectorPrefix20210423\Symplify\PackageBuilder\Testing\AbstractKernelTestCase
{
    /**
     * @var PathNormalizer
     */
    private $pathNormalizer;
    protected function setUp() : void
    {
        $this->bootKernel(\Typo3RectorPrefix20210423\Symplify\Skipper\HttpKernel\SkipperKernel::class);
        $this->pathNormalizer = $this->getService(\Typo3RectorPrefix20210423\Symplify\Skipper\FileSystem\PathNormalizer::class);
    }
    /**
     * @dataProvider providePaths
     */
    public function testPaths(string $path, string $expectedNormalizedPath) : void
    {
        $normalizedPath = $this->pathNormalizer->normalizeForFnmatch($path);
        $this->assertSame($expectedNormalizedPath, $normalizedPath);
    }
    public function providePaths() : \Iterator
    {
        (yield ['path/with/no/asterisk', 'path/with/no/asterisk']);
        (yield ['*path/with/asterisk/begin', '*path/with/asterisk/begin*']);
        (yield ['path/with/asterisk/end*', '*path/with/asterisk/end*']);
        (yield ['*path/with/asterisk/begin/and/end*', '*path/with/asterisk/begin/and/end*']);
        (yield [__DIR__ . '/Fixture/path/with/../in/it', __DIR__ . '/Fixture/path/in/it']);
        (yield [__DIR__ . '/Fixture/path/with/../../in/it', __DIR__ . '/Fixture/in/it']);
    }
}
