<?php

declare (strict_types=1);
namespace Ssch\TYPO3Rector\Rector\v11\v0;

use PhpParser\Builder\Method;
use PhpParser\Node;
use PhpParser\Node\Expr\MethodCall;
use Rector\Core\Exception\ShouldNotHappenException;
use Rector\Defluent\Rector\AbstractFluentChainMethodCallRector;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;
use TYPO3\CMS\Extbase\Mvc\Web\Routing\UriBuilder;
use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;
/**
 * @see https://docs.typo3.org/c/typo3/cms-core/master/en-us/Changelog/11.0/Breaking-93041-RemoveTypoScriptOptionAddQueryStringmethod.html
 */
final class RemoveAddQueryStringMethodRector extends \Rector\Defluent\Rector\AbstractFluentChainMethodCallRector
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
        if ($this->shouldSkip($node)) {
            return null;
        }
        if ($this->isMethodCallOnContentObjectRenderer($node)) {
            $this->refactorGetQueryArgumentsMethodCall($node);
            return null;
        }
        return $this->refactorSetAddQueryStringMethodCall($node);
    }
    /**
     * @codeCoverageIgnore
     */
    public function getRuleDefinition() : \Symplify\RuleDocGenerator\ValueObject\RuleDefinition
    {
        return new \Symplify\RuleDocGenerator\ValueObject\RuleDefinition('Remove TypoScript option addQueryString.method', [new \Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample(<<<'CODE_SAMPLE'
$this->uriBuilder->setUseCacheHash(true)
                         ->setCreateAbsoluteUri(true)
                         ->setAddQueryString(true)
                         ->setAddQueryStringMethod('GET')
                         ->build();
CODE_SAMPLE
, <<<'CODE_SAMPLE'
$this->uriBuilder->setUseCacheHash(true)
                         ->setCreateAbsoluteUri(true)
                         ->setAddQueryString(true)
                         ->build();
CODE_SAMPLE
)]);
    }
    private function shouldSkip(\PhpParser\Node\Expr\MethodCall $node) : bool
    {
        if ($this->isMethodCallOnUriBuilder($node)) {
            return \false;
        }
        return !$this->isMethodCallOnContentObjectRenderer($node);
    }
    private function isMethodCallOnUriBuilder(\PhpParser\Node\Expr\MethodCall $node) : bool
    {
        if (!$this->nodeTypeResolver->isMethodStaticCallOrClassMethodObjectType($node, \TYPO3\CMS\Extbase\Mvc\Web\Routing\UriBuilder::class)) {
            return \false;
        }
        return $this->isName($node->name, 'setAddQueryStringMethod');
    }
    private function isMethodCallOnContentObjectRenderer(\PhpParser\Node\Expr\MethodCall $node) : bool
    {
        if (!$this->nodeTypeResolver->isMethodStaticCallOrClassMethodObjectType($node, \TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer::class)) {
            return \false;
        }
        return $this->isName($node->name, 'getQueryArguments');
    }
    private function refactorSetAddQueryStringMethodCall(\PhpParser\Node\Expr\MethodCall $node) : ?\PhpParser\Node
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
                if ($this->isName($node->name, 'setAddQueryStringMethod')) {
                    continue;
                }
                $node->var = new \PhpParser\Node\Expr\MethodCall($chainMethodCall->var, $chainMethodCall->name, $chainMethodCall->args);
            }
            return $node->var;
        }
    }
    private function refactorGetQueryArgumentsMethodCall(\PhpParser\Node\Expr\MethodCall $node) : void
    {
        unset($node->args[1], $node->args[2]);
    }
}
