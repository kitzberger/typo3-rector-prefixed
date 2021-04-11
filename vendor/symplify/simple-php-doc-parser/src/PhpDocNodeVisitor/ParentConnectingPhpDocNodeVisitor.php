<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210411\Symplify\SimplePhpDocParser\PhpDocNodeVisitor;

use PHPStan\PhpDocParser\Ast\Node;
use Typo3RectorPrefix20210411\Symplify\SimplePhpDocParser\ValueObject\PhpDocAttributeKey;
/**
 * Mimics https://github.com/nikic/PHP-Parser/blob/master/lib/PhpParser/NodeVisitor/ParentConnectingVisitor.php
 *
 * @see \Symplify\SimplePhpDocParser\Tests\PhpDocNodeVisitor\ParentConnectingPhpDocNodeVisitorTest
 */
final class ParentConnectingPhpDocNodeVisitor extends \Typo3RectorPrefix20210411\Symplify\SimplePhpDocParser\PhpDocNodeVisitor\AbstractPhpDocNodeVisitor
{
    /**
     * @var Node[]
     */
    private $stack = [];
    public function beforeTraverse(\PHPStan\PhpDocParser\Ast\Node $node) : void
    {
        $this->stack = [$node];
    }
    public function enterNode(\PHPStan\PhpDocParser\Ast\Node $node) : ?\PHPStan\PhpDocParser\Ast\Node
    {
        if ($this->stack !== []) {
            $parentNode = $this->stack[\count($this->stack) - 1];
            $node->setAttribute(\Typo3RectorPrefix20210411\Symplify\SimplePhpDocParser\ValueObject\PhpDocAttributeKey::PARENT, $parentNode);
        }
        $this->stack[] = $node;
        return $node;
    }
    public function leaveNode(\PHPStan\PhpDocParser\Ast\Node $node) : void
    {
        \array_pop($this->stack);
    }
}
