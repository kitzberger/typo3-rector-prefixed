<?php

declare (strict_types=1);
namespace Ssch\TYPO3Rector\Rector\v9\v0;

use PhpParser\Node;
use PhpParser\Node\Expr\ClassConstFetch;
use PhpParser\Node\Expr\StaticCall;
use PhpParser\Node\Scalar\MagicConst\Class_;
use PhpParser\Node\Scalar\String_;
use Rector\Core\Rector\AbstractRector;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;
use TYPO3\CMS\Core\Log\LogLevel;
use TYPO3\CMS\Core\Log\LogManager;
use TYPO3\CMS\Core\Utility\GeneralUtility;
/**
 * @see https://docs.typo3.org/c/typo3/cms-core/master/en-us/Changelog/9.0/Deprecation-52694-DeprecatedGeneralUtilitydevLog.html
 */
final class SubstituteGeneralUtilityDevLogRector extends \Rector\Core\Rector\AbstractRector
{
    /**
     * @var string
     */
    private const INFO = 'INFO';
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
        if (!$this->isName($node->name, 'devLog')) {
            return null;
        }
        $makeInstanceCall = $this->nodeFactory->createStaticCall(\TYPO3\CMS\Core\Utility\GeneralUtility::class, 'makeInstance', [$this->nodeFactory->createClassConstReference(\TYPO3\CMS\Core\Log\LogManager::class)]);
        $loggerCall = $this->nodeFactory->createMethodCall($makeInstanceCall, 'getLogger', [new \PhpParser\Node\Scalar\MagicConst\Class_()]);
        $args = [];
        $severity = $this->nodeFactory->createClassConstFetch(\TYPO3\CMS\Core\Log\LogLevel::class, self::INFO);
        if (isset($node->args[2]) && ($severityValue = $this->valueResolver->getValue($node->args[2]->value))) {
            $severity = $this->mapSeverityToLogLevel($severityValue);
        }
        $args[] = $severity;
        $args[] = $node->args[0] ?? $this->nodeFactory->createArg(new \PhpParser\Node\Scalar\String_(''));
        $args[] = $node->args[3] ?? $this->nodeFactory->createArg(new \PhpParser\Node\Scalar\String_(''));
        return $this->nodeFactory->createMethodCall($loggerCall, 'log', $args);
    }
    /**
     * @codeCoverageIgnore
     */
    public function getRuleDefinition() : \Symplify\RuleDocGenerator\ValueObject\RuleDefinition
    {
        return new \Symplify\RuleDocGenerator\ValueObject\RuleDefinition('Substitute GeneralUtility::devLog() to Logging API', [new \Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample(<<<'CODE_SAMPLE'
CODE_SAMPLE
, <<<'CODE_SAMPLE'
CODE_SAMPLE
)]);
    }
    private function mapSeverityToLogLevel(int $severityValue) : \PhpParser\Node\Expr\ClassConstFetch
    {
        if (0 === $severityValue) {
            return $this->nodeFactory->createClassConstFetch(\TYPO3\CMS\Core\Log\LogLevel::class, self::INFO);
        }
        if (1 === $severityValue) {
            return $this->nodeFactory->createClassConstFetch(\TYPO3\CMS\Core\Log\LogLevel::class, 'NOTICE');
        }
        if (2 === $severityValue) {
            return $this->nodeFactory->createClassConstFetch(\TYPO3\CMS\Core\Log\LogLevel::class, 'WARNING');
        }
        if (3 === $severityValue) {
            return $this->nodeFactory->createClassConstFetch(\TYPO3\CMS\Core\Log\LogLevel::class, 'ERROR');
        }
        if (4 === $severityValue) {
            return $this->nodeFactory->createClassConstFetch(\TYPO3\CMS\Core\Log\LogLevel::class, 'CRITICAL');
        }
        return $this->nodeFactory->createClassConstFetch(\TYPO3\CMS\Core\Log\LogLevel::class, self::INFO);
    }
}
