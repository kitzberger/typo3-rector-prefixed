<?php

declare (strict_types=1);
namespace Rector\Symfony3\Tests\Rector\ClassMethod\FormTypeGetParentRector;

use Iterator;
use Rector\Symfony3\Rector\ClassMethod\FormTypeGetParentRector;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;
use Typo3RectorPrefix20210315\Symplify\SmartFileSystem\SmartFileInfo;
final class FormTypeGetParentRectorTest extends \Rector\Testing\PHPUnit\AbstractRectorTestCase
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
        return \Rector\Symfony3\Rector\ClassMethod\FormTypeGetParentRector::class;
    }
}
