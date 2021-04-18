<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210418\Helmich\TypoScriptParser\Tests\Unit\Parser\AST;

use Typo3RectorPrefix20210418\Helmich\TypoScriptParser\Parser\AST\ObjectPath;
use Typo3RectorPrefix20210418\PHPUnit\Framework\TestCase;
class ObjectPathTest extends \Typo3RectorPrefix20210418\PHPUnit\Framework\TestCase
{
    public function testPathsRemainStrings()
    {
        $op = new \Typo3RectorPrefix20210418\Helmich\TypoScriptParser\Parser\AST\ObjectPath("foo.0", "0");
        assertThat($op->relativeName, identicalTo("0"));
    }
    public function testIntPathsRaisesTypeError()
    {
        $this->expectException(\TypeError::class);
        new \Typo3RectorPrefix20210418\Helmich\TypoScriptParser\Parser\AST\ObjectPath("foo.0", 0);
    }
}
