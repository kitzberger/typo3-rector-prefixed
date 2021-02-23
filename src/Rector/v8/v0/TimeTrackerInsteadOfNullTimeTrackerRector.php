<?php

declare (strict_types=1);
namespace Ssch\TYPO3Rector\Rector\v8\v0;

use PhpParser\Node;
use PhpParser\Node\Expr\MethodCall;
use PhpParser\Node\Expr\New_;
use PhpParser\Node\Expr\StaticCall;
use PhpParser\Node\FunctionLike;
use PhpParser\Node\Name;
use PhpParser\Node\Stmt\ClassLike;
use PhpParser\Node\Stmt\Expression;
use PhpParser\Node\Stmt\Namespace_;
use PhpParser\Node\Stmt\Property;
use Rector\Core\PhpParser\Node\CustomNode\FileWithoutNamespace;
use Rector\Core\Rector\AbstractRector;
use Rector\NodeTypeResolver\Node\AttributeKey;
use Rector\Renaming\NodeManipulator\ClassRenamer;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;
use TYPO3\CMS\Core\TimeTracker\NullTimeTracker;
use TYPO3\CMS\Core\TimeTracker\TimeTracker;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Object\ObjectManager;
/**
 * @see https://docs.typo3.org/c/typo3/cms-core/master/en-us/Changelog/8.0/Deprecation-73185-DeprecateNullTimeTracker.html
 */
final class TimeTrackerInsteadOfNullTimeTrackerRector extends \Rector\Core\Rector\AbstractRector
{
    /**
     * @var ClassRenamer
     */
    private $classRenamer;
    public function __construct(\Rector\Renaming\NodeManipulator\ClassRenamer $classRenamer)
    {
        $this->classRenamer = $classRenamer;
    }
    /**
     * @return string[]
     */
    public function getNodeTypes() : array
    {
        return [\PhpParser\Node\Expr\StaticCall::class, \PhpParser\Node\Expr\MethodCall::class, \PhpParser\Node\Name::class, \PhpParser\Node\Stmt\Property::class, \PhpParser\Node\FunctionLike::class, \PhpParser\Node\Stmt\Expression::class, \PhpParser\Node\Stmt\ClassLike::class, \PhpParser\Node\Stmt\Namespace_::class, \Rector\Core\PhpParser\Node\CustomNode\FileWithoutNamespace::class];
    }
    /**
     * @param MethodCall|StaticCall|FunctionLike|Name|ClassLike|Expression|Namespace_|Property|FileWithoutNamespace $node
     */
    public function refactor(\PhpParser\Node $node) : ?\PhpParser\Node
    {
        $changedNode = $this->addAdditionalArgumentIfNeeded($node);
        if (null !== $changedNode) {
            return $changedNode;
        }
        $renamedNode = $this->classRenamer->renameNode($node, [\TYPO3\CMS\Core\TimeTracker\NullTimeTracker::class => \TYPO3\CMS\Core\TimeTracker\TimeTracker::class]);
        if (null === $renamedNode) {
            return null;
        }
        $parentNode = $node->getAttribute(\Rector\NodeTypeResolver\Node\AttributeKey::PARENT_NODE);
        if ($parentNode instanceof \PhpParser\Node\Expr\New_) {
            $parentNode->args = $this->nodeFactory->createArgs([\false]);
        }
        return $renamedNode;
    }
    /**
     * @codeCoverageIgnore
     */
    public function getRuleDefinition() : \Symplify\RuleDocGenerator\ValueObject\RuleDefinition
    {
        return new \Symplify\RuleDocGenerator\ValueObject\RuleDefinition('Use class TimeTracker instead of NullTimeTracker', [new \Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample(<<<'PHP'
use TYPO3\CMS\Core\TimeTracker\NullTimeTracker;
use TYPO3\CMS\Core\Utility\GeneralUtility;
$timeTracker1 = new NullTimeTracker();
$timeTracker2 = GeneralUtility::makeInstance(NullTimeTracker::class);
PHP
, <<<'PHP'
use TYPO3\CMS\Core\TimeTracker\TimeTracker;
use TYPO3\CMS\Core\Utility\GeneralUtility;
$timeTracker1 = new TimeTracker(false);
$timeTracker2 = GeneralUtility::makeInstance(TimeTracker::class, false);
PHP
)]);
    }
    private function addAdditionalArgumentIfNeeded(\PhpParser\Node $node) : ?\PhpParser\Node
    {
        if (!$node instanceof \PhpParser\Node\Expr\MethodCall && !$node instanceof \PhpParser\Node\Expr\StaticCall) {
            return null;
        }
        if (!$this->isMakeInstanceCall($node) && !$this->isObjectManagerCall($node)) {
            return null;
        }
        if (!$this->valueResolver->isValue($node->args[0]->value, \TYPO3\CMS\Core\TimeTracker\NullTimeTracker::class)) {
            return null;
        }
        $node->args[1] = $this->nodeFactory->createArg(\false);
        return $node;
    }
    private function isMakeInstanceCall(\PhpParser\Node $node) : bool
    {
        if (!$node instanceof \PhpParser\Node\Expr\StaticCall) {
            return \false;
        }
        if (!$this->nodeTypeResolver->isMethodStaticCallOrClassMethodObjectType($node, \TYPO3\CMS\Core\Utility\GeneralUtility::class)) {
            return \false;
        }
        return $this->isName($node->name, 'makeInstance');
    }
    private function isObjectManagerCall(\PhpParser\Node $node) : bool
    {
        if (!$node instanceof \PhpParser\Node\Expr\MethodCall) {
            return \false;
        }
        if (!$this->nodeTypeResolver->isMethodStaticCallOrClassMethodObjectType($node, \TYPO3\CMS\Extbase\Object\ObjectManager::class)) {
            return \false;
        }
        return $this->isName($node->name, 'get');
    }
}
