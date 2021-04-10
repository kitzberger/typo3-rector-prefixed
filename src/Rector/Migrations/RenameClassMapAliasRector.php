<?php

declare (strict_types=1);
namespace Ssch\TYPO3Rector\Rector\Migrations;

use PhpParser\Node;
use PhpParser\Node\FunctionLike;
use PhpParser\Node\Name;
use PhpParser\Node\Stmt\ClassLike;
use PhpParser\Node\Stmt\Expression;
use PhpParser\Node\Stmt\Namespace_;
use PhpParser\Node\Stmt\Property;
use Rector\Core\Configuration\RenamedClassesDataCollector;
use Rector\Core\Contract\Rector\ConfigurableRectorInterface;
use Rector\Core\Rector\AbstractRector;
use Ssch\TYPO3Rector\Renaming\NodeManipulator\ClassRenamer;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\ConfiguredCodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;
use Typo3RectorPrefix20210410\Symplify\SmartFileSystem\SmartFileInfo;
/**
 * @see \Ssch\TYPO3Rector\Tests\Rector\Migrations\RenameClassMapAliasRectorTest
 */
final class RenameClassMapAliasRector extends \Rector\Core\Rector\AbstractRector implements \Rector\Core\Contract\Rector\ConfigurableRectorInterface
{
    /**
     * @api
     * @var string
     */
    public const CLASS_ALIAS_MAPS = 'class_alias_maps';
    /**
     * @var array<string, string>
     */
    private $oldToNewClasses = [];
    /**
     * @var ClassRenamer
     */
    private $classRenamer;
    /**
     * @var RenamedClassesDataCollector
     */
    private $renamedClassesDataCollector;
    public function __construct(\Rector\Core\Configuration\RenamedClassesDataCollector $renamedClassesDataCollector, \Ssch\TYPO3Rector\Renaming\NodeManipulator\ClassRenamer $classRenamer)
    {
        $this->classRenamer = $classRenamer;
        $this->renamedClassesDataCollector = $renamedClassesDataCollector;
    }
    /**
     * @codeCoverageIgnore
     */
    public function getRuleDefinition() : \Symplify\RuleDocGenerator\ValueObject\RuleDefinition
    {
        return new \Symplify\RuleDocGenerator\ValueObject\RuleDefinition('Replaces defined classes by new ones.', [new \Symplify\RuleDocGenerator\ValueObject\CodeSample\ConfiguredCodeSample(<<<'CODE_SAMPLE'
namespace App;

use t3lib_div;

function someFunction()
{
    t3lib_div::makeInstance(\tx_cms_BackendLayout::class);
}
CODE_SAMPLE
, <<<'CODE_SAMPLE'
namespace App;

use TYPO3\CMS\Core\Utility\GeneralUtility;

function someFunction()
{
    GeneralUtility::makeInstance(\TYPO3\CMS\Backend\View\BackendLayoutView::class);
}
CODE_SAMPLE
, [self::CLASS_ALIAS_MAPS => 'config/Migrations/Code/ClassAliasMap.php'])]);
    }
    /**
     * @return array<class-string<Node>>
     */
    public function getNodeTypes() : array
    {
        return [\PhpParser\Node\Name::class, \PhpParser\Node\Stmt\Property::class, \PhpParser\Node\FunctionLike::class, \PhpParser\Node\Stmt\Expression::class, \PhpParser\Node\Stmt\ClassLike::class, \PhpParser\Node\Stmt\Namespace_::class];
    }
    /**
     * @param Name|FunctionLike|Property $node
     */
    public function refactor(\PhpParser\Node $node) : ?\PhpParser\Node
    {
        return $this->classRenamer->renameNode($node, $this->oldToNewClasses);
    }
    /**
     * @param mixed[] $configuration
     */
    public function configure(array $configuration) : void
    {
        $classAliasMaps = $configuration[self::CLASS_ALIAS_MAPS] ?? [];
        foreach ($classAliasMaps as $file) {
            $filePath = new \Typo3RectorPrefix20210410\Symplify\SmartFileSystem\SmartFileInfo($file);
            $classAliasMap = (require $filePath->getRealPath());
            foreach ($classAliasMap as $oldClass => $newClass) {
                $this->oldToNewClasses[$oldClass] = $newClass;
            }
        }
        if ([] !== $this->oldToNewClasses) {
            $this->renamedClassesDataCollector->setOldToNewClasses($this->oldToNewClasses);
        }
    }
}
