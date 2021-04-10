<?php

declare (strict_types=1);
namespace Rector\Tests\Composer\Rector\AddPackageToRequireComposerRector;

use Iterator;
use Rector\Testing\PHPUnit\AbstractComposerRectorTestCase;
use Typo3RectorPrefix20210410\Symplify\EasyTesting\DataProvider\StaticFixtureFinder;
use Typo3RectorPrefix20210410\Symplify\SmartFileSystem\SmartFileInfo;
final class AddPackageToRequireComposerRectorTest extends \Rector\Testing\PHPUnit\AbstractComposerRectorTestCase
{
    /**
     * @dataProvider provideData()
     */
    public function test(\Typo3RectorPrefix20210410\Symplify\SmartFileSystem\SmartFileInfo $fileInfo) : void
    {
        $this->doTestFileInfo($fileInfo);
    }
    public function provideData() : \Iterator
    {
        return \Typo3RectorPrefix20210410\Symplify\EasyTesting\DataProvider\StaticFixtureFinder::yieldDirectory(__DIR__ . '/Fixture', '*.json');
    }
    public function provideConfigFile() : string
    {
        return __DIR__ . '/config/some_config.php';
    }
}
