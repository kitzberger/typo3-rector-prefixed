<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210410\Helmich\TypoScriptParser\Tokenizer\Preprocessing;

/**
 * Helper class that provides the standard pre-processing behaviour
 *
 * @package Helmich\TypoScriptParser\Tokenizer\Preprocessing
 */
class StandardPreprocessor extends \Typo3RectorPrefix20210410\Helmich\TypoScriptParser\Tokenizer\Preprocessing\ProcessorChain
{
    public function __construct(string $eolChar = "\n")
    {
        $this->processors = [new \Typo3RectorPrefix20210410\Helmich\TypoScriptParser\Tokenizer\Preprocessing\UnifyLineEndingsPreprocessor($eolChar), new \Typo3RectorPrefix20210410\Helmich\TypoScriptParser\Tokenizer\Preprocessing\RemoveTrailingWhitespacePreprocessor($eolChar)];
    }
}
