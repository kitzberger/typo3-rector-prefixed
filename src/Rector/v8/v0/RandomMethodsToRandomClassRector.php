<?php

declare (strict_types=1);
namespace Ssch\TYPO3Rector\Rector\v8\v0;

use PhpParser\Node;
use PhpParser\Node\Expr\StaticCall;
use Rector\Core\Rector\AbstractRector;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;
use TYPO3\CMS\Core\Crypto\Random;
use TYPO3\CMS\Core\Utility\GeneralUtility;
/**
 * @see https://docs.typo3.org/c/typo3/cms-core/master/en-us/Changelog/8.0/Deprecation-73050-DeprecatedRandomGeneratorMethodsInGeneralUtility.html
 */
final class RandomMethodsToRandomClassRector extends \Rector\Core\Rector\AbstractRector
{
    /**
     * @var string
     */
    private const GENERATE_RANDOM_BYTES = 'generateRandomBytes';
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
        if (!$this->isNames($node->name, [self::GENERATE_RANDOM_BYTES, 'getRandomHexString'])) {
            return null;
        }
        $randomClass = $this->nodeFactory->createStaticCall(\TYPO3\CMS\Core\Utility\GeneralUtility::class, 'makeInstance', [$this->nodeFactory->createClassConstReference(\TYPO3\CMS\Core\Crypto\Random::class)]);
        if ($this->isName($node->name, self::GENERATE_RANDOM_BYTES)) {
            return $this->nodeFactory->createMethodCall($randomClass, self::GENERATE_RANDOM_BYTES, $node->args);
        }
        return $this->nodeFactory->createMethodCall($randomClass, 'generateRandomHexString', $node->args);
    }
    /**
     * @codeCoverageIgnore
     */
    public function getRuleDefinition() : \Symplify\RuleDocGenerator\ValueObject\RuleDefinition
    {
        return new \Symplify\RuleDocGenerator\ValueObject\RuleDefinition('Deprecated random generator methods in GeneralUtility', [new \Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample(<<<'PHP'
use TYPO3\CMS\Core\Utility\GeneralUtility;

$randomBytes = GeneralUtility::generateRandomBytes();
$randomHex = GeneralUtility::getRandomHexString();
PHP
, <<<'PHP'
use TYPO3\CMS\Core\Crypto\Random;
use TYPO3\CMS\Core\Utility\GeneralUtility;
$randomBytes = GeneralUtility::makeInstance(Random::class)->generateRandomBytes();
$randomHex = GeneralUtility::makeInstance(Random::class)->generateRandomHexString();
PHP
)]);
    }
}
