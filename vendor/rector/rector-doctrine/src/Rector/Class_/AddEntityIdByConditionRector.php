<?php

declare (strict_types=1);
namespace Rector\Doctrine\Rector\Class_;

use PhpParser\Node;
use PhpParser\Node\Stmt\Class_;
use PHPStan\Reflection\ReflectionProvider;
use Rector\Core\Contract\Rector\ConfigurableRectorInterface;
use Rector\Core\NodeManipulator\ClassInsertManipulator;
use Rector\Core\Rector\AbstractRector;
use Rector\Doctrine\NodeFactory\EntityIdNodeFactory;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\ConfiguredCodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;
/**
 * @see \Rector\Doctrine\Tests\Rector\Class_\AddEntityIdByConditionRector\AddEntityIdByConditionRectorTest
 */
final class AddEntityIdByConditionRector extends \Rector\Core\Rector\AbstractRector implements \Rector\Core\Contract\Rector\ConfigurableRectorInterface
{
    /**
     * @var string
     */
    public const DETECTED_TRAITS = 'detected_traits';
    /**
     * @var string[]
     */
    private $detectedTraits = [];
    /**
     * @var EntityIdNodeFactory
     */
    private $entityIdNodeFactory;
    /**
     * @var ClassInsertManipulator
     */
    private $classInsertManipulator;
    /**
     * @var ReflectionProvider
     */
    private $reflectionProvider;
    public function __construct(\Rector\Doctrine\NodeFactory\EntityIdNodeFactory $entityIdNodeFactory, \Rector\Core\NodeManipulator\ClassInsertManipulator $classInsertManipulator, \PHPStan\Reflection\ReflectionProvider $reflectionProvider)
    {
        $this->entityIdNodeFactory = $entityIdNodeFactory;
        $this->classInsertManipulator = $classInsertManipulator;
        $this->reflectionProvider = $reflectionProvider;
    }
    public function getRuleDefinition() : \Symplify\RuleDocGenerator\ValueObject\RuleDefinition
    {
        return new \Symplify\RuleDocGenerator\ValueObject\RuleDefinition('Add entity id with annotations when meets condition', [new \Symplify\RuleDocGenerator\ValueObject\CodeSample\ConfiguredCodeSample(<<<'CODE_SAMPLE'
class SomeClass
{
    use SomeTrait;
}
CODE_SAMPLE
, <<<'CODE_SAMPLE'
use Doctrine\ORM\Mapping as ORM;

class SomeClass
{
    use SomeTrait;

    /**
      * @ORM\Id
      * @ORM\Column(type="integer")
      * @ORM\GeneratedValue(strategy="AUTO")
      */
     private $id;

    public function getId(): int
    {
        return $this->id;
    }
}
CODE_SAMPLE
, [self::DETECTED_TRAITS => ['Typo3RectorPrefix20210411\\Knp\\DoctrineBehaviors\\Model\\Translatable\\Translation', 'Typo3RectorPrefix20210411\\Knp\\DoctrineBehaviors\\Model\\Translatable\\TranslationTrait']])]);
    }
    /**
     * @return array<class-string<Node>>
     */
    public function getNodeTypes() : array
    {
        return [\PhpParser\Node\Stmt\Class_::class];
    }
    /**
     * @param Class_ $node
     */
    public function refactor(\PhpParser\Node $node) : ?\PhpParser\Node
    {
        if ($this->shouldSkip($node)) {
            return null;
        }
        $idProperty = $this->entityIdNodeFactory->createIdProperty();
        $this->classInsertManipulator->addAsFirstMethod($node, $idProperty);
        return $node;
    }
    /**
     * @param array<string, string[]> $configuration
     */
    public function configure(array $configuration) : void
    {
        $this->detectedTraits = $configuration[self::DETECTED_TRAITS] ?? [];
    }
    private function shouldSkip(\PhpParser\Node\Stmt\Class_ $class) : bool
    {
        if ($this->classAnalyzer->isAnonymousClass($class)) {
            return \true;
        }
        if (!$this->isTraitMatch($class)) {
            return \true;
        }
        return (bool) $class->getProperty('id');
    }
    private function isTraitMatch(\PhpParser\Node\Stmt\Class_ $class) : bool
    {
        $className = $this->getName($class);
        if ($className === null) {
            return \false;
        }
        if (!$this->reflectionProvider->hasClass($className)) {
            return \false;
        }
        $classReflection = $this->reflectionProvider->getClass($className);
        foreach ($this->detectedTraits as $detectedTrait) {
            if ($classReflection->hasTraitUse($detectedTrait)) {
                return \true;
            }
        }
        return \false;
    }
}
