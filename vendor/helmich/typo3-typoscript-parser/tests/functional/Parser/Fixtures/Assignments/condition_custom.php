<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210401;

use Typo3RectorPrefix20210401\Helmich\TypoScriptParser\Parser\AST\ConditionalStatement;
use Typo3RectorPrefix20210401\Helmich\TypoScriptParser\Parser\AST\ObjectPath;
use Typo3RectorPrefix20210401\Helmich\TypoScriptParser\Parser\AST\Operator\Assignment;
use Typo3RectorPrefix20210401\Helmich\TypoScriptParser\Parser\AST\Scalar;
return [new \Typo3RectorPrefix20210401\Helmich\TypoScriptParser\Parser\AST\ConditionalStatement('[Foo\\Bar\\Custom = 42]', [new \Typo3RectorPrefix20210401\Helmich\TypoScriptParser\Parser\AST\Operator\Assignment(new \Typo3RectorPrefix20210401\Helmich\TypoScriptParser\Parser\AST\ObjectPath('foo', 'foo'), new \Typo3RectorPrefix20210401\Helmich\TypoScriptParser\Parser\AST\Scalar('bar'), 2)], [], 1)];
