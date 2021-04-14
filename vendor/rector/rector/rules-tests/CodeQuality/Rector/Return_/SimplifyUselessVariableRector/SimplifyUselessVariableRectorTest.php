<?php

declare (strict_types=1);
namespace Rector\Tests\CodeQuality\Rector\Return_\SimplifyUselessVariableRector;

use Iterator;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;
use Typo3RectorPrefix20210414\Symplify\SmartFileSystem\SmartFileInfo;
/**
 * Tests copied from:
 * - https://github.com/slevomat/coding-standard/blob/9978172758e90bc2355573e0b5d99062d87b14a3/tests/Sniffs/Variables/data/uselessVariableErrors.fixed.php
 * - https://github.com/slevomat/coding-standard/blob/9978172758e90bc2355573e0b5d99062d87b14a3/tests/Sniffs/Variables/data/uselessVariableNoErrors.php
 */
final class SimplifyUselessVariableRectorTest extends \Rector\Testing\PHPUnit\AbstractRectorTestCase
{
    /**
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
        return $this->yieldFilesFromDirectory(__DIR__ . '/Fixture');
    }
    public function provideConfigFilePath() : string
    {
        return __DIR__ . '/config/configured_rule.php';
    }
}
