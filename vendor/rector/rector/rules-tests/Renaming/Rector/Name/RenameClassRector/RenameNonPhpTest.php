<?php

declare (strict_types=1);
namespace Rector\Tests\Renaming\Rector\Name\RenameClassRector;

use Iterator;
use Rector\Core\ValueObject\StaticNonPhpFileSuffixes;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;
use Typo3RectorPrefix20210413\Symplify\SmartFileSystem\SmartFileInfo;
final class RenameNonPhpTest extends \Rector\Testing\PHPUnit\AbstractRectorTestCase
{
    /**
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
        return $this->yieldFilesFromDirectory(__DIR__ . '/FixtureRenameNonPhp', \Rector\Core\ValueObject\StaticNonPhpFileSuffixes::getSuffixRegexPattern());
    }
    public function provideConfigFilePath() : string
    {
        return __DIR__ . '/config/non_php_config.php';
    }
}
