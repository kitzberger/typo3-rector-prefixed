<?php

declare (strict_types=1);
namespace Rector\DeadCode\Rector\Property;

use PhpParser\Node;
use PhpParser\Node\Stmt\Property;
use Rector\ChangesReporting\ValueObject\RectorWithLineChange;
use Rector\Core\Rector\AbstractRector;
use Rector\DeadCode\PhpDoc\TagRemover\VarTagRemover;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;
/**
 * @see \Rector\Tests\DeadCode\Rector\Property\RemoveUselessVarTagRector\RemoveUselessVarTagRectorTest
 */
final class RemoveUselessVarTagRector extends \Rector\Core\Rector\AbstractRector
{
    /**
     * @var VarTagRemover
     */
    private $varTagRemover;
    public function __construct(\Rector\DeadCode\PhpDoc\TagRemover\VarTagRemover $varTagRemover)
    {
        $this->varTagRemover = $varTagRemover;
    }
    public function getRuleDefinition() : \Symplify\RuleDocGenerator\ValueObject\RuleDefinition
    {
        return new \Symplify\RuleDocGenerator\ValueObject\RuleDefinition('Remove unused @var annotation for properties', [new \Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample(<<<'CODE_SAMPLE'
final class SomeClass
{
    /**
     * @var string
     */
    public string $name = 'name';
}
CODE_SAMPLE
, <<<'CODE_SAMPLE'
final class SomeClass
{
    public string $name = 'name';
}
CODE_SAMPLE
)]);
    }
    /**
     * @return array<class-string<Node>>
     */
    public function getNodeTypes() : array
    {
        return [\PhpParser\Node\Stmt\Property::class];
    }
    /**
     * @param Property $node
     */
    public function refactor(\PhpParser\Node $node) : ?\PhpParser\Node
    {
        $phpDocInfo = $this->phpDocInfoFactory->createFromNodeOrEmpty($node);
        $this->varTagRemover->removeVarTagIfUseless($phpDocInfo, $node);
        if ($phpDocInfo->hasChanged()) {
            $this->file->addRectorClassWithLine(new \Rector\ChangesReporting\ValueObject\RectorWithLineChange($this, $node->getLine()));
            return $node;
        }
        return null;
    }
}
