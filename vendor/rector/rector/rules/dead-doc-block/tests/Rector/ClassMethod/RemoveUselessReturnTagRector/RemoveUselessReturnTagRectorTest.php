<?php

declare (strict_types=1);
namespace Rector\DeadDocBlock\Tests\Rector\ClassMethod\RemoveUselessReturnTagRector;

use Iterator;
use Rector\DeadDocBlock\Rector\ClassMethod\RemoveUselessReturnTagRector;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;
use SplFileInfo;
use Typo3RectorPrefix20210326\Symplify\SmartFileSystem\SmartFileInfo;
final class RemoveUselessReturnTagRectorTest extends \Rector\Testing\PHPUnit\AbstractRectorTestCase
{
    /**
     * @dataProvider provideData()
     */
    public function test(\Typo3RectorPrefix20210326\Symplify\SmartFileSystem\SmartFileInfo $fileInfo) : void
    {
        $this->doTestFileInfo($fileInfo);
    }
    /**
     * @return Iterator<SplFileInfo>
     */
    public function provideData() : \Iterator
    {
        return $this->yieldFilesFromDirectory(__DIR__ . '/Fixture');
    }
    protected function getRectorClass() : string
    {
        return \Rector\DeadDocBlock\Rector\ClassMethod\RemoveUselessReturnTagRector::class;
    }
}
