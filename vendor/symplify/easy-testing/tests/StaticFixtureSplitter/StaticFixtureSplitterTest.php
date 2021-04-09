<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210409\Symplify\EasyTesting\Tests\StaticFixtureSplitter;

use Typo3RectorPrefix20210409\PHPUnit\Framework\TestCase;
use Typo3RectorPrefix20210409\Symplify\EasyTesting\StaticFixtureSplitter;
use Typo3RectorPrefix20210409\Symplify\SmartFileSystem\SmartFileInfo;
final class StaticFixtureSplitterTest extends \Typo3RectorPrefix20210409\PHPUnit\Framework\TestCase
{
    public function test() : void
    {
        $fileInfo = new \Typo3RectorPrefix20210409\Symplify\SmartFileSystem\SmartFileInfo(__DIR__ . '/Source/simple_fixture.php.inc');
        $inputAndExpected = \Typo3RectorPrefix20210409\Symplify\EasyTesting\StaticFixtureSplitter::splitFileInfoToInputAndExpected($fileInfo);
        $this->assertSame('a' . \PHP_EOL, $inputAndExpected->getInput());
        $this->assertSame('b' . \PHP_EOL, $inputAndExpected->getExpected());
    }
    public function testSplitFileInfoToLocalInputAndExpected() : void
    {
        $fileInfo = new \Typo3RectorPrefix20210409\Symplify\SmartFileSystem\SmartFileInfo(__DIR__ . '/Source/file_and_value.php.inc');
        $inputFileInfoAndExpected = \Typo3RectorPrefix20210409\Symplify\EasyTesting\StaticFixtureSplitter::splitFileInfoToLocalInputAndExpected($fileInfo);
        $inputFileRealPath = $inputFileInfoAndExpected->getInputFileRealPath();
        $this->assertFileExists($inputFileRealPath);
        $this->assertSame(15025, $inputFileInfoAndExpected->getExpected());
    }
}
