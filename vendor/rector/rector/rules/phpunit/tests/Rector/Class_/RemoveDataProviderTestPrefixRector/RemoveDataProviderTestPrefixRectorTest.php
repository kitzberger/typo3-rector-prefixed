<?php

declare (strict_types=1);
namespace Rector\PHPUnit\Tests\Rector\Class_\RemoveDataProviderTestPrefixRector;

use Iterator;
use Rector\PHPUnit\Rector\Class_\RemoveDataProviderTestPrefixRector;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;
use Typo3RectorPrefix20210302\Symplify\SmartFileSystem\SmartFileInfo;
final class RemoveDataProviderTestPrefixRectorTest extends \Rector\Testing\PHPUnit\AbstractRectorTestCase
{
    /**
     * @dataProvider provideData()
     */
    public function test(\Typo3RectorPrefix20210302\Symplify\SmartFileSystem\SmartFileInfo $fileInfo) : void
    {
        $this->doTestFileInfo($fileInfo);
    }
    public function provideData() : \Iterator
    {
        return $this->yieldFilesFromDirectory(__DIR__ . '/Fixture');
    }
    protected function getRectorClass() : string
    {
        return \Rector\PHPUnit\Rector\Class_\RemoveDataProviderTestPrefixRector::class;
    }
}
