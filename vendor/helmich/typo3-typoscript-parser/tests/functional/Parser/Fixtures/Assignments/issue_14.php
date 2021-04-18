<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210418;

use Typo3RectorPrefix20210418\Helmich\TypoScriptParser\Parser\AST\NestedAssignment;
use Typo3RectorPrefix20210418\Helmich\TypoScriptParser\Parser\AST\ObjectPath;
use Typo3RectorPrefix20210418\Helmich\TypoScriptParser\Parser\AST\Operator\Assignment;
use Typo3RectorPrefix20210418\Helmich\TypoScriptParser\Parser\AST\Operator\ObjectCreation;
use Typo3RectorPrefix20210418\Helmich\TypoScriptParser\Parser\AST\Scalar;
return [new \Typo3RectorPrefix20210418\Helmich\TypoScriptParser\Parser\AST\NestedAssignment(new \Typo3RectorPrefix20210418\Helmich\TypoScriptParser\Parser\AST\ObjectPath('page', 'page'), [new \Typo3RectorPrefix20210418\Helmich\TypoScriptParser\Parser\AST\NestedAssignment(new \Typo3RectorPrefix20210418\Helmich\TypoScriptParser\Parser\AST\ObjectPath('page.meta', 'meta'), [new \Typo3RectorPrefix20210418\Helmich\TypoScriptParser\Parser\AST\Operator\ObjectCreation(new \Typo3RectorPrefix20210418\Helmich\TypoScriptParser\Parser\AST\ObjectPath('page.meta.foo:bar.cObject', 'foo:bar.cObject'), new \Typo3RectorPrefix20210418\Helmich\TypoScriptParser\Parser\AST\Scalar("TEXT"), 3), new \Typo3RectorPrefix20210418\Helmich\TypoScriptParser\Parser\AST\Operator\Assignment(new \Typo3RectorPrefix20210418\Helmich\TypoScriptParser\Parser\AST\ObjectPath('page.meta.foo:bar.cObject.value', 'foo:bar.cObject.value'), new \Typo3RectorPrefix20210418\Helmich\TypoScriptParser\Parser\AST\Scalar("qux"), 4)], 2)], 1)];
