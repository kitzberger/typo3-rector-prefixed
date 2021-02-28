<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210228\Symplify\SmartFileSystem\Tests\Normalizer;

use Iterator;
use Typo3RectorPrefix20210228\PHPUnit\Framework\TestCase;
use Typo3RectorPrefix20210228\Symplify\SmartFileSystem\Normalizer\PathNormalizer;
final class PathNormalizerTest extends \Typo3RectorPrefix20210228\PHPUnit\Framework\TestCase
{
    /**
     * @var PathNormalizer
     */
    private $pathNormalizer;
    protected function setUp() : void
    {
        $this->pathNormalizer = new \Typo3RectorPrefix20210228\Symplify\SmartFileSystem\Normalizer\PathNormalizer();
    }
    /**
     * @dataProvider provideData()
     */
    public function test(string $inputPath, string $expectedNormalizedPath) : void
    {
        $normalizedPath = $this->pathNormalizer->normalizePath($inputPath);
        $this->assertSame($expectedNormalizedPath, $normalizedPath);
    }
    public function provideData() : \Iterator
    {
        // based on Linux
        (yield ['/any/path', '/any/path']);
        (yield ['Typo3RectorPrefix20210228\\any\\path', '/any/path']);
    }
}
