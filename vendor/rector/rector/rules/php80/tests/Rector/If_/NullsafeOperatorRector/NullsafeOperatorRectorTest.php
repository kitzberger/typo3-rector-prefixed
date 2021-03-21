<?php

declare (strict_types=1);
namespace Rector\Php80\Tests\Rector\If_\NullsafeOperatorRector;

use Iterator;
use Rector\Php80\Rector\If_\NullsafeOperatorRector;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;
use Typo3RectorPrefix20210321\Symplify\SmartFileSystem\SmartFileInfo;
final class NullsafeOperatorRectorTest extends \Rector\Testing\PHPUnit\AbstractRectorTestCase
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
        return \Rector\Php80\Rector\If_\NullsafeOperatorRector::class;
    }
}
