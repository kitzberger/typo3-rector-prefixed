<?php

namespace Typo3RectorPrefix20210402\Helmich\TypoScriptParser\Tests\Unit\Tokenizer\Printer;

use Typo3RectorPrefix20210402\Helmich\TypoScriptParser\Tokenizer\Printer\CodeTokenPrinter;
use Typo3RectorPrefix20210402\Helmich\TypoScriptParser\Tokenizer\Token;
use Typo3RectorPrefix20210402\PHPUnit\Framework\TestCase;
class CodeTokenPrinterTest extends \Typo3RectorPrefix20210402\PHPUnit\Framework\TestCase
{
    /** @var CodeTokenPrinter */
    private $printer;
    public function setUp() : void
    {
        $this->printer = new \Typo3RectorPrefix20210402\Helmich\TypoScriptParser\Tokenizer\Printer\CodeTokenPrinter();
    }
    public function testTokensArePrinted()
    {
        $expectedOutput = <<<OUT
foo = bar
bar = bar
OUT;
        $tokens = [new \Typo3RectorPrefix20210402\Helmich\TypoScriptParser\Tokenizer\Token(\Typo3RectorPrefix20210402\Helmich\TypoScriptParser\Tokenizer\Token::TYPE_OBJECT_IDENTIFIER, "foo", 1, 1), new \Typo3RectorPrefix20210402\Helmich\TypoScriptParser\Tokenizer\Token(\Typo3RectorPrefix20210402\Helmich\TypoScriptParser\Tokenizer\Token::TYPE_WHITESPACE, " ", 1, 4), new \Typo3RectorPrefix20210402\Helmich\TypoScriptParser\Tokenizer\Token(\Typo3RectorPrefix20210402\Helmich\TypoScriptParser\Tokenizer\Token::TYPE_OPERATOR_ASSIGNMENT, "=", 1, 5), new \Typo3RectorPrefix20210402\Helmich\TypoScriptParser\Tokenizer\Token(\Typo3RectorPrefix20210402\Helmich\TypoScriptParser\Tokenizer\Token::TYPE_WHITESPACE, " ", 1, 6), new \Typo3RectorPrefix20210402\Helmich\TypoScriptParser\Tokenizer\Token(\Typo3RectorPrefix20210402\Helmich\TypoScriptParser\Tokenizer\Token::TYPE_RIGHTVALUE, "bar", 1, 7), new \Typo3RectorPrefix20210402\Helmich\TypoScriptParser\Tokenizer\Token(\Typo3RectorPrefix20210402\Helmich\TypoScriptParser\Tokenizer\Token::TYPE_WHITESPACE, "\n", 1, 10), new \Typo3RectorPrefix20210402\Helmich\TypoScriptParser\Tokenizer\Token(\Typo3RectorPrefix20210402\Helmich\TypoScriptParser\Tokenizer\Token::TYPE_OBJECT_IDENTIFIER, "bar", 2, 1), new \Typo3RectorPrefix20210402\Helmich\TypoScriptParser\Tokenizer\Token(\Typo3RectorPrefix20210402\Helmich\TypoScriptParser\Tokenizer\Token::TYPE_WHITESPACE, " ", 2, 4), new \Typo3RectorPrefix20210402\Helmich\TypoScriptParser\Tokenizer\Token(\Typo3RectorPrefix20210402\Helmich\TypoScriptParser\Tokenizer\Token::TYPE_OPERATOR_ASSIGNMENT, "=", 2, 5), new \Typo3RectorPrefix20210402\Helmich\TypoScriptParser\Tokenizer\Token(\Typo3RectorPrefix20210402\Helmich\TypoScriptParser\Tokenizer\Token::TYPE_WHITESPACE, " ", 2, 6), new \Typo3RectorPrefix20210402\Helmich\TypoScriptParser\Tokenizer\Token(\Typo3RectorPrefix20210402\Helmich\TypoScriptParser\Tokenizer\Token::TYPE_RIGHTVALUE, "bar", 2, 7), new \Typo3RectorPrefix20210402\Helmich\TypoScriptParser\Tokenizer\Token(\Typo3RectorPrefix20210402\Helmich\TypoScriptParser\Tokenizer\Token::TYPE_WHITESPACE, "\n", 2, 10)];
        $output = $this->printer->printTokenStream($tokens);
        assertThat(\trim($output), equalTo(\trim($expectedOutput)));
    }
}
