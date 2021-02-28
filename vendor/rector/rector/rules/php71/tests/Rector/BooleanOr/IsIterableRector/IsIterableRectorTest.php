<?php

declare (strict_types=1);
namespace Rector\Php71\Tests\Rector\BooleanOr\IsIterableRector;

use Iterator;
use Rector\Php71\Rector\BooleanOr\IsIterableRector;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;
use Typo3RectorPrefix20210228\Symplify\SmartFileSystem\SmartFileInfo;
final class IsIterableRectorTest extends \Rector\Testing\PHPUnit\AbstractRectorTestCase
{
    /**
     * @dataProvider provideData()
     */
    public function test(\Typo3RectorPrefix20210228\Symplify\SmartFileSystem\SmartFileInfo $fileInfo) : void
    {
        $this->doTestFileInfo($fileInfo);
    }
    public function provideData() : \Iterator
    {
        return $this->yieldFilesFromDirectory(__DIR__ . '/Fixture');
    }
    protected function getRectorClass() : string
    {
        return \Rector\Php71\Rector\BooleanOr\IsIterableRector::class;
    }
}
