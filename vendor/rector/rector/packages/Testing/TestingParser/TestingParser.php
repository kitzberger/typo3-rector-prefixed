<?php

declare (strict_types=1);
namespace Rector\Testing\TestingParser;

use PhpParser\Node;
use Rector\Core\Configuration\Option;
use Rector\Core\PhpParser\Node\BetterNodeFinder;
use Rector\Core\PhpParser\Parser\Parser;
use Rector\Core\ValueObject\Application\File;
use Rector\NodeTypeResolver\NodeScopeAndMetadataDecorator;
use Typo3RectorPrefix20210423\Symplify\PackageBuilder\Parameter\ParameterProvider;
use Typo3RectorPrefix20210423\Symplify\SmartFileSystem\SmartFileInfo;
final class TestingParser
{
    /**
     * @var ParameterProvider
     */
    private $parameterProvider;
    /**
     * @var Parser
     */
    private $parser;
    /**
     * @var NodeScopeAndMetadataDecorator
     */
    private $nodeScopeAndMetadataDecorator;
    /**
     * @var BetterNodeFinder
     */
    private $betterNodeFinder;
    public function __construct(\Typo3RectorPrefix20210423\Symplify\PackageBuilder\Parameter\ParameterProvider $parameterProvider, \Rector\Core\PhpParser\Parser\Parser $parser, \Rector\NodeTypeResolver\NodeScopeAndMetadataDecorator $nodeScopeAndMetadataDecorator, \Rector\Core\PhpParser\Node\BetterNodeFinder $betterNodeFinder)
    {
        $this->parameterProvider = $parameterProvider;
        $this->parser = $parser;
        $this->nodeScopeAndMetadataDecorator = $nodeScopeAndMetadataDecorator;
        $this->betterNodeFinder = $betterNodeFinder;
    }
    /**
     * @return Node[]
     */
    public function parseFileToDecoratedNodes(string $file) : array
    {
        // autoload file
        require_once $file;
        $smartFileInfo = new \Typo3RectorPrefix20210423\Symplify\SmartFileSystem\SmartFileInfo($file);
        $this->parameterProvider->changeParameter(\Rector\Core\Configuration\Option::SOURCE, [$file]);
        $nodes = $this->parser->parseFileInfo($smartFileInfo);
        $file = new \Rector\Core\ValueObject\Application\File($smartFileInfo, $smartFileInfo->getContents());
        return $this->nodeScopeAndMetadataDecorator->decorateNodesFromFile($file, $nodes, $smartFileInfo);
    }
    /**
     * @template T of Node
     * @param class-string<T> $nodeClass
     * @return Node[]
     */
    public function parseFileToDecoratedNodesAndFindNodesByType(string $file, string $nodeClass) : array
    {
        $nodes = $this->parseFileToDecoratedNodes($file);
        return $this->betterNodeFinder->findInstanceOf($nodes, $nodeClass);
    }
}
