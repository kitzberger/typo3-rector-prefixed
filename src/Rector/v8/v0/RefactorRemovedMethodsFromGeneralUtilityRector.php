<?php

declare (strict_types=1);
namespace Ssch\TYPO3Rector\Rector\v8\v0;

use PhpParser\Node;
use PhpParser\Node\Expr\BinaryOp\Plus;
use PhpParser\Node\Expr\StaticCall;
use Rector\Core\Rector\AbstractRector;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;
use TYPO3\CMS\Core\Imaging\GraphicalFunctions;
use TYPO3\CMS\Core\Utility\ArrayUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
/**
 * @see https://docs.typo3.org/c/typo3/cms-core/master/en-us/Changelog/8.0/Breaking-72342-RemovedDeprecatedCodeFromGeneralUtility.html
 */
final class RefactorRemovedMethodsFromGeneralUtilityRector extends \Rector\Core\Rector\AbstractRector
{
    /**
     * List of nodes this class checks, classes that implements \PhpParser\Node See beautiful map of all nodes
     * https://github.com/rectorphp/rector/blob/master/docs/NodesOverview.md.
     *
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
        if (!$this->isName($node->class, \TYPO3\CMS\Core\Utility\GeneralUtility::class)) {
            return null;
        }
        $methodName = $this->getName($node->name);
        if (null === $methodName) {
            return null;
        }
        switch ($methodName) {
            case 'gif_compress':
                return $this->nodeFactory->createStaticCall(\TYPO3\CMS\Core\Imaging\GraphicalFunctions::class, 'gifCompress', $node->args);
            case 'png_to_gif_by_imagemagick':
                return $this->nodeFactory->createStaticCall(\TYPO3\CMS\Core\Imaging\GraphicalFunctions::class, 'pngToGifByImagemagick', $node->args);
            case 'read_png_gif':
                return $this->nodeFactory->createStaticCall(\TYPO3\CMS\Core\Imaging\GraphicalFunctions::class, 'readPngGif', $node->args);
            case 'inArray':
            case 'removeArrayEntryByValue':
            case 'keepItemsInArray':
            case 'remapArrayKeys':
            case 'arrayDiffAssocRecursive':
            case 'naturalKeySortRecursive':
                return $this->nodeFactory->createStaticCall(\TYPO3\CMS\Core\Utility\ArrayUtility::class, $methodName, $node->args);
            case 'array_merge':
                [$arg1, $arg2] = $node->args;
                return new \PhpParser\Node\Expr\BinaryOp\Plus($arg1->value, $arg2->value);
            case 'getThisUrl':
                // TODO: This is not implemented yet. What is the correct equivalent within getIndpEnv
                break;
            case 'cleanOutputBuffers':
                return $this->nodeFactory->createStaticCall(\TYPO3\CMS\Core\Utility\GeneralUtility::class, 'flushOutputBuffers');
        }
        return null;
    }
    /**
     * @codeCoverageIgnore
     */
    public function getRuleDefinition() : \Symplify\RuleDocGenerator\ValueObject\RuleDefinition
    {
        return new \Symplify\RuleDocGenerator\ValueObject\RuleDefinition('Refactor removed methods from GeneralUtility.', [new \Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample('GeneralUtility::gif_compress();', \TYPO3\CMS\Core\Imaging\GraphicalFunctions::class . '::gifCompress();')]);
    }
}
