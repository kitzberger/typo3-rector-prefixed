<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210410\Helmich\TypoScriptParser\Tokenizer\Printer;

use Typo3RectorPrefix20210410\Helmich\TypoScriptParser\Tokenizer\TokenInterface;
/**
 * Interface definition for a class that prints token streams
 *
 * @package    Helmich\TypoScriptParser
 * @subpackage Tokenizer\Printer
 */
interface TokenPrinterInterface
{
    /**
     * @param TokenInterface[] $tokens
     * @return string
     */
    public function printTokenStream(array $tokens) : string;
}
