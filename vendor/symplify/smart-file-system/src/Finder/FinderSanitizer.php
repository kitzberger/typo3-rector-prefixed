<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210401\Symplify\SmartFileSystem\Finder;

use Typo3RectorPrefix20210401\Nette\Utils\Finder as NetteFinder;
use SplFileInfo;
use Typo3RectorPrefix20210401\Symfony\Component\Finder\Finder as SymfonyFinder;
use Typo3RectorPrefix20210401\Symfony\Component\Finder\SplFileInfo as SymfonySplFileInfo;
use Typo3RectorPrefix20210401\Symplify\SmartFileSystem\SmartFileInfo;
/**
 * @see \Symplify\SmartFileSystem\Tests\Finder\FinderSanitizer\FinderSanitizerTest
 */
final class FinderSanitizer
{
    /**
     * @param NetteFinder|SymfonyFinder|SplFileInfo[]|SymfonySplFileInfo[]|string[] $files
     * @return SmartFileInfo[]
     */
    public function sanitize(iterable $files) : array
    {
        $smartFileInfos = [];
        foreach ($files as $file) {
            $fileInfo = \is_string($file) ? new \SplFileInfo($file) : $file;
            if (!$this->isFileInfoValid($fileInfo)) {
                continue;
            }
            /** @var string $realPath */
            $realPath = $fileInfo->getRealPath();
            $smartFileInfos[] = new \Typo3RectorPrefix20210401\Symplify\SmartFileSystem\SmartFileInfo($realPath);
        }
        return $smartFileInfos;
    }
    private function isFileInfoValid(\SplFileInfo $fileInfo) : bool
    {
        return (bool) $fileInfo->getRealPath();
    }
}
