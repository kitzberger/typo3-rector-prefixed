<?php

declare (strict_types=1);
namespace Rector\Tests\TypeDeclaration\Rector\FunctionLike\ParamTypeDeclarationRector\Source;

abstract class AbstractParentClass
{
    /**
     * @param int $number
     */
    public function keep($number)
    {
    }
}
