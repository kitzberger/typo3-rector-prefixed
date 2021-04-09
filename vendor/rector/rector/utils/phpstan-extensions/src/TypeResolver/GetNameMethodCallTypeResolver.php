<?php

declare (strict_types=1);
namespace Rector\PHPStanExtensions\TypeResolver;

use PhpParser\Node;
use PhpParser\Node\Const_ as NodeConst;
use PhpParser\Node\Expr\MethodCall;
use PhpParser\Node\Name;
use PhpParser\Node\Param;
use PhpParser\Node\Stmt\ClassMethod;
use PhpParser\Node\Stmt\Const_;
use PhpParser\Node\Stmt\Interface_;
use PhpParser\Node\Stmt\Property;
use PhpParser\Node\Stmt\PropertyProperty;
use PhpParser\Node\Stmt\Trait_;
use PHPStan\Analyser\Scope;
use PHPStan\Reflection\MethodReflection;
use PHPStan\Reflection\ParametersAcceptorSelector;
use PHPStan\Type\ObjectType;
use PHPStan\Type\StringType;
use PHPStan\Type\Type;
final class GetNameMethodCallTypeResolver
{
    /**
     * @var class-string<Node>
     */
    private const ALWAYS_NAMED_TYPES = [\PhpParser\Node\Stmt\ClassMethod::class, \PhpParser\Node\Stmt\Trait_::class, \PhpParser\Node\Stmt\Interface_::class, \PhpParser\Node\Stmt\Property::class, \PhpParser\Node\Stmt\PropertyProperty::class, \PhpParser\Node\Stmt\Const_::class, \PhpParser\Node\Const_::class, \PhpParser\Node\Param::class, \PhpParser\Node\Name::class];
    public function resolveFromMethodCall(\PHPStan\Reflection\MethodReflection $methodReflection, \PhpParser\Node\Expr\MethodCall $methodCall, \PHPStan\Analyser\Scope $scope) : \PHPStan\Type\Type
    {
        $returnType = \PHPStan\Reflection\ParametersAcceptorSelector::selectSingle($methodReflection->getVariants())->getReturnType();
        $argumentValueType = $scope->getType($methodCall->args[0]->value);
        if (!$argumentValueType instanceof \PHPStan\Type\ObjectType) {
            return $returnType;
        }
        if (\in_array($argumentValueType->getClassName(), self::ALWAYS_NAMED_TYPES, \true)) {
            return new \PHPStan\Type\StringType();
        }
        return $returnType;
    }
}
