<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423\Helmich\TypoScriptParser\Parser\AST\Operator;

use Typo3RectorPrefix20210423\Helmich\TypoScriptParser\Parser\AST\ObjectPath;
/**
 * A modification statement.
 *
 * Example:
 *
 *     foo  = bar
 *     foo := appendToString(baz)
 *
 * @package    Helmich\TypoScriptParser
 * @subpackage Parser\AST\Operator
 */
class Modification extends \Typo3RectorPrefix20210423\Helmich\TypoScriptParser\Parser\AST\Operator\BinaryOperator
{
    /**
     * The modification call.
     *
     * @var ModificationCall
     */
    public $call;
    /**
     * Constructs a modification statement.
     *
     * @param ObjectPath       $object     The object to modify.
     * @param ModificationCall $call       The modification call.
     * @param int              $sourceLine The original source line.
     */
    public function __construct(\Typo3RectorPrefix20210423\Helmich\TypoScriptParser\Parser\AST\ObjectPath $object, \Typo3RectorPrefix20210423\Helmich\TypoScriptParser\Parser\AST\Operator\ModificationCall $call, int $sourceLine)
    {
        parent::__construct($sourceLine);
        $this->object = $object;
        $this->call = $call;
    }
}
