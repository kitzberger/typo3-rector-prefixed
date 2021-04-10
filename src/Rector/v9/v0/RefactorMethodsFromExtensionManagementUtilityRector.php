<?php

declare (strict_types=1);
namespace Ssch\TYPO3Rector\Rector\v9\v0;

use PhpParser\Node;
use PhpParser\Node\Expr\MethodCall;
use PhpParser\Node\Expr\StaticCall;
use Rector\Core\Rector\AbstractRector;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;
use TYPO3\CMS\Core\Cache\CacheManager;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Utility\PathUtility;
/**
 * @changelog https://docs.typo3.org/c/typo3/cms-core/master/en-us/Changelog/9.0/Deprecation-82899-ExtensionManagementUtilityMethods.html
 */
final class RefactorMethodsFromExtensionManagementUtilityRector extends \Rector\Core\Rector\AbstractRector
{
    /**
     * @return array<class-string<Node>>
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
        if (\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::class !== $className) {
            return null;
        }
        switch ($methodName) {
            case 'isLoaded':
                return $this->removeSecondArgumentFromMethodIsLoaded($node);
            case 'siteRelPath':
                return $this->createNewMethodCallForSiteRelPath($node);
            case 'removeCacheFiles':
                return $this->createNewMethodCallForRemoveCacheFiles();
        }
        return null;
    }
    /**
     * @codeCoverageIgnore
     */
    public function getRuleDefinition() : \Symplify\RuleDocGenerator\ValueObject\RuleDefinition
    {
        return new \Symplify\RuleDocGenerator\ValueObject\RuleDefinition('Refactor deprecated methods from ExtensionManagementUtility.', [new \Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample(<<<'CODE_SAMPLE'
ExtensionManagementUtility::removeCacheFiles();
CODE_SAMPLE
, <<<'CODE_SAMPLE'
GeneralUtility::makeInstance(\TYPO3\CMS\Core\Cache\CacheManager::class)->flushCachesInGroup('system');
CODE_SAMPLE
)]);
    }
    private function createNewMethodCallForSiteRelPath(\PhpParser\Node\Expr\StaticCall $node) : \PhpParser\Node\Expr\StaticCall
    {
        $firstArgument = $node->args[0];
        return $this->nodeFactory->createStaticCall(\TYPO3\CMS\Core\Utility\PathUtility::class, 'stripPathSitePrefix', [$this->nodeFactory->createStaticCall(\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::class, 'extPath', [$firstArgument])]);
    }
    private function createNewMethodCallForRemoveCacheFiles() : \PhpParser\Node\Expr\MethodCall
    {
        return $this->nodeFactory->createMethodCall($this->nodeFactory->createStaticCall(\TYPO3\CMS\Core\Utility\GeneralUtility::class, 'makeInstance', [$this->nodeFactory->createClassConstReference(\TYPO3\CMS\Core\Cache\CacheManager::class)]), 'flushCachesInGroup', [$this->nodeFactory->createArg('system')]);
    }
    private function removeSecondArgumentFromMethodIsLoaded(\PhpParser\Node\Expr\StaticCall $node) : \PhpParser\Node
    {
        $numberOfArguments = \count($node->args);
        if ($numberOfArguments > 1) {
            unset($node->args[1]);
        }
        return $node;
    }
}
