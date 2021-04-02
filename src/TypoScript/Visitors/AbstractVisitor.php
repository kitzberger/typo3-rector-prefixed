<?php

declare (strict_types=1);
namespace Ssch\TYPO3Rector\TypoScript\Visitors;

use Typo3RectorPrefix20210402\Helmich\TypoScriptParser\Parser\AST\Statement;
use Typo3RectorPrefix20210402\Helmich\TypoScriptParser\Parser\Traverser\Visitor;
abstract class AbstractVisitor implements \Typo3RectorPrefix20210402\Helmich\TypoScriptParser\Parser\Traverser\Visitor
{
    public function enterTree(array $statements) : void
    {
    }
    public function enterNode(\Typo3RectorPrefix20210402\Helmich\TypoScriptParser\Parser\AST\Statement $statement) : void
    {
    }
    public function exitNode(\Typo3RectorPrefix20210402\Helmich\TypoScriptParser\Parser\AST\Statement $statement) : void
    {
    }
    public function exitTree(array $statements) : void
    {
    }
}
