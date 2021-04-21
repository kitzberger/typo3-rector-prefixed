<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210421\Helmich\TypoScriptParser\Parser\AST\Operator;

use Typo3RectorPrefix20210421\Helmich\TypoScriptParser\Parser\AST\ObjectPath;
use Typo3RectorPrefix20210421\Helmich\TypoScriptParser\Parser\AST\Statement;
/**
 * Abstract base class for statements with unary operators.
 *
 * @package    Helmich\TypoScriptParser
 * @subpackage Parser\AST\Operator
 */
abstract class UnaryOperator extends \Typo3RectorPrefix20210421\Helmich\TypoScriptParser\Parser\AST\Statement
{
    /**
     * The object the operator should be applied on.
     *
     * @var ObjectPath
     */
    public $object;
    /**
     * Constructs a unary operator statement.
     *
     * @param ObjectPath $object     The object to operate on.
     * @param int        $sourceLine The original source line.
     */
    public function __construct(\Typo3RectorPrefix20210421\Helmich\TypoScriptParser\Parser\AST\ObjectPath $object, int $sourceLine)
    {
        parent::__construct($sourceLine);
        $this->object = $object;
    }
}
