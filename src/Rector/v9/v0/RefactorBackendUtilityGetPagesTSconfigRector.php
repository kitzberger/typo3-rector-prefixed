<?php

declare (strict_types=1);
namespace Ssch\TYPO3Rector\Rector\v9\v0;

use PhpParser\Node;
use PhpParser\Node\Expr\StaticCall;
use PhpParser\Node\Identifier;
use PhpParser\Node\Name;
use Rector\Core\Rector\AbstractRector;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;
use TYPO3\CMS\Backend\Utility\BackendUtility;
/**
 * @see https://docs.typo3.org/c/typo3/cms-core/master/en-us/Changelog/9.0/Deprecation-54152-DeprecateArgumentsOfBackendUtilityGetPagesTSconfig.html
 */
final class RefactorBackendUtilityGetPagesTSconfigRector extends \Rector\Core\Rector\AbstractRector
{
    public function getNodeTypes() : array
    {
        return [\PhpParser\Node\Expr\StaticCall::class];
    }
    /**
     * @param StaticCall $node
     */
    public function refactor(\PhpParser\Node $node) : ?\PhpParser\Node
    {
        if (!$this->nodeTypeResolver->isMethodStaticCallOrClassMethodObjectType($node, \TYPO3\CMS\Backend\Utility\BackendUtility::class)) {
            return null;
        }
        if (!$this->isName($node->name, 'getPagesTSconfig')) {
            return null;
        }
        if (!isset($node->args[1], $node->args[2])) {
            return null;
        }
        $rootLine = $this->valueResolver->getValue($node->args[1]->value);
        $returnPartArray = $this->valueResolver->getValue($node->args[2]->value);
        // If a custom non default rootline is given, nothing can be done
        if ('null' !== $rootLine) {
            return null;
        }
        // Just remove the arguments if equals to default ones
        if (\false === $returnPartArray) {
            $node->args = [$node->args[0]];
            return null;
        }
        // Change to method name getRawPagesTSconfig if argument $returnPartArray is true and rootline is null
        $node->name = new \PhpParser\Node\Identifier('getRawPagesTSconfig');
        $node->args = [$node->args[0]];
        return null;
    }
    /**
     * @codeCoverageIgnore
     */
    public function getRuleDefinition() : \Symplify\RuleDocGenerator\ValueObject\RuleDefinition
    {
        return new \Symplify\RuleDocGenerator\ValueObject\RuleDefinition('Refactor method getPagesTSconfig of class BackendUtility if possible', [new \Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample(<<<'PHP'
use TYPO3\CMS\Backend\Utility\BackendUtility;
$pagesTsConfig = BackendUtility::getPagesTSconfig(1, $rootLine = null, $returnPartArray = true);
PHP
, <<<'PHP'
use TYPO3\CMS\Backend\Utility\BackendUtility;
$pagesTsConfig = BackendUtility::getRawPagesTSconfig(1, $rootLine = null);
PHP
)]);
    }
}
