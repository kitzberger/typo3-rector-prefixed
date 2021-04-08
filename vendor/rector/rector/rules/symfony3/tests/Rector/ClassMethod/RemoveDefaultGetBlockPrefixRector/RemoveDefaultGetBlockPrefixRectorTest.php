<?php

declare (strict_types=1);
namespace Rector\Symfony3\Tests\Rector\ClassMethod\RemoveDefaultGetBlockPrefixRector;

use Iterator;
use Rector\Symfony3\Rector\ClassMethod\RemoveDefaultGetBlockPrefixRector;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;
use Typo3RectorPrefix20210408\Symplify\SmartFileSystem\SmartFileInfo;
final class RemoveDefaultGetBlockPrefixRectorTest extends \Rector\Testing\PHPUnit\AbstractRectorTestCase
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
        return \Rector\Symfony3\Rector\ClassMethod\RemoveDefaultGetBlockPrefixRector::class;
    }
}
