<?php

declare (strict_types=1);
namespace Rector\TypeDeclaration\Tests\Rector\MethodCall\FormerNullableArgumentToScalarTypedRector;

use Iterator;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;
use Rector\TypeDeclaration\Rector\MethodCall\FormerNullableArgumentToScalarTypedRector;
use Typo3RectorPrefix20210323\Symplify\SmartFileSystem\SmartFileInfo;
final class FormerNullableArgumentToScalarTypedRectorTest extends \Rector\Testing\PHPUnit\AbstractRectorTestCase
{
    /**
     * @dataProvider provideData()
     */
    public function test(\Typo3RectorPrefix20210323\Symplify\SmartFileSystem\SmartFileInfo $fileInfo) : void
    {
        $this->doTestFileInfo($fileInfo);
    }
    public function provideData() : \Iterator
    {
        return $this->yieldFilesFromDirectory(__DIR__ . '/Fixture');
    }
    protected function getRectorClass() : string
    {
        return \Rector\TypeDeclaration\Rector\MethodCall\FormerNullableArgumentToScalarTypedRector::class;
    }
}
