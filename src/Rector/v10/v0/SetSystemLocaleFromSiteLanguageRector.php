<?php

declare (strict_types=1);
namespace Ssch\TYPO3Rector\Rector\v10\v0;

use PhpParser\Node;
use PhpParser\Node\Expr\MethodCall;
use PHPStan\Type\ObjectType;
use Rector\Core\Rector\AbstractRector;
use Ssch\TYPO3Rector\Helper\Typo3NodeResolver;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;
use TYPO3\CMS\Core\Localization\Locales;
use TYPO3\CMS\Frontend\Controller\TypoScriptFrontendController;
/**
 * @see https://docs.typo3.org/c/typo3/cms-core/master/en-us/Changelog/10.0/Deprecation-88473-TypoScriptFrontendController-settingLocale.html
 */
final class SetSystemLocaleFromSiteLanguageRector extends \Rector\Core\Rector\AbstractRector
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
        if (!$this->nodeTypeResolver->isMethodStaticCallOrClassMethodObjectType($node, new \PHPStan\Type\ObjectType(\TYPO3\CMS\Frontend\Controller\TypoScriptFrontendController::class)) && !$this->typo3NodeResolver->isAnyMethodCallOnGlobals($node, \Ssch\TYPO3Rector\Helper\Typo3NodeResolver::TYPO_SCRIPT_FRONTEND_CONTROLLER)) {
            return null;
        }
        if (!$this->isName($node->name, 'settingLocale')) {
            return null;
        }
        return $this->nodeFactory->createStaticCall(\TYPO3\CMS\Core\Localization\Locales::class, 'setSystemLocaleFromSiteLanguage', [$this->nodeFactory->createMethodCall($node->var, 'getLanguage')]);
    }
    /**
     * @codeCoverageIgnore
     */
    public function getRuleDefinition() : \Symplify\RuleDocGenerator\ValueObject\RuleDefinition
    {
        return new \Symplify\RuleDocGenerator\ValueObject\RuleDefinition('Refactor TypoScriptFrontendController->settingLocale() to Locales::setSystemLocaleFromSiteLanguage()', [new \Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample(<<<'CODE_SAMPLE'

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Frontend\Controller\TypoScriptFrontendController;

$controller = GeneralUtility::makeInstance(TypoScriptFrontendController::class, null, 0, 0);
$controller->settingLocale();
CODE_SAMPLE
, <<<'CODE_SAMPLE'
use TYPO3\CMS\Core\Localization\Locales;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Frontend\Controller\TypoScriptFrontendController;

$controller = GeneralUtility::makeInstance(TypoScriptFrontendController::class, null, 0, 0);
Locales::setSystemLocaleFromSiteLanguage($controller->getLanguage());
CODE_SAMPLE
)]);
    }
}
