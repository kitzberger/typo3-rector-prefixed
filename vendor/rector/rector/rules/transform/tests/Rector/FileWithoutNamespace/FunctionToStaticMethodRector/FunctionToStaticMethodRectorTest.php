<?php

declare (strict_types=1);
namespace Rector\Transform\Tests\Rector\FileWithoutNamespace\FunctionToStaticMethodRector;

use Iterator;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;
use Rector\Transform\Rector\FileWithoutNamespace\FunctionToStaticMethodRector;
use Typo3RectorPrefix20210324\Symplify\SmartFileSystem\SmartFileInfo;
final class FunctionToStaticMethodRectorTest extends \Rector\Testing\PHPUnit\AbstractRectorTestCase
{
    /**
     * @dataProvider provideData()
     */
    public function test(\Typo3RectorPrefix20210324\Symplify\SmartFileSystem\SmartFileInfo $smartFileInfo) : void
    {
        $this->doTestFileInfo($smartFileInfo);
        $this->doTestExtraFile('StaticFunctions.php', __DIR__ . '/Source/ExpectedStaticFunctions.php');
    }
    public function provideData() : \Iterator
    {
        return $this->yieldFilesFromDirectory(__DIR__ . '/Fixture');
    }
    protected function getRectorClass() : string
    {
        return \Rector\Transform\Rector\FileWithoutNamespace\FunctionToStaticMethodRector::class;
    }
}
