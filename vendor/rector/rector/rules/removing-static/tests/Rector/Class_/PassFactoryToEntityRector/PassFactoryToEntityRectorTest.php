<?php

declare (strict_types=1);
namespace Rector\RemovingStatic\Tests\Rector\Class_\PassFactoryToEntityRector;

use Iterator;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;
use Typo3RectorPrefix20210311\Symplify\EasyTesting\StaticFixtureSplitter;
use Typo3RectorPrefix20210311\Symplify\SmartFileSystem\SmartFileInfo;
final class PassFactoryToEntityRectorTest extends \Rector\Testing\PHPUnit\AbstractRectorTestCase
{
    /**
     * @dataProvider provideData()
     */
    public function test(\Typo3RectorPrefix20210311\Symplify\SmartFileSystem\SmartFileInfo $fileInfo) : void
    {
        $this->doTestFileInfo($fileInfo);
        $expectedFactoryFilePath = \Typo3RectorPrefix20210311\Symplify\EasyTesting\StaticFixtureSplitter::getTemporaryPath() . '/AnotherClassWithMoreArgumentsFactory.php';
        $this->assertFileExists($expectedFactoryFilePath);
        $this->assertFileEquals(__DIR__ . '/Source/ExpectedAnotherClassWithMoreArgumentsFactory.php', $expectedFactoryFilePath);
    }
    public function provideData() : \Iterator
    {
        return $this->yieldFilesFromDirectory(__DIR__ . '/FixtureWithMultipleArguments');
    }
    protected function provideConfigFilePath() : string
    {
        return __DIR__ . '/config/configured_rule.php';
    }
}
