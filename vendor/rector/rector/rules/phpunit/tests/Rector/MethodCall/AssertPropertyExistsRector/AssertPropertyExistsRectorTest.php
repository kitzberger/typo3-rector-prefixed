<?php

declare (strict_types=1);
namespace Rector\PHPUnit\Tests\Rector\MethodCall\AssertPropertyExistsRector;

use Iterator;
use Rector\PHPUnit\Rector\MethodCall\AssertPropertyExistsRector;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;
use Typo3RectorPrefix20210316\Symplify\SmartFileSystem\SmartFileInfo;
final class AssertPropertyExistsRectorTest extends \Rector\Testing\PHPUnit\AbstractRectorTestCase
{
    /**
     * @dataProvider provideData()
     */
    public function test(\Typo3RectorPrefix20210316\Symplify\SmartFileSystem\SmartFileInfo $fileInfo) : void
    {
        $this->doTestFileInfo($fileInfo);
    }
    public function provideData() : \Iterator
    {
        return $this->yieldFilesFromDirectory(__DIR__ . '/Fixture');
    }
    protected function getRectorClass() : string
    {
        return \Rector\PHPUnit\Rector\MethodCall\AssertPropertyExistsRector::class;
    }
}
