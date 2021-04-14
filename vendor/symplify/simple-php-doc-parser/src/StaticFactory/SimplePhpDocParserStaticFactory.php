<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210414\Symplify\SimplePhpDocParser\StaticFactory;

use PHPStan\PhpDocParser\Lexer\Lexer;
use PHPStan\PhpDocParser\Parser\ConstExprParser;
use PHPStan\PhpDocParser\Parser\PhpDocParser;
use PHPStan\PhpDocParser\Parser\TypeParser;
use Typo3RectorPrefix20210414\Symplify\SimplePhpDocParser\SimplePhpDocParser;
final class SimplePhpDocParserStaticFactory
{
    public static function create() : \Typo3RectorPrefix20210414\Symplify\SimplePhpDocParser\SimplePhpDocParser
    {
        $phpDocParser = new \PHPStan\PhpDocParser\Parser\PhpDocParser(new \PHPStan\PhpDocParser\Parser\TypeParser(), new \PHPStan\PhpDocParser\Parser\ConstExprParser());
        return new \Typo3RectorPrefix20210414\Symplify\SimplePhpDocParser\SimplePhpDocParser($phpDocParser, new \PHPStan\PhpDocParser\Lexer\Lexer());
    }
}
