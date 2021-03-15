<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210315\Symplify\Skipper\SkipVoter;

use Typo3RectorPrefix20210315\Symplify\Skipper\Contract\SkipVoterInterface;
use Typo3RectorPrefix20210315\Symplify\Skipper\Matcher\FileInfoMatcher;
use Typo3RectorPrefix20210315\Symplify\Skipper\SkipCriteriaResolver\SkippedPathsResolver;
use Typo3RectorPrefix20210315\Symplify\SmartFileSystem\SmartFileInfo;
final class PathSkipVoter implements \Typo3RectorPrefix20210315\Symplify\Skipper\Contract\SkipVoterInterface
{
    /**
     * @var FileInfoMatcher
     */
    private $fileInfoMatcher;
    /**
     * @var SkippedPathsResolver
     */
    private $skippedPathsResolver;
    public function __construct(\Typo3RectorPrefix20210315\Symplify\Skipper\Matcher\FileInfoMatcher $fileInfoMatcher, \Typo3RectorPrefix20210315\Symplify\Skipper\SkipCriteriaResolver\SkippedPathsResolver $skippedPathsResolver)
    {
        $this->fileInfoMatcher = $fileInfoMatcher;
        $this->skippedPathsResolver = $skippedPathsResolver;
    }
    /**
     * @param string|object $element
     */
    public function match($element) : bool
    {
        return \true;
    }
    /**
     * @param string $element
     */
    public function shouldSkip($element, \Typo3RectorPrefix20210315\Symplify\SmartFileSystem\SmartFileInfo $smartFileInfo) : bool
    {
        $skippedPaths = $this->skippedPathsResolver->resolve();
        return $this->fileInfoMatcher->doesFileInfoMatchPatterns($smartFileInfo, $skippedPaths);
    }
}
