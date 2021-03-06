<?php

declare (strict_types=1);
namespace Rector\Core\FileSystem;

use Typo3RectorPrefix20210423\Nette\Utils\Strings;
use Typo3RectorPrefix20210423\Symfony\Component\Finder\Finder;
use Typo3RectorPrefix20210423\Symfony\Component\Finder\SplFileInfo;
use Typo3RectorPrefix20210423\Symplify\Skipper\SkipCriteriaResolver\SkippedPathsResolver;
use Typo3RectorPrefix20210423\Symplify\SmartFileSystem\FileSystemFilter;
use Typo3RectorPrefix20210423\Symplify\SmartFileSystem\Finder\FinderSanitizer;
use Typo3RectorPrefix20210423\Symplify\SmartFileSystem\SmartFileInfo;
/**
 * @see \Rector\Core\Tests\FileSystem\FilesFinder\FilesFinderTest
 */
final class FilesFinder
{
    /**
     * @var string
     * @see https://regex101.com/r/e1jm7v/1
     */
    private const STARTS_WITH_ASTERISK_REGEX = '#^\\*(.*?)[^*]$#';
    /**
     * @var string
     * @see https://regex101.com/r/EgJQyZ/1
     */
    private const ENDS_WITH_ASTERISK_REGEX = '#^[^*](.*?)\\*$#';
    /**
     * @var SmartFileInfo[][]
     */
    private $fileInfosBySourceAndSuffixes = [];
    /**
     * @var FilesystemTweaker
     */
    private $filesystemTweaker;
    /**
     * @var FinderSanitizer
     */
    private $finderSanitizer;
    /**
     * @var FileSystemFilter
     */
    private $fileSystemFilter;
    /**
     * @var SkippedPathsResolver
     */
    private $skippedPathsResolver;
    public function __construct(\Rector\Core\FileSystem\FilesystemTweaker $filesystemTweaker, \Typo3RectorPrefix20210423\Symplify\SmartFileSystem\Finder\FinderSanitizer $finderSanitizer, \Typo3RectorPrefix20210423\Symplify\SmartFileSystem\FileSystemFilter $fileSystemFilter, \Typo3RectorPrefix20210423\Symplify\Skipper\SkipCriteriaResolver\SkippedPathsResolver $skippedPathsResolver)
    {
        $this->filesystemTweaker = $filesystemTweaker;
        $this->finderSanitizer = $finderSanitizer;
        $this->fileSystemFilter = $fileSystemFilter;
        $this->skippedPathsResolver = $skippedPathsResolver;
    }
    /**
     * @param string[] $source
     * @param string[] $suffixes
     * @return SmartFileInfo[]
     */
    public function findInDirectoriesAndFiles(array $source, array $suffixes) : array
    {
        $cacheKey = \md5(\serialize($source) . \serialize($suffixes));
        if (isset($this->fileInfosBySourceAndSuffixes[$cacheKey])) {
            return $this->fileInfosBySourceAndSuffixes[$cacheKey];
        }
        $files = $this->fileSystemFilter->filterFiles($source);
        $directories = $this->fileSystemFilter->filterDirectories($source);
        $smartFileInfos = [];
        foreach ($files as $file) {
            $smartFileInfos[] = new \Typo3RectorPrefix20210423\Symplify\SmartFileSystem\SmartFileInfo($file);
        }
        $smartFileInfos = \array_merge($smartFileInfos, $this->findInDirectories($directories, $suffixes));
        return $this->fileInfosBySourceAndSuffixes[$cacheKey] = $smartFileInfos;
    }
    /**
     * @param string[] $directories
     * @param string[] $suffixes
     * @return SmartFileInfo[]
     */
    private function findInDirectories(array $directories, array $suffixes) : array
    {
        if ($directories === []) {
            return [];
        }
        $absoluteDirectories = $this->filesystemTweaker->resolveDirectoriesWithFnmatch($directories);
        if ($absoluteDirectories === []) {
            return [];
        }
        $suffixesPattern = $this->normalizeSuffixesToPattern($suffixes);
        $finder = \Typo3RectorPrefix20210423\Symfony\Component\Finder\Finder::create()->followLinks()->files()->size('> 0')->in($absoluteDirectories)->name($suffixesPattern)->sortByName();
        $this->addFilterWithExcludedPaths($finder);
        return $this->finderSanitizer->sanitize($finder);
    }
    /**
     * @param string[] $suffixes
     */
    private function normalizeSuffixesToPattern(array $suffixes) : string
    {
        $suffixesPattern = \implode('|', $suffixes);
        return '#\\.(' . $suffixesPattern . ')$#';
    }
    private function addFilterWithExcludedPaths(\Typo3RectorPrefix20210423\Symfony\Component\Finder\Finder $finder) : void
    {
        $excludePaths = $this->skippedPathsResolver->resolve();
        if ($excludePaths === []) {
            return;
        }
        $finder->filter(function (\Typo3RectorPrefix20210423\Symfony\Component\Finder\SplFileInfo $splFileInfo) use($excludePaths) : bool {
            /** @var string|false $realPath */
            $realPath = $splFileInfo->getRealPath();
            if (!$realPath) {
                //dead symlink
                return \false;
            }
            // make the path work accross different OSes
            $realPath = \str_replace('\\', '/', $realPath);
            // return false to remove file
            foreach ($excludePaths as $excludePath) {
                // make the path work accross different OSes
                $excludePath = \str_replace('\\', '/', $excludePath);
                if (\Typo3RectorPrefix20210423\Nette\Utils\Strings::match($realPath, '#' . \preg_quote($excludePath, '#') . '#')) {
                    return \false;
                }
                $excludePath = $this->normalizeForFnmatch($excludePath);
                if (\fnmatch($excludePath, $realPath)) {
                    return \false;
                }
            }
            return \true;
        });
    }
    /**
     * "value*" ??? "*value*"
     * "*value" ??? "*value*"
     */
    private function normalizeForFnmatch(string $path) : string
    {
        // ends with *
        if (\Typo3RectorPrefix20210423\Nette\Utils\Strings::match($path, self::ENDS_WITH_ASTERISK_REGEX)) {
            return '*' . $path;
        }
        // starts with *
        if (\Typo3RectorPrefix20210423\Nette\Utils\Strings::match($path, self::STARTS_WITH_ASTERISK_REGEX)) {
            return $path . '*';
        }
        return $path;
    }
}
