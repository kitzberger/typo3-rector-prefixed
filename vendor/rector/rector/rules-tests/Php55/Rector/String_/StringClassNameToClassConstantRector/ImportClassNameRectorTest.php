<?php

declare (strict_types=1);
namespace Rector\Tests\Php55\Rector\String_\StringClassNameToClassConstantRector;

use Iterator;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;
use Typo3RectorPrefix20210412\Symplify\SmartFileSystem\SmartFileInfo;
final class ImportClassNameRectorTest extends \Rector\Testing\PHPUnit\AbstractRectorTestCase
{
    /**
     * @dataProvider provideData()
     */
    public function test(\Typo3RectorPrefix20210412\Symplify\SmartFileSystem\SmartFileInfo $fileInfo) : void
    {
        $this->doTestFileInfo($fileInfo);
    }
    /**
     * @return Iterator<SmartFileInfo>
     */
    public function provideData() : \Iterator
    {
        return $this->yieldFilesFromDirectory(__DIR__ . '/FixtureImport');
    }
    public function provideConfigFilePath() : string
    {
        return __DIR__ . '/config/import_config.php';
    }
}
