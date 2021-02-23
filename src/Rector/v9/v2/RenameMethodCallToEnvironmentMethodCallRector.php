<?php

declare (strict_types=1);
namespace Ssch\TYPO3Rector\Rector\v9\v2;

use PhpParser\Node;
use PhpParser\Node\Expr\StaticCall;
use Rector\Core\Rector\AbstractRector;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;
use TYPO3\CMS\Core\Core\Bootstrap;
use TYPO3\CMS\Core\Core\Environment;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Service\EnvironmentService;
/**
 * @see https://docs.typo3.org/c/typo3/cms-core/master/en-us/Changelog/9.2/Feature-84153-IntroduceAGenericEnvironmentClass.html
 */
final class RenameMethodCallToEnvironmentMethodCallRector extends \Rector\Core\Rector\AbstractRector
{
    /**
     * @codeCoverageIgnore
     */
    public function getRuleDefinition() : \Symplify\RuleDocGenerator\ValueObject\RuleDefinition
    {
        return new \Symplify\RuleDocGenerator\ValueObject\RuleDefinition('Turns method call names to new ones from new Environment API.', [new \Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample(<<<'PHP'
Bootstrap::usesComposerClassLoading();
GeneralUtility::getApplicationContext();
EnvironmentService::isEnvironmentInCliMode();
PHP
, <<<'PHP'
Environment::isComposerMode();
Environment::getContext();
Environment::isCli();
PHP
)]);
    }
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
        $className = $this->getName($node->class);
        $methodName = $this->getName($node->name);
        if (\TYPO3\CMS\Core\Core\Bootstrap::class === $className && 'usesComposerClassLoading' === $methodName) {
            return $this->nodeFactory->createStaticCall(\TYPO3\CMS\Core\Core\Environment::class, 'isComposerMode');
        }
        if (\TYPO3\CMS\Core\Utility\GeneralUtility::class === $className && 'getApplicationContext' === $methodName) {
            return $this->nodeFactory->createStaticCall(\TYPO3\CMS\Core\Core\Environment::class, 'getContext');
        }
        if (\TYPO3\CMS\Extbase\Service\EnvironmentService::class === $className && 'isEnvironmentInCliMode' === $methodName) {
            return $this->nodeFactory->createStaticCall(\TYPO3\CMS\Core\Core\Environment::class, 'isCli');
        }
        return null;
    }
}
