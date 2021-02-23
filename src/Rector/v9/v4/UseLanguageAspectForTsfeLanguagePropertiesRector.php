<?php

declare (strict_types=1);
namespace Ssch\TYPO3Rector\Rector\v9\v4;

use PhpParser\Node;
use PhpParser\Node\Expr\Assign;
use PhpParser\Node\Expr\PropertyFetch;
use Rector\Core\Rector\AbstractRector;
use Rector\NodeTypeResolver\Node\AttributeKey;
use Ssch\TYPO3Rector\Helper\Typo3NodeResolver;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;
use TYPO3\CMS\Core\Context\Context;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Frontend\Controller\TypoScriptFrontendController;
/**
 * @see https://docs.typo3.org/c/typo3/cms-core/master/en-us/Changelog/9.4/Deprecation-85543-Language-relatedPropertiesInTypoScriptFrontendControllerAndPageRepository.html
 */
final class UseLanguageAspectForTsfeLanguagePropertiesRector extends \Rector\Core\Rector\AbstractRector
{
    /**
     * @var Typo3NodeResolver
     */
    private $typo3NodeResolver;
    public function __construct(\Ssch\TYPO3Rector\Helper\Typo3NodeResolver $typo3NodeResolver)
    {
        $this->typo3NodeResolver = $typo3NodeResolver;
    }
    public function getNodeTypes() : array
    {
        return [\PhpParser\Node\Expr\PropertyFetch::class];
    }
    /**
     * @param PropertyFetch $node
     */
    public function refactor(\PhpParser\Node $node) : ?\PhpParser\Node
    {
        if ($this->shouldSkip($node)) {
            return null;
        }
        if (!$this->isNames($node->name, ['sys_language_uid', 'sys_language_content', 'sys_language_contentOL', 'sys_language_mode'])) {
            return null;
        }
        $parentNode = $node->getAttribute(\Rector\NodeTypeResolver\Node\AttributeKey::PARENT_NODE);
        // Check if we have an assigment to the property, if so do not change it
        if ($parentNode instanceof \PhpParser\Node\Expr\Assign && $parentNode->var instanceof \PhpParser\Node\Expr\PropertyFetch) {
            return null;
        }
        $property = null;
        switch ($this->getName($node->name)) {
            case 'sys_language_uid':
                $property = 'id';
                break;
            case 'sys_language_content':
                $property = 'contentId';
                break;
            case 'sys_language_contentOL':
                $property = 'legacyOverlayType';
                break;
            case 'sys_language_mode':
                $property = 'legacyLanguageMode';
                break;
        }
        if (null === $property) {
            return null;
        }
        return $this->nodeFactory->createMethodCall($this->nodeFactory->createStaticCall(\TYPO3\CMS\Core\Utility\GeneralUtility::class, 'makeInstance', [$this->nodeFactory->createClassConstReference(\TYPO3\CMS\Core\Context\Context::class)]), 'getPropertyFromAspect', ['language', $property]);
    }
    /**
     * @codeCoverageIgnore
     */
    public function getRuleDefinition() : \Symplify\RuleDocGenerator\ValueObject\RuleDefinition
    {
        return new \Symplify\RuleDocGenerator\ValueObject\RuleDefinition('Use LanguageAspect instead of language properties of TSFE', [new \Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample(<<<'PHP'
$languageUid = $GLOBALS['TSFE']->sys_language_uid;
PHP
, <<<'PHP'
use TYPO3\CMS\Core\Context\Context;
use TYPO3\CMS\Core\Utility\GeneralUtility;
$languageUid = GeneralUtility::makeInstance(Context::class)->getPropertyFromAspect('language', 'id');
PHP
)]);
    }
    private function shouldSkip(\PhpParser\Node\Expr\PropertyFetch $node) : bool
    {
        if ($this->isObjectType($node->var, \TYPO3\CMS\Frontend\Controller\TypoScriptFrontendController::class)) {
            return \false;
        }
        if ($this->typo3NodeResolver->isPropertyFetchOnAnyPropertyOfGlobals($node, \Ssch\TYPO3Rector\Helper\Typo3NodeResolver::TYPO_SCRIPT_FRONTEND_CONTROLLER)) {
            return \false;
        }
        return !$this->typo3NodeResolver->isPropertyFetchOnParentVariableOfTypeTypoScriptFrontendController($node);
    }
}
