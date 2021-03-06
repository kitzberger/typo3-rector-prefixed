<?php

declare (strict_types=1);
namespace Rector\Tests\BetterPhpDocParser\PhpDocParser\StaticDoctrineAnnotationParser;

use Iterator;
use Rector\BetterPhpDocParser\PhpDocInfo\TokenIteratorFactory;
use Rector\BetterPhpDocParser\PhpDocParser\StaticDoctrineAnnotationParser;
use Rector\BetterPhpDocParser\ValueObject\PhpDoc\DoctrineAnnotation\CurlyListNode;
use Rector\Testing\PHPUnit\AbstractTestCase;
final class StaticDoctrineAnnotationParserTest extends \Rector\Testing\PHPUnit\AbstractTestCase
{
    /**
     * @var StaticDoctrineAnnotationParser
     */
    private $staticDoctrineAnnotationParser;
    /**
     * @var TokenIteratorFactory
     */
    private $tokenIteratorFactory;
    protected function setUp() : void
    {
        $this->boot();
        $this->tokenIteratorFactory = $this->getService(\Rector\BetterPhpDocParser\PhpDocInfo\TokenIteratorFactory::class);
        $this->staticDoctrineAnnotationParser = $this->getService(\Rector\BetterPhpDocParser\PhpDocParser\StaticDoctrineAnnotationParser::class);
    }
    /**
     * @dataProvider provideData()
     * @param mixed $expectedValue
     */
    public function test(string $docContent, $expectedValue) : void
    {
        $betterTokenIterator = $this->tokenIteratorFactory->create($docContent);
        $value = $this->staticDoctrineAnnotationParser->resolveAnnotationValue($betterTokenIterator);
        // "equals" on purpose to compare 2 object with same content
        $this->assertEquals($expectedValue, $value);
    }
    public function provideData() : \Iterator
    {
        $curlyListNode = new \Rector\BetterPhpDocParser\ValueObject\PhpDoc\DoctrineAnnotation\CurlyListNode(['"chalet"', '"apartment"']);
        (yield ['{"chalet", "apartment"}', $curlyListNode]);
        (yield ['key={"chalet", "apartment"}', ['key' => $curlyListNode]]);
    }
}
