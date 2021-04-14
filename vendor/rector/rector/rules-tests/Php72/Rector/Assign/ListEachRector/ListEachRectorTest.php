<?php

declare (strict_types=1);
namespace Rector\Tests\Php72\Rector\Assign\ListEachRector;

use Iterator;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;
use Typo3RectorPrefix20210414\Symplify\SmartFileSystem\SmartFileInfo;
/**
 * Test battery inspired by:
 * - https://stackoverflow.com/q/46492621/1348344 + Drupal refactorings
 * - https://stackoverflow.com/a/51278641/1348344
 */
final class ListEachRectorTest extends \Rector\Testing\PHPUnit\AbstractRectorTestCase
{
    /**
     * @dataProvider provideData()
     * @requires PHP < 8.0
     */
    public function test(\Typo3RectorPrefix20210414\Symplify\SmartFileSystem\SmartFileInfo $fileInfo) : void
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
