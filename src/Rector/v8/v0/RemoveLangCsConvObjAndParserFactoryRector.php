<?php

declare (strict_types=1);
namespace Ssch\TYPO3Rector\Rector\v8\v0;

use PhpParser\Node;
use PhpParser\Node\Expr\MethodCall;
use PhpParser\Node\Expr\PropertyFetch;
use PhpParser\Node\Expr\StaticCall;
use Rector\Core\Rector\AbstractRector;
use Ssch\TYPO3Rector\Helper\Typo3NodeResolver;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;
use TYPO3\CMS\Core\Charset\CharsetConverter;
use TYPO3\CMS\Core\Localization\LanguageService;
use TYPO3\CMS\Core\Localization\LocalizationFactory;
use TYPO3\CMS\Core\Utility\GeneralUtility;
/**
 * @see https://docs.typo3.org/c/typo3/cms-core/master/en-us/Changelog/8.0/Deprecation-73482-LANG-csConvObjAndLANG-parserFactory.html
 */
final class RemoveLangCsConvObjAndParserFactoryRector extends \Rector\Core\Rector\AbstractRector
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
     * @return string[]
     */
    public function getNodeTypes() : array
    {
        return [\PhpParser\Node\Expr\MethodCall::class, \PhpParser\Node\Expr\PropertyFetch::class];
    }
    /**
     * @param MethodCall|PropertyFetch $node
     */
    public function refactor($node) : ?\PhpParser\Node
    {
        if ($this->shouldSkip($node)) {
            return null;
        }
        if ($this->isLanguageServiceCall($node)) {
            return $this->refactorLanguageServiceCall($node);
        }
        return null;
    }
    /**
     * @codeCoverageIgnore
     */
    public function getRuleDefinition() : \Symplify\RuleDocGenerator\ValueObject\RuleDefinition
    {
        return new \Symplify\RuleDocGenerator\ValueObject\RuleDefinition('Remove CsConvObj and ParserFactory from LanguageService::class and $GLOBALS[\'lang\']', [new \Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample(<<<'PHP'
$languageService = GeneralUtility::makeInstance(LanguageService::class);
$charsetConverter = $languageService->csConvObj;
$Localization = $languageService->parserFactory();
$charsetConverterGlobals = $GLOBALS['LANG']->csConvObj;
$LocalizationGlobals = $GLOBALS['LANG']->parserFactory();
PHP
, <<<'PHP'
$languageService = GeneralUtility::makeInstance(LanguageService::class);
$charsetConverter = GeneralUtility::makeInstance(CharsetConverter::class);
$Localization = GeneralUtility::makeInstance(LocalizationFactory::class);
$charsetConverterGlobals = GeneralUtility::makeInstance(CharsetConverter::class);
$LocalizationGlobals = GeneralUtility::makeInstance(LocalizationFactory::class);
PHP
)]);
    }
    /**
     * @param MethodCall|PropertyFetch $node
     */
    private function shouldSkip($node) : bool
    {
        if ($this->isLanguageServiceCall($node)) {
            return \false;
        }
        return $node instanceof \PhpParser\Node\Expr\PropertyFetch;
    }
    private function isLanguageServiceCall(\PhpParser\Node $node) : bool
    {
        if (!(\property_exists($node, 'var') && null !== $node->var)) {
            return \false;
        }
        if ($this->isObjectType($node->var, \TYPO3\CMS\Core\Localization\LanguageService::class)) {
            return \true;
        }
        if ($this->typo3NodeResolver->isPropertyFetchOnAnyPropertyOfGlobals($node, \Ssch\TYPO3Rector\Helper\Typo3NodeResolver::LANG)) {
            return \true;
        }
        return $this->typo3NodeResolver->isAnyMethodCallOnGlobals($node, \Ssch\TYPO3Rector\Helper\Typo3NodeResolver::LANG);
    }
    private function refactorLanguageServiceCall(\PhpParser\Node $node) : ?\PhpParser\Node\Expr\StaticCall
    {
        if (!(\property_exists($node, 'name') && null !== $node->name)) {
            return null;
        }
        if (null === $this->getName($node->name)) {
            return null;
        }
        if ($this->isName($node->name, 'csConvObj')) {
            return $this->nodeFactory->createStaticCall(\TYPO3\CMS\Core\Utility\GeneralUtility::class, 'makeInstance', [$this->nodeFactory->createClassConstReference(\TYPO3\CMS\Core\Charset\CharsetConverter::class)]);
        }
        if ($this->isName($node->name, 'parserFactory')) {
            return $this->nodeFactory->createStaticCall(\TYPO3\CMS\Core\Utility\GeneralUtility::class, 'makeInstance', [$this->nodeFactory->createClassConstReference(\TYPO3\CMS\Core\Localization\LocalizationFactory::class)]);
        }
        return null;
    }
}