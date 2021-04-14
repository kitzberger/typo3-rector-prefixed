<?php

namespace Typo3RectorPrefix20210414\Helmich\TypoScriptParser\Tests\Unit\Tokenizer;

use Typo3RectorPrefix20210414\Helmich\TypoScriptParser\Tokenizer\LineGrouper;
use Typo3RectorPrefix20210414\Helmich\TypoScriptParser\Tokenizer\Token;
use Typo3RectorPrefix20210414\PHPUnit\Framework\TestCase;
class LineGrouperTest extends \Typo3RectorPrefix20210414\PHPUnit\Framework\TestCase
{
    public function testTokensAreGroupsByLine()
    {
        $tokens = [new \Typo3RectorPrefix20210414\Helmich\TypoScriptParser\Tokenizer\Token(\Typo3RectorPrefix20210414\Helmich\TypoScriptParser\Tokenizer\Token::TYPE_OBJECT_IDENTIFIER, "foo", 1, 1), new \Typo3RectorPrefix20210414\Helmich\TypoScriptParser\Tokenizer\Token(\Typo3RectorPrefix20210414\Helmich\TypoScriptParser\Tokenizer\Token::TYPE_WHITESPACE, " ", 1, 4), new \Typo3RectorPrefix20210414\Helmich\TypoScriptParser\Tokenizer\Token(\Typo3RectorPrefix20210414\Helmich\TypoScriptParser\Tokenizer\Token::TYPE_OPERATOR_ASSIGNMENT, "=", 1, 5), new \Typo3RectorPrefix20210414\Helmich\TypoScriptParser\Tokenizer\Token(\Typo3RectorPrefix20210414\Helmich\TypoScriptParser\Tokenizer\Token::TYPE_WHITESPACE, " ", 1, 6), new \Typo3RectorPrefix20210414\Helmich\TypoScriptParser\Tokenizer\Token(\Typo3RectorPrefix20210414\Helmich\TypoScriptParser\Tokenizer\Token::TYPE_RIGHTVALUE, "bar", 1, 7), new \Typo3RectorPrefix20210414\Helmich\TypoScriptParser\Tokenizer\Token(\Typo3RectorPrefix20210414\Helmich\TypoScriptParser\Tokenizer\Token::TYPE_WHITESPACE, "\n", 1, 10), new \Typo3RectorPrefix20210414\Helmich\TypoScriptParser\Tokenizer\Token(\Typo3RectorPrefix20210414\Helmich\TypoScriptParser\Tokenizer\Token::TYPE_OBJECT_IDENTIFIER, "bar", 2, 1), new \Typo3RectorPrefix20210414\Helmich\TypoScriptParser\Tokenizer\Token(\Typo3RectorPrefix20210414\Helmich\TypoScriptParser\Tokenizer\Token::TYPE_WHITESPACE, " ", 2, 4), new \Typo3RectorPrefix20210414\Helmich\TypoScriptParser\Tokenizer\Token(\Typo3RectorPrefix20210414\Helmich\TypoScriptParser\Tokenizer\Token::TYPE_OPERATOR_ASSIGNMENT, "=", 2, 5), new \Typo3RectorPrefix20210414\Helmich\TypoScriptParser\Tokenizer\Token(\Typo3RectorPrefix20210414\Helmich\TypoScriptParser\Tokenizer\Token::TYPE_WHITESPACE, " ", 2, 6), new \Typo3RectorPrefix20210414\Helmich\TypoScriptParser\Tokenizer\Token(\Typo3RectorPrefix20210414\Helmich\TypoScriptParser\Tokenizer\Token::TYPE_RIGHTVALUE, "baz", 2, 7), new \Typo3RectorPrefix20210414\Helmich\TypoScriptParser\Tokenizer\Token(\Typo3RectorPrefix20210414\Helmich\TypoScriptParser\Tokenizer\Token::TYPE_WHITESPACE, "\n", 2, 10)];
        $lines = (new \Typo3RectorPrefix20210414\Helmich\TypoScriptParser\Tokenizer\LineGrouper($tokens))->getLines();
        assertThat(\count($lines), equalTo(2));
        assertThat(\count($lines[1]), equalTo(6));
        assertThat(\count($lines[2]), equalTo(6));
        assertThat($lines[1][0]->getValue(), equalTo("foo"));
        assertThat($lines[1][4]->getValue(), equalTo("bar"));
        assertThat($lines[2][0]->getValue(), equalTo("bar"));
        assertThat($lines[2][4]->getValue(), equalTo("baz"));
    }
}
