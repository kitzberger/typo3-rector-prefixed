<?php

declare (strict_types=1);
namespace Rector\Privatization\Naming;

use PhpParser\Node\Stmt\PropertyProperty;
use Rector\NodeNameResolver\NodeNameResolver;
use Typo3RectorPrefix20210418\Stringy\Stringy;
final class ConstantNaming
{
    /**
     * @var NodeNameResolver
     */
    private $nodeNameResolver;
    public function __construct(\Rector\NodeNameResolver\NodeNameResolver $nodeNameResolver)
    {
        $this->nodeNameResolver = $nodeNameResolver;
    }
    public function createFromProperty(\PhpParser\Node\Stmt\PropertyProperty $propertyProperty) : string
    {
        $propertyName = $this->nodeNameResolver->getName($propertyProperty);
        $stringy = new \Typo3RectorPrefix20210418\Stringy\Stringy($propertyName);
        return (string) $stringy->underscored()->toUpperCase();
    }
}
