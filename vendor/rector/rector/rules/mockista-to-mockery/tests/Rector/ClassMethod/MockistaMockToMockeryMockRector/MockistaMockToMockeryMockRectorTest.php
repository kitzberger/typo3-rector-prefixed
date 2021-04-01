<?php

declare (strict_types=1);
namespace Rector\MockistaToMockery\Tests\Rector\ClassMethod\MockistaMockToMockeryMockRector;

use Iterator;
use Rector\MockistaToMockery\Rector\ClassMethod\MockistaMockToMockeryMockRector;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;
use Typo3RectorPrefix20210401\Symplify\SmartFileSystem\SmartFileInfo;
final class MockistaMockToMockeryMockRectorTest extends \Rector\Testing\PHPUnit\AbstractRectorTestCase
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
        return \Rector\MockistaToMockery\Rector\ClassMethod\MockistaMockToMockeryMockRector::class;
    }
}
