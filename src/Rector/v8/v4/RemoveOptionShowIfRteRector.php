<?php

declare (strict_types=1);
namespace Ssch\TYPO3Rector\Rector\v8\v4;

use PhpParser\Node;
use PhpParser\Node\Expr\Array_;
use PhpParser\Node\Expr\ArrayItem;
use PhpParser\Node\Stmt\Return_;
use Rector\Core\Rector\AbstractRector;
use Ssch\TYPO3Rector\Helper\TcaHelperTrait;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;
/**
 * @see https://docs.typo3.org/c/typo3/cms-core/master/en-us/Changelog/8.4/Breaking-77592-DroppedTCAOptionShowIfRTEInTypecheck.html
 */
final class RemoveOptionShowIfRteRector extends \Rector\Core\Rector\AbstractRector
{
    use TcaHelperTrait;
    /**
     * @codeCoverageIgnore
     */
    public function getRuleDefinition() : \Symplify\RuleDocGenerator\ValueObject\RuleDefinition
    {
        return new \Symplify\RuleDocGenerator\ValueObject\RuleDefinition('Dropped TCA option showIfRTE in type=check', [new \Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample(<<<'PHP'
return [
    'ctrl' => [
    ],
    'columns' => [
        'rte_enabled' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/locallang_general.php:LGL.disableRTE',
            'config' => [
                'type' => 'check',
                'showIfRTE' => 1
            ]
        ],
    ],
];
PHP
, <<<'PHP'
return [
    'ctrl' => [
    ],
    'columns' => [
        'rte_enabled' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/locallang_general.php:LGL.disableRTE',
            'config' => [
                'type' => 'check',
            ]
        ],
    ],
];
PHP
)]);
    }
    /**
     * @return string[]
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
        foreach ($columnItems->items as $columnItem) {
            if (!$columnItem instanceof \PhpParser\Node\Expr\ArrayItem) {
                continue;
            }
            if (null === $columnItem->key) {
                continue;
            }
            if (!$columnItem->value instanceof \PhpParser\Node\Expr\Array_) {
                continue;
            }
            foreach ($columnItem->value->items as $configValue) {
                if (null === $configValue) {
                    continue;
                }
                if (null === $configValue->key) {
                    continue;
                }
                if (!$configValue->value instanceof \PhpParser\Node\Expr\Array_) {
                    continue;
                }
                if (!$this->isRenderTypeCheck($configValue->value)) {
                    continue;
                }
                foreach ($configValue->value->items as $configItemValue) {
                    if (!$configItemValue instanceof \PhpParser\Node\Expr\ArrayItem) {
                        continue;
                    }
                    if (null === $configItemValue->key) {
                        continue;
                    }
                    if ($this->valueResolver->isValue($configItemValue->key, 'showIfRTE')) {
                        $this->removeNode($configItemValue);
                        return $node;
                    }
                }
            }
        }
        return null;
    }
    private function isRenderTypeCheck(\PhpParser\Node\Expr\Array_ $configValue) : bool
    {
        foreach ($configValue->items as $configItemValue) {
            if (!$configItemValue instanceof \PhpParser\Node\Expr\ArrayItem) {
                continue;
            }
            if (null === $configItemValue->key) {
                continue;
            }
            if ($this->valueResolver->isValue($configItemValue->key, 'type') && $this->valueResolver->isValue($configItemValue->value, 'check')) {
                return \true;
            }
        }
        return \false;
    }
}