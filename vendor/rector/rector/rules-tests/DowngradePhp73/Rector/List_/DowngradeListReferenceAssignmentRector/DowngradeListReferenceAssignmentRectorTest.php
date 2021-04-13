<?php

declare (strict_types=1);
namespace Rector\Tests\DowngradePhp73\Rector\List_\DowngradeListReferenceAssignmentRector;

use Iterator;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;
use Typo3RectorPrefix20210413\Symplify\SmartFileSystem\SmartFileInfo;
final class DowngradeListReferenceAssignmentRectorTest extends \Rector\Testing\PHPUnit\AbstractRectorTestCase
{
    /**
     * @requires PHP 7.3
     * @dataProvider provideData()
     */
    public function test(\Typo3RectorPrefix20210413\Symplify\SmartFileSystem\SmartFileInfo $fileInfo) : void
    {
        $this->doTestFileInfo($fileInfo);
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
