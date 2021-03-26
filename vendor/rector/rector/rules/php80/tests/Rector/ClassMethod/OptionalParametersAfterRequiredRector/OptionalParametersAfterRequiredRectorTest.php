<?php

declare (strict_types=1);
namespace Rector\Php80\Tests\Rector\ClassMethod\OptionalParametersAfterRequiredRector;

use Iterator;
use Rector\Php80\Rector\ClassMethod\OptionalParametersAfterRequiredRector;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;
use Typo3RectorPrefix20210326\Symplify\SmartFileSystem\SmartFileInfo;
final class OptionalParametersAfterRequiredRectorTest extends \Rector\Testing\PHPUnit\AbstractRectorTestCase
{
    /**
     * @dataProvider provideData()
     */
    public function test(\Typo3RectorPrefix20210326\Symplify\SmartFileSystem\SmartFileInfo $fileInfo) : void
    {
        $this->doTestFileInfo($fileInfo);
    }
    public function provideData() : \Iterator
    {
        return $this->yieldFilesFromDirectory(__DIR__ . '/Fixture');
    }
    protected function getRectorClass() : string
    {
        return \Rector\Php80\Rector\ClassMethod\OptionalParametersAfterRequiredRector::class;
    }
}
