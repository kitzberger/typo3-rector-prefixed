<?php

declare (strict_types=1);
namespace Ssch\TYPO3Rector\Rector\v10\v1;

use PhpParser\Node;
use PhpParser\Node\Expr\BinaryOp\Concat;
use PhpParser\Node\Expr\StaticCall;
use PhpParser\Node\Expr\Variable;
use Rector\Core\Rector\AbstractRector;
use Rector\NodeTypeResolver\Node\AttributeKey;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;
use Typo3RectorPrefix20210321\Symplify\SmartFileSystem\SmartFileInfo;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;
use UnexpectedValueException;
/**
 * @see https://docs.typo3.org/c/typo3/cms-core/master/en-us/Changelog/10.1/Deprecation-88995-CallingRegisterPluginWithVendorName.html
 */
final class RegisterPluginWithVendorNameRector extends \Rector\Core\Rector\AbstractRector
{
    /**
     * @return string[]
     */
    public function getNodeTypes() : array
    {
        return [\PhpParser\Node\Expr\StaticCall::class];
    }
    /**
     * @param StaticCall $node
     */
    public function refactor(\PhpParser\Node $node) : ?\PhpParser\Node
    {
        if (!$this->nodeTypeResolver->isMethodStaticCallOrClassMethodObjectType($node, \TYPO3\CMS\Extbase\Utility\ExtensionUtility::class)) {
            return null;
        }
        if (!$this->isName($node->name, 'registerPlugin')) {
            return null;
        }
        return $this->removeVendorNameIfNeeded($node);
    }
    /**
     * @codeCoverageIgnore
     */
    public function getRuleDefinition() : \Symplify\RuleDocGenerator\ValueObject\RuleDefinition
    {
        return new \Symplify\RuleDocGenerator\ValueObject\RuleDefinition('Remove vendor name from registerPlugin call', [new \Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample(\TYPO3\CMS\Extbase\Utility\ExtensionUtility::class . '::registerPlugin(
   \'TYPO3.CMS.Form\',
   \'Formframework\',
   \'Form\',
   \'content-form\',
);', \TYPO3\CMS\Extbase\Utility\ExtensionUtility::class . '::registerPlugin(
   \'Form\',
   \'Formframework\',
   \'Form\',
   \'content-form\',
);')]);
    }
    private function removeVendorNameIfNeeded(\PhpParser\Node\Expr\StaticCall $node) : ?\PhpParser\Node
    {
        $extensionNameArgumentValue = $node->args[0]->value;
        $extensionName = $this->valueResolver->getValue($extensionNameArgumentValue);
        if ($extensionNameArgumentValue instanceof \PhpParser\Node\Expr\BinaryOp\Concat && $this->isPotentiallyUndefinedExtensionKeyVariable($extensionNameArgumentValue)) {
            /** @var SmartFileInfo $fileInfo */
            $fileInfo = $node->getAttribute(\Rector\NodeTypeResolver\Node\AttributeKey::FILE_INFO);
            $extensionName = $this->valueResolver->getValue($extensionNameArgumentValue->left) . \basename($fileInfo->getRelativeDirectoryPath());
        }
        if (!\is_string($extensionName)) {
            return null;
        }
        $delimiterPosition = \strrpos($extensionName, '.');
        if (\false === $delimiterPosition) {
            return null;
        }
        $extensionName = $this->prepareExtensionName($extensionName, $delimiterPosition);
        $node->args[0] = $this->nodeFactory->createArg($extensionName);
        return $node;
    }
    private function isPotentiallyUndefinedExtensionKeyVariable(\PhpParser\Node\Expr\BinaryOp\Concat $extensionNameArgumentValue) : bool
    {
        if (!$extensionNameArgumentValue->right instanceof \PhpParser\Node\Expr\Variable) {
            return \false;
        }
        if (null !== $this->valueResolver->getValue($extensionNameArgumentValue->right)) {
            return \false;
        }
        return $this->isNames($extensionNameArgumentValue->right, ['_EXTKEY', 'extensionKey']);
    }
    private function prepareExtensionName(string $extensionName, int $delimiterPosition) : string
    {
        $extensionName = \substr($extensionName, $delimiterPosition + 1);
        $underScoredExtensionName = \preg_replace('#[A-Z]#', '_', \lcfirst($extensionName));
        if (!\is_string($underScoredExtensionName)) {
            throw new \UnexpectedValueException('The extension name could not be parsed');
        }
        return \str_replace(' ', '', \ucwords(\str_replace('_', ' ', \strtolower($underScoredExtensionName))));
    }
}
