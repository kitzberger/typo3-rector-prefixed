<?php

declare (strict_types=1);
namespace Rector\DoctrineCodeQuality\Rector\MethodCall;

use PhpParser\Node;
use PhpParser\Node\Arg;
use PhpParser\Node\Expr\Array_;
use PhpParser\Node\Expr\ArrayItem;
use PhpParser\Node\Expr\MethodCall;
use PhpParser\Node\Expr\New_;
use PhpParser\Node\Name\FullyQualified;
use PhpParser\Node\Scalar\String_;
use PhpParser\Node\Stmt\ClassLike;
use Rector\Core\Exception\ShouldNotHappenException;
use Rector\Core\Rector\AbstractRector;
use Rector\NodeTypeResolver\Node\AttributeKey;
use Rector\NodeTypeResolver\TypeAnalyzer\ArrayTypeAnalyzer;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;
/**
 * @see https://github.com/doctrine/orm/blob/2.7/UPGRADE.md#query-querybuilder-and-nativequery-parameters-bc-break
 * @see \Rector\DoctrineCodeQuality\Tests\Rector\MethodCall\ChangeSetParametersArrayToArrayCollectionRector\ChangeSetParametersArrayToArrayCollectionRectorTest
 */
final class ChangeSetParametersArrayToArrayCollectionRector extends \Rector\Core\Rector\AbstractRector
{
    /**
     * @var ArrayTypeAnalyzer
     */
    private $arrayTypeAnalyzer;
    public function __construct(\Rector\NodeTypeResolver\TypeAnalyzer\ArrayTypeAnalyzer $arrayTypeAnalyzer)
    {
        $this->arrayTypeAnalyzer = $arrayTypeAnalyzer;
    }
    /**
     * @return array<class-string<Node>>
     */
    public function getNodeTypes() : array
    {
        return [\PhpParser\Node\Expr\MethodCall::class];
    }
    /**
     * @param MethodCall $node
     */
    public function refactor(\PhpParser\Node $node) : ?\PhpParser\Node
    {
        if ($this->shouldSkipMethodCall($node)) {
            return null;
        }
        $methodArguments = $node->args;
        if (\count($methodArguments) !== 1) {
            return null;
        }
        $firstArgument = $methodArguments[0];
        if (!$this->arrayTypeAnalyzer->isArrayType($firstArgument->value)) {
            return null;
        }
        unset($node->args);
        $new = $this->getNewArrayCollectionFromSetParametersArgument($firstArgument);
        $node->args = [new \PhpParser\Node\Arg($new)];
        return $node;
    }
    public function getRuleDefinition() : \Symplify\RuleDocGenerator\ValueObject\RuleDefinition
    {
        return new \Symplify\RuleDocGenerator\ValueObject\RuleDefinition('Change array to ArrayCollection in setParameters method of query builder', [new \Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample(<<<'CODE_SAMPLE'
use Doctrine\ORM\EntityRepository;

class SomeRepository extends EntityRepository
{
    public function getSomething()
    {
        return $this
            ->createQueryBuilder('sm')
            ->select('sm')
            ->where('sm.foo = :bar')
            ->setParameters([
                'bar' => 'baz'
            ])
            ->getQuery()
            ->getResult()
        ;
    }
}
CODE_SAMPLE
, <<<'CODE_SAMPLE'
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query\Parameter;

class SomeRepository extends EntityRepository
{
    public function getSomething()
    {
        return $this
            ->createQueryBuilder('sm')
            ->select('sm')
            ->where('sm.foo = :bar')
            ->setParameters(new ArrayCollection([
                new  Parameter('bar', 'baz'),
            ]))
            ->getQuery()
            ->getResult()
        ;
    }
}
CODE_SAMPLE
)]);
    }
    private function shouldSkipMethodCall(\PhpParser\Node\Expr\MethodCall $methodCall) : bool
    {
        $classLike = $methodCall->getAttribute(\Rector\NodeTypeResolver\Node\AttributeKey::CLASS_NODE);
        if (!$classLike instanceof \PhpParser\Node\Stmt\ClassLike) {
            return \true;
        }
        //one of the cases when we are in the repo and it's extended from EntityRepository
        if (!$this->isObjectType($classLike, 'Typo3RectorPrefix20210321\\Doctrine\\ORM\\EntityRepository')) {
            return \true;
        }
        if (!$this->isObjectType($methodCall->var, 'Typo3RectorPrefix20210321\\Doctrine\\ORM\\EntityRepository')) {
            return \true;
        }
        return !$this->isName($methodCall->name, 'setParameters');
    }
    private function getNewArrayCollectionFromSetParametersArgument(\PhpParser\Node\Arg $arg) : \PhpParser\Node\Expr\New_
    {
        /** @var Array_ $arrayExpression */
        $arrayExpression = $arg->value;
        /** @var ArrayItem[] $firstArgumentArrayItems */
        $firstArgumentArrayItems = $arrayExpression->items;
        $arrayCollectionArrayArguments = [];
        foreach ($firstArgumentArrayItems as $firstArgumentArrayItem) {
            if (!$firstArgumentArrayItem->key instanceof \PhpParser\Node\Scalar\String_ || !$firstArgumentArrayItem->value instanceof \PhpParser\Node\Scalar\String_) {
                throw new \Rector\Core\Exception\ShouldNotHappenException();
            }
            $queryParameter = new \PhpParser\Node\Expr\New_(new \PhpParser\Node\Name\FullyQualified('Typo3RectorPrefix20210321\\Doctrine\\ORM\\Query\\Parameter'));
            $queryParameter->args = [new \PhpParser\Node\Arg($firstArgumentArrayItem->key), new \PhpParser\Node\Arg($firstArgumentArrayItem->value)];
            $arrayCollectionArrayArguments[] = new \PhpParser\Node\Expr\ArrayItem($queryParameter);
        }
        $arrayCollection = new \PhpParser\Node\Expr\New_(new \PhpParser\Node\Name\FullyQualified('Typo3RectorPrefix20210321\\Doctrine\\Common\\Collections\\ArrayCollection'));
        $arrayCollection->args = [new \PhpParser\Node\Arg(new \PhpParser\Node\Expr\Array_($arrayCollectionArrayArguments))];
        return $arrayCollection;
    }
}
