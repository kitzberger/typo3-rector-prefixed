<?php

declare (strict_types=1);
namespace Rector\Tests\NodeTypeResolver\Source;

trait SomeTrait
{
    public function getSomeClass() : \Rector\Tests\NodeTypeResolver\Source\SomeClass
    {
        return new \Rector\Tests\NodeTypeResolver\Source\SomeClass();
    }
}
