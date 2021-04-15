<?php

declare (strict_types=1);
namespace Rector\Symfony\NodeAnalyzer;

use PhpParser\Node\Expr\ClassConstFetch;
use PhpParser\Node\Expr\MethodCall;
use Rector\Core\PhpParser\Node\Value\ValueResolver;
use Rector\NodeNameResolver\NodeNameResolver;
final class FormCollectionAnalyzer
{
    /**
     * @var ValueResolver
     */
    private $valueResolver;
    /**
     * @var NodeNameResolver
     */
    private $nodeNameResolver;
    public function __construct(\Rector\Core\PhpParser\Node\Value\ValueResolver $valueResolver, \Rector\NodeNameResolver\NodeNameResolver $nodeNameResolver)
    {
        $this->valueResolver = $valueResolver;
        $this->nodeNameResolver = $nodeNameResolver;
    }
    public function isCollectionType(\PhpParser\Node\Expr\MethodCall $methodCall) : bool
    {
        $typeValue = $methodCall->args[1]->value;
        if (!$typeValue instanceof \PhpParser\Node\Expr\ClassConstFetch) {
            return $this->valueResolver->isValue($typeValue, 'collection');
        }
        if (!$this->nodeNameResolver->isName($typeValue->class, 'Typo3RectorPrefix20210415\\Symfony\\Component\\Form\\Extension\\Core\\Type\\CollectionType')) {
            return $this->valueResolver->isValue($typeValue, 'collection');
        }
        return \true;
    }
}
