<?php

declare (strict_types=1);
namespace Rector\Laravel\Tests\Rector\Assign\CallOnAppArrayAccessToStandaloneAssignRector;

use Iterator;
use Rector\Laravel\Rector\Assign\CallOnAppArrayAccessToStandaloneAssignRector;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;
use Typo3RectorPrefix20210321\Symplify\SmartFileSystem\SmartFileInfo;
final class CallOnAppArrayAccessToStandaloneAssignRectorTest extends \Rector\Testing\PHPUnit\AbstractRectorTestCase
{
    /**
     * @dataProvider provideData()
     */
    public function test(\Typo3RectorPrefix20210321\Symplify\SmartFileSystem\SmartFileInfo $fileInfo) : void
    {
        $this->doTestFileInfo($fileInfo);
    }
    public function provideData() : \Iterator
    {
        return $this->yieldFilesFromDirectory(__DIR__ . '/Fixture');
    }
    protected function getRectorClass() : string
    {
        return \Rector\Laravel\Rector\Assign\CallOnAppArrayAccessToStandaloneAssignRector::class;
    }
}
