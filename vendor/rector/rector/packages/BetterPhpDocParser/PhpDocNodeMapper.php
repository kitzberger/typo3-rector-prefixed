<?php

declare (strict_types=1);
namespace Rector\BetterPhpDocParser;

use PHPStan\PhpDocParser\Ast\PhpDoc\PhpDocNode;
use Rector\BetterPhpDocParser\Contract\BasePhpDocNodeVisitorInterface;
use Rector\BetterPhpDocParser\DataProvider\CurrentTokenIteratorProvider;
use Rector\BetterPhpDocParser\ValueObject\Parser\BetterTokenIterator;
use Typo3RectorPrefix20210414\Symplify\SimplePhpDocParser\Contract\PhpDocNodeVisitorInterface;
use Typo3RectorPrefix20210414\Symplify\SimplePhpDocParser\PhpDocNodeTraverser;
use Typo3RectorPrefix20210414\Symplify\SimplePhpDocParser\PhpDocNodeVisitor\CloningPhpDocNodeVisitor;
use Typo3RectorPrefix20210414\Symplify\SimplePhpDocParser\PhpDocNodeVisitor\ParentConnectingPhpDocNodeVisitor;
/**
 * @see \Rector\Tests\BetterPhpDocParser\PhpDocNodeMapperTest
 */
final class PhpDocNodeMapper
{
    /**
     * @var PhpDocNodeVisitorInterface[]
     */
    private $phpDocNodeVisitors = [];
    /**
     * @var CurrentTokenIteratorProvider
     */
    private $currentTokenIteratorProvider;
    /**
     * @var ParentConnectingPhpDocNodeVisitor
     */
    private $parentConnectingPhpDocNodeVisitor;
    /**
     * @var CloningPhpDocNodeVisitor
     */
    private $cloningPhpDocNodeVisitor;
    /**
     * @param BasePhpDocNodeVisitorInterface[] $phpDocNodeVisitors
     */
    public function __construct(\Rector\BetterPhpDocParser\DataProvider\CurrentTokenIteratorProvider $currentTokenIteratorProvider, \Typo3RectorPrefix20210414\Symplify\SimplePhpDocParser\PhpDocNodeVisitor\ParentConnectingPhpDocNodeVisitor $parentConnectingPhpDocNodeVisitor, \Typo3RectorPrefix20210414\Symplify\SimplePhpDocParser\PhpDocNodeVisitor\CloningPhpDocNodeVisitor $cloningPhpDocNodeVisitor, array $phpDocNodeVisitors)
    {
        $this->phpDocNodeVisitors = $phpDocNodeVisitors;
        $this->currentTokenIteratorProvider = $currentTokenIteratorProvider;
        $this->parentConnectingPhpDocNodeVisitor = $parentConnectingPhpDocNodeVisitor;
        $this->cloningPhpDocNodeVisitor = $cloningPhpDocNodeVisitor;
    }
    public function transform(\PHPStan\PhpDocParser\Ast\PhpDoc\PhpDocNode $phpDocNode, \Rector\BetterPhpDocParser\ValueObject\Parser\BetterTokenIterator $betterTokenIterator) : void
    {
        $this->currentTokenIteratorProvider->setBetterTokenIterator($betterTokenIterator);
        $parentPhpDocNodeTraverser = new \Typo3RectorPrefix20210414\Symplify\SimplePhpDocParser\PhpDocNodeTraverser();
        $parentPhpDocNodeTraverser->addPhpDocNodeVisitor($this->parentConnectingPhpDocNodeVisitor);
        $parentPhpDocNodeTraverser->traverse($phpDocNode);
        $cloningPhpDocNodeTraverser = new \Typo3RectorPrefix20210414\Symplify\SimplePhpDocParser\PhpDocNodeTraverser();
        $cloningPhpDocNodeTraverser->addPhpDocNodeVisitor($this->cloningPhpDocNodeVisitor);
        $cloningPhpDocNodeTraverser->traverse($phpDocNode);
        $phpDocNodeTraverser = new \Typo3RectorPrefix20210414\Symplify\SimplePhpDocParser\PhpDocNodeTraverser();
        foreach ($this->phpDocNodeVisitors as $phpDocNodeVisitor) {
            $phpDocNodeTraverser->addPhpDocNodeVisitor($phpDocNodeVisitor);
        }
        $phpDocNodeTraverser->traverse($phpDocNode);
    }
}
