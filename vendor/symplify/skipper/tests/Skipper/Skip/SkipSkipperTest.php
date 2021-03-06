<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423\Symplify\Skipper\Tests\Skipper\Skip;

use Iterator;
use Typo3RectorPrefix20210423\Symplify\PackageBuilder\Testing\AbstractKernelTestCase;
use Typo3RectorPrefix20210423\Symplify\Skipper\HttpKernel\SkipperKernel;
use Typo3RectorPrefix20210423\Symplify\Skipper\Skipper\Skipper;
use Typo3RectorPrefix20210423\Symplify\Skipper\Tests\Skipper\Skip\Source\AnotherClassToSkip;
use Typo3RectorPrefix20210423\Symplify\Skipper\Tests\Skipper\Skip\Source\NotSkippedClass;
use Typo3RectorPrefix20210423\Symplify\Skipper\Tests\Skipper\Skip\Source\SomeClassToSkip;
use Typo3RectorPrefix20210423\Symplify\SmartFileSystem\SmartFileInfo;
final class SkipSkipperTest extends \Typo3RectorPrefix20210423\Symplify\PackageBuilder\Testing\AbstractKernelTestCase
{
    /**
     * @var Skipper
     */
    private $skipper;
    protected function setUp() : void
    {
        $this->bootKernelWithConfigs(\Typo3RectorPrefix20210423\Symplify\Skipper\HttpKernel\SkipperKernel::class, [__DIR__ . '/config/config.php']);
        $this->skipper = $this->getService(\Typo3RectorPrefix20210423\Symplify\Skipper\Skipper\Skipper::class);
    }
    /**
     * @dataProvider provideCheckerAndFile()
     * @dataProvider provideCodeAndFile()
     * @dataProvider provideMessageAndFile()
     * @dataProvider provideAnythingAndFilePath()
     */
    public function test(string $element, string $filePath, bool $expectedSkip) : void
    {
        $resolvedSkip = $this->skipper->shouldSkipElementAndFileInfo($element, new \Typo3RectorPrefix20210423\Symplify\SmartFileSystem\SmartFileInfo($filePath));
        $this->assertSame($expectedSkip, $resolvedSkip);
    }
    public function provideCheckerAndFile() : \Iterator
    {
        (yield [\Typo3RectorPrefix20210423\Symplify\Skipper\Tests\Skipper\Skip\Source\SomeClassToSkip::class, __DIR__ . '/Fixture', \true]);
        (yield [\Typo3RectorPrefix20210423\Symplify\Skipper\Tests\Skipper\Skip\Source\AnotherClassToSkip::class, __DIR__ . '/Fixture/someFile', \true]);
        (yield [\Typo3RectorPrefix20210423\Symplify\Skipper\Tests\Skipper\Skip\Source\AnotherClassToSkip::class, __DIR__ . '/Fixture/someDirectory/anotherFile.php', \true]);
        (yield [\Typo3RectorPrefix20210423\Symplify\Skipper\Tests\Skipper\Skip\Source\AnotherClassToSkip::class, __DIR__ . '/Fixture/someDirectory/anotherFile.php', \true]);
        (yield [\Typo3RectorPrefix20210423\Symplify\Skipper\Tests\Skipper\Skip\Source\NotSkippedClass::class, __DIR__ . '/Fixture/someFile', \false]);
        (yield [\Typo3RectorPrefix20210423\Symplify\Skipper\Tests\Skipper\Skip\Source\NotSkippedClass::class, __DIR__ . '/Fixture/someOtherFile', \false]);
    }
    public function provideCodeAndFile() : \Iterator
    {
        (yield [\Typo3RectorPrefix20210423\Symplify\Skipper\Tests\Skipper\Skip\Source\AnotherClassToSkip::class . '.someCode', __DIR__ . '/Fixture/someFile', \true]);
        (yield [\Typo3RectorPrefix20210423\Symplify\Skipper\Tests\Skipper\Skip\Source\AnotherClassToSkip::class . '.someOtherCode', __DIR__ . '/Fixture/someDirectory/someFile', \true]);
        (yield [\Typo3RectorPrefix20210423\Symplify\Skipper\Tests\Skipper\Skip\Source\AnotherClassToSkip::class . '.someAnotherCode', __DIR__ . '/Fixture/someDirectory/someFile', \true]);
        (yield ['someSniff.someForeignCode', __DIR__ . '/Fixture/someFile', \false]);
        (yield ['someSniff.someOtherCode', __DIR__ . '/Fixture/someFile', \false]);
    }
    public function provideMessageAndFile() : \Iterator
    {
        (yield ['some fishy code at line 5!', __DIR__ . '/Fixture/someFile', \true]);
        (yield ['some another fishy code at line 5!', __DIR__ . '/Fixture/someDirectory/someFile.php', \true]);
        (yield ['Cognitive complexity for method "foo" is 2 but has to be less than or equal to 1.', __DIR__ . '/Fixture/skip.php.inc', \true]);
        (yield ['Cognitive complexity for method "bar" is 2 but has to be less than or equal to 1.', __DIR__ . '/Fixture/skip.php.inc', \false]);
    }
    public function provideAnythingAndFilePath() : \Iterator
    {
        (yield ['anything', __DIR__ . '/Fixture/AlwaysSkippedPath/some_file.txt', \true]);
        (yield ['anything', __DIR__ . '/Fixture/PathSkippedWithMask/another_file.txt', \true]);
    }
}
