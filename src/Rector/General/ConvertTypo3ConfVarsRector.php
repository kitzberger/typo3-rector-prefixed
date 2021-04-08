<?php

declare (strict_types=1);
namespace Ssch\TYPO3Rector\Rector\General;

use PhpParser\Node;
use PhpParser\Node\Expr\ArrayDimFetch;
use PhpParser\Node\Expr\MethodCall;
use PhpParser\Node\Expr\Variable;
use PhpParser\Node\Scalar\String_;
use Rector\Core\Rector\AbstractRector;
use Rector\NodeTypeResolver\Node\AttributeKey;
use Ssch\TYPO3Rector\Helper\FileHelperTrait;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;
use Typo3RectorPrefix20210408\Symplify\SmartFileSystem\SmartFileInfo;
/**
 * @see https://docs.typo3.org/m/typo3/reference-coreapi/master/en-us/ExtensionArchitecture/ConfigurationFiles/Index.html
 */
final class ConvertTypo3ConfVarsRector extends \Rector\Core\Rector\AbstractRector
{
    use FileHelperTrait;
    /**
     * @codeCoverageIgnore
     */
    public function getRuleDefinition() : \Symplify\RuleDocGenerator\ValueObject\RuleDefinition
    {
        return new \Symplify\RuleDocGenerator\ValueObject\RuleDefinition('Convert $TYPO3_CONF_VARS to $GLOBALS[\'TYPO3_CONF_VARS\']', [new \Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample(<<<'CODE_SAMPLE'
$TYPO3_CONF_VARS['SC_OPTIONS']['t3lib/class.t3lib_userauth.php']['postUserLookUp']['foo'] = 'FooBarBaz->handle';
CODE_SAMPLE
, <<<'CODE_SAMPLE'
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_userauth.php']['postUserLookUp']['foo'] = 'FooBarBaz->handle';
CODE_SAMPLE
)]);
    }
    public function getNodeTypes() : array
    {
        return [\PhpParser\Node\Expr\ArrayDimFetch::class];
    }
    /**
     * @param ArrayDimFetch $node
     */
    public function refactor(\PhpParser\Node $node) : ?\PhpParser\Node
    {
        if ($node->var instanceof \PhpParser\Node\Expr\MethodCall) {
            return null;
        }
        if (!$this->isName($node->var, 'TYPO3_CONF_VARS')) {
            return null;
        }
        /** @var SmartFileInfo $fileInfo */
        $fileInfo = $node->getAttribute(\Rector\NodeTypeResolver\Node\AttributeKey::FILE_INFO);
        if (!$fileInfo instanceof \Typo3RectorPrefix20210408\Symplify\SmartFileSystem\SmartFileInfo) {
            return null;
        }
        if (!$this->isExtLocalConf($fileInfo) && !$this->isExtTables($fileInfo)) {
            return null;
        }
        $node->var = new \PhpParser\Node\Expr\ArrayDimFetch(new \PhpParser\Node\Expr\Variable('GLOBALS'), new \PhpParser\Node\Scalar\String_('TYPO3_CONF_VARS'));
        return $node;
    }
}
