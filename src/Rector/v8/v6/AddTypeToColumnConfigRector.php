<?php

declare (strict_types=1);
namespace Ssch\TYPO3Rector\Rector\v8\v6;

use PhpParser\Node;
use PhpParser\Node\Expr\Array_;
use PhpParser\Node\Expr\ArrayItem;
use PhpParser\Node\Scalar\String_;
use PhpParser\Node\Stmt\Return_;
use Rector\Core\Rector\AbstractRector;
use Ssch\TYPO3Rector\Helper\TcaHelperTrait;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;
/**
 * @changelog https://docs.typo3.org/c/typo3/cms-core/master/en-us/Changelog/8.6/Deprecation-79440-TcaChanges.html
 */
final class AddTypeToColumnConfigRector extends \Rector\Core\Rector\AbstractRector
{
    use TcaHelperTrait;
    /**
     * @var string
     */
    private const TYPE = 'type';
    /**
     * @return array<class-string<Node>>
     */
    public function getNodeTypes() : array
    {
        return [\PhpParser\Node\Stmt\Return_::class];
    }
    /**
     * @param Return_ $node
     */
    public function refactor(\PhpParser\Node $node) : ?\PhpParser\Node
    {
        if (!$this->isTca($node)) {
            return null;
        }
        $columns = $this->extractColumns($node);
        if (!$columns instanceof \PhpParser\Node\Expr\ArrayItem) {
            return null;
        }
        $columnItems = $columns->value;
        if (!$columnItems instanceof \PhpParser\Node\Expr\Array_) {
            return null;
        }
        $hasAstBeenChanged = \false;
        foreach ($columnItems->items as $fieldValue) {
            if (!$fieldValue instanceof \PhpParser\Node\Expr\ArrayItem) {
                continue;
            }
            if (null === $fieldValue->key) {
                continue;
            }
            if (!$fieldValue->value instanceof \PhpParser\Node\Expr\Array_) {
                continue;
            }
            $configArray = $fieldValue->value;
            $addConfig = \true;
            $newConfiguration = new \PhpParser\Node\Expr\ArrayItem($this->nodeFactory->createArray([self::TYPE => 'none']), new \PhpParser\Node\Scalar\String_('config'));
            foreach ($fieldValue->value->items as $configValue) {
                if (null === $configValue) {
                    continue;
                }
                if (null === $configValue->key) {
                    continue;
                }
                if (!$this->valueResolver->isValue($configValue->key, 'config')) {
                    continue;
                }
                $newConfiguration = new \PhpParser\Node\Expr\ArrayItem($this->nodeFactory->createArray([self::TYPE => 'none']));
                $configArray = $configValue->value;
                if (!$configValue->value instanceof \PhpParser\Node\Expr\Array_) {
                    continue;
                }
                foreach ($configValue->value->items as $configItemValue) {
                    if (!$configItemValue instanceof \PhpParser\Node\Expr\ArrayItem) {
                        continue;
                    }
                    if (null === $configItemValue->key) {
                        continue;
                    }
                    if (!$this->valueResolver->isValue($configItemValue->key, self::TYPE)) {
                        continue;
                    }
                    $addConfig = \false;
                }
            }
            if (!$addConfig) {
                continue;
            }
            if ($configArray instanceof \PhpParser\Node\Expr\Array_) {
                $configArray->items[] = $newConfiguration;
                $hasAstBeenChanged = \true;
            }
        }
        return $hasAstBeenChanged ? $node : null;
    }
    /**
     * @codeCoverageIgnore
     */
    public function getRuleDefinition() : \Symplify\RuleDocGenerator\ValueObject\RuleDefinition
    {
        return new \Symplify\RuleDocGenerator\ValueObject\RuleDefinition('Add type to column config if not exists', [new \Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample(<<<'CODE_SAMPLE'
return [
    'columns' => [
        'bar' => []
    ]
];
CODE_SAMPLE
, <<<'CODE_SAMPLE'
return [
    'columns' => [
        'bar' => [
            'config' => [
                'type' => 'none'
            ]
        ]
    ]
];
CODE_SAMPLE
)]);
    }
}
