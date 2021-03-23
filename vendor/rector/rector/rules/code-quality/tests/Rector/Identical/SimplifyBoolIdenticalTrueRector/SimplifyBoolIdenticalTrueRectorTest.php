<?php

declare (strict_types=1);
namespace Rector\CodeQuality\Tests\Rector\Identical\SimplifyBoolIdenticalTrueRector;

use Iterator;
use Rector\CodeQuality\Rector\Identical\SimplifyBoolIdenticalTrueRector;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;
use Typo3RectorPrefix20210323\Symplify\SmartFileSystem\SmartFileInfo;
final class SimplifyBoolIdenticalTrueRectorTest extends \Rector\Testing\PHPUnit\AbstractRectorTestCase
{
    /**
     * @dataProvider provideData()
     */
    public function test(\Typo3RectorPrefix20210323\Symplify\SmartFileSystem\SmartFileInfo $fileInfo) : void
    {
        $this->doTestFileInfo($fileInfo);
    }
    public function provideData() : \Iterator
    {
        return $this->yieldFilesFromDirectory(__DIR__ . '/Fixture');
    }
    protected function getRectorClass() : string
    {
        return \Rector\CodeQuality\Rector\Identical\SimplifyBoolIdenticalTrueRector::class;
    }
}
