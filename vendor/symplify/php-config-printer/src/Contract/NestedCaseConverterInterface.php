<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210402\Symplify\PhpConfigPrinter\Contract;

use PhpParser\Node\Stmt\Expression;
interface NestedCaseConverterInterface
{
    public function match(string $rootKey, $subKey) : bool;
    public function convertToMethodCall($key, $values) : \PhpParser\Node\Stmt\Expression;
}
