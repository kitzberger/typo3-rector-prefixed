<?php

declare (strict_types=1);
namespace Ssch\TYPO3Rector\Rector\v10\v0;

use PhpParser\Node;
use PhpParser\Node\Expr\BinaryOp\Concat;
use PhpParser\Node\Expr\ConstFetch;
use PhpParser\Node\Expr\FuncCall;
use PhpParser\Node\Expr\StaticCall;
use PhpParser\Node\Name;
use PhpParser\Node\Scalar\String_;
use Rector\Core\Rector\AbstractRector;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;
use TYPO3\CMS\Core\Utility\GeneralUtility;
/**
 * @see https://docs.typo3.org/c/typo3/cms-core/master/en-us/Changelog/10.0/Deprecation-87894-GeneralUtilityidnaEncode.html
 */
final class RefactorIdnaEncodeMethodToNativeFunctionRector extends \Rector\Core\Rector\AbstractRector
{
    /**
     * @return string[]
     */
    public function getNodeTypes() : array
    {
        return [\PhpParser\Node\Expr\StaticCall::class];
    }
    /**
     * @param StaticCall $node
     */
    public function refactor(\PhpParser\Node $node) : ?\PhpParser\Node
    {
        if (!$this->nodeTypeResolver->isMethodStaticCallOrClassMethodObjectType($node, \TYPO3\CMS\Core\Utility\GeneralUtility::class)) {
            return null;
        }
        if (!$this->isName($node->name, 'idnaEncode')) {
            return null;
        }
        $arguments = $node->args;
        if (0 === \count($arguments)) {
            return null;
        }
        $firstArgumentValue = $this->valueResolver->getValue($arguments[0]->value);
        if (!\is_string($firstArgumentValue)) {
            return null;
        }
        if (\false === \strpos($firstArgumentValue, '@')) {
            return $this->refactorToNativeFunction($firstArgumentValue);
        }
        return $this->refactorToEmailConcatWithNativeFunction($firstArgumentValue);
    }
    /**
     * @codeCoverageIgnore
     */
    public function getRuleDefinition() : \Symplify\RuleDocGenerator\ValueObject\RuleDefinition
    {
        return new \Symplify\RuleDocGenerator\ValueObject\RuleDefinition('Use native function idn_to_ascii instead of GeneralUtility::idnaEncode', [new \Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample(<<<'PHP'
$domain = GeneralUtility::idnaEncode('domain.com');
$email = GeneralUtility::idnaEncode('email@domain.com');
PHP
, <<<'PHP'
$domain = idn_to_ascii('domain.com', IDNA_DEFAULT, INTL_IDNA_VARIANT_UTS46);
$email = 'email@' . idn_to_ascii('domain.com', IDNA_DEFAULT, INTL_IDNA_VARIANT_UTS46);
PHP
)]);
    }
    private function refactorToNativeFunction(string $value) : \PhpParser\Node\Expr\FuncCall
    {
        return $this->nodeFactory->createFuncCall('idn_to_ascii', [new \PhpParser\Node\Scalar\String_($value), new \PhpParser\Node\Expr\ConstFetch(new \PhpParser\Node\Name('IDNA_DEFAULT')), new \PhpParser\Node\Expr\ConstFetch(new \PhpParser\Node\Name('INTL_IDNA_VARIANT_UTS46'))]);
    }
    private function refactorToEmailConcatWithNativeFunction(string $value) : \PhpParser\Node\Expr\BinaryOp\Concat
    {
        [$email, $domain] = \explode('@', $value, 2);
        return new \PhpParser\Node\Expr\BinaryOp\Concat(new \PhpParser\Node\Scalar\String_($email . '@'), $this->refactorToNativeFunction($domain));
    }
}