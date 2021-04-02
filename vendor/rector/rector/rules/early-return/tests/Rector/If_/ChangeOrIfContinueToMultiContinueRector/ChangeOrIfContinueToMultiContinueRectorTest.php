<?php

declare (strict_types=1);
namespace Rector\EarlyReturn\Tests\Rector\If_\ChangeOrIfContinueToMultiContinueRector;

use Iterator;
use Rector\EarlyReturn\Rector\If_\ChangeOrIfContinueToMultiContinueRector;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;
use Typo3RectorPrefix20210402\Symplify\SmartFileSystem\SmartFileInfo;
final class ChangeOrIfContinueToMultiContinueRectorTest extends \Rector\Testing\PHPUnit\AbstractRectorTestCase
{
    /**
     * @dataProvider provideData()
     */
    public function test(\Typo3RectorPrefix20210402\Symplify\SmartFileSystem\SmartFileInfo $fileInfo) : void
    {
        $this->doTestFileInfo($fileInfo);
    }
    public function provideData() : \Iterator
    {
        return $this->yieldFilesFromDirectory(__DIR__ . '/Fixture');
    }
    protected function getRectorClass() : string
    {
        return \Rector\EarlyReturn\Rector\If_\ChangeOrIfContinueToMultiContinueRector::class;
    }
}
