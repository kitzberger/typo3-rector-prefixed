<?php

declare (strict_types=1);
namespace Rector\Core\Reflection;

use PhpParser\Node\Stmt\Class_;
use PhpParser\Node\Stmt\ClassMethod;
use PhpParser\NodeFinder;
use PhpParser\Parser;
use PHPStan\Reflection\MethodReflection;
use Rector\Core\ValueObject\Application\File;
use Rector\NodeTypeResolver\NodeScopeAndMetadataDecorator;
use Typo3RectorPrefix20210423\Symplify\SmartFileSystem\SmartFileInfo;
use Typo3RectorPrefix20210423\Symplify\SmartFileSystem\SmartFileSystem;
class FunctionLikeReflectionParser
{
    /**
     * @var Parser
     */
    private $parser;
    /**
     * @var SmartFileSystem
     */
    private $smartFileSystem;
    /**
     * @var NodeFinder
     */
    private $nodeFinder;
    /**
     * @var NodeScopeAndMetadataDecorator
     */
    private $nodeScopeAndMetadataDecorator;
    public function __construct(\PhpParser\Parser $parser, \Typo3RectorPrefix20210423\Symplify\SmartFileSystem\SmartFileSystem $smartFileSystem, \PhpParser\NodeFinder $nodeFinder, \Rector\NodeTypeResolver\NodeScopeAndMetadataDecorator $nodeScopeAndMetadataDecorator)
    {
        $this->parser = $parser;
        $this->smartFileSystem = $smartFileSystem;
        $this->nodeFinder = $nodeFinder;
        $this->nodeScopeAndMetadataDecorator = $nodeScopeAndMetadataDecorator;
    }
    public function parseMethodReflection(\PHPStan\Reflection\MethodReflection $methodReflection) : ?\PhpParser\Node\Stmt\ClassMethod
    {
        $classReflection = $methodReflection->getDeclaringClass();
        $fileName = $classReflection->getFileName();
        if ($fileName === \false) {
            return null;
        }
        $fileContent = $this->smartFileSystem->readFile($fileName);
        if (!\is_string($fileContent)) {
            return null;
        }
        $nodes = (array) $this->parser->parse($fileContent);
        $smartFileInfo = new \Typo3RectorPrefix20210423\Symplify\SmartFileSystem\SmartFileInfo($fileName);
        $file = new \Rector\Core\ValueObject\Application\File($smartFileInfo, $smartFileInfo->getContents());
        $nodes = $this->nodeScopeAndMetadataDecorator->decorateNodesFromFile($file, $nodes, $smartFileInfo);
        $class = $this->nodeFinder->findFirstInstanceOf($nodes, \PhpParser\Node\Stmt\Class_::class);
        if (!$class instanceof \PhpParser\Node\Stmt\Class_) {
            return null;
        }
        return $class->getMethod($methodReflection->getName());
    }
}
