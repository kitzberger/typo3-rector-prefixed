<?php

declare (strict_types=1);
namespace Ssch\TYPO3Rector\Helper;

use Generator;
use PhpParser\Node;
use PhpParser\Node\Expr;
use PhpParser\Node\Expr\Array_;
use PhpParser\Node\Expr\ArrayItem;
use PhpParser\Node\Stmt\Return_;
use Rector\Core\PhpParser\Node\Value\ValueResolver;
trait TcaHelperTrait
{
    /**
     * @var ValueResolver
     */
    protected $valueResolver;
    private function isTca(\PhpParser\Node\Stmt\Return_ $node) : bool
    {
        $ctrl = $this->extractCtrl($node);
        $columns = $this->extractColumns($node);
        return null !== $ctrl && null !== $columns;
    }
    private function isInlineType(\PhpParser\Node\Expr\Array_ $columnItemConfiguration) : bool
    {
        return $this->isConfigType($columnItemConfiguration, 'inline');
    }
    private function isConfigType(\PhpParser\Node\Expr\Array_ $columnItemConfiguration, string $type) : bool
    {
        foreach ($columnItemConfiguration->items as $configValue) {
            if (null === $configValue) {
                continue;
            }
            if (!$configValue instanceof \PhpParser\Node\Expr\ArrayItem) {
                continue;
            }
            if (null === $configValue->key) {
                continue;
            }
            if (!$this->isValue($configValue->key, 'type')) {
                continue;
            }
            if ($this->isValue($configValue->value, $type)) {
                return \true;
            }
        }
        return \false;
    }
    private function hasRenderType(\PhpParser\Node\Expr\Array_ $columnItemConfiguration) : bool
    {
        foreach ($columnItemConfiguration->items as $configValue) {
            if (null === $configValue) {
                continue;
            }
            if (!$configValue instanceof \PhpParser\Node\Expr\ArrayItem) {
                continue;
            }
            if (null === $configValue->key) {
                continue;
            }
            if (!$this->isValue($configValue->key, 'renderType')) {
                continue;
            }
            return \true;
        }
        return \false;
    }
    private function extractColumns(\PhpParser\Node\Stmt\Return_ $node) : ?\PhpParser\Node\Expr\ArrayItem
    {
        return $this->extractByTypeOnFirstLevel($node, 'columns');
    }
    private function extractTypes(\PhpParser\Node\Stmt\Return_ $node) : ?\PhpParser\Node\Expr\ArrayItem
    {
        return $this->extractByTypeOnFirstLevel($node, 'types');
    }
    private function extractCtrl(\PhpParser\Node\Stmt\Return_ $node) : ?\PhpParser\Node\Expr\ArrayItem
    {
        return $this->extractByTypeOnFirstLevel($node, 'ctrl');
    }
    private function extractInterface(\PhpParser\Node\Stmt\Return_ $node) : ?\PhpParser\Node\Expr\ArrayItem
    {
        return $this->extractByTypeOnFirstLevel($node, 'interface');
    }
    private function extractByTypeOnFirstLevel(\PhpParser\Node\Stmt\Return_ $node, string $type) : ?\PhpParser\Node\Expr\ArrayItem
    {
        if (!$node->expr instanceof \PhpParser\Node\Expr\Array_) {
            return null;
        }
        $items = $node->expr->items;
        foreach ($items as $item) {
            if (!$item instanceof \PhpParser\Node\Expr\ArrayItem) {
                continue;
            }
            if (null === $item->key) {
                continue;
            }
            $itemKey = (string) $this->getValue($item->key);
            if ($type === $itemKey) {
                return $item;
            }
        }
        return null;
    }
    private function configIsOfInternalType(\PhpParser\Node\Expr\Array_ $configValue, string $expectedType) : bool
    {
        return $this->configKeyIsOfValue($configValue, 'internal_type', $expectedType);
    }
    private function configIsOfRenderType(\PhpParser\Node\Expr\Array_ $configValue, string $expectedRenderType) : bool
    {
        return $this->configKeyIsOfValue($configValue, 'renderType', $expectedRenderType);
    }
    private function configKeyIsOfValue(\PhpParser\Node\Expr\Array_ $configValue, string $configKey, string $expectedValue) : bool
    {
        foreach ($configValue->items as $configItemValue) {
            if (!$configItemValue instanceof \PhpParser\Node\Expr\ArrayItem) {
                continue;
            }
            if (null === $configItemValue->key) {
                continue;
            }
            if ($this->isValue($configItemValue->key, $configKey) && $this->isValue($configItemValue->value, $expectedValue)) {
                return \true;
            }
        }
        return \false;
    }
    /**
     * @return Generator<string, Node>
     */
    private function extractColumnConfig(\PhpParser\Node\Expr\Array_ $items) : \Generator
    {
        foreach ($items->items as $columnConfig) {
            if (!$columnConfig instanceof \PhpParser\Node\Expr\ArrayItem) {
                continue;
            }
            if (null === $columnConfig->key) {
                continue;
            }
            $columnName = $this->getValue($columnConfig->key);
            if (null === $columnName) {
                continue;
            }
            if (!$columnConfig->value instanceof \PhpParser\Node\Expr\Array_) {
                continue;
            }
            // search the config sub-array for this field
            foreach ($columnConfig->value->items as $configValue) {
                if (null === $configValue || null === $configValue->key) {
                    continue;
                }
                if (!$this->isValue($configValue->key, 'config')) {
                    continue;
                }
                (yield $columnName => $configValue->value);
            }
        }
    }
    /**
     * @param mixed $value
     */
    private function isValue(\PhpParser\Node\Expr $expr, $value) : bool
    {
        return $this->valueResolver->isValue($expr, $value);
    }
    /**
     * @return mixed|null
     */
    private function getValue(\PhpParser\Node\Expr $expr, bool $resolvedClassReference = \false)
    {
        return $this->valueResolver->getValue($expr, $resolvedClassReference);
    }
}
