<?php

declare (strict_types=1);
namespace Rector\Core\Tests\Exclusion;

use Iterator;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;
use Typo3RectorPrefix20210329\Symplify\SmartFileSystem\SmartFileInfo;
/**
 * @see \Rector\Core\Exclusion\ExclusionManager
 */
final class ExclusionManagerTest extends \Rector\Testing\PHPUnit\AbstractRectorTestCase
{
    /**
     * @dataProvider provideData()
     */
    public function test(\Typo3RectorPrefix20210329\Symplify\SmartFileSystem\SmartFileInfo $fileInfo) : void
    {
        $this->doTestFileInfo($fileInfo);
    }
    public function provideData() : \Iterator
    {
        return $this->yieldFilesFromDirectory(__DIR__ . '/Fixture');
    }
    protected function provideConfigFilePath() : string
    {
        return __DIR__ . '/config/some_config.php';
    }
}
