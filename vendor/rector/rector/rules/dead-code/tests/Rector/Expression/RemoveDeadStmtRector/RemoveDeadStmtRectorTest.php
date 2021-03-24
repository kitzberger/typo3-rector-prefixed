<?php

declare (strict_types=1);
namespace Rector\DeadCode\Tests\Rector\Expression\RemoveDeadStmtRector;

use Iterator;
use Rector\DeadCode\Rector\Expression\RemoveDeadStmtRector;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;
use Typo3RectorPrefix20210324\Symplify\SmartFileSystem\SmartFileInfo;
final class RemoveDeadStmtRectorTest extends \Rector\Testing\PHPUnit\AbstractRectorTestCase
{
    /**
     * @dataProvider provideData()
     */
    public function test(\Typo3RectorPrefix20210324\Symplify\SmartFileSystem\SmartFileInfo $fileInfo) : void
    {
        $this->doTestFileInfo($fileInfo);
    }
    public function provideData() : \Iterator
    {
        return $this->yieldFilesFromDirectory(__DIR__ . '/Fixture');
    }
    /**
     * @dataProvider provideDataForTestKeepComments()
     */
    public function testKeepComments(\Typo3RectorPrefix20210324\Symplify\SmartFileSystem\SmartFileInfo $fileInfo) : void
    {
        $this->doTestFileInfo($fileInfo);
    }
    public function provideDataForTestKeepComments() : \Iterator
    {
        return $this->yieldFilesFromDirectory(__DIR__ . '/FixtureRemovedComments');
    }
    protected function getRectorClass() : string
    {
        return \Rector\DeadCode\Rector\Expression\RemoveDeadStmtRector::class;
    }
}
