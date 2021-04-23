<?php

namespace Typo3RectorPrefix20210423\Helmich\TypoScriptParser\Tests\Unit\Parser\AST\Operator;

use Typo3RectorPrefix20210423\Helmich\TypoScriptParser\Parser\AST\ObjectPath;
use Typo3RectorPrefix20210423\Helmich\TypoScriptParser\Parser\AST\Operator\Builder as OperatorBuilder;
use Typo3RectorPrefix20210423\Helmich\TypoScriptParser\Parser\AST\Operator\Copy;
use Typo3RectorPrefix20210423\Helmich\TypoScriptParser\Parser\AST\Operator\ObjectCreation;
use Typo3RectorPrefix20210423\Helmich\TypoScriptParser\Parser\AST\Scalar;
use Typo3RectorPrefix20210423\PHPUnit\Framework\TestCase;
class BuilderTest extends \Typo3RectorPrefix20210423\PHPUnit\Framework\TestCase
{
    /** @var OperatorBuilder */
    private $opBuilder;
    public function setUp() : void
    {
        $this->opBuilder = new \Typo3RectorPrefix20210423\Helmich\TypoScriptParser\Parser\AST\Operator\Builder();
    }
    public function testObjectCreationIsBuilt()
    {
        $op = $this->opBuilder->objectCreation($foo = new \Typo3RectorPrefix20210423\Helmich\TypoScriptParser\Parser\AST\ObjectPath('foo', 'foo'), $text = new \Typo3RectorPrefix20210423\Helmich\TypoScriptParser\Parser\AST\Scalar('TEXT'), 1);
        assertThat($op, isInstanceOf(\Typo3RectorPrefix20210423\Helmich\TypoScriptParser\Parser\AST\Operator\ObjectCreation::class));
        assertThat($op->object, identicalTo($foo));
        assertThat($op->value, identicalTo($text));
    }
    public function testCopyOperatorIsBuilt()
    {
        $op = $this->opBuilder->copy($foo = new \Typo3RectorPrefix20210423\Helmich\TypoScriptParser\Parser\AST\ObjectPath('foo', 'foo'), $bar = new \Typo3RectorPrefix20210423\Helmich\TypoScriptParser\Parser\AST\ObjectPath('bar', 'bar'), 1);
        assertThat($op, isInstanceOf(\Typo3RectorPrefix20210423\Helmich\TypoScriptParser\Parser\AST\Operator\Copy::class));
        assertThat($op->object, identicalTo($foo));
        assertThat($op->target, identicalTo($bar));
    }
    public function testPassesExcessParameters()
    {
        $op = $this->opBuilder->copy($foo = new \Typo3RectorPrefix20210423\Helmich\TypoScriptParser\Parser\AST\ObjectPath('foo', 'foo'), $bar = new \Typo3RectorPrefix20210423\Helmich\TypoScriptParser\Parser\AST\ObjectPath('bar', 'bar'), 1, 'foo');
        assertThat($op, isInstanceOf(\Typo3RectorPrefix20210423\Helmich\TypoScriptParser\Parser\AST\Operator\Copy::class));
        assertThat($op->object, identicalTo($foo));
        assertThat($op->target, identicalTo($bar));
    }
}
