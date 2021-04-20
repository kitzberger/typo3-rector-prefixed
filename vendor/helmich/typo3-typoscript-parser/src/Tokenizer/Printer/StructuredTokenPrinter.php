<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210420\Helmich\TypoScriptParser\Tokenizer\Printer;

use Typo3RectorPrefix20210420\Helmich\TypoScriptParser\Tokenizer\TokenInterface;
use Typo3RectorPrefix20210420\Symfony\Component\Yaml\Yaml;
class StructuredTokenPrinter implements \Typo3RectorPrefix20210420\Helmich\TypoScriptParser\Tokenizer\Printer\TokenPrinterInterface
{
    /** @var Yaml */
    private $yaml;
    public function __construct(\Typo3RectorPrefix20210420\Symfony\Component\Yaml\Yaml $yaml = null)
    {
        $this->yaml = $yaml ?: new \Typo3RectorPrefix20210420\Symfony\Component\Yaml\Yaml();
    }
    /**
     * @param TokenInterface[] $tokens
     * @return string
     */
    public function printTokenStream(array $tokens) : string
    {
        $content = '';
        foreach ($tokens as $token) {
            $content .= \sprintf("%20s %s\n", $token->getType(), $this->yaml->dump($token->getValue()));
        }
        return $content;
    }
}
