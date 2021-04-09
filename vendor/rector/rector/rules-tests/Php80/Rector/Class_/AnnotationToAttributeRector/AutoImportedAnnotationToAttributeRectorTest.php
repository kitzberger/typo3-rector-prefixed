<?php

declare (strict_types=1);
namespace Rector\Tests\Php80\Rector\Class_\AnnotationToAttributeRector;

use Iterator;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;
use Typo3RectorPrefix20210409\Symplify\SmartFileSystem\SmartFileInfo;
final class AutoImportedAnnotationToAttributeRectorTest extends \Rector\Testing\PHPUnit\AbstractRectorTestCase
{
    /**
     * @dataProvider provideData()
     */
    public function test(\Typo3RectorPrefix20210409\Symplify\SmartFileSystem\SmartFileInfo $fileInfo) : void
    {
        $this->doTestFileInfo($fileInfo);
    }
    /**
     * @return Iterator<SmartFileInfo>
     */
    public function provideData() : \Iterator
    {
        return $this->yieldFilesFromDirectory(__DIR__ . '/FixtureAutoImported');
    }
    public function provideConfigFilePath() : string
    {
        return __DIR__ . '/config/auto_import.php';
    }
}
