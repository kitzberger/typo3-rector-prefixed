<?php

declare (strict_types=1);
namespace Rector\Tests\NodeTypeResolver\Source\NestedProperty;

final class ClassWithPropertyLevel1 extends \Rector\Tests\NodeTypeResolver\Source\NestedProperty\ParentClass
{
    /**
     * @var ClassWithPropertyLevel2[]
     */
    public $level2s;
}
