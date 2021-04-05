<?php

namespace Typo3RectorPrefix20210405\Helmich\TypoScriptParser\Tests\Unit\Parser\AST;

use Typo3RectorPrefix20210405\Helmich\TypoScriptParser\Parser\AST\Statement;
use Typo3RectorPrefix20210405\PHPUnit\Framework\TestCase;
class StatementTest extends \Typo3RectorPrefix20210405\PHPUnit\Framework\TestCase
{
    public function dataForInvalidSourceLines()
    {
        (yield [0]);
        (yield [0.1]);
        (yield [-0.1]);
        (yield [-1]);
        (yield [-\PHP_INT_MAX]);
    }
    /**
     * @dataProvider dataForInvalidSourceLines
     * @param $invalidSourceLine
     */
    public function testInvalidSourceLineThrowsException($invalidSourceLine)
    {
        $this->expectException(\InvalidArgumentException::class);
        $statement = $this->getMockBuilder(\Typo3RectorPrefix20210405\Helmich\TypoScriptParser\Parser\AST\Statement::class)->setConstructorArgs([$invalidSourceLine])->enableOriginalConstructor()->getMockForAbstractClass();
    }
}
