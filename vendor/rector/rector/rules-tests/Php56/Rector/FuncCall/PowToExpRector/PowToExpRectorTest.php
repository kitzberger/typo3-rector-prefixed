<?php

declare (strict_types=1);
namespace Rector\Tests\Php56\Rector\FuncCall\PowToExpRector;

use Iterator;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;
use Typo3RectorPrefix20210423\Symplify\SmartFileSystem\SmartFileInfo;
/**
 * Some tests copied from:
 * - https://github.com/FriendsOfPHP/PHP-CS-Fixer/commit/14660432d9d0b66bf65135d793b52872cc6eccbc#diff-b412676c923661ef450f4a0903c5442a
 */
final class PowToExpRectorTest extends \Rector\Testing\PHPUnit\AbstractRectorTestCase
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
        return __DIR__ . '/config/configured_rule.php';
    }
}
