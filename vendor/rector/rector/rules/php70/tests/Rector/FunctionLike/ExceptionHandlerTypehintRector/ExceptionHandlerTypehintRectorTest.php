<?php

declare (strict_types=1);
namespace Rector\Php70\Tests\Rector\FunctionLike\ExceptionHandlerTypehintRector;

use Iterator;
use Rector\Php70\Rector\FunctionLike\ExceptionHandlerTypehintRector;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;
use Typo3RectorPrefix20210324\Symplify\SmartFileSystem\SmartFileInfo;
final class ExceptionHandlerTypehintRectorTest extends \Rector\Testing\PHPUnit\AbstractRectorTestCase
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
        return \Rector\Php70\Rector\FunctionLike\ExceptionHandlerTypehintRector::class;
    }
}
