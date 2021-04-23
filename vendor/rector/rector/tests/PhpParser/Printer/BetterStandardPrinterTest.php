<?php

declare (strict_types=1);
namespace Rector\Core\Tests\PhpParser\Printer;

use Iterator;
use PhpParser\Comment;
use PhpParser\Node\Expr\MethodCall;
use PhpParser\Node\Expr\Variable;
use PhpParser\Node\Expr\Yield_;
use PhpParser\Node\Scalar\String_;
use PhpParser\Node\Stmt\Expression;
use Rector\Core\PhpParser\Printer\BetterStandardPrinter;
use Rector\NodeTypeResolver\Node\AttributeKey;
use Rector\Testing\PHPUnit\AbstractTestCase;
use Typo3RectorPrefix20210423\Symplify\Astral\ValueObject\NodeBuilder\MethodBuilder;
final class BetterStandardPrinterTest extends \Rector\Testing\PHPUnit\AbstractTestCase
{
    /**
     * @var BetterStandardPrinter
     */
    private $betterStandardPrinter;
    protected function setUp() : void
    {
        $this->boot();
        $this->betterStandardPrinter = $this->getService(\Rector\Core\PhpParser\Printer\BetterStandardPrinter::class);
    }
    public function testAddingCommentOnSomeNodesFail() : void
    {
        $methodCall = new \PhpParser\Node\Expr\MethodCall(new \PhpParser\Node\Expr\Variable('this'), 'run');
        // cannot be on MethodCall, must be Expression
        $methodCallExpression = new \PhpParser\Node\Stmt\Expression($methodCall);
        $methodCallExpression->setAttribute(\Rector\NodeTypeResolver\Node\AttributeKey::COMMENTS, [new \PhpParser\Comment('// todo: fix')]);
        $methodBuilder = new \Typo3RectorPrefix20210423\Symplify\Astral\ValueObject\NodeBuilder\MethodBuilder('run');
        $methodBuilder->addStmt($methodCallExpression);
        $classMethod = $methodBuilder->getNode();
        $printed = $this->betterStandardPrinter->print($classMethod) . \PHP_EOL;
        $this->assertStringEqualsFile(__DIR__ . '/Source/expected_code_with_non_stmt_placed_nested_comment.php.inc', $printed);
    }
    public function testStringWithAddedComment() : void
    {
        $string = new \PhpParser\Node\Scalar\String_('hey');
        $string->setAttribute(\Rector\NodeTypeResolver\Node\AttributeKey::COMMENTS, [new \PhpParser\Comment('// todo: fix')]);
        $printed = $this->betterStandardPrinter->print($string) . \PHP_EOL;
        $this->assertStringEqualsFile(__DIR__ . '/Source/expected_code_with_comment.php.inc', $printed);
    }
    /**
     * @dataProvider provideDataForDoubleSlashEscaping()
     */
    public function testDoubleSlashEscaping(string $content, string $expectedOutput) : void
    {
        $printed = $this->betterStandardPrinter->print(new \PhpParser\Node\Scalar\String_($content));
        $this->assertSame($expectedOutput, $printed);
    }
    public function provideDataForDoubleSlashEscaping() : \Iterator
    {
        (yield ['Vendor\\Name', "'Vendor\\Name'"]);
        (yield ['Vendor\\', "'Vendor\\\\'"]);
        (yield ["Vendor'Name", "'Vendor\\'Name'"]);
    }
    public function testYield() : void
    {
        $yield = new \PhpParser\Node\Expr\Yield_(new \PhpParser\Node\Scalar\String_('value'));
        $printed = $this->betterStandardPrinter->print($yield);
        $this->assertSame("(yield 'value')", $printed);
        $printed = $this->betterStandardPrinter->print(new \PhpParser\Node\Expr\Yield_());
        $this->assertSame('yield', $printed);
        $expression = new \PhpParser\Node\Stmt\Expression($yield);
        $yield->setAttribute(\Rector\NodeTypeResolver\Node\AttributeKey::PARENT_NODE, $expression);
        $printed = $this->betterStandardPrinter->print($expression);
        $this->assertSame("yield 'value';", $printed);
    }
}
