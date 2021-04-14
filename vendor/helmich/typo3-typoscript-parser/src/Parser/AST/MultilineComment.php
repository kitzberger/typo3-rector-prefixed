<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210414\Helmich\TypoScriptParser\Parser\AST;

final class MultilineComment extends \Typo3RectorPrefix20210414\Helmich\TypoScriptParser\Parser\AST\Statement
{
    /**
     * @var string
     */
    public $comment;
    public function __construct(string $comment, int $sourceLine)
    {
        parent::__construct($sourceLine);
        $this->comment = \preg_replace('/[ \\0\\r\\x0B\\t]/', '', $comment);
    }
}
