<?php

declare (strict_types=1);
namespace Rector\Tests\TypeDeclaration\Rector\FunctionLike\ParamTypeDeclarationRector;

use Iterator;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;
use Typo3RectorPrefix20210423\Symplify\SmartFileSystem\SmartFileInfo;
final class ParamTypeDeclarationRectorTest extends \Rector\Testing\PHPUnit\AbstractRectorTestCase
{
    /**
     * @dataProvider provideData()
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
        return $this->yieldFilesFromDirectory(__DIR__ . '/Fixture');
    }
    public function provideConfigFilePath() : string
    {
        return __DIR__ . '/config/before_union_types.php';
    }
}
