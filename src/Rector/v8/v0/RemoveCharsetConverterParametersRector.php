<?php

declare (strict_types=1);
namespace Ssch\TYPO3Rector\Rector\v8\v0;

use PhpParser\Node;
use PhpParser\Node\Expr\MethodCall;
use Rector\Core\Rector\AbstractRector;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;
use TYPO3\CMS\Core\Charset\CharsetConverter;
/**
 * @see https://docs.typo3.org/c/typo3/cms-core/master/en-us/Changelog/8.0/Breaking-74031-CharsetConverterParametersRemoved.html
 */
final class RemoveCharsetConverterParametersRector extends \Rector\Core\Rector\AbstractRector
{
    /**
     * @return array<class-string<\PhpParser\Node>>
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
        if (!$this->nodeTypeResolver->isMethodStaticCallOrClassMethodObjectType($node, \TYPO3\CMS\Core\Charset\CharsetConverter::class)) {
            return null;
        }
        if (!$this->isNames($node->name, ['entities_to_utf8', 'utf8_to_numberarray'])) {
            return null;
        }
        $node->args = [$node->args[0]];
        return $node;
    }
    /**
     * @codeCoverageIgnore
     */
    public function getRuleDefinition() : \Symplify\RuleDocGenerator\ValueObject\RuleDefinition
    {
        return new \Symplify\RuleDocGenerator\ValueObject\RuleDefinition('Remove CharsetConvertParameters', [new \Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample(<<<'CODE_SAMPLE'
$charsetConvert = GeneralUtility::makeInstance(CharsetConverter::class);
$charsetConvert->entities_to_utf8('string', false);
$charsetConvert->utf8_to_numberarray('string', false, false);
CODE_SAMPLE
, <<<'CODE_SAMPLE'
$charsetConvert = GeneralUtility::makeInstance(CharsetConverter::class);
$charsetConvert->entities_to_utf8('string');
$charsetConvert->utf8_to_numberarray('string');
CODE_SAMPLE
)]);
    }
}
