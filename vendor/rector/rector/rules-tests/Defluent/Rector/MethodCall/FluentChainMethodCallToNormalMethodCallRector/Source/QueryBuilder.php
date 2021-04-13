<?php

declare (strict_types=1);
namespace Rector\Tests\Defluent\Rector\MethodCall\FluentChainMethodCallToNormalMethodCallRector\Source;

final class QueryBuilder extends \Typo3RectorPrefix20210413\Doctrine\ORM\QueryBuilder
{
    public function addQuery() : self
    {
        return $this;
    }
    public function select() : self
    {
        return $this;
    }
}
