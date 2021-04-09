<?php

declare (strict_types=1);
namespace Rector\Tests\Defluent\Rector\MethodCall\NewFluentChainMethodCallToNonFluentRector\Source;

final class FluentInterfaceClass extends \Rector\Tests\Defluent\Rector\MethodCall\NewFluentChainMethodCallToNonFluentRector\Source\InterFluentInterfaceClass
{
    /**
     * @var int
     */
    private $value = 0;
    public function someFunction() : self
    {
        return $this;
    }
    public function otherFunction() : self
    {
        return $this;
    }
    public function voidReturningMethod()
    {
        $this->value = 100;
    }
}
