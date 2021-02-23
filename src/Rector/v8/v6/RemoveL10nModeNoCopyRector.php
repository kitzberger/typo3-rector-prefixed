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
 * @see https://docs.typo3.org/c/typo3/cms-core/master/en-us/Changelog/8.6/Breaking-79242-RemoveL10n_modeNoCopy.html
 */
final class RemoveL10nModeNoCopyRector extends \Rector\Core\Rector\AbstractRector
{
    use TcaHelperTrait;
    /**
     * @var string
     */
    private const BEHAVIOUR = 'behaviour';
    /**
     * @var string
     */
    private const ALLOW_LANGUAGE_SYNCHRONIZATION = 'allowLanguageSynchronization';
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
            $addAllowLanguageSynchronization = \false;
            $configArray = $fieldValue->value;
            $newConfiguration = new \PhpParser\Node\Expr\ArrayItem($this->nodeFactory->createArray([self::BEHAVIOUR => [self::ALLOW_LANGUAGE_SYNCHRONIZATION => \true]]), new \PhpParser\Node\Scalar\String_('config'));
            foreach ($fieldValue->value->items as $configValue) {
                if (null === $configValue) {
                    continue;
                }
                if (null === $configValue->key) {
                    continue;
                }
                if (!$this->valueResolver->isValues($configValue->key, ['l10n_mode', 'config'])) {
                    continue;
                }
                if ($this->valueResolver->isValue($configValue->value, 'mergeIfNotBlank')) {
                    $addAllowLanguageSynchronization = \true;
                    $this->removeNode($configValue);
                    $hasAstBeenChanged = \true;
                } elseif ($this->valueResolver->isValue($configValue->value, 'noCopy')) {
                    $this->removeNode($configValue);
                    $hasAstBeenChanged = \true;
                } elseif ($configValue->value instanceof \PhpParser\Node\Expr\Array_) {
                    $configArray = $configValue->value;
                    $newConfiguration = new \PhpParser\Node\Expr\ArrayItem($this->nodeFactory->createArray([self::BEHAVIOUR => [self::ALLOW_LANGUAGE_SYNCHRONIZATION => \true]]));
                    foreach ($configValue->value->items as $configItemValue) {
                        if (!$configItemValue instanceof \PhpParser\Node\Expr\ArrayItem) {
                            continue;
                        }
                        if (null === $configItemValue->key) {
                            continue;
                        }
                        if (!$configItemValue->value instanceof \PhpParser\Node\Expr\Array_) {
                            continue;
                        }
                        if (!$this->valueResolver->isValue($configItemValue->key, self::BEHAVIOUR)) {
                            continue;
                        }
                        $configArray = $configItemValue->value;
                        $newConfiguration = new \PhpParser\Node\Expr\ArrayItem($this->nodeFactory->createTrue(), new \PhpParser\Node\Scalar\String_(self::ALLOW_LANGUAGE_SYNCHRONIZATION));
                        foreach ($configItemValue->value->items as $behaviourConfiguration) {
                            if (!$behaviourConfiguration instanceof \PhpParser\Node\Expr\ArrayItem) {
                                continue;
                            }
                            if (null === $behaviourConfiguration->key) {
                                continue;
                            }
                            if (!$this->valueResolver->isValue($behaviourConfiguration->key, self::ALLOW_LANGUAGE_SYNCHRONIZATION)) {
                                continue;
                            }
                            $addAllowLanguageSynchronization = \false;
                            if (empty($this->valueResolver->getValue($behaviourConfiguration->value))) {
                                $behaviourConfiguration->value = $this->nodeFactory->createTrue();
                                $hasAstBeenChanged = \true;
                            }
                        }
                    }
                }
            }
            if (!$addAllowLanguageSynchronization) {
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
        return new \Symplify\RuleDocGenerator\ValueObject\RuleDefinition('Remove l10n_mode noCopy', [new \Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample(<<<'PHP'
return [
    'ctrl' => [],
    'columns' => [
        'foo' => [
            'exclude' => 1,
            'l10n_mode' => 'mergeIfNotBlank',
            'label' => 'Bar',
        ],
    ],
];
PHP
, <<<'PHP'
return [
    'ctrl' => [],
    'columns' => [
        'foo' => [
            'exclude' => 1,
            'label' => 'Bar',
            'config' => [
                'behaviour' => [
                    'allowLanguageSynchronization' => true
                ]
            ],
        ],
    ],
];
PHP
)]);
    }
}
