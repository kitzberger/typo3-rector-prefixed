<?php

declare (strict_types=1);
namespace Rector\Tests\DeadCode\Rector\ClassMethod\RemoveDelegatingParentCallRector\Source;

class ParentClassWithInterfaceType
{
    public function __construct(\Rector\Tests\DeadCode\Rector\ClassMethod\RemoveDelegatingParentCallRector\Source\ToBeImplementedInterface $toBeImplemented)
    {
    }
}
