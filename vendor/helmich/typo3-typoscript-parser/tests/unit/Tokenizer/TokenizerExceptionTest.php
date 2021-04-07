<?php

namespace Typo3RectorPrefix20210407\Helmich\TypoScriptParser\Tests\Unit\Tokenizer;

use Typo3RectorPrefix20210407\Helmich\TypoScriptParser\Tokenizer\TokenizerException;
use Typo3RectorPrefix20210407\PHPUnit\Framework\TestCase;
class TokenizerExceptionTest extends \Typo3RectorPrefix20210407\PHPUnit\Framework\TestCase
{
    public function testCanGetSourceLine()
    {
        $exc = new \Typo3RectorPrefix20210407\Helmich\TypoScriptParser\Tokenizer\TokenizerException('Foobar', 1234, null, 4312);
        assertThat($exc->getSourceLine(), equalTo(4312));
    }
}
