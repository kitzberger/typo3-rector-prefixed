<?php

declare (strict_types=1);
namespace Rector\PHPStanExtensions\ReturnTypeExtension;

use PhpParser\Node\Expr\ClassConstFetch;
use PhpParser\Node\Expr\MethodCall;
use PhpParser\Node\Name;
use PhpParser\NodeFinder;
use PHPStan\Analyser\Scope;
use PHPStan\Reflection\MethodReflection;
use PHPStan\Reflection\ParametersAcceptorSelector;
use PHPStan\Type\ArrayType;
use PHPStan\Type\DynamicMethodReturnTypeExtension;
use PHPStan\Type\MixedType;
use PHPStan\Type\NullType;
use PHPStan\Type\ObjectType;
use PHPStan\Type\Type;
use PHPStan\Type\UnionType;
/**
 * Covers:
 * - NodeFinder::findInstanceOf()
 * - NodeFinder::findFirstInstanceOf()
 */
final class FindInstanceOfReturnTypeExtension implements \PHPStan\Type\DynamicMethodReturnTypeExtension
{
    public function getClass() : string
    {
        return \PhpParser\NodeFinder::class;
    }
    public function isMethodSupported(\PHPStan\Reflection\MethodReflection $methodReflection) : bool
    {
        return \in_array($methodReflection->getName(), ['findInstanceOf', 'findFirstInstanceOf'], \true);
    }
    public function getTypeFromMethodCall(\PHPStan\Reflection\MethodReflection $methodReflection, \PhpParser\Node\Expr\MethodCall $methodCall, \PHPStan\Analyser\Scope $scope) : \PHPStan\Type\Type
    {
        $returnType = \PHPStan\Reflection\ParametersAcceptorSelector::selectSingle($methodReflection->getVariants())->getReturnType();
        $secondArgumentNode = $methodCall->args[1]->value;
        if (!$secondArgumentNode instanceof \PhpParser\Node\Expr\ClassConstFetch) {
            return $returnType;
        }
        if (!$secondArgumentNode->class instanceof \PhpParser\Node\Name) {
            return $returnType;
        }
        $class = $secondArgumentNode->class->toString();
        if ($methodReflection->getName() === 'findFirstInstanceOf') {
            return new \PHPStan\Type\UnionType([new \PHPStan\Type\ObjectType($class), new \PHPStan\Type\NullType()]);
        }
        return new \PHPStan\Type\ArrayType(new \PHPStan\Type\MixedType(), new \PHPStan\Type\ObjectType($class));
    }
}
