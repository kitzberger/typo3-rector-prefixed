<?php

declare (strict_types=1);
namespace Rector\Privatization\Tests\Rector\Class_\RepeatedLiteralToClassConstantRector;

use Iterator;
use Rector\Privatization\Rector\Class_\RepeatedLiteralToClassConstantRector;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;
use Typo3RectorPrefix20210315\Symplify\SmartFileSystem\SmartFileInfo;
final class RepeatedLiteralToClassConstantRectorTest extends \Rector\Testing\PHPUnit\AbstractRectorTestCase
{
    /**
     * @dataProvider provideData()
     */
    public function test(\Typo3RectorPrefix20210315\Symplify\SmartFileSystem\SmartFileInfo $fileInfo) : void
    {
        $this->doTestFileInfo($fileInfo);
    }
    public function provideData() : \Iterator
    {
        return $this->yieldFilesFromDirectory(__DIR__ . '/Fixture');
    }
    protected function getRectorClass() : string
    {
        return \Rector\Privatization\Rector\Class_\RepeatedLiteralToClassConstantRector::class;
    }
}
