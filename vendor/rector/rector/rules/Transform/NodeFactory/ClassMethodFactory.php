<?php

declare (strict_types=1);
namespace Rector\Transform\NodeFactory;

use PhpParser\Node\Stmt\ClassMethod;
use PhpParser\Node\Stmt\Function_;
use Typo3RectorPrefix20210423\Symplify\Astral\ValueObject\NodeBuilder\MethodBuilder;
final class ClassMethodFactory
{
    public function createClassMethodFromFunction(string $methodName, \PhpParser\Node\Stmt\Function_ $function) : \PhpParser\Node\Stmt\ClassMethod
    {
        $methodBuilder = new \Typo3RectorPrefix20210423\Symplify\Astral\ValueObject\NodeBuilder\MethodBuilder($methodName);
        $methodBuilder->makePublic();
        $methodBuilder->makeStatic();
        $methodBuilder->addStmts($function->stmts);
        return $methodBuilder->getNode();
    }
}
