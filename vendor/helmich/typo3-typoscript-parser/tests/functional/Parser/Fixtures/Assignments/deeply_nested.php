<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

return [new \Typo3RectorPrefix20210423\Helmich\TypoScriptParser\Parser\AST\NestedAssignment(new \Typo3RectorPrefix20210423\Helmich\TypoScriptParser\Parser\AST\ObjectPath('foo', 'foo'), [new \Typo3RectorPrefix20210423\Helmich\TypoScriptParser\Parser\AST\NestedAssignment(new \Typo3RectorPrefix20210423\Helmich\TypoScriptParser\Parser\AST\ObjectPath('foo.bar', 'bar'), [new \Typo3RectorPrefix20210423\Helmich\TypoScriptParser\Parser\AST\Operator\Assignment(new \Typo3RectorPrefix20210423\Helmich\TypoScriptParser\Parser\AST\ObjectPath('foo.bar.baz', 'baz'), new \Typo3RectorPrefix20210423\Helmich\TypoScriptParser\Parser\AST\Scalar('1'), 3)], 2)], 1)];
