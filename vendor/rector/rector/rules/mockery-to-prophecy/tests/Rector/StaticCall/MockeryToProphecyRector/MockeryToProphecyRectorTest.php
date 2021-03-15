<?php

declare (strict_types=1);
namespace Rector\MockeryToProphecy\Tests\Rector\StaticCall\MockeryToProphecyRector;

use Iterator;
use Rector\MockeryToProphecy\Rector\StaticCall\MockeryCloseRemoveRector;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;
use Typo3RectorPrefix20210315\Symplify\SmartFileSystem\SmartFileInfo;
final class MockeryToProphecyRectorTest extends \Rector\Testing\PHPUnit\AbstractRectorTestCase
{
    /**
     * @dataProvider provideData()
     */
    public function test(\Typo3RectorPrefix20210315\Symplify\SmartFileSystem\SmartFileInfo $file) : void
    {
        $this->doTestFileInfo($file);
    }
    public function provideData() : \Iterator
    {
        return $this->yieldFilesFromDirectory(__DIR__ . '/Fixture');
    }
    protected function getRectorClass() : string
    {
        return \Rector\MockeryToProphecy\Rector\StaticCall\MockeryCloseRemoveRector::class;
    }
}
