<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210421;

use Typo3RectorPrefix20210421\Helmich\TypoScriptParser\Parser\AST\ObjectPath;
use Typo3RectorPrefix20210421\Helmich\TypoScriptParser\Parser\AST\Operator\Assignment;
use Typo3RectorPrefix20210421\Helmich\TypoScriptParser\Parser\AST\Scalar;
return [new \Typo3RectorPrefix20210421\Helmich\TypoScriptParser\Parser\AST\Operator\Assignment(new \Typo3RectorPrefix20210421\Helmich\TypoScriptParser\Parser\AST\ObjectPath('{$foo}', '{$foo}'), new \Typo3RectorPrefix20210421\Helmich\TypoScriptParser\Parser\AST\Scalar('bar'), 1)];
