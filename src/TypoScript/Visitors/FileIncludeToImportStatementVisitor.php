<?php

declare (strict_types=1);
namespace Ssch\TYPO3Rector\TypoScript\Visitors;

use Typo3RectorPrefix20210409\Helmich\TypoScriptParser\Parser\AST\FileIncludeStatement;
use Typo3RectorPrefix20210409\Helmich\TypoScriptParser\Parser\AST\Statement;
final class FileIncludeToImportStatementVisitor extends \Ssch\TYPO3Rector\TypoScript\Visitors\AbstractVisitor
{
    public function enterNode(\Typo3RectorPrefix20210409\Helmich\TypoScriptParser\Parser\AST\Statement $statement) : void
    {
        if (!$statement instanceof \Typo3RectorPrefix20210409\Helmich\TypoScriptParser\Parser\AST\FileIncludeStatement) {
            return;
        }
        if (null !== $statement->condition) {
            return;
        }
        if ($statement->newSyntax) {
            return;
        }
        $statement->newSyntax = \true;
    }
}
