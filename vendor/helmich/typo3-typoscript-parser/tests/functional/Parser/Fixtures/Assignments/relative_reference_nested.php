<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210409;

return [new \Typo3RectorPrefix20210409\Helmich\TypoScriptParser\Parser\AST\NestedAssignment(new \Typo3RectorPrefix20210409\Helmich\TypoScriptParser\Parser\AST\ObjectPath('foo', 'foo'), [new \Typo3RectorPrefix20210409\Helmich\TypoScriptParser\Parser\AST\Operator\Assignment(new \Typo3RectorPrefix20210409\Helmich\TypoScriptParser\Parser\AST\ObjectPath('foo.bar', 'bar'), new \Typo3RectorPrefix20210409\Helmich\TypoScriptParser\Parser\AST\Scalar('baz'), 2), new \Typo3RectorPrefix20210409\Helmich\TypoScriptParser\Parser\AST\Operator\Reference(new \Typo3RectorPrefix20210409\Helmich\TypoScriptParser\Parser\AST\ObjectPath('foo.baz', 'baz'), new \Typo3RectorPrefix20210409\Helmich\TypoScriptParser\Parser\AST\ObjectPath('foo.bar', '.bar'), 3)], 1)];
