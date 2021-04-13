<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210413;

return [new \Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Parser\AST\ConditionalStatement('[globalVar = GP:foo=1]', [new \Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Parser\AST\Operator\Assignment(new \Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Parser\AST\ObjectPath('foo', 'foo'), new \Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Parser\AST\Scalar('bar'), 2)], [], 1), new \Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Parser\AST\ConditionalStatement('[globalVar = GP:foo=2]', [new \Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Parser\AST\Operator\Assignment(new \Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Parser\AST\ObjectPath('foo', 'foo'), new \Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Parser\AST\Scalar('bar2'), 4)], [new \Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Parser\AST\Operator\Assignment(new \Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Parser\AST\ObjectPath('foo', 'foo'), new \Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Parser\AST\Scalar('baz'), 6)], 3)];
