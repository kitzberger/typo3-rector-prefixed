<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210410\Helmich\TypoScriptParser\Tokenizer\Printer;

use Typo3RectorPrefix20210410\Helmich\TypoScriptParser\Tokenizer\TokenInterface;
class CodeTokenPrinter implements \Typo3RectorPrefix20210410\Helmich\TypoScriptParser\Tokenizer\Printer\TokenPrinterInterface
{
    /**
     * @param TokenInterface[] $tokens
     * @return string
     */
    public function printTokenStream(array $tokens) : string
    {
        $content = '';
        foreach ($tokens as $token) {
            $content .= $token->getValue();
        }
        return $content;
    }
}
