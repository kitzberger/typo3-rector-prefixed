<?php

declare (strict_types=1);
namespace Ssch\TYPO3Rector\Rector\v7\v4;

use PhpParser\Node;
use PhpParser\Node\Expr\MethodCall;
use PHPStan\Type\ObjectType;
use Rector\Core\Rector\AbstractRector;
use Ssch\TYPO3Rector\Helper\Typo3NodeResolver;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;
use TYPO3\CMS\Backend\Controller\BackendController;
use TYPO3\CMS\Backend\Template\DocumentTemplate;
use TYPO3\CMS\Core\Page\PageRenderer;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Frontend\Controller\TypoScriptFrontendController;
/**
 * @see https://docs.typo3.org/c/typo3/cms-core/master/en-us/Changelog/7.4/Deprecation-68074-DeprecateGetPageRenderer.html
 */
final class InstantiatePageRendererExplicitlyRector extends \Rector\Core\Rector\AbstractRector
{
    /**
     * @var Typo3NodeResolver
     */
    private $typo3NodeResolver;
    public function __construct(\Ssch\TYPO3Rector\Helper\Typo3NodeResolver $typo3NodeResolver)
    {
        $this->typo3NodeResolver = $typo3NodeResolver;
    }
    /**
     * @return array<class-string<Node>>
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
        if (!$this->isName($node->name, 'getPageRenderer')) {
            return null;
        }
        return $this->nodeFactory->createStaticCall(\TYPO3\CMS\Core\Utility\GeneralUtility::class, 'makeInstance', [$this->nodeFactory->createClassConstReference(\TYPO3\CMS\Core\Page\PageRenderer::class)]);
    }
    /**
     * @codeCoverageIgnore
     */
    public function getRuleDefinition() : \Symplify\RuleDocGenerator\ValueObject\RuleDefinition
    {
        return new \Symplify\RuleDocGenerator\ValueObject\RuleDefinition('Instantiate PageRenderer explicitly', [new \Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample('$pageRenderer = $GLOBALS[\'TSFE\']->getPageRenderer();', '$pageRenderer = GeneralUtility::makeInstance(PageRenderer::class);')]);
    }
    private function shouldSkip(\PhpParser\Node\Expr\MethodCall $node) : bool
    {
        if ($this->nodeTypeResolver->isMethodStaticCallOrClassMethodObjectType($node, new \PHPStan\Type\ObjectType(\TYPO3\CMS\Backend\Controller\BackendController::class))) {
            return \false;
        }
        if ($this->nodeTypeResolver->isMethodStaticCallOrClassMethodObjectType($node, new \PHPStan\Type\ObjectType(\TYPO3\CMS\Backend\Template\DocumentTemplate::class))) {
            return \false;
        }
        if ($this->nodeTypeResolver->isMethodStaticCallOrClassMethodObjectType($node, new \PHPStan\Type\ObjectType(\TYPO3\CMS\Frontend\Controller\TypoScriptFrontendController::class))) {
            return \false;
        }
        return !$this->typo3NodeResolver->isAnyMethodCallOnGlobals($node, \Ssch\TYPO3Rector\Helper\Typo3NodeResolver::TYPO_SCRIPT_FRONTEND_CONTROLLER);
    }
}
