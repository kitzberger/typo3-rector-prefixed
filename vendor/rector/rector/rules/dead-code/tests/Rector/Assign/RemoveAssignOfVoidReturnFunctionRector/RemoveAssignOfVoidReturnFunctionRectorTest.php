<?php

declare (strict_types=1);
namespace Rector\DeadCode\Tests\Rector\Assign\RemoveAssignOfVoidReturnFunctionRector;

use Iterator;
use Rector\DeadCode\Rector\Assign\RemoveAssignOfVoidReturnFunctionRector;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;
use Typo3RectorPrefix20210401\Symplify\SmartFileSystem\SmartFileInfo;
final class RemoveAssignOfVoidReturnFunctionRectorTest extends \Rector\Testing\PHPUnit\AbstractRectorTestCase
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
        return \Rector\DeadCode\Rector\Assign\RemoveAssignOfVoidReturnFunctionRector::class;
    }
}
