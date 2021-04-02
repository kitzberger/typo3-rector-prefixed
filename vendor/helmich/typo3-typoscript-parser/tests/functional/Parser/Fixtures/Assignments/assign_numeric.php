<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210402;

return [new \Typo3RectorPrefix20210402\Helmich\TypoScriptParser\Parser\AST\NestedAssignment(new \Typo3RectorPrefix20210402\Helmich\TypoScriptParser\Parser\AST\ObjectPath("foo", "foo"), [new \Typo3RectorPrefix20210402\Helmich\TypoScriptParser\Parser\AST\Operator\Assignment(new \Typo3RectorPrefix20210402\Helmich\TypoScriptParser\Parser\AST\ObjectPath("foo.0", "0"), new \Typo3RectorPrefix20210402\Helmich\TypoScriptParser\Parser\AST\Scalar("hello"), 2), new \Typo3RectorPrefix20210402\Helmich\TypoScriptParser\Parser\AST\Operator\Assignment(new \Typo3RectorPrefix20210402\Helmich\TypoScriptParser\Parser\AST\ObjectPath("foo.1", "1"), new \Typo3RectorPrefix20210402\Helmich\TypoScriptParser\Parser\AST\Scalar("world"), 3)], 1)];
