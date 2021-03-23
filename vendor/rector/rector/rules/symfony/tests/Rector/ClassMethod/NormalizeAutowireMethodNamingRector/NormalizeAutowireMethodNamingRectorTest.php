<?php

declare (strict_types=1);
namespace Rector\Symfony\Tests\Rector\ClassMethod\NormalizeAutowireMethodNamingRector;

use Iterator;
use Rector\Symfony\Rector\ClassMethod\NormalizeAutowireMethodNamingRector;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;
use Typo3RectorPrefix20210323\Symplify\SmartFileSystem\SmartFileInfo;
final class NormalizeAutowireMethodNamingRectorTest extends \Rector\Testing\PHPUnit\AbstractRectorTestCase
{
    /**
     * @dataProvider provideData()
     */
    public function test(\Typo3RectorPrefix20210323\Symplify\SmartFileSystem\SmartFileInfo $fileInfo) : void
    {
        $this->doTestFileInfo($fileInfo);
    }
    public function provideData() : \Iterator
    {
        return $this->yieldFilesFromDirectory(__DIR__ . '/Fixture');
    }
    protected function getRectorClass() : string
    {
        return \Rector\Symfony\Rector\ClassMethod\NormalizeAutowireMethodNamingRector::class;
    }
}
