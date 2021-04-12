<?php

declare (strict_types=1);
namespace Rector\Tests\NetteToSymfony\Rector\Class_\FormControlToControllerAndFormTypeRector;

use Iterator;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;
use Typo3RectorPrefix20210412\Symplify\SmartFileSystem\SmartFileInfo;
final class FormControlToControllerAndFormTypeRectorTest extends \Rector\Testing\PHPUnit\AbstractRectorTestCase
{
    /**
     * @dataProvider provideData()
     */
    public function test(\Typo3RectorPrefix20210412\Symplify\SmartFileSystem\SmartFileInfo $fileInfo, string $expectedExtraFileName, string $expectedExtraContentFilePath) : void
    {
        $this->doTestFileInfo($fileInfo);
        $this->doTestExtraFile($expectedExtraFileName, $expectedExtraContentFilePath);
    }
    /**
     * @return Iterator<string[]|SmartFileInfo[]>
     */
    public function provideData() : \Iterator
    {
        (yield [new \Typo3RectorPrefix20210412\Symplify\SmartFileSystem\SmartFileInfo(__DIR__ . '/Fixture/fixture.php.inc'), 'src/Controller/SomeFormController.php', __DIR__ . '/Source/extra_file.php']);
    }
    public function provideConfigFilePath() : string
    {
        return __DIR__ . '/config/configured_rule.php';
    }
}
