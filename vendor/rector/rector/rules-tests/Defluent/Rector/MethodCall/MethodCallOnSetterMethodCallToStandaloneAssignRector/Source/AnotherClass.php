<?php

declare (strict_types=1);
namespace Rector\Tests\Defluent\Rector\MethodCall\MethodCallOnSetterMethodCallToStandaloneAssignRector\Source;

final class AnotherClass
{
    public function someFunction() : \Rector\Tests\Defluent\Rector\MethodCall\MethodCallOnSetterMethodCallToStandaloneAssignRector\Source\AnotherClass
    {
        return $this;
    }
    public function anotherFunction() : \Rector\Tests\Defluent\Rector\MethodCall\MethodCallOnSetterMethodCallToStandaloneAssignRector\Source\AnotherClass
    {
        return $this;
    }
}
