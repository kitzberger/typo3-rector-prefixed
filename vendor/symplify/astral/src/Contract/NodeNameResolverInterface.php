<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210321\Symplify\Astral\Contract;

use PhpParser\Node;
interface NodeNameResolverInterface
{
    public function match(\PhpParser\Node $node) : bool;
    public function resolve(\PhpParser\Node $node) : ?string;
}
