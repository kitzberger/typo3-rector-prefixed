<?php

declare (strict_types=1);
namespace Rector\Tests\NodeTypeResolver\Source;

final class ClassWithFluentNonSelfReturn
{
    public function createAnotherClass() : \Rector\Tests\NodeTypeResolver\Source\AnotherClass
    {
    }
}