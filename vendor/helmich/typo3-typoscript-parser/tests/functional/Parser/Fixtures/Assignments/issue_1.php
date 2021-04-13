<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210413;

use Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Parser\AST\Comment;
use Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Parser\AST\NestedAssignment;
use Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Parser\AST\ObjectPath;
use Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Parser\AST\Operator\Assignment;
use Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Parser\AST\Scalar;
return [new \Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Parser\AST\NestedAssignment(new \Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Parser\AST\ObjectPath('config.tx_extbase', 'config.tx_extbase'), [new \Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Parser\AST\NestedAssignment(new \Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Parser\AST\ObjectPath('config.tx_extbase.view', 'view'), [new \Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Parser\AST\Comment('# Configure where to look for widget templates', 3), new \Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Parser\AST\NestedAssignment(new \Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Parser\AST\ObjectPath('config.tx_extbase.view.widget', 'widget'), [new \Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Parser\AST\NestedAssignment(new \Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Parser\AST\ObjectPath('Typo3RectorPrefix20210413\\config.tx_extbase.view.widget.TYPO3\\CMS\\Fluid\\ViewHelpers\\Widget\\PaginateViewHelper', 'TYPO3\\CMS\\Fluid\\ViewHelpers\\Widget\\PaginateViewHelper'), [new \Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Parser\AST\Operator\Assignment(new \Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Parser\AST\ObjectPath('config.tx_extbase.view.widget.TYPO3\\CMS\\Fluid\\ViewHelpers\\Widget\\PaginateViewHelper.templateRootPath', 'templateRootPath'), new \Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Parser\AST\Scalar('EXT:ext_key/Resources/Private/Templates'), 6)], 5)], 4)], 2)], 1)];
