<?php

declare (strict_types=1);
namespace Rector\Tests\Php70\Rector\FuncCall\NonVariableToVariableOnFunctionCallRector\Source;

final class VariousCallsClass
{
    public static function staticMethod(&$bar)
    {
    }
    public function baz(&$bar)
    {
    }
    public function child() : \Rector\Tests\Php70\Rector\FuncCall\NonVariableToVariableOnFunctionCallRector\Source\ChildClass
    {
        return new \Rector\Tests\Php70\Rector\FuncCall\NonVariableToVariableOnFunctionCallRector\Source\ChildClass();
    }
}
