<?php

declare (strict_types=1);
namespace Ssch\TYPO3Rector\Rector\v7\v0;

use PhpParser\Node;
use PhpParser\Node\Expr\MethodCall;
use PHPStan\Type\ObjectType;
use Rector\Core\Rector\AbstractRector;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;
use TYPO3\CMS\Extbase\Service\TypeHandlingService;
use TYPO3\CMS\Extbase\Utility\TypeHandlingUtility;
/**
 * @see https://docs.typo3.org/c/typo3/cms-core/master/en-us/Changelog/7.0/Breaking-61786-ExtbaseDeprecatedTypeHandlingServiceRemoved.html
 */
final class TypeHandlingServiceToTypeHandlingUtilityRector extends \Rector\Core\Rector\AbstractRector
{
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
        if (!$this->nodeTypeResolver->isMethodStaticCallOrClassMethodObjectType($node, new \PHPStan\Type\ObjectType(\TYPO3\CMS\Extbase\Service\TypeHandlingService::class))) {
            return null;
        }
        $methodCall = $this->getName($node->name);
        if (null === $methodCall) {
            return null;
        }
        return $this->nodeFactory->createStaticCall(\TYPO3\CMS\Extbase\Utility\TypeHandlingUtility::class, $methodCall, $node->args);
    }
    /**
     * @codeCoverageIgnore
     */
    public function getRuleDefinition() : \Symplify\RuleDocGenerator\ValueObject\RuleDefinition
    {
        return new \Symplify\RuleDocGenerator\ValueObject\RuleDefinition('Use TypeHandlingUtility instead of TypeHandlingService', [new \Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample(<<<'CODE_SAMPLE'
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Service\TypeHandlingService;
GeneralUtility::makeInstance(TypeHandlingService::class)->isSimpleType('string');
CODE_SAMPLE
, <<<'CODE_SAMPLE'
use TYPO3\CMS\Extbase\Utility\TypeHandlingUtility;
TypeHandlingUtility::isSimpleType('string');
CODE_SAMPLE
)]);
    }
}
