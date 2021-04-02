<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210402;

use Typo3RectorPrefix20210402\Helmich\TypoScriptParser\Parser\AST\NestedAssignment;
use Typo3RectorPrefix20210402\Helmich\TypoScriptParser\Parser\AST\ObjectPath;
use Typo3RectorPrefix20210402\Helmich\TypoScriptParser\Parser\AST\Operator\Assignment;
use Typo3RectorPrefix20210402\Helmich\TypoScriptParser\Parser\AST\Operator\ObjectCreation;
use Typo3RectorPrefix20210402\Helmich\TypoScriptParser\Parser\AST\Scalar;
return [new \Typo3RectorPrefix20210402\Helmich\TypoScriptParser\Parser\AST\NestedAssignment(new \Typo3RectorPrefix20210402\Helmich\TypoScriptParser\Parser\AST\ObjectPath('page', 'page'), [new \Typo3RectorPrefix20210402\Helmich\TypoScriptParser\Parser\AST\Operator\ObjectCreation(new \Typo3RectorPrefix20210402\Helmich\TypoScriptParser\Parser\AST\ObjectPath('page.20', '20'), new \Typo3RectorPrefix20210402\Helmich\TypoScriptParser\Parser\AST\Scalar('USER'), 2), new \Typo3RectorPrefix20210402\Helmich\TypoScriptParser\Parser\AST\NestedAssignment(new \Typo3RectorPrefix20210402\Helmich\TypoScriptParser\Parser\AST\ObjectPath('page.20', '20'), [new \Typo3RectorPrefix20210402\Helmich\TypoScriptParser\Parser\AST\Operator\Assignment(new \Typo3RectorPrefix20210402\Helmich\TypoScriptParser\Parser\AST\ObjectPath('page.20.userFunc', 'userFunc'), new \Typo3RectorPrefix20210402\Helmich\TypoScriptParser\Parser\AST\Scalar('TYPO3\\CMS\\Extbase\\Core\\Bootstrap->run'), 4), new \Typo3RectorPrefix20210402\Helmich\TypoScriptParser\Parser\AST\NestedAssignment(new \Typo3RectorPrefix20210402\Helmich\TypoScriptParser\Parser\AST\ObjectPath('page.20.switchableControllerActions', 'switchableControllerActions'), [new \Typo3RectorPrefix20210402\Helmich\TypoScriptParser\Parser\AST\NestedAssignment(new \Typo3RectorPrefix20210402\Helmich\TypoScriptParser\Parser\AST\ObjectPath('page.20.switchableControllerActions.{$plugin.tx_foo.settings.bar.controllerName}', '{$plugin.tx_foo.settings.bar.controllerName}'), [new \Typo3RectorPrefix20210402\Helmich\TypoScriptParser\Parser\AST\Operator\Assignment(new \Typo3RectorPrefix20210402\Helmich\TypoScriptParser\Parser\AST\ObjectPath('page.20.switchableControllerActions.{$plugin.tx_foo.settings.bar.controllerName}.1', '1'), new \Typo3RectorPrefix20210402\Helmich\TypoScriptParser\Parser\AST\Scalar('{$plugin.tx_foo.settings.bar.actionName}'), 7)], 6)], 5)], 3)], 1)];
