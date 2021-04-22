<?php

declare (strict_types=1);
namespace Rector\DowngradePhp72\Rector\Class_;

use PhpParser\Node;
use PhpParser\Node\Param;
use PhpParser\Node\Stmt\Class_;
use PhpParser\Node\Stmt\ClassLike;
use PhpParser\Node\Stmt\ClassMethod;
use PHPStan\Analyser\Scope;
use PHPStan\Reflection\ClassReflection;
use PHPStan\Type\Type;
use Rector\BetterPhpDocParser\PhpDocManipulator\PhpDocTypeChanger;
use Rector\ChangesReporting\ValueObject\RectorWithLineChange;
use Rector\Core\Rector\AbstractRector;
use Rector\Core\ValueObject\Application\File;
use Rector\DowngradePhp72\NodeAnalyzer\ClassLikeWithTraitsClassMethodResolver;
use Rector\DowngradePhp72\NodeAnalyzer\NativeTypeClassTreeResolver;
use Rector\NodeTypeResolver\Node\AttributeKey;
use Rector\NodeTypeResolver\PHPStan\Type\TypeFactory;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;
/**
 * @changelog https://www.php.net/manual/en/migration72.new-features.php#migration72.new-features.param-type-widening
 * @see https://3v4l.org/fOgSE
 *
 * @see \Rector\Tests\DowngradePhp72\Rector\Class_\DowngradeParameterTypeWideningRector\DowngradeParameterTypeWideningRectorTest
 */
