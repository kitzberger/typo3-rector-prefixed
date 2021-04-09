<?php

declare (strict_types=1);
namespace Rector\Tests\Composer\Rector\AddPackageToRequireDevComposerRector;

use Iterator;
use Rector\Testing\PHPUnit\AbstractComposerRectorTestCase;
use Typo3RectorPrefix20210409\Symplify\EasyTesting\DataProvider\StaticFixtureFinder;
use Typo3RectorPrefix20210409\Symplify\SmartFileSystem\SmartFileInfo;
final class AddPackageToRequireDevComposerRectorTest extends \Rector\Testing\PHPUnit\AbstractComposerRectorTestCase
{
    /**
     * @dataProvider provideData()
     */
    public function test(\Typo3RectorPrefix20210409\Symplify\SmartFileSystem\SmartFileInfo $fileInfo) : void
    {
        $this->doTestFileInfo($fileInfo);
    }
    public function provideData() : \Iterator
    {
        return \Typo3RectorPrefix20210409\Symplify\EasyTesting\DataProvider\StaticFixtureFinder::yieldDirectory(__DIR__ . '/Fixture', '*.json');
    }
    public function provideConfigFile() : string
    {
        return __DIR__ . '/config/some_config.php';
    }
}
