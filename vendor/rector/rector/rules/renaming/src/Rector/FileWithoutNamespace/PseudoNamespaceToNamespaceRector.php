<?php

declare (strict_types=1);
namespace Rector\Renaming\Rector\FileWithoutNamespace;

use Typo3RectorPrefix20210308\Nette\Utils\Strings;
use PhpParser\Node;
use PhpParser\Node\FunctionLike;
use PhpParser\Node\Identifier;
use PhpParser\Node\Name;
use PhpParser\Node\Stmt;
use PhpParser\Node\Stmt\Class_;
use PhpParser\Node\Stmt\Namespace_;
use PhpParser\Node\Stmt\Property;
use Rector\Core\Contract\Rector\ConfigurableRectorInterface;
use Rector\Core\Exception\ShouldNotHappenException;
use Rector\Core\PhpParser\Node\CustomNode\FileWithoutNamespace;
use Rector\Core\Rector\AbstractRector;
use Rector\Core\Util\StaticInstanceOf;
use Rector\NodeTypeResolver\Node\AttributeKey;
use Rector\NodeTypeResolver\PhpDoc\PhpDocTypeRenamer;
use Rector\Renaming\ValueObject\PseudoNamespaceToNamespace;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\ConfiguredCodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;
use Typo3RectorPrefix20210308\Webmozart\Assert\Assert;
/**
 * @see \Rector\Renaming\Tests\Rector\FileWithoutNamespace\PseudoNamespaceToNamespaceRector\PseudoNamespaceToNamespaceRectorTest
 */