final class DowngradeParameterTypeWideningRector extends \Rector\Core\Rector\AbstractRector
{
    /**
     * @var PhpDocTypeChanger
     */
    private $phpDocTypeChanger;
    /**
     * @var NativeTypeClassTreeResolver
     */
    private $nativeTypeClassTreeResolver;
    /**
     * @var TypeFactory
     */
    private $typeFactory;
    /**
     * @var ClassLikeWithTraitsClassMethodResolver
     */
    private $classLikeWithTraitsClassMethodResolver;
    public function __construct(\Rector\BetterPhpDocParser\PhpDocManipulator\PhpDocTypeChanger $phpDocTypeChanger, \Rector\DowngradePhp72\NodeAnalyzer\NativeTypeClassTreeResolver $nativeTypeClassTreeResolver, \Rector\NodeTypeResolver\PHPStan\Type\TypeFactory $typeFactory, \Rector\DowngradePhp72\NodeAnalyzer\ClassLikeWithTraitsClassMethodResolver $classLikeWithTraitsClassMethodResolver)
    {
        $this->phpDocTypeChanger = $phpDocTypeChanger;
        $this->nativeTypeClassTreeResolver = $nativeTypeClassTreeResolver;
        $this->typeFactory = $typeFactory;
        $this->classLikeWithTraitsClassMethodResolver = $classLikeWithTraitsClassMethodResolver;
    }
    public function getRuleDefinition() : \Symplify\RuleDocGenerator\ValueObject\RuleDefinition
    {
        return new \Symplify\RuleDocGenerator\ValueObject\RuleDefinition('Change param type to match the lowest type in whole family tree', [new \Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample(<<<'CODE_SAMPLE'
interface A
{
    public function test(array $input);
}

class C implements A
{
    public function test($input){}
}
CODE_SAMPLE
, <<<'CODE_SAMPLE'
interface A
{
    public function test(array $input);
}

class C implements A
{
    public function test(array $input){}
}
CODE_SAMPLE
)]);
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
        $classMethods = $this->classLikeWithTraitsClassMethodResolver->resolve($node);
        $scope = $node->getAttribute(\Rector\NodeTypeResolver\Node\AttributeKey::SCOPE);
        foreach ($classMethods as $classMethod) {
            $this->refactorClassMethod($classMethod, $scope);
        }
        return $node;
    }
    /**
     * The topmost class is the source of truth, so we go only down to avoid up/down collission
     */
    private function refactorParamForSelfAndSiblings(\PhpParser\Node\Stmt\ClassMethod $classMethod, int $position, \PHPStan\Analyser\Scope $classScope) : void
    {
        $classReflection = $classScope->getClassReflection();
        if (!$classReflection instanceof \PHPStan\Reflection\ClassReflection) {
            return;
        }
        if (\count($classReflection->getAncestors()) === 1) {
            return;
        }
        /** @var string $methodName */
        $methodName = $this->nodeNameResolver->getName($classMethod);
        // Remove the types in:
        // - all ancestors + their descendant classes
        // - all implemented interfaces + their implementing classes
        $parameterTypesByParentClassLikes = $this->resolveParameterTypesByClassLike($classReflection, $methodName, $position);
        // we need at least 2 methods to have a possible conflict
        if (\count($parameterTypesByParentClassLikes) < 2) {
            return;
        }
        $uniqueParameterTypes = $this->typeFactory->uniquateTypes($parameterTypesByParentClassLikes);
        // we need at least 2 unique types
        if (\count($uniqueParameterTypes) === 1) {
            return;
        }
        $this->refactorClassWithAncestorsAndChildren($classReflection, $methodName, $position);
    }
    private function removeParamTypeFromMethod(\PhpParser\Node\Stmt\ClassLike $classLike, int $position, \PhpParser\Node\Stmt\ClassMethod $classMethod) : void
    {
        $classMethodName = $this->getName($classMethod);
        $currentClassMethod = $classLike->getMethod($classMethodName);
        if (!$currentClassMethod instanceof \PhpParser\Node\Stmt\ClassMethod) {
            return;
        }
        if (!isset($currentClassMethod->params[$position])) {
            return;
        }
        $param = $currentClassMethod->params[$position];
        // It already has no type => nothing to do
        if ($param->type === null) {
            return;
        }
        // Add the current type in the PHPDoc
        $this->addPHPDocParamTypeToMethod($classMethod, $param);
        // Remove the type
        $param->type = null;
        // file from another file
        $file = $param->getAttribute(\Rector\NodeTypeResolver\Node\AttributeKey::FILE);
        if ($file instanceof \Rector\Core\ValueObject\Application\File) {
            $rectorWithLineChange = new \Rector\ChangesReporting\ValueObject\RectorWithLineChange($this, $param->getLine());
            $file->addRectorClassWithLine($rectorWithLineChange);
        }
    }
    private function removeParamTypeFromMethodForChildren(string $parentClassName, string $methodName, int $position) : void
    {
        $childrenClassLikes = $this->nodeRepository->findClassesAndInterfacesByType($parentClassName);
        foreach ($childrenClassLikes as $childClassLike) {
            $childClassName = $childClassLike->getAttribute(\Rector\NodeTypeResolver\Node\AttributeKey::CLASS_NAME);
            if ($childClassName === null) {
                continue;
            }
            $childClassMethod = $this->nodeRepository->findClassMethod($childClassName, $methodName);
            if (!$childClassMethod instanceof \PhpParser\Node\Stmt\ClassMethod) {
                continue;
            }
            $this->removeParamTypeFromMethod($childClassLike, $position, $childClassMethod);
        }
    }
    /**
     * Add the current param type in the PHPDoc
     */
    private function addPHPDocParamTypeToMethod(\PhpParser\Node\Stmt\ClassMethod $classMethod, \PhpParser\Node\Param $param) : void
    {
        if ($param->type === null) {
            return;
        }
        $phpDocInfo = $this->phpDocInfoFactory->createFromNodeOrEmpty($classMethod);
        $paramName = $this->getName($param);
        $mappedCurrentParamType = $this->staticTypeMapper->mapPhpParserNodePHPStanType($param->type);
        $this->phpDocTypeChanger->changeParamType($phpDocInfo, $mappedCurrentParamType, $param, $paramName);
    }
    /**
     * @return array<class-string, Type>
     */
    private function resolveParameterTypesByClassLike(\PHPStan\Reflection\ClassReflection $classReflection, string $methodName, int $position) : array
    {
        $parameterTypesByParentClassLikes = [];
        foreach ($classReflection->getAncestors() as $ancestorClassReflection) {
            if ($ancestorClassReflection->isTrait()) {
                continue;
            }
            if (!$ancestorClassReflection->hasMethod($methodName)) {
                continue;
            }
            $parameterType = $this->nativeTypeClassTreeResolver->resolveParameterReflectionType($ancestorClassReflection, $methodName, $position);
            $parameterTypesByParentClassLikes[$ancestorClassReflection->getName()] = $parameterType;
        }
        return $parameterTypesByParentClassLikes;
    }
    private function refactorClassWithAncestorsAndChildren(\PHPStan\Reflection\ClassReflection $classReflection, string $methodName, int $position) : void
    {
        foreach ($classReflection->getAncestors() as $ancestorClassRelection) {
            $classLike = $this->nodeRepository->findClassLike($ancestorClassRelection->getName());
            if (!$classLike instanceof \PhpParser\Node\Stmt\ClassLike) {
                continue;
            }
            $currentClassMethod = $classLike->getMethod($methodName);
            if (!$currentClassMethod instanceof \PhpParser\Node\Stmt\ClassMethod) {
                continue;
            }
            $className = $this->getName($classLike);
            if ($className === null) {
                continue;
            }
            /**
             * If it doesn't find the method, it's because the method
             * lives somewhere else.
             * For instance, in test "interface_on_parent_class.php.inc",
             * the ancestorClassReflection abstract class is also retrieved
             * as containing the method, but it does not: it is
             * in its implemented interface. That happens because
             * `ReflectionMethod` doesn't allow to do do the distinction.
             * The interface is also retrieve though, so that method
             * will eventually be refactored.
             */
            $this->removeParamTypeFromMethod($classLike, $position, $currentClassMethod);
            $this->removeParamTypeFromMethodForChildren($className, $methodName, $position);
        }
    }
    private function refactorClassMethod(\PhpParser\Node\Stmt\ClassMethod $classMethod, \PHPStan\Analyser\Scope $classScope) : void
    {
        if ($classMethod->isMagic()) {
            return;
        }
        if ($classMethod->params === []) {
            return;
        }
        foreach (\array_keys($classMethod->params) as $position) {
            $this->refactorParamForSelfAndSiblings($classMethod, (int) $position, $classScope);
        }
    }
}