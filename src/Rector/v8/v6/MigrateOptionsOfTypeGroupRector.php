<?php

declare (strict_types=1);
namespace Ssch\TYPO3Rector\Rector\v8\v6;

use PhpParser\Node;
use PhpParser\Node\Expr\Array_;
use PhpParser\Node\Expr\ArrayItem;
use PhpParser\Node\Scalar\String_;
use PhpParser\Node\Stmt\Return_;
use Rector\Core\Rector\AbstractRector;
use Ssch\TYPO3Rector\ArrayUtility;
use Ssch\TYPO3Rector\Helper\TcaHelperTrait;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;
/**
 * @see https://docs.typo3.org/c/typo3/cms-core/master/en-us/Changelog/8.6/Deprecation-79440-TcaChanges.html
 */
final class MigrateOptionsOfTypeGroupRector extends \Rector\Core\Rector\AbstractRector
{
    use TcaHelperTrait;
    /**
     * @var string
     */
    private const DISABLED = 'disabled';
    /**
     * @return array<class-string<\PhpParser\Node>>
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
                if (!$this->isConfigType($configValue->value, 'group')) {
                    continue;
                }
                $addFieldControls = [];
                $addFieldWizards = [];
                foreach ($configValue->value->items as $configItemValue) {
                    if (!$configItemValue instanceof \PhpParser\Node\Expr\ArrayItem) {
                        continue;
                    }
                    if (null === $configItemValue->key) {
                        continue;
                    }
                    if (!$this->valueResolver->isValues($configItemValue->key, ['selectedListStyle', 'show_thumbs', 'disable_controls'])) {
                        continue;
                    }
                    $this->removeNode($configItemValue);
                    $hasAstBeenChanged = \true;
                    $configItemValueValue = $this->valueResolver->getValue($configItemValue->value);
                    if ($this->valueResolver->isValue($configItemValue->key, 'disable_controls') && \is_string($configItemValueValue)) {
                        $controls = \Ssch\TYPO3Rector\ArrayUtility::trimExplode(',', $configItemValueValue, \true);
                        foreach ($controls as $control) {
                            if ('browser' === $control) {
                                $addFieldControls['elementBrowser'][self::DISABLED] = \true;
                            } elseif ('delete' === $control) {
                                $configValue->value->items[] = new \PhpParser\Node\Expr\ArrayItem($this->nodeFactory->createTrue(), new \PhpParser\Node\Scalar\String_('hideDeleteIcon'));
                            } elseif ('allowedTables' === $control) {
                                $addFieldWizards['tableList'][self::DISABLED] = \true;
                            } elseif ('upload' === $control) {
                                $addFieldWizards['fileUpload'][self::DISABLED] = \true;
                            }
                        }
                    } elseif ($this->valueResolver->isValue($configItemValue->key, 'show_thumbs') && \false === (bool) $configItemValueValue) {
                        if ($this->configIsOfInternalType($configValue->value, 'db')) {
                            $addFieldWizards['recordsOverview'][self::DISABLED] = \true;
                        } elseif ($this->configIsOfInternalType($configValue->value, 'file')) {
                            $addFieldWizards['fileThumbnails'][self::DISABLED] = \true;
                        }
                    }
                }
                if ([] !== $addFieldControls) {
                    $configValue->value->items[] = new \PhpParser\Node\Expr\ArrayItem($this->nodeFactory->createArray($addFieldControls), new \PhpParser\Node\Scalar\String_('fieldControl'));
                }
                if ([] !== $addFieldWizards) {
                    $configValue->value->items[] = new \PhpParser\Node\Expr\ArrayItem($this->nodeFactory->createArray($addFieldWizards), new \PhpParser\Node\Scalar\String_('fieldWizard'));
                }
            }
        }
        return $hasAstBeenChanged ? $node : null;
    }
    /**
     * @codeCoverageIgnore
     */
    public function getRuleDefinition() : \Symplify\RuleDocGenerator\ValueObject\RuleDefinition
    {
        return new \Symplify\RuleDocGenerator\ValueObject\RuleDefinition('Migrate options if type group in TCA', [new \Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample(<<<'CODE_SAMPLE'
return [
    'ctrl' => [],
    'columns' => [
        'image2' => [
            'config' => [
                'selectedListStyle' => 'foo',
                'type' => 'group',
                'internal_type' => 'file',
                'show_thumbs' => '0',
                'disable_controls' => 'browser'
            ],
        ],
    ],
];
CODE_SAMPLE
, <<<'CODE_SAMPLE'
return [
    'ctrl' => [],
    'columns' => [
        'image2' => [
            'config' => [
                'type' => 'group',
                'internal_type' => 'file',
                'fieldControl' => [
                    'elementBrowser' => ['disabled' => true]
                ],
                'fieldWizard' => [
                    'fileThumbnails' => ['disabled' => true]
                ]
            ],
        ],
    ],
];
CODE_SAMPLE
)]);
    }
}
