<?php

declare (strict_types=1);
namespace Rector\Tests\Transform\Rector\FileWithoutNamespace\FunctionToStaticMethodRector;

use Iterator;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;
use Typo3RectorPrefix20210409\Symplify\SmartFileSystem\SmartFileInfo;
final class FunctionToStaticMethodRectorTest extends \Rector\Testing\PHPUnit\AbstractRectorTestCase
{
    /**
     * @dataProvider provideData()
     */
    public function test(\Typo3RectorPrefix20210409\Symplify\SmartFileSystem\SmartFileInfo $smartFileInfo) : void
    {
        $this->doTestFileInfo($smartFileInfo);
        $this->doTestExtraFile('StaticFunctions.php', __DIR__ . '/Source/ExpectedStaticFunctions.php');
    }
    /**
     * @return Iterator<SmartFileInfo>
     */
    public function provideData() : \Iterator
    {
        return $this->yieldFilesFromDirectory(__DIR__ . '/Fixture');
    }
    public function provideConfigFilePath() : string
    {
        return __DIR__ . '/config/configured_rule.php';
    }
}