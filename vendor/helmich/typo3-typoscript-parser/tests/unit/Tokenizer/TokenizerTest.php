<?php

namespace Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Tests\Unit\Tokenizer;

use Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Tokenizer\Token;
use Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Tokenizer\Tokenizer;
use Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Tokenizer\TokenizerException;
use Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Tokenizer\TokenizerInterface;
use Typo3RectorPrefix20210413\PHPUnit\Framework\TestCase;
use Typo3RectorPrefix20210413\VirtualFileSystem\FileSystem;
class TokenizerTest extends \Typo3RectorPrefix20210413\PHPUnit\Framework\TestCase
{
    /** @var TokenizerInterface */
    private $tokenizer;
    public function setUp() : void
    {
        $this->tokenizer = new \Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Tokenizer\Tokenizer();
    }
    public function dataValidForTokenizer()
    {
        return [
            "assignment" => ["foo = bar", [new \Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Tokenizer\Token(\Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Tokenizer\Token::TYPE_OBJECT_IDENTIFIER, "foo", 1, 1), new \Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Tokenizer\Token(\Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Tokenizer\Token::TYPE_WHITESPACE, " ", 1, 4), new \Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Tokenizer\Token(\Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Tokenizer\Token::TYPE_OPERATOR_ASSIGNMENT, "=", 1, 5), new \Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Tokenizer\Token(\Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Tokenizer\Token::TYPE_WHITESPACE, " ", 1, 6), new \Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Tokenizer\Token(\Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Tokenizer\Token::TYPE_RIGHTVALUE, "bar", 1, 7)]],
            // assert that trailing whitespaces are simply ignored
            "assignment with trailing whitespace" => ["foo = bar ", [new \Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Tokenizer\Token(\Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Tokenizer\Token::TYPE_OBJECT_IDENTIFIER, "foo", 1, 1), new \Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Tokenizer\Token(\Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Tokenizer\Token::TYPE_WHITESPACE, " ", 1, 4), new \Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Tokenizer\Token(\Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Tokenizer\Token::TYPE_OPERATOR_ASSIGNMENT, "=", 1, 5), new \Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Tokenizer\Token(\Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Tokenizer\Token::TYPE_WHITESPACE, " ", 1, 6), new \Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Tokenizer\Token(\Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Tokenizer\Token::TYPE_RIGHTVALUE, "bar", 1, 7)]],
            "nested assignment" => ["foo.bar = baz", [new \Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Tokenizer\Token(\Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Tokenizer\Token::TYPE_OBJECT_IDENTIFIER, "foo.bar", 1, 1), new \Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Tokenizer\Token(\Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Tokenizer\Token::TYPE_WHITESPACE, " ", 1, 8), new \Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Tokenizer\Token(\Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Tokenizer\Token::TYPE_OPERATOR_ASSIGNMENT, "=", 1, 9), new \Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Tokenizer\Token(\Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Tokenizer\Token::TYPE_WHITESPACE, " ", 1, 10), new \Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Tokenizer\Token(\Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Tokenizer\Token::TYPE_RIGHTVALUE, "baz", 1, 11)]],
            "double-nested assignment" => ["foo.bar.baz = baz", [new \Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Tokenizer\Token(\Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Tokenizer\Token::TYPE_OBJECT_IDENTIFIER, "foo.bar.baz", 1, 1), new \Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Tokenizer\Token(\Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Tokenizer\Token::TYPE_WHITESPACE, " ", 1, 12), new \Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Tokenizer\Token(\Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Tokenizer\Token::TYPE_OPERATOR_ASSIGNMENT, "=", 1, 13), new \Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Tokenizer\Token(\Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Tokenizer\Token::TYPE_WHITESPACE, " ", 1, 14), new \Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Tokenizer\Token(\Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Tokenizer\Token::TYPE_RIGHTVALUE, "baz", 1, 15)]],
            "reference assignment" => ["foo =< bar", [new \Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Tokenizer\Token(\Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Tokenizer\Token::TYPE_OBJECT_IDENTIFIER, "foo", 1, 1), new \Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Tokenizer\Token(\Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Tokenizer\Token::TYPE_WHITESPACE, " ", 1, 4), new \Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Tokenizer\Token(\Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Tokenizer\Token::TYPE_OPERATOR_REFERENCE, "=<", 1, 5), new \Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Tokenizer\Token(\Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Tokenizer\Token::TYPE_WHITESPACE, " ", 1, 7), new \Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Tokenizer\Token(\Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Tokenizer\Token::TYPE_OBJECT_IDENTIFIER, "bar", 1, 8)]],
            "deletion with comment" => ["foo > # Something", [new \Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Tokenizer\Token(\Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Tokenizer\Token::TYPE_OBJECT_IDENTIFIER, "foo", 1, 1), new \Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Tokenizer\Token(\Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Tokenizer\Token::TYPE_WHITESPACE, " ", 1, 4), new \Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Tokenizer\Token(\Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Tokenizer\Token::TYPE_OPERATOR_DELETE, ">", 1, 5), new \Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Tokenizer\Token(\Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Tokenizer\Token::TYPE_WHITESPACE, " ", 1, 6), new \Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Tokenizer\Token(\Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Tokenizer\Token::TYPE_COMMENT_ONELINE, "# Something", 1, 7)]],
            // https://github.com/martin-helmich/typo3-typoscript-parser/issues/58
            // https://github.com/martin-helmich/typo3-typoscript-parser/issues/50
            "modification with brace" => ["foo := addToList(bar())", [new \Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Tokenizer\Token(\Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Tokenizer\Token::TYPE_OBJECT_IDENTIFIER, "foo", 1, 1), new \Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Tokenizer\Token(\Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Tokenizer\Token::TYPE_WHITESPACE, " ", 1, 4), new \Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Tokenizer\Token(\Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Tokenizer\Token::TYPE_OPERATOR_MODIFY, ":=", 1, 5), new \Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Tokenizer\Token(\Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Tokenizer\Token::TYPE_WHITESPACE, " ", 1, 7), new \Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Tokenizer\Token(\Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Tokenizer\Token::TYPE_OBJECT_MODIFIER, "addToList(bar())", 1, 8, [0 => 'addToList(bar())', 'name' => 'addToList', 1 => 'addToList', 'arguments' => 'bar()', 2 => 'bar()'])]],
            "include file, old syntax" => ["<INCLUDE_TYPOSCRIPT: source=\"FILE:EXT:foo/Configuration/TypoScript/setup.typoscript\">", [new \Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Tokenizer\Token(\Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Tokenizer\Token::TYPE_INCLUDE, "<INCLUDE_TYPOSCRIPT: source=\"FILE:EXT:foo/Configuration/TypoScript/setup.typoscript\">", 1, 1, [0 => "<INCLUDE_TYPOSCRIPT: source=\"FILE:EXT:foo/Configuration/TypoScript/setup.typoscript\">", 'type' => 'FILE', 1 => 'FILE', 'filename' => 'EXT:foo/Configuration/TypoScript/setup.typoscript', 2 => 'EXT:foo/Configuration/TypoScript/setup.typoscript', 'optional' => '', 3 => ''])]],
            // https://github.com/martin-helmich/typo3-typoscript-parser/issues/30
            "include file, old syntax, no space" => ["<INCLUDE_TYPOSCRIPT:source=\"FILE:EXT:foo/Configuration/TypoScript/setup.typoscript\">", [new \Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Tokenizer\Token(\Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Tokenizer\Token::TYPE_INCLUDE, "<INCLUDE_TYPOSCRIPT:source=\"FILE:EXT:foo/Configuration/TypoScript/setup.typoscript\">", 1, 1, [0 => "<INCLUDE_TYPOSCRIPT:source=\"FILE:EXT:foo/Configuration/TypoScript/setup.typoscript\">", 'type' => 'FILE', 1 => 'FILE', 'filename' => 'EXT:foo/Configuration/TypoScript/setup.typoscript', 2 => 'EXT:foo/Configuration/TypoScript/setup.typoscript', 'optional' => '', 3 => ''])]],
            // https://github.com/martin-helmich/typo3-typoscript-lint/issues/63
            "include file, old syntax, with extensions" => ["<INCLUDE_TYPOSCRIPT:source=\"FILE:EXT:foo/Configuration/TypoScript/setup.typoscript\" extensions=\"typoscript\">", [new \Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Tokenizer\Token(\Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Tokenizer\Token::TYPE_INCLUDE, "<INCLUDE_TYPOSCRIPT:source=\"FILE:EXT:foo/Configuration/TypoScript/setup.typoscript\" extensions=\"typoscript\">", 1, 1, [0 => "<INCLUDE_TYPOSCRIPT:source=\"FILE:EXT:foo/Configuration/TypoScript/setup.typoscript\" extensions=\"typoscript\">", 'type' => 'FILE', 1 => 'FILE', 'filename' => 'EXT:foo/Configuration/TypoScript/setup.typoscript', 2 => 'EXT:foo/Configuration/TypoScript/setup.typoscript', 'optional' => 'extensions="typoscript"', 3 => 'extensions="typoscript"'])]],
            // https://github.com/martin-helmich/typo3-typoscript-lint/issues/63
            "include file, old syntax, with condition" => ["<INCLUDE_TYPOSCRIPT:source=\"FILE:EXT:foo/Configuration/TypoScript/setup.typoscript\" condition=\"YourVendor\\YourPackage\\YourCondition\">", [new \Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Tokenizer\Token(\Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Tokenizer\Token::TYPE_INCLUDE, "<INCLUDE_TYPOSCRIPT:source=\"FILE:EXT:foo/Configuration/TypoScript/setup.typoscript\" condition=\"YourVendor\\YourPackage\\YourCondition\">", 1, 1, [0 => "<INCLUDE_TYPOSCRIPT:source=\"FILE:EXT:foo/Configuration/TypoScript/setup.typoscript\" condition=\"YourVendor\\YourPackage\\YourCondition\">", 'type' => 'FILE', 1 => 'FILE', 'filename' => 'EXT:foo/Configuration/TypoScript/setup.typoscript', 2 => 'EXT:foo/Configuration/TypoScript/setup.typoscript', 'optional' => 'condition="YourVendor\\YourPackage\\YourCondition"', 3 => 'condition="YourVendor\\YourPackage\\YourCondition"'])]],
            // https://github.com/martin-helmich/typo3-typoscript-lint/issues/63
            "include file, old syntax, with extensions and conditions" => ["<INCLUDE_TYPOSCRIPT:source=\"FILE:EXT:foo/Configuration/TypoScript/setup.typoscript\" extensions=\"typoscript\" condition=\"YourVendor\\YourPackage\\YourCondition\">", [new \Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Tokenizer\Token(\Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Tokenizer\Token::TYPE_INCLUDE, "<INCLUDE_TYPOSCRIPT:source=\"FILE:EXT:foo/Configuration/TypoScript/setup.typoscript\" extensions=\"typoscript\" condition=\"YourVendor\\YourPackage\\YourCondition\">", 1, 1, [0 => "<INCLUDE_TYPOSCRIPT:source=\"FILE:EXT:foo/Configuration/TypoScript/setup.typoscript\" extensions=\"typoscript\" condition=\"YourVendor\\YourPackage\\YourCondition\">", 'type' => 'FILE', 1 => 'FILE', 'filename' => 'EXT:foo/Configuration/TypoScript/setup.typoscript', 2 => 'EXT:foo/Configuration/TypoScript/setup.typoscript', 'optional' => 'extensions="typoscript" condition="YourVendor\\YourPackage\\YourCondition"', 3 => 'extensions="typoscript" condition="YourVendor\\YourPackage\\YourCondition"'])]],
            "include file, new syntax, single quotes" => ["@import 'EXT:foo/Configuration/TypoScript/setup.typoscript'", [new \Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Tokenizer\Token(\Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Tokenizer\Token::TYPE_INCLUDE_NEW, "@import 'EXT:foo/Configuration/TypoScript/setup.typoscript'", 1, 1, [0 => "@import 'EXT:foo/Configuration/TypoScript/setup.typoscript'", 'filename' => 'EXT:foo/Configuration/TypoScript/setup.typoscript', 1 => 'EXT:foo/Configuration/TypoScript/setup.typoscript'])]],
            // https://github.com/martin-helmich/typo3-typoscript-lint/issues/89
            "include file, new syntax, double quotes" => ["@import \"EXT:foo/Configuration/TypoScript/setup.typoscript\"", [new \Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Tokenizer\Token(\Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Tokenizer\Token::TYPE_INCLUDE_NEW, "@import \"EXT:foo/Configuration/TypoScript/setup.typoscript\"", 1, 1, [0 => "@import \"EXT:foo/Configuration/TypoScript/setup.typoscript\"", 'filename' => 'EXT:foo/Configuration/TypoScript/setup.typoscript', 1 => 'EXT:foo/Configuration/TypoScript/setup.typoscript'])]],
            "condition, old syntax" => ["[globalVar = GP:L = 1]", [new \Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Tokenizer\Token(\Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Tokenizer\Token::TYPE_CONDITION, "[globalVar = GP:L = 1]", 1, 1, [0 => "[globalVar = GP:L = 1]", 1 => "[globalVar = GP:L = 1]", 2 => 'globalVar = GP:L = 1', 'expr' => 'globalVar = GP:L = 1', 3 => ''])]],
            "condition, Symfony expression #1" => ['[siteLanguage("languageId") == "1"]', [new \Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Tokenizer\Token(\Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Tokenizer\Token::TYPE_CONDITION, '[siteLanguage("languageId") == "1"]', 1, 1, [0 => '[siteLanguage("languageId") == "1"]', 1 => '[siteLanguage("languageId") == "1"]', 2 => 'siteLanguage("languageId") == "1"', 'expr' => 'siteLanguage("languageId") == "1"', 3 => ''])]],
            "condition, Symfony expression #2" => ['[1 in tree.rootLineIds]', [new \Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Tokenizer\Token(\Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Tokenizer\Token::TYPE_CONDITION, '[1 in tree.rootLineIds]', 1, 1, [0 => '[1 in tree.rootLineIds]', 1 => '[1 in tree.rootLineIds]', 2 => '1 in tree.rootLineIds', 'expr' => '1 in tree.rootLineIds', 3 => ''])]],
        ];
    }
    public function dataInvalidForTokenizer()
    {
        return ["unterminated multiline assignment" => ["a (\nasdf"], "unterminated block comment" => ["/*\nhello world"], "invalid operator !=" => ["foo != bar"], "invalid operator *=" => ["foo *= bar"]];
    }
    /**
     * @param $inputText
     * @param $expectedTokenStream
     * @dataProvider dataValidForTokenizer
     */
    public function testInputTextIsCorrectlyTokenized($inputText, $expectedTokenStream)
    {
        $tokenStream = $this->tokenizer->tokenizeString($inputText);
        assertThat($tokenStream, equalTo($expectedTokenStream));
    }
    /**
     * @param $inputText
     * @param $expectedTokenStream
     * @dataProvider dataValidForTokenizer
     */
    public function testInputStreamIsCorrectlyTokenized($inputText, $expectedTokenStream)
    {
        $fs = new \Typo3RectorPrefix20210413\VirtualFileSystem\FileSystem();
        $fs->createFile('/test.typoscript', $inputText);
        $tokenStream = $this->tokenizer->tokenizeStream($fs->path('/test.typoscript'));
        assertThat($tokenStream, equalTo($expectedTokenStream));
    }
    /**
     * @param $inputText
     * @dataProvider dataInvalidForTokenizer
     */
    public function testInvalidInputTestThrowsTokenizerError($inputText)
    {
        $this->expectException(\Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Tokenizer\TokenizerException::class);
        $this->tokenizer->tokenizeString($inputText);
    }
}
