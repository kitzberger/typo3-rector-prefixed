<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210330;

return [new \Typo3RectorPrefix20210330\Helmich\TypoScriptParser\Parser\AST\MultilineComment('/*
Hello
World
*/', 1), new \Typo3RectorPrefix20210330\Helmich\TypoScriptParser\Parser\AST\Operator\Assignment(new \Typo3RectorPrefix20210330\Helmich\TypoScriptParser\Parser\AST\ObjectPath('foo', 'foo'), new \Typo3RectorPrefix20210330\Helmich\TypoScriptParser\Parser\AST\Scalar('bar'), 5)];
