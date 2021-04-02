<?php

declare (strict_types=1);
namespace Rector\Privatization\Tests\Rector\ClassMethod\ChangeGlobalVariablesToPropertiesRector;

use Iterator;
use Rector\Privatization\Rector\ClassMethod\ChangeGlobalVariablesToPropertiesRector;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;
use Typo3RectorPrefix20210402\Symplify\SmartFileSystem\SmartFileInfo;
final class ChangeGlobalVariablesToPropertiesRectorTest extends \Rector\Testing\PHPUnit\AbstractRectorTestCase
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
        return \Rector\Privatization\Rector\ClassMethod\ChangeGlobalVariablesToPropertiesRector::class;
    }
}
