<?php

declare (strict_types=1);
namespace Rector\Naming\Tests\Rector\Property\UnderscoreToCamelCasePropertyNameRector;

use Iterator;
use Rector\Naming\Rector\Property\UnderscoreToCamelCasePropertyNameRector;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;
use Typo3RectorPrefix20210408\Symplify\SmartFileSystem\SmartFileInfo;
final class UnderscoreToCamelCasePropertyNameRectorTest extends \Rector\Testing\PHPUnit\AbstractRectorTestCase
{
    /**
     * @dataProvider provideData()
     */
    public function test(\Typo3RectorPrefix20210408\Symplify\SmartFileSystem\SmartFileInfo $fileInfo) : void
    {
        $this->doTestFileInfo($fileInfo);
    }
    public function provideData() : \Iterator
    {
        return $this->yieldFilesFromDirectory(__DIR__ . '/Fixture');
    }
    protected function getRectorClass() : string
    {
        return \Rector\Naming\Rector\Property\UnderscoreToCamelCasePropertyNameRector::class;
    }
}
