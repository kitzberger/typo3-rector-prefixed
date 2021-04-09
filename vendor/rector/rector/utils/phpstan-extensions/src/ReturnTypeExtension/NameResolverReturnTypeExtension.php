<?php

declare (strict_types=1);
namespace Rector\PHPStanExtensions\ReturnTypeExtension;

use PhpParser\Node\Expr\MethodCall;
use PhpParser\Node\Stmt\ClassMethod;
use PHPStan\Analyser\Scope;
use PHPStan\Reflection\MethodReflection;
use PHPStan\Type\DynamicMethodReturnTypeExtension;
use PHPStan\Type\Type;
use Rector\NodeNameResolver\NodeNameResolver;
use Rector\PHPStanExtensions\TypeResolver\GetNameMethodCallTypeResolver;
/**
 * @see \Rector\NodeNameResolver\NodeNameResolver::getName()
 *
 * These returns always strings for nodes with required names, e.g. for @see ClassMethod
 */
final class NameResolverReturnTypeExtension implements \PHPStan\Type\DynamicMethodReturnTypeExtension
{
    /**
     * @var GetNameMethodCallTypeResolver
     */
    private $methodCallTypeResolver;
    public function __construct(\Rector\PHPStanExtensions\TypeResolver\GetNameMethodCallTypeResolver $methodCallTypeResolver)
    {
        $this->methodCallTypeResolver = $methodCallTypeResolver;
    }
    public function getClass() : string
    {
        return \Rector\NodeNameResolver\NodeNameResolver::class;
    }
    public function isMethodSupported(\PHPStan\Reflection\MethodReflection $methodReflection) : bool
    {
        return $methodReflection->getName() === 'getName';
    }
    public function getTypeFromMethodCall(\PHPStan\Reflection\MethodReflection $methodReflection, \PhpParser\Node\Expr\MethodCall $methodCall, \PHPStan\Analyser\Scope $scope) : \PHPStan\Type\Type
    {
        return $this->methodCallTypeResolver->resolveFromMethodCall($methodReflection, $methodCall, $scope);
    }
}
