<?php

declare (strict_types=1);
namespace Rector\Tests\Defluent\Rector\Return_\ReturnFluentChainMethodCallToNormalMethodCallRector\Source;

final class Row
{
    public function addCell() : \Rector\Tests\Defluent\Rector\Return_\ReturnFluentChainMethodCallToNormalMethodCallRector\Source\Cell
    {
        return new \Rector\Tests\Defluent\Rector\Return_\ReturnFluentChainMethodCallToNormalMethodCallRector\Source\Cell();
    }
}
