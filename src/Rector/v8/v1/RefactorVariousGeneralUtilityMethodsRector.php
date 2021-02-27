<?php

declare (strict_types=1);
namespace Ssch\TYPO3Rector\Rector\v8\v1;

use PhpParser\Node;
use PhpParser\Node\Expr\ArrayDimFetch;
use PhpParser\Node\Expr\Assign;
use PhpParser\Node\Expr\BinaryOp\GreaterOrEqual;
use PhpParser\Node\Expr\BinaryOp\Mul;
use PhpParser\Node\Expr\BinaryOp\Plus;
use PhpParser\Node\Expr\ConstFetch;
use PhpParser\Node\Expr\StaticCall;
use PhpParser\Node\Expr\Variable;
use PhpParser\Node\Name;
use PhpParser\Node\Scalar\LNumber;
use PhpParser\Node\Scalar\String_;
use PhpParser\Node\Stmt\Expression;
use Rector\Core\Rector\AbstractRector;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Utility\VersionNumberUtility;
/**
 * @see https://docs.typo3.org/c/typo3/cms-core/master/en-us/Changelog/8.1/Deprecation-75621-GeneralUtilityMethods.html
 */
final class RefactorVariousGeneralUtilityMethodsRector extends \Rector\Core\Rector\AbstractRector
{
    /**
     * @var string
     */
    private const COMPAT_VERSION = 'compat_version';
    /**
     * @var string
     */
    private const CONVERT_MICROTIME = 'convertMicrotime';
    /**
     * @var string
     */
    private const RAW_URL_ENCODE_JS = 'rawUrlEncodeJS';
    /**
     * @var string
     */
    private const RAW_URL_ENCODE_FP = 'rawUrlEncodeFP';
    /**
     * @var string
     */
    private const GET_MAXIMUM_PATH_LENGTH = 'getMaximumPathLength';
    /**
     * @var string
     */
    private const LCFIRST = 'lcfirst';
    /**
     * @var string
     */
    private const PARTS = 'parts';
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
        if (!$this->isNames($node->name, [self::COMPAT_VERSION, self::CONVERT_MICROTIME, self::RAW_URL_ENCODE_JS, self::RAW_URL_ENCODE_FP, self::LCFIRST, self::GET_MAXIMUM_PATH_LENGTH])) {
            return null;
        }
        switch ($this->getName($node->name)) {
            case self::COMPAT_VERSION:
                return new \PhpParser\Node\Expr\BinaryOp\GreaterOrEqual($this->nodeFactory->createStaticCall(\TYPO3\CMS\Core\Utility\VersionNumberUtility::class, 'convertVersionNumberToInteger', [new \PhpParser\Node\Expr\ConstFetch(new \PhpParser\Node\Name('TYPO3_branch'))]), $this->nodeFactory->createStaticCall(\TYPO3\CMS\Core\Utility\VersionNumberUtility::class, 'convertVersionNumberToInteger', $node->args));
            case self::CONVERT_MICROTIME:
                $funcCall = $this->nodeFactory->createFuncCall('explode', [new \PhpParser\Node\Scalar\String_(' '), $node->args[0]->value]);
                $this->addNodeBeforeNode(new \PhpParser\Node\Stmt\Expression(new \PhpParser\Node\Expr\Assign(new \PhpParser\Node\Expr\Variable(self::PARTS), $funcCall)), $node);
                return $this->nodeFactory->createFuncCall('round', [new \PhpParser\Node\Expr\BinaryOp\Mul(new \PhpParser\Node\Expr\BinaryOp\Plus(new \PhpParser\Node\Expr\ArrayDimFetch(new \PhpParser\Node\Expr\Variable(self::PARTS), new \PhpParser\Node\Scalar\LNumber(0)), new \PhpParser\Node\Expr\ArrayDimFetch(new \PhpParser\Node\Expr\Variable(self::PARTS), new \PhpParser\Node\Scalar\LNumber(1))), new \PhpParser\Node\Scalar\LNumber(1000))]);
            case self::RAW_URL_ENCODE_JS:
                return $this->nodeFactory->createFuncCall('str_replace', ['%20', ' ', $this->nodeFactory->createFuncCall('rawurlencode', $node->args)]);
            case self::RAW_URL_ENCODE_FP:
                return $this->nodeFactory->createFuncCall('str_replace', ['%2F', '/', $this->nodeFactory->createFuncCall('rawurlencode', $node->args)]);
            case self::LCFIRST:
                return $this->nodeFactory->createFuncCall(self::LCFIRST, $node->args);
            case self::GET_MAXIMUM_PATH_LENGTH:
                return new \PhpParser\Node\Expr\ConstFetch(new \PhpParser\Node\Name('PHP_MAXPATHLEN'));
        }
        return null;
    }
    /**
     * @codeCoverageIgnore
     */
    public function getRuleDefinition() : \Symplify\RuleDocGenerator\ValueObject\RuleDefinition
    {
        return new \Symplify\RuleDocGenerator\ValueObject\RuleDefinition('Refactor various deprecated methods of class GeneralUtility', [new \Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample(<<<'CODE_SAMPLE'
use TYPO3\CMS\Core\Utility\GeneralUtility;
$url = 'https://www.domain.com/';
$url = GeneralUtility::rawUrlEncodeFP($url);
CODE_SAMPLE
, <<<'CODE_SAMPLE'
$url = 'https://www.domain.com/';
$url = str_replace('%2F', '/', rawurlencode($url));
CODE_SAMPLE
)]);
    }
}
