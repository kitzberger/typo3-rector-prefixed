<?php

declare (strict_types=1);
namespace Rector\Tests\BetterPhpDocParser\PhpDocParser\StaticDoctrineAnnotationParser;

use Iterator;
use Rector\BetterPhpDocParser\PhpDocInfo\TokenIteratorFactory;
use Rector\BetterPhpDocParser\PhpDocParser\StaticDoctrineAnnotationParser\ArrayParser;
use Rector\Testing\PHPUnit\AbstractTestCase;
final class ArrayParserTest extends \Rector\Testing\PHPUnit\AbstractTestCase
{
    /**
     * @var ArrayParser
     */
    private $arrayParser;
    /**
     * @var TokenIteratorFactory
     */
    private $tokenIteratorFactory;
    protected function setUp() : void
    {
        $this->boot();
        $this->arrayParser = $this->getService(\Rector\BetterPhpDocParser\PhpDocParser\StaticDoctrineAnnotationParser\ArrayParser::class);
        $this->tokenIteratorFactory = $this->getService(\Rector\BetterPhpDocParser\PhpDocInfo\TokenIteratorFactory::class);
    }
    /**
     * @dataProvider provideData()
     * @param array<string, string>|string[] $expectedArray
     */
    public function test(string $docContent, array $expectedArray) : void
    {
        $betterTokenIterator = $this->tokenIteratorFactory->create($docContent);
        $array = $this->arrayParser->parseCurlyArray($betterTokenIterator);
        $this->assertSame($expectedArray, $array);
    }
    public function provideData() : \Iterator
    {
        (yield ['{key: "value"}', ['key' => '"value"']]);
        (yield ['{"key": "value"}', ['"key"' => '"value"']]);
        (yield ['{"value", "value2"}', ['"value"', '"value2"']]);
    }
}
