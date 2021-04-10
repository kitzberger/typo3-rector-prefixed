<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210410;

return [new \Typo3RectorPrefix20210410\Helmich\TypoScriptParser\Parser\AST\ConditionalStatement('[globalVar = GP:foo=1]', [new \Typo3RectorPrefix20210410\Helmich\TypoScriptParser\Parser\AST\NestedAssignment(new \Typo3RectorPrefix20210410\Helmich\TypoScriptParser\Parser\AST\ObjectPath('foo', 'foo'), [new \Typo3RectorPrefix20210410\Helmich\TypoScriptParser\Parser\AST\Operator\Assignment(new \Typo3RectorPrefix20210410\Helmich\TypoScriptParser\Parser\AST\ObjectPath('foo.bar', 'bar'), new \Typo3RectorPrefix20210410\Helmich\TypoScriptParser\Parser\AST\Scalar('1'), 3)], 2), new \Typo3RectorPrefix20210410\Helmich\TypoScriptParser\Parser\AST\MultilineComment('/*
Hello
World
*/', 5)], [new \Typo3RectorPrefix20210410\Helmich\TypoScriptParser\Parser\AST\MultilineComment('/*
Hello
World
*/', 10), new \Typo3RectorPrefix20210410\Helmich\TypoScriptParser\Parser\AST\NestedAssignment(new \Typo3RectorPrefix20210410\Helmich\TypoScriptParser\Parser\AST\ObjectPath('foo', 'foo'), [new \Typo3RectorPrefix20210410\Helmich\TypoScriptParser\Parser\AST\Operator\Assignment(new \Typo3RectorPrefix20210410\Helmich\TypoScriptParser\Parser\AST\ObjectPath('foo.bar', 'bar'), new \Typo3RectorPrefix20210410\Helmich\TypoScriptParser\Parser\AST\Scalar('2'), 15)], 14)], 1)];
