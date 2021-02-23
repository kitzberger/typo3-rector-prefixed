<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210223\Symplify\Skipper\Tests\Skipper\Only;

use Iterator;
use Typo3RectorPrefix20210223\Symplify\PackageBuilder\Testing\AbstractKernelTestCase;
use Typo3RectorPrefix20210223\Symplify\Skipper\HttpKernel\SkipperKernel;
use Typo3RectorPrefix20210223\Symplify\Skipper\Skipper\Skipper;
use Typo3RectorPrefix20210223\Symplify\Skipper\Tests\Skipper\Only\Source\IncludeThisClass;
use Typo3RectorPrefix20210223\Symplify\Skipper\Tests\Skipper\Only\Source\SkipCompletely;
use Typo3RectorPrefix20210223\Symplify\Skipper\Tests\Skipper\Only\Source\SkipCompletelyToo;
use Typo3RectorPrefix20210223\Symplify\Skipper\Tests\Skipper\Only\Source\SkipThisClass;
use Typo3RectorPrefix20210223\Symplify\SmartFileSystem\SmartFileInfo;
final class OnlySkipperTest extends \Typo3RectorPrefix20210223\Symplify\PackageBuilder\Testing\AbstractKernelTestCase
{
    /**
     * @var Skipper
     */
    private $skipper;
    protected function setUp() : void
    {
        $this->bootKernelWithConfigs(\Typo3RectorPrefix20210223\Symplify\Skipper\HttpKernel\SkipperKernel::class, [__DIR__ . '/config/config.php']);
        $this->skipper = $this->getService(\Typo3RectorPrefix20210223\Symplify\Skipper\Skipper\Skipper::class);
    }
    /**
     * @dataProvider provideCheckerAndFile()
     */
    public function testCheckerAndFile(string $class, string $filePath, bool $expected) : void
    {
        $resolvedSkip = $this->skipper->shouldSkipElementAndFileInfo($class, new \Typo3RectorPrefix20210223\Symplify\SmartFileSystem\SmartFileInfo($filePath));
        $this->assertSame($expected, $resolvedSkip);
    }
    public function provideCheckerAndFile() : \Iterator
    {
        (yield [\Typo3RectorPrefix20210223\Symplify\Skipper\Tests\Skipper\Only\Source\IncludeThisClass::class, __DIR__ . '/Fixture/SomeFileToOnlyInclude.php', \false]);
        (yield [\Typo3RectorPrefix20210223\Symplify\Skipper\Tests\Skipper\Only\Source\IncludeThisClass::class, __DIR__ . '/Fixture/SomeFile.php', \true]);
        // no restrictions
        (yield [\Typo3RectorPrefix20210223\Symplify\Skipper\Tests\Skipper\Only\Source\SkipThisClass::class, __DIR__ . '/Fixture/SomeFileToOnlyInclude.php', \false]);
        (yield [\Typo3RectorPrefix20210223\Symplify\Skipper\Tests\Skipper\Only\Source\SkipThisClass::class, __DIR__ . '/Fixture/SomeFile.php', \false]);
        (yield [\Typo3RectorPrefix20210223\Symplify\Skipper\Tests\Skipper\Only\Source\SkipCompletely::class, __DIR__ . '/Fixture/SomeFile.php', \true]);
        (yield [\Typo3RectorPrefix20210223\Symplify\Skipper\Tests\Skipper\Only\Source\SkipCompletelyToo::class, __DIR__ . '/Fixture/SomeFile.php', \true]);
    }
}
