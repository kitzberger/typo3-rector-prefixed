<?php

declare (strict_types=1);
namespace Rector\Tests\Transform\Rector\New_\NewToMethodCallRector\Source;

final class MyClassFactory
{
    public function create(string $argument) : \Rector\Tests\Transform\Rector\New_\NewToMethodCallRector\Source\MyClass
    {
        return new \Rector\Tests\Transform\Rector\New_\NewToMethodCallRector\Source\MyClass($argument);
    }
}
