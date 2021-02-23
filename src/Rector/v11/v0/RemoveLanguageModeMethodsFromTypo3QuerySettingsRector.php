<?php

declare (strict_types=1);
namespace Ssch\TYPO3Rector\Rector\v11\v0;

use PhpParser\Node;
use PhpParser\Node\Expr\MethodCall;
use Rector\Core\Exception\ShouldNotHappenException;
use Rector\Defluent\Rector\AbstractFluentChainMethodCallRector;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;
use TYPO3\CMS\Extbase\Persistence\Generic\Typo3QuerySettings;
/**
 * @see https://docs.typo3.org/c/typo3/cms-core/master/en-us/Changelog/11.0/Deprecation-89938-DeprecatedLanguageModeInTypo3QuerySettings.html
 */
final class RemoveLanguageModeMethodsFromTypo3QuerySettingsRector extends \Rector\Defluent\Rector\AbstractFluentChainMethodCallRector
{
    /**
     * @return string[]
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
        if (!$this->nodeTypeResolver->isMethodStaticCallOrClassMethodObjectType($node, \TYPO3\CMS\Extbase\Persistence\Generic\Typo3QuerySettings::class)) {
            return null;
        }
        if (!$this->isNames($node->name, ['setLanguageMode', 'getLanguageMode'])) {
            return null;
        }
        return $this->removeMethodCall($node);
    }
    /**
     * @codeCoverageIgnore
     */
    public function getRuleDefinition() : \Symplify\RuleDocGenerator\ValueObject\RuleDefinition
    {
        return new \Symplify\RuleDocGenerator\ValueObject\RuleDefinition('Remove language mode methods from class Typo3QuerySettings', [new \Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample(<<<'PHP'
use TYPO3\CMS\Extbase\Persistence\Generic\Typo3QuerySettings;
$querySettings = new Typo3QuerySettings();
$querySettings->setLanguageUid(0)->setLanguageMode()->getLanguageMode();
PHP
, <<<'PHP'
use TYPO3\CMS\Extbase\Persistence\Generic\Typo3QuerySettings;
$querySettings = new Typo3QuerySettings();
$querySettings->setLanguageUid(0);
PHP
)]);
    }
    private function removeMethodCall(\PhpParser\Node\Expr\MethodCall $node) : ?\PhpParser\Node
    {
        try {
            // If it is the only method call, we can safely delete the node here.
            $this->removeNode($node);
            return $node;
        } catch (\Rector\Core\Exception\ShouldNotHappenException $shouldNotHappenException) {
            $chainMethodCalls = $this->fluentChainMethodCallNodeAnalyzer->collectAllMethodCallsInChain($node);
            if (!$this->sameClassMethodCallAnalyzer->haveSingleClass($chainMethodCalls)) {
                return null;
            }
            foreach ($chainMethodCalls as $chainMethodCall) {
                if ($this->isNames($chainMethodCall->name, ['setLanguageMode', 'getLanguageMode'])) {
                    continue;
                }
                $node->var = new \PhpParser\Node\Expr\MethodCall($chainMethodCall->var, $chainMethodCall->name, $chainMethodCall->args);
            }
            return $node->var;
        }
    }
}
