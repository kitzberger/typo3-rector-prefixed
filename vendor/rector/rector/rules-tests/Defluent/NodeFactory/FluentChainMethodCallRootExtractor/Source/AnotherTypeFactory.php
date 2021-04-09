<?php

declare (strict_types=1);
namespace Rector\Tests\Defluent\NodeFactory\FluentChainMethodCallRootExtractor\Source;

final class AnotherTypeFactory
{
    /**
     * @return SomeClassWithFluentMethods
     */
    public function createSomeClassWithFluentMethods()
    {
        return new \Rector\Tests\Defluent\NodeFactory\FluentChainMethodCallRootExtractor\Source\SomeClassWithFluentMethods();
    }
}
