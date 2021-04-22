<?php

namespace Typo3RectorPrefix20210422\Helmich\TypoScriptParser\Tests\Unit\Parser;

use Typo3RectorPrefix20210422\Helmich\TypoScriptParser\Parser\ParseError;
use Typo3RectorPrefix20210422\PHPUnit\Framework\TestCase;
class ParseErrorTest extends \Typo3RectorPrefix20210422\PHPUnit\Framework\TestCase
{
    /** @var ParseError */
    private $exc;
    public function setUp() : void
    {
        $this->exc = new \Typo3RectorPrefix20210422\Helmich\TypoScriptParser\Parser\ParseError('foobar', 1234, 4321);
    }
    public function testCanSetSourceLine()
    {
        $this->assertEquals(4321, $this->exc->getSourceLine());
    }
    public function testCanSetMessage()
    {
        $this->assertEquals('foobar', $this->exc->getMessage());
    }
}
