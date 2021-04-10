<?php

namespace Typo3RectorPrefix20210410\Helmich\TypoScriptParser\Tests\Unit\Parser;

use Typo3RectorPrefix20210410\Helmich\TypoScriptParser\Parser\TokenStream;
use Typo3RectorPrefix20210410\Helmich\TypoScriptParser\Tokenizer\Token;
use Typo3RectorPrefix20210410\Helmich\TypoScriptParser\Tokenizer\TokenInterface;
use Typo3RectorPrefix20210410\PHPUnit\Framework\TestCase;
class TokenStreamTest extends \Typo3RectorPrefix20210410\PHPUnit\Framework\TestCase
{
    /** @var tokenStream */
    private $stream;
    /** @var TokenInterface[] */
    private $tokens;
    public function setUp() : void
    {
        $this->tokens = [new \Typo3RectorPrefix20210410\Helmich\TypoScriptParser\Tokenizer\Token(\Typo3RectorPrefix20210410\Helmich\TypoScriptParser\Tokenizer\Token::TYPE_OBJECT_IDENTIFIER, 'foo', 1, 1), new \Typo3RectorPrefix20210410\Helmich\TypoScriptParser\Tokenizer\Token(\Typo3RectorPrefix20210410\Helmich\TypoScriptParser\Tokenizer\Token::TYPE_WHITESPACE, ' ', 1, 4), new \Typo3RectorPrefix20210410\Helmich\TypoScriptParser\Tokenizer\Token(\Typo3RectorPrefix20210410\Helmich\TypoScriptParser\Tokenizer\Token::TYPE_OPERATOR_ASSIGNMENT, '=', 1, 5), new \Typo3RectorPrefix20210410\Helmich\TypoScriptParser\Tokenizer\Token(\Typo3RectorPrefix20210410\Helmich\TypoScriptParser\Tokenizer\Token::TYPE_WHITESPACE, ' ', 1, 6), new \Typo3RectorPrefix20210410\Helmich\TypoScriptParser\Tokenizer\Token(\Typo3RectorPrefix20210410\Helmich\TypoScriptParser\Tokenizer\Token::TYPE_RIGHTVALUE, 'bar', 1, 7)];
        $this->stream = new \Typo3RectorPrefix20210410\Helmich\TypoScriptParser\Parser\TokenStream($this->tokens);
    }
    public function testCanIterateStream()
    {
        $count = 0;
        foreach ($this->stream as $key => $token) {
            $count++;
            assertThat($token->getType(), equalTo($this->tokens[$key]->getType()));
        }
        assertThat($count, equalTo(\count($this->tokens)));
    }
    public function testCanBeAccessedAsArray()
    {
        assertThat(isset($this->stream[1]), isTrue());
        assertThat($this->stream[4]->getValue(), equalTo('bar'));
    }
    public function testCannotSet()
    {
        $this->expectException(\BadMethodCallException::class);
        $this->stream[3] = new \Typo3RectorPrefix20210410\Helmich\TypoScriptParser\Tokenizer\Token(\Typo3RectorPrefix20210410\Helmich\TypoScriptParser\Tokenizer\Token::TYPE_OPERATOR_COPY, '<', 1, 1);
    }
    public function testCannotAppend()
    {
        $this->expectException(\BadMethodCallException::class);
        $this->stream[] = new \Typo3RectorPrefix20210410\Helmich\TypoScriptParser\Tokenizer\Token(\Typo3RectorPrefix20210410\Helmich\TypoScriptParser\Tokenizer\Token::TYPE_OPERATOR_COPY, '<', 1, 1);
    }
    public function testCannotUnset()
    {
        $this->expectException(\BadMethodCallException::class);
        unset($this->stream[3]);
    }
}
