<?php

declare (strict_types=1);
namespace Rector\Tests\TypeDeclaration\Rector\FunctionLike\ParamTypeDeclarationRector;

use Iterator;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;
use Typo3RectorPrefix20210414\Symplify\SmartFileSystem\SmartFileInfo;
final class PropertyTypeParamTypeDeclarationRectorTest extends \Rector\Testing\PHPUnit\AbstractRectorTestCase
{
    /**
     * @requires PHP 7.4
     * @dataProvider provideData()
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
        return $this->yieldFilesFromDirectory(__DIR__ . '/FixturePropertyType');
    }
    public function provideConfigFilePath() : string
    {
        return __DIR__ . '/config/typed_properties.php';
    }
}
