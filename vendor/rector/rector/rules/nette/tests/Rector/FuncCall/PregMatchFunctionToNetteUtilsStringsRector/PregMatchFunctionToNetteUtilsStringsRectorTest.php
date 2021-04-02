<?php

declare (strict_types=1);
namespace Rector\Nette\Tests\Rector\FuncCall\PregMatchFunctionToNetteUtilsStringsRector;

use Iterator;
use Rector\Nette\Rector\FuncCall\PregMatchFunctionToNetteUtilsStringsRector;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;
use Typo3RectorPrefix20210402\Symplify\SmartFileSystem\SmartFileInfo;
final class PregMatchFunctionToNetteUtilsStringsRectorTest extends \Rector\Testing\PHPUnit\AbstractRectorTestCase
{
    /**
     * @dataProvider provideData()
     */
    public function test(\Typo3RectorPrefix20210402\Symplify\SmartFileSystem\SmartFileInfo $fileInfo) : void
    {
        $this->doTestFileInfo($fileInfo);
    }
    public function provideData() : \Iterator
    {
        return $this->yieldFilesFromDirectory(__DIR__ . '/Fixture');
    }
    protected function getRectorClass() : string
    {
        return \Rector\Nette\Rector\FuncCall\PregMatchFunctionToNetteUtilsStringsRector::class;
    }
}
