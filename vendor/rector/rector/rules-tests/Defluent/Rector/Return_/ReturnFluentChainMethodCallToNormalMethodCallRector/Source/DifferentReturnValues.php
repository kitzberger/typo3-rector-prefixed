<?php

declare (strict_types=1);
namespace Rector\Tests\Defluent\Rector\Return_\ReturnFluentChainMethodCallToNormalMethodCallRector\Source;

final class DifferentReturnValues implements \Rector\Tests\Defluent\Rector\Return_\ReturnFluentChainMethodCallToNormalMethodCallRector\Source\FluentInterfaceClassInterface
{
    public function someFunction() : self
    {
        return $this;
    }
    public function otherFunction() : int
    {
        return 5;
    }
}
