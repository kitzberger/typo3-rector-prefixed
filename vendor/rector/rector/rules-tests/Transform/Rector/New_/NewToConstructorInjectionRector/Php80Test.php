<?php

declare (strict_types=1);
namespace Rector\Tests\Transform\Rector\New_\NewToConstructorInjectionRector;

use Iterator;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;
use Typo3RectorPrefix20210421\Symplify\SmartFileSystem\SmartFileInfo;
final class Php80Test extends \Rector\Testing\PHPUnit\AbstractRectorTestCase
{
    /**
     * @dataProvider provideData()
     */
    public function test(\Typo3RectorPrefix20210421\Symplify\SmartFileSystem\SmartFileInfo $fileInfo) : void
    {
        $this->doTestFileInfo($fileInfo);
    }
    /**
     * @return Iterator<SmartFileInfo>
     */
    public function provideData() : \Iterator
    {
        return $this->yieldFilesFromDirectory(__DIR__ . '/FixturePhp80');
    }
    public function provideConfigFilePath() : string
    {
        return __DIR__ . '/config/configured_rule.php';
    }
}
