<?php

declare (strict_types=1);
namespace Rector\Tests\DeadCode\Rector\PropertyProperty\RemoveNullPropertyInitializationRector;

use Iterator;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;
use Typo3RectorPrefix20210423\Symplify\SmartFileSystem\SmartFileInfo;
final class TypedPropertiesRemoveNullPropertyInitializationRectorTest extends \Rector\Testing\PHPUnit\AbstractRectorTestCase
{
    /**
     * @dataProvider provideData()
     * @requires PHP 7.4
     */
    public function test(\Typo3RectorPrefix20210423\Symplify\SmartFileSystem\SmartFileInfo $fileInfo) : void
    {
        $this->doTestFileInfo($fileInfo);
    }
    /**
     * @return Iterator<SmartFileInfo>
     */
    public function provideData() : \Iterator
    {
        return $this->yieldFilesFromDirectory(__DIR__ . '/FixtureTypedProperties');
    }
    public function provideConfigFilePath() : string
    {
        return __DIR__ . '/config/typed_properties.php';
    }
}
