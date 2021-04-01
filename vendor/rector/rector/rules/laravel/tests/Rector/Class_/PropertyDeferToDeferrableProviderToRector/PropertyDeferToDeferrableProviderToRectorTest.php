<?php

declare (strict_types=1);
namespace Rector\Laravel\Tests\Rector\Class_\PropertyDeferToDeferrableProviderToRector;

use Iterator;
use Rector\Laravel\Rector\Class_\PropertyDeferToDeferrableProviderToRector;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;
use Typo3RectorPrefix20210401\Symplify\SmartFileSystem\SmartFileInfo;
final class PropertyDeferToDeferrableProviderToRectorTest extends \Rector\Testing\PHPUnit\AbstractRectorTestCase
{
    /**
     * @dataProvider provideData()
     */
    public function test(\Typo3RectorPrefix20210401\Symplify\SmartFileSystem\SmartFileInfo $fileInfo) : void
    {
        $this->doTestFileInfo($fileInfo);
    }
    public function provideData() : \Iterator
    {
        return $this->yieldFilesFromDirectory(__DIR__ . '/Fixture');
    }
    protected function getRectorClass() : string
    {
        return \Rector\Laravel\Rector\Class_\PropertyDeferToDeferrableProviderToRector::class;
    }
}
