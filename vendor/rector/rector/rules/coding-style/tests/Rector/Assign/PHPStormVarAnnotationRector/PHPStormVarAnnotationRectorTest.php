<?php

declare (strict_types=1);
namespace Rector\CodingStyle\Tests\Rector\Assign\PHPStormVarAnnotationRector;

use Iterator;
use Rector\CodingStyle\Rector\Assign\PHPStormVarAnnotationRector;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;
use Typo3RectorPrefix20210324\Symplify\SmartFileSystem\SmartFileInfo;
final class PHPStormVarAnnotationRectorTest extends \Rector\Testing\PHPUnit\AbstractRectorTestCase
{
    /**
     * @dataProvider provideData()
     */
    public function test(\Typo3RectorPrefix20210324\Symplify\SmartFileSystem\SmartFileInfo $fileInfo) : void
    {
        $this->doTestFileInfo($fileInfo);
    }
    public function provideData() : \Iterator
    {
        return $this->yieldFilesFromDirectory(__DIR__ . '/Fixture');
    }
    protected function getRectorClass() : string
    {
        return \Rector\CodingStyle\Rector\Assign\PHPStormVarAnnotationRector::class;
    }
}
