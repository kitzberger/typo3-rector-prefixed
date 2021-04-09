<?php

declare (strict_types=1);
namespace Rector\Tests\NodeTypeResolver\PerNodeTypeResolver\ClassAndInterfaceTypeResolver\Source;

new class extends \Rector\Tests\NodeTypeResolver\PerNodeTypeResolver\ClassAndInterfaceTypeResolver\Source\ParentClass implements \Rector\Tests\NodeTypeResolver\PerNodeTypeResolver\ClassAndInterfaceTypeResolver\Source\SomeInterface
{
    use AnotherTrait;
};
