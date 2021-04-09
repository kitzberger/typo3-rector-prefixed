<?php

declare (strict_types=1);
namespace Rector\Tests\Naming\Rector\Assign\RenameVariableToMatchMethodCallReturnTypeRector\Source;

final class SameNameMethod
{
    public function getName() : \Rector\Tests\Naming\Rector\Assign\RenameVariableToMatchMethodCallReturnTypeRector\Source\FullName
    {
        return new \Rector\Tests\Naming\Rector\Assign\RenameVariableToMatchMethodCallReturnTypeRector\Source\FullName();
    }
}
