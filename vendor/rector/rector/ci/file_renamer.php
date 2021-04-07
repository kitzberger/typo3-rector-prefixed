<?php

// handy script for fast local operations
declare (strict_types=1);
namespace Typo3RectorPrefix20210407;

use Typo3RectorPrefix20210407\Nette\Utils\Strings;
use Typo3RectorPrefix20210407\Symplify\SmartFileSystem\FileSystemFilter;
use Typo3RectorPrefix20210407\Symplify\SmartFileSystem\Finder\FinderSanitizer;
use Typo3RectorPrefix20210407\Symplify\SmartFileSystem\Finder\SmartFinder;
use Typo3RectorPrefix20210407\Symplify\SmartFileSystem\SmartFileInfo;
use Typo3RectorPrefix20210407\Symplify\SmartFileSystem\SmartFileSystem;
use Typo3RectorPrefix20210407\Webmozart\Assert\Assert;
require __DIR__ . '/../vendor/autoload.php';
// USE ↓
$fileRenamer = new \Typo3RectorPrefix20210407\FileRenamer();
$fileRenamer->rename(
    // paths
    [__DIR__ . '/../utils'],
    '*.php.inc',
    '#(\\.php\\.inc)$#',
    '.php'
);
// CODE ↓
final class FileRenamer
{
    /**
     * @var SmartFinder
     */
    private $smartFinder;
    /**
     * @var SmartFileSystem
     */
    private $smartFileSystem;
    public function __construct()
    {
        $this->smartFinder = new \Typo3RectorPrefix20210407\Symplify\SmartFileSystem\Finder\SmartFinder(new \Typo3RectorPrefix20210407\Symplify\SmartFileSystem\Finder\FinderSanitizer(), new \Typo3RectorPrefix20210407\Symplify\SmartFileSystem\FileSystemFilter());
        $this->smartFileSystem = new \Typo3RectorPrefix20210407\Symplify\SmartFileSystem\SmartFileSystem();
    }
    /**
     * @param string[] $sources
     */
    public function rename(array $sources, string $suffix, string $matchingRegex, string $replacement)
    {
        \Typo3RectorPrefix20210407\Webmozart\Assert\Assert::allString($sources);
        \Typo3RectorPrefix20210407\Webmozart\Assert\Assert::allFileExists($sources);
        $fileInfos = $this->smartFinder->find($sources, $suffix);
        $this->renameFileInfos($fileInfos, $matchingRegex, $replacement);
    }
    /**
     * @param SmartFileInfo[] $fileInfos
     */
    private function renameFileInfos(array $fileInfos, string $matchingRegex, string $replacement) : void
    {
        foreach ($fileInfos as $fileInfo) {
            // do the rename
            $oldRealPath = $fileInfo->getRealPath();
            $newRealPath = \Typo3RectorPrefix20210407\Nette\Utils\Strings::replace($oldRealPath, $matchingRegex, $replacement);
            if ($oldRealPath === $newRealPath) {
                continue;
            }
            $this->smartFileSystem->rename($oldRealPath, $newRealPath);
        }
    }
}
// CODE ↓
\class_alias('Typo3RectorPrefix20210407\\FileRenamer', 'FileRenamer', \false);
