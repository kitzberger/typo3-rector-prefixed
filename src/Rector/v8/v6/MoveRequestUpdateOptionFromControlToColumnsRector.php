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
use TYPO3\CMS\Core\Utility\GeneralUtility;
/**
 * @see https://docs.typo3.org/c/typo3/cms-core/master/en-us/Changelog/8.6/Deprecation-78899-TCACtrlFieldRequestUpdateDropped.html
 */
final class MoveRequestUpdateOptionFromControlToColumnsRector extends \Rector\Core\Rector\AbstractRector
{
    use TcaHelperTrait;
    /**
     * @codeCoverageIgnore
     */
    public function getRuleDefinition() : \Symplify\RuleDocGenerator\ValueObject\RuleDefinition
    {
        return new \Symplify\RuleDocGenerator\ValueObject\RuleDefinition('TCA ctrl field requestUpdate dropped', [new \Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample(<<<'PHP'
return [
    'ctrl' => [
        'requestUpdate' => 'foo',
    ],
    'columns' => [
        'foo' => []
    ]
];
PHP
, <<<'PHP'
return [
    'ctrl' => [
    ],
    'columns' => [
        'foo' => [
            'onChange' => 'reload'
        ]
    ]
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
        $ctrl = $this->extractCtrl($node);
        if (!$ctrl instanceof \PhpParser\Node\Expr\ArrayItem) {
            return null;
        }
        $ctrlItems = $ctrl->value;
        if (!$ctrlItems instanceof \PhpParser\Node\Expr\Array_) {
            return null;
        }
        $requestUpdateFields = [];
        foreach ($ctrlItems->items as $fieldValue) {
            if (!$fieldValue instanceof \PhpParser\Node\Expr\ArrayItem) {
                continue;
            }
            if (null === $fieldValue->key) {
                continue;
            }
            if ($this->valueResolver->isValue($fieldValue->key, 'requestUpdate')) {
                $fields = $this->valueResolver->getValue($fieldValue->value);
                if (null === $fields) {
                    return null;
                }
                $requestUpdateFields = \TYPO3\CMS\Core\Utility\GeneralUtility::trimExplode(',', $fields);
                $this->removeNode($fieldValue);
            }
        }
        if ([] === $requestUpdateFields) {
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
            $fieldName = $this->valueResolver->getValue($columnItem->key);
            if (!\in_array($fieldName, $requestUpdateFields, \true)) {
                continue;
            }
            if (!$columnItem->value instanceof \PhpParser\Node\Expr\Array_) {
                continue;
            }
            $columnItem->value->items[] = new \PhpParser\Node\Expr\ArrayItem(new \PhpParser\Node\Scalar\String_('reload'), new \PhpParser\Node\Scalar\String_('onChange'));
        }
        // change the node
        return $node;
    }
}
