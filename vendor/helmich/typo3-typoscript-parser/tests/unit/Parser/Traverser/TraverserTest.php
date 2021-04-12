<?php

namespace Typo3RectorPrefix20210412\Helmich\TypoScriptParser\Tests\Unit\Parser\Traverser;

use Typo3RectorPrefix20210412\Helmich\TypoScriptParser\Parser\AST\ConditionalStatement;
use Typo3RectorPrefix20210412\Helmich\TypoScriptParser\Parser\AST\NestedAssignment;
use Typo3RectorPrefix20210412\Helmich\TypoScriptParser\Parser\AST\ObjectPath;
use Typo3RectorPrefix20210412\Helmich\TypoScriptParser\Parser\AST\Operator\Assignment;
use Typo3RectorPrefix20210412\Helmich\TypoScriptParser\Parser\AST\Scalar;
use Typo3RectorPrefix20210412\Helmich\TypoScriptParser\Parser\Traverser\Traverser;
use Typo3RectorPrefix20210412\Helmich\TypoScriptParser\Parser\Traverser\Visitor;
use Typo3RectorPrefix20210412\PHPUnit\Framework\TestCase;
class TraverserTest extends \Typo3RectorPrefix20210412\PHPUnit\Framework\TestCase
{
    private $tree;
    /** @var Traverser */
    private $traverser;
    public function setUp() : void
    {
        $this->tree = [new \Typo3RectorPrefix20210412\Helmich\TypoScriptParser\Parser\AST\Operator\Assignment(new \Typo3RectorPrefix20210412\Helmich\TypoScriptParser\Parser\AST\ObjectPath('foo', 'foo'), new \Typo3RectorPrefix20210412\Helmich\TypoScriptParser\Parser\AST\Scalar('bar'), 1), new \Typo3RectorPrefix20210412\Helmich\TypoScriptParser\Parser\AST\ConditionalStatement('[globalVar = GP:foo=1]', [new \Typo3RectorPrefix20210412\Helmich\TypoScriptParser\Parser\AST\Operator\Assignment(new \Typo3RectorPrefix20210412\Helmich\TypoScriptParser\Parser\AST\ObjectPath('foo', 'foo'), new \Typo3RectorPrefix20210412\Helmich\TypoScriptParser\Parser\AST\Scalar('bar'), 2)], [new \Typo3RectorPrefix20210412\Helmich\TypoScriptParser\Parser\AST\Operator\Assignment(new \Typo3RectorPrefix20210412\Helmich\TypoScriptParser\Parser\AST\ObjectPath('foo', 'foo'), new \Typo3RectorPrefix20210412\Helmich\TypoScriptParser\Parser\AST\Scalar('baz'), 4)], 2), new \Typo3RectorPrefix20210412\Helmich\TypoScriptParser\Parser\AST\NestedAssignment(new \Typo3RectorPrefix20210412\Helmich\TypoScriptParser\Parser\AST\ObjectPath('bar', 'bar'), [new \Typo3RectorPrefix20210412\Helmich\TypoScriptParser\Parser\AST\Operator\Assignment(new \Typo3RectorPrefix20210412\Helmich\TypoScriptParser\Parser\AST\ObjectPath('bar.baz', 'baz'), new \Typo3RectorPrefix20210412\Helmich\TypoScriptParser\Parser\AST\Scalar('foo'), 1)], 3)];
        $this->traverser = new \Typo3RectorPrefix20210412\Helmich\TypoScriptParser\Parser\Traverser\Traverser($this->tree);
    }
    public function testHookFunctionsAreCalled()
    {
        $visitor = $this->prophesize(\Typo3RectorPrefix20210412\Helmich\TypoScriptParser\Parser\Traverser\Visitor::class);
        $visitor->enterTree($this->tree)->shouldBeCalled();
        $visitor->exitTree($this->tree)->shouldBeCalled();
        $visitor->enterNode($this->tree[0])->shouldBeCalled();
        $visitor->enterNode($this->tree[1])->shouldBeCalled();
        $visitor->enterNode($this->tree[1]->ifStatements[0])->shouldBeCalled();
        $visitor->enterNode($this->tree[1]->elseStatements[0])->shouldBeCalled();
        $visitor->enterNode($this->tree[2])->shouldBeCalled();
        $visitor->enterNode($this->tree[2]->statements[0])->shouldBeCalled();
        $visitor->exitNode($this->tree[0])->shouldBeCalled();
        $visitor->exitNode($this->tree[1])->shouldBeCalled();
        $visitor->exitNode($this->tree[1]->ifStatements[0])->shouldBeCalled();
        $visitor->exitNode($this->tree[1]->elseStatements[0])->shouldBeCalled();
        $visitor->exitNode($this->tree[2])->shouldBeCalled();
        $visitor->exitNode($this->tree[2]->statements[0])->shouldBeCalled();
        $this->traverser->addVisitor($visitor->reveal());
        $this->traverser->walk();
    }
}
