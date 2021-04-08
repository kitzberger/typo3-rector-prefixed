<?php

declare (strict_types=1);
namespace Ssch\TYPO3Rector\Rector\v8\v0;

use PhpParser\Node;
use PhpParser\Node\Expr\PropertyFetch;
use Rector\Core\Rector\AbstractRector;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;
use TYPO3\CMS\Extbase\Mvc\Controller\CommandController;
/**
 * @see https://docs.typo3.org/c/typo3/cms-core/master/en-us/Changelog/8.0/Breaking-71521-PropertyUserAuthenticationRemovedFromCommandController.html
 */
final class RemovePropertyUserAuthenticationRector extends \Rector\Core\Rector\AbstractRector
{
    /**
     * @return array<class-string<\PhpParser\Node>>
     */
    public function getNodeTypes() : array
    {
        return [\PhpParser\Node\Expr\PropertyFetch::class];
    }
    /**
     * @param PropertyFetch $node
     */
    public function refactor(\PhpParser\Node $node) : ?\PhpParser\Node
    {
        if (!$this->isName($node, 'userAuthentication')) {
            return null;
        }
        if (!$this->isObjectType($node->var, \TYPO3\CMS\Extbase\Mvc\Controller\CommandController::class)) {
            return null;
        }
        return $this->nodeFactory->createMethodCall($node->var, 'getBackendUserAuthentication');
    }
    /**
     * @codeCoverageIgnore
     */
    public function getRuleDefinition() : \Symplify\RuleDocGenerator\ValueObject\RuleDefinition
    {
        return new \Symplify\RuleDocGenerator\ValueObject\RuleDefinition('Use method getBackendUserAuthentication instead of removed property $userAuthentication', [new \Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample(<<<'CODE_SAMPLE'
class MyCommandController extends CommandController
{
    public function myMethod()
    {
        if($this->userAuthentication !== null) {

        }
    }
}
CODE_SAMPLE
, <<<'CODE_SAMPLE'
class MyCommandController extends CommandController
{
    public function myMethod()
    {
        if($this->getBackendUserAuthentication() !== null) {

        }
    }
}
CODE_SAMPLE
)]);
    }
}
