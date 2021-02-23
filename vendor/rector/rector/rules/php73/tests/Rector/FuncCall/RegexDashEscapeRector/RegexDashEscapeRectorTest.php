<?php

declare (strict_types=1);
namespace Rector\Php73\Tests\Rector\FuncCall\RegexDashEscapeRector;

use Iterator;
use Rector\Php73\Rector\FuncCall\RegexDashEscapeRector;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;
use Typo3RectorPrefix20210223\Symplify\SmartFileSystem\SmartFileInfo;
final class RegexDashEscapeRectorTest extends \Rector\Testing\PHPUnit\AbstractRectorTestCase
{
    /**
     * @dataProvider provideData()
     */
    public function test(\Typo3RectorPrefix20210223\Symplify\SmartFileSystem\SmartFileInfo $fileInfo) : void
    {
        $this->doTestFileInfo($fileInfo);
    }
    public function provideData() : \Iterator
    {
        return $this->yieldFilesFromDirectory(__DIR__ . '/Fixture');
    }
    protected function getRectorClass() : string
    {
        return \Rector\Php73\Rector\FuncCall\RegexDashEscapeRector::class;
    }
}