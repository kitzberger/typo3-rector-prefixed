<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210410\Symplify\Skipper\Tests\Skipper\Skipper;

use Iterator;
use Typo3RectorPrefix20210410\Symplify\PackageBuilder\Testing\AbstractKernelTestCase;
use Typo3RectorPrefix20210410\Symplify\Skipper\HttpKernel\SkipperKernel;
use Typo3RectorPrefix20210410\Symplify\Skipper\Skipper\Skipper;
use Typo3RectorPrefix20210410\Symplify\Skipper\Tests\Skipper\Skipper\Fixture\Element\FifthElement;
use Typo3RectorPrefix20210410\Symplify\Skipper\Tests\Skipper\Skipper\Fixture\Element\SixthSense;
use Typo3RectorPrefix20210410\Symplify\Skipper\Tests\Skipper\Skipper\Fixture\Element\ThreeMan;
use Typo3RectorPrefix20210410\Symplify\SmartFileSystem\SmartFileInfo;
final class SkipperTest extends \Typo3RectorPrefix20210410\Symplify\PackageBuilder\Testing\AbstractKernelTestCase
{
    /**
     * @var Skipper
     */
    private $skipper;
    protected function setUp() : void
    {
        $this->bootKernelWithConfigs(\Typo3RectorPrefix20210410\Symplify\Skipper\HttpKernel\SkipperKernel::class, [__DIR__ . '/config/config.php']);
        $this->skipper = $this->getService(\Typo3RectorPrefix20210410\Symplify\Skipper\Skipper\Skipper::class);
    }
    /**
     * @dataProvider provideDataShouldSkipFileInfo()
     */
    public function testSkipFileInfo(string $filePath, bool $expectedSkip) : void
    {
        $smartFileInfo = new \Typo3RectorPrefix20210410\Symplify\SmartFileSystem\SmartFileInfo($filePath);
        $resultSkip = $this->skipper->shouldSkipFileInfo($smartFileInfo);
        $this->assertSame($expectedSkip, $resultSkip);
    }
    public function provideDataShouldSkipFileInfo() : \Iterator
    {
        (yield [__DIR__ . '/Fixture/SomeRandom/file.txt', \false]);
        (yield [__DIR__ . '/Fixture/SomeSkipped/any.txt', \true]);
    }
    /**
     * @param object|class-string $element
     * @dataProvider provideDataShouldSkipElement()
     */
    public function testSkipElement($element, bool $expectedSkip) : void
    {
        $resultSkip = $this->skipper->shouldSkipElement($element);
        $this->assertSame($expectedSkip, $resultSkip);
    }
    public function provideDataShouldSkipElement() : \Iterator
    {
        (yield [\Typo3RectorPrefix20210410\Symplify\Skipper\Tests\Skipper\Skipper\Fixture\Element\ThreeMan::class, \false]);
        (yield [\Typo3RectorPrefix20210410\Symplify\Skipper\Tests\Skipper\Skipper\Fixture\Element\SixthSense::class, \true]);
        (yield [new \Typo3RectorPrefix20210410\Symplify\Skipper\Tests\Skipper\Skipper\Fixture\Element\FifthElement(), \true]);
    }
}
