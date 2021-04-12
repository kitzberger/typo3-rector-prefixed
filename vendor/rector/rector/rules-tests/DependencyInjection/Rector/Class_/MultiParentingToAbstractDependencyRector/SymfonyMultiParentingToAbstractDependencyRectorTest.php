<?php

declare (strict_types=1);
namespace Rector\Tests\DependencyInjection\Rector\Class_\MultiParentingToAbstractDependencyRector;

use Iterator;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;
use Typo3RectorPrefix20210412\Symplify\SmartFileSystem\SmartFileInfo;
final class SymfonyMultiParentingToAbstractDependencyRectorTest extends \Rector\Testing\PHPUnit\AbstractRectorTestCase
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
        return $this->yieldFilesFromDirectory(__DIR__ . '/FixtureSymfony');
    }
    public function provideConfigFilePath() : string
    {
        return __DIR__ . '/config/symfony_config.php';
    }
}
