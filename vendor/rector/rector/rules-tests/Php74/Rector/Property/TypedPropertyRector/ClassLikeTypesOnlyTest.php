<?php

declare (strict_types=1);
namespace Rector\Tests\Php74\Rector\Property\TypedPropertyRector;

use Iterator;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;
use Typo3RectorPrefix20210418\Symplify\SmartFileSystem\SmartFileInfo;
final class ClassLikeTypesOnlyTest extends \Rector\Testing\PHPUnit\AbstractRectorTestCase
{
    /**
     * @dataProvider provideData()
     */
    public function test(\Typo3RectorPrefix20210418\Symplify\SmartFileSystem\SmartFileInfo $fileInfo) : void
    {
        $this->doTestFileInfo($fileInfo);
    }
    /**
     * @return Iterator<SmartFileInfo>
     */
    public function provideData() : \Iterator
    {
        return $this->yieldFilesFromDirectory(__DIR__ . '/FixtureClassLikeTypeOnly');
    }
    public function provideConfigFilePath() : string
    {
        return __DIR__ . '/config/class_types_only.php';
    }
}
