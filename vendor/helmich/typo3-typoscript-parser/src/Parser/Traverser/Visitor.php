<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210331\Helmich\TypoScriptParser\Parser\Traverser;

use Typo3RectorPrefix20210331\Helmich\TypoScriptParser\Parser\AST\Statement;
/**
 * Interface Visitor
 *
 * @package    Helmich\TypoScriptParser
 * @subpackage Parser\Traverser
 */
interface Visitor
{
    /**
     * @param Statement[] $statements
     * @return void
     */
    public function enterTree(array $statements) : void;
    /**
     * @param Statement $statement
     * @return void
     */
    public function enterNode(\Typo3RectorPrefix20210331\Helmich\TypoScriptParser\Parser\AST\Statement $statement) : void;
    /**
     * @param Statement $statement
     * @return void
     */
    public function exitNode(\Typo3RectorPrefix20210331\Helmich\TypoScriptParser\Parser\AST\Statement $statement) : void;
    /**
     * @param Statement[] $statements
     * @return void
     */
    public function exitTree(array $statements) : void;
}
