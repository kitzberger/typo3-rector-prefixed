<?php

declare (strict_types=1);
namespace Rector\Naming\Tests\Rector\Variable\UnderscoreToCamelCaseLocalVariableNameRector;

use Iterator;
use Rector\Naming\Rector\Variable\UnderscoreToCamelCaseLocalVariableNameRector;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;
use Typo3RectorPrefix20210317\Symplify\SmartFileSystem\SmartFileInfo;
final class UnderscoreToCamelCaseLocalVariableNameRectorTest extends \Rector\Testing\PHPUnit\AbstractRectorTestCase
{
    /**
     * @dataProvider provideData()
     */
    public function test(\Typo3RectorPrefix20210317\Symplify\SmartFileSystem\SmartFileInfo $fileInfo) : void
    {
        $this->doTestFileInfo($fileInfo);
    }
    public function provideData() : \Iterator
    {
        return $this->yieldFilesFromDirectory(__DIR__ . '/Fixture');
    }
    protected function getRectorClass() : string
    {
        return \Rector\Naming\Rector\Variable\UnderscoreToCamelCaseLocalVariableNameRector::class;
    }
}
