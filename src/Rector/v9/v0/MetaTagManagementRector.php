<?php

declare (strict_types=1);
namespace Ssch\TYPO3Rector\Rector\v9\v0;

use PhpParser\Node;
use PhpParser\Node\Expr\MethodCall;
use PhpParser\Node\Identifier;
use PhpParser\Node\Scalar\String_;
use PHPStan\Type\ObjectType;
use Rector\Core\Rector\AbstractRector;
use ReflectionClass;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;
use TYPO3\CMS\Backend\Template\DocumentTemplate;
use TYPO3\CMS\Core\Page\PageRenderer;
use TYPO3\CMS\Core\Utility\GeneralUtility;
/**
 * @changelog https://docs.typo3.org/c/typo3/cms-core/master/en-us/Changelog/9.0/Deprecation-81464-AddAPIForMetaTagManagement.html
 */
final class MetaTagManagementRector extends \Rector\Core\Rector\AbstractRector
{
    /**
     * @var string
     */
    private const PATTERN = '~<\\s*meta\\s
            # using lookahead to capture type to $1
            (?=[^>]*?
            \\b(?:(name|property|http-equiv))\\s*=\\s*
            (?|"\\s*([^"]*?)\\s*"|\'\\s*([^\']*?)\\s*\'|
            ([^"\'>]*?)(?=\\s*/?\\s*>|\\s\\w+\\s*=))
            )

            # capture content to $2
            [^>]*?\\bcontent\\s*=\\s*
            (?|"\\s*([^"]*?)\\s*"|\'\\s*([^\']*?)\\s*\'|
            ([^"\'>]*?)(?=\\s*/?\\s*>|\\s\\w+\\s*=))
            [^>]*>~ix';
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
        if ($this->isMethodAddMetaTag($node)) {
            return $this->createSetMetaTagMethod($node);
        }
        return $this->createXUCompatibleMetaTag($node);
    }
    /**
     * @codeCoverageIgnore
     */
    public function getRuleDefinition() : \Symplify\RuleDocGenerator\ValueObject\RuleDefinition
    {
        return new \Symplify\RuleDocGenerator\ValueObject\RuleDefinition('Use setMetaTag method from PageRenderer class', [new \Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample(<<<'CODE_SAMPLE'
use TYPO3\CMS\Core\Page\PageRenderer;
use TYPO3\CMS\Core\Utility\GeneralUtility;
$pageRenderer = GeneralUtility::makeInstance(PageRenderer::class);
$pageRenderer->addMetaTag('<meta name="keywords" content="seo, search engine optimisation, search engine optimization, search engine ranking">');
CODE_SAMPLE
, <<<'CODE_SAMPLE'
use TYPO3\CMS\Core\Page\PageRenderer;
use TYPO3\CMS\Core\Utility\GeneralUtility;
$pageRenderer = GeneralUtility::makeInstance(PageRenderer::class);
$pageRenderer->setMetaTag('name', 'keywords', 'seo, search engine optimisation, search engine optimization, search engine ranking');
CODE_SAMPLE
)]);
    }
    private function parseMetaTag(string $metaTag) : array
    {
        if (\preg_match_all(self::PATTERN, $metaTag, $out)) {
            return ['type' => $out[1][0], 'name' => $out[2][0], 'content' => $out[3][0]];
        }
        return [];
    }
    private function shouldSkip(\PhpParser\Node\Expr\MethodCall $node) : bool
    {
        return !$this->isMethodAddMetaTag($node) && !$this->isMethodXUaCompatible($node);
    }
    private function isMethodAddMetaTag(\PhpParser\Node\Expr\MethodCall $node) : bool
    {
        if (!$this->nodeTypeResolver->isMethodStaticCallOrClassMethodObjectType($node, new \PHPStan\Type\ObjectType(\TYPO3\CMS\Core\Page\PageRenderer::class))) {
            return \false;
        }
        return $this->isName($node->name, 'addMetaTag');
    }
    private function isMethodXUaCompatible(\PhpParser\Node\Expr\MethodCall $node) : bool
    {
        if (!$this->nodeTypeResolver->isMethodStaticCallOrClassMethodObjectType($node, new \PHPStan\Type\ObjectType(\TYPO3\CMS\Backend\Template\DocumentTemplate::class))) {
            return \false;
        }
        return $this->isName($node->name, 'xUaCompatible');
    }
    private function createSetMetaTagMethod(\PhpParser\Node\Expr\MethodCall $node) : ?\PhpParser\Node\Expr\MethodCall
    {
        $arg = $node->args[0];
        if (!$arg->value instanceof \PhpParser\Node\Scalar\String_) {
            return null;
        }
        $metaTag = $this->valueResolver->getValue($arg->value);
        $arguments = $this->parseMetaTag($metaTag);
        if (!\array_key_exists('type', $arguments) || !\array_key_exists('name', $arguments) || !\array_key_exists('content', $arguments)) {
            return null;
        }
        $node->name = new \PhpParser\Node\Identifier('setMetaTag');
        $node->args = $this->nodeFactory->createArgs(\array_values($arguments));
        return $node;
    }
    private function createXUCompatibleMetaTag(\PhpParser\Node\Expr\MethodCall $methodCall) : \PhpParser\Node\Expr\MethodCall
    {
        $value = 'IE=8';
        if (\count($methodCall->args) > 0) {
            $value = $methodCall->args[0]->value;
        } else {
            $classReflection = new \ReflectionClass(\TYPO3\CMS\Backend\Template\DocumentTemplate::class);
            $defaultProperties = \array_values($classReflection->getDefaultProperties());
            if (\count($defaultProperties) > 0) {
                $value = $defaultProperties[0];
            }
        }
        return $this->nodeFactory->createMethodCall($this->nodeFactory->createStaticCall(\TYPO3\CMS\Core\Utility\GeneralUtility::class, 'makeInstance', [$this->nodeFactory->createClassConstReference(\TYPO3\CMS\Core\Page\PageRenderer::class)]), 'setMetaTag', ['http-equiv', 'X-UA-Compatible', $value]);
    }
}
