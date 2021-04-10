<?php

declare (strict_types=1);
namespace Rector\Core\PhpParser\Parser;

use PhpParser\Node;
use PhpParser\Node\Stmt;
use PhpParser\Parser as NikicParser;
use Typo3RectorPrefix20210410\Symplify\SmartFileSystem\SmartFileInfo;
use Typo3RectorPrefix20210410\Symplify\SmartFileSystem\SmartFileSystem;
final class Parser
{
    /**
     * @var array<string, Stmt[]>
     */
    private $nodesByFile = [];
    /**
     * @var NikicParser
     */
    private $nikicParser;
    /**
     * @var SmartFileSystem
     */
    private $smartFileSystem;
    public function __construct(\PhpParser\Parser $nikicParser, \Typo3RectorPrefix20210410\Symplify\SmartFileSystem\SmartFileSystem $smartFileSystem)
    {
        $this->nikicParser = $nikicParser;
        $this->smartFileSystem = $smartFileSystem;
    }
    /**
     * @return Node[]
     */
    public function parseFileInfo(\Typo3RectorPrefix20210410\Symplify\SmartFileSystem\SmartFileInfo $smartFileInfo) : array
    {
        $fileRealPath = $smartFileInfo->getRealPath();
        if (isset($this->nodesByFile[$fileRealPath])) {
            return $this->nodesByFile[$fileRealPath];
        }
        $fileContent = $this->smartFileSystem->readFile($fileRealPath);
        $nodes = $this->nikicParser->parse($fileContent);
        if ($nodes === null) {
            $nodes = [];
        }
        $this->nodesByFile[$fileRealPath] = $nodes;
        return $this->nodesByFile[$fileRealPath];
    }
}