final class PseudoNamespaceToNamespaceRector extends \Rector\Core\Rector\AbstractRector implements \Rector\Core\Contract\Rector\ConfigurableRectorInterface
{
    /**
     * @var string
     */
    public const NAMESPACE_PREFIXES_WITH_EXCLUDED_CLASSES = 'namespace_prefixed_with_excluded_classes';
    /**
     * @see https://regex101.com/r/chvLgs/1/
     * @var string
     */
    private const SPLIT_BY_UNDERSCORE_REGEX = '#([a-zA-Z])(_)?(_)([a-zA-Z])#';
    /**
     * @var PseudoNamespaceToNamespace[]
     */
    private $pseudoNamespacesToNamespaces = [];
    /**
     * @var PhpDocTypeRenamer
     */
    private $phpDocTypeRenamer;
    /**
     * @var string|null
     */
    private $newNamespace;
    public function __construct(\Rector\NodeTypeResolver\PhpDoc\PhpDocTypeRenamer $phpDocTypeRenamer)
    {
        $this->phpDocTypeRenamer = $phpDocTypeRenamer;
    }
    public function getRuleDefinition() : \Symplify\RuleDocGenerator\ValueObject\RuleDefinition
    {
        return new \Symplify\RuleDocGenerator\ValueObject\RuleDefinition('Replaces defined Pseudo_Namespaces by Namespace\\Ones.', [new \Symplify\RuleDocGenerator\ValueObject\CodeSample\ConfiguredCodeSample(<<<'CODE_SAMPLE'
/** @var Some_Chicken $someService */
$someService = new Some_Chicken;
$someClassToKeep = new Some_Class_To_Keep;
CODE_SAMPLE
, <<<'CODE_SAMPLE'
/** @var Some\Chicken $someService */
$someService = new Some\Chicken;
$someClassToKeep = new Some_Class_To_Keep;
CODE_SAMPLE
, [self::NAMESPACE_PREFIXES_WITH_EXCLUDED_CLASSES => [new \Rector\Renaming\ValueObject\PseudoNamespaceToNamespace('Some_', ['Some_Class_To_Keep'])]])]);
    }
    /**
     * @return string[]
     */
    public function getNodeTypes() : array
    {
        // property, method
        return [\Rector\Core\PhpParser\Node\CustomNode\FileWithoutNamespace::class, \PhpParser\Node\Stmt\Namespace_::class];
    }
    /**
     * @param Namespace_|FileWithoutNamespace $node
     */
    public function refactor(\PhpParser\Node $node) : ?\PhpParser\Node
    {
        $this->newNamespace = null;
        if ($node instanceof \Rector\Core\PhpParser\Node\CustomNode\FileWithoutNamespace) {
            $stmts = $this->refactorStmts($node->stmts);
            $node->stmts = $stmts;
            // add a new namespace?
            if ($this->newNamespace) {
                $namespace = new \PhpParser\Node\Stmt\Namespace_(new \PhpParser\Node\Name($this->newNamespace));
                $namespace->stmts = $stmts;
                return $namespace;
            }
        }
        if ($node instanceof \PhpParser\Node\Stmt\Namespace_) {
            $this->refactorStmts([$node]);
            return $node;
        }
        return null;
    }
    public function configure(array $configuration) : void
    {
        $namespacePrefixesWithExcludedClasses = $configuration[self::NAMESPACE_PREFIXES_WITH_EXCLUDED_CLASSES] ?? [];
        \Typo3RectorPrefix20210308\Webmozart\Assert\Assert::allIsInstanceOf($namespacePrefixesWithExcludedClasses, \Rector\Renaming\ValueObject\PseudoNamespaceToNamespace::class);
        $this->pseudoNamespacesToNamespaces = $namespacePrefixesWithExcludedClasses;
    }
    /**
     * @param Stmt[] $stmts
     * @return Stmt[]
     */
    private function refactorStmts(array $stmts) : array
    {
        $this->traverseNodesWithCallable($stmts, function (\PhpParser\Node $node) : ?Node {
            if (!\Rector\Core\Util\StaticInstanceOf::isOneOf($node, [\PhpParser\Node\Name::class, \PhpParser\Node\Identifier::class, \PhpParser\Node\Stmt\Property::class, \PhpParser\Node\FunctionLike::class])) {
                return null;
            }
            $phpDocInfo = $this->phpDocInfoFactory->createFromNodeOrEmpty($node);
            // replace on @var/@param/@return/@throws
            foreach ($this->pseudoNamespacesToNamespaces as $namespacePrefixWithExcludedClasses) {
                $this->phpDocTypeRenamer->changeUnderscoreType($phpDocInfo, $node, $namespacePrefixWithExcludedClasses);
            }
            if ($node instanceof \PhpParser\Node\Name) {
                return $this->processNameOrIdentifier($node);
            }
            if ($node instanceof \PhpParser\Node\Identifier) {
                return $this->processNameOrIdentifier($node);
            }
            return null;
        });
        return $stmts;
    }
    /**
     * @param Name|Identifier $node
     * @return Name|Identifier
     */
    private function processNameOrIdentifier(\PhpParser\Node $node) : ?\PhpParser\Node
    {
        // no name → skip
        if ($node->toString() === '') {
            return null;
        }
        foreach ($this->pseudoNamespacesToNamespaces as $pseudoNamespacesToNamespace) {
            if (!$this->isName($node, $pseudoNamespacesToNamespace->getNamespacePrefix() . '*')) {
                continue;
            }
            $excludedClasses = $pseudoNamespacesToNamespace->getExcludedClasses();
            if (\is_array($excludedClasses) && $this->isNames($node, $excludedClasses)) {
                return null;
            }
            if ($node instanceof \PhpParser\Node\Name) {
                return $this->processName($node);
            }
            return $this->processIdentifier($node);
        }
        return null;
    }
    private function processName(\PhpParser\Node\Name $name) : \PhpParser\Node\Name
    {
        $nodeName = $this->getName($name);
        if ($nodeName !== null) {
            $name->parts = \explode('_', $nodeName);
        }
        return $name;
    }
    private function processIdentifier(\PhpParser\Node\Identifier $identifier) : ?\PhpParser\Node\Identifier
    {
        $parentNode = $identifier->getAttribute(\Rector\NodeTypeResolver\Node\AttributeKey::PARENT_NODE);
        if (!$parentNode instanceof \PhpParser\Node\Stmt\Class_) {
            return null;
        }
        $name = $this->getName($identifier);
        if ($name === null) {
            return null;
        }
        /** @var string $namespaceName */
        $namespaceName = \Typo3RectorPrefix20210308\Nette\Utils\Strings::before($name, '_', -1);
        /** @var string $lastNewNamePart */
        $lastNewNamePart = \Typo3RectorPrefix20210308\Nette\Utils\Strings::after($name, '_', -1);
        $newNamespace = \Typo3RectorPrefix20210308\Nette\Utils\Strings::replace($namespaceName, self::SPLIT_BY_UNDERSCORE_REGEX, '$1$2\\\\$4');
        if ($this->newNamespace !== null && $this->newNamespace !== $newNamespace) {
            throw new \Rector\Core\Exception\ShouldNotHappenException('There cannot be 2 different namespaces in one file');
        }
        $this->newNamespace = $newNamespace;
        $identifier->name = $lastNewNamePart;
        return $identifier;
    }
}
