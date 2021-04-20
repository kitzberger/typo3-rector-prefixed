<?php

declare (strict_types=1);
namespace Ssch\TYPO3Rector\TypoScript\Visitors;

use Typo3RectorPrefix20210420\Helmich\TypoScriptParser\Parser\AST\FileIncludeStatement;
use Typo3RectorPrefix20210420\Helmich\TypoScriptParser\Parser\AST\Statement;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;
final class FileIncludeToImportStatementVisitor extends \Ssch\TYPO3Rector\TypoScript\Visitors\AbstractVisitor
{
    public function enterNode(\Typo3RectorPrefix20210420\Helmich\TypoScriptParser\Parser\AST\Statement $statement) : void
    {
        if (!$statement instanceof \Typo3RectorPrefix20210420\Helmich\TypoScriptParser\Parser\AST\FileIncludeStatement) {
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
    public function getRuleDefinition() : \Symplify\RuleDocGenerator\ValueObject\RuleDefinition
    {
        return new \Symplify\RuleDocGenerator\ValueObject\RuleDefinition('Convert old include statement to new import syntax', [new \Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample(<<<'CODE_SAMPLE'
<INCLUDE_TYPOSCRIPT: source="FILE:conditions.typoscript">
CODE_SAMPLE
, <<<'CODE_SAMPLE'
@import conditions.typoscript
CODE_SAMPLE
)]);
    }
}
