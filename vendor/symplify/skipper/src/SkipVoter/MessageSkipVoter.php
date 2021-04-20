<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210420\Symplify\Skipper\SkipVoter;

use Typo3RectorPrefix20210420\Symplify\Skipper\Contract\SkipVoterInterface;
use Typo3RectorPrefix20210420\Symplify\Skipper\Matcher\FileInfoMatcher;
use Typo3RectorPrefix20210420\Symplify\Skipper\SkipCriteriaResolver\SkippedMessagesResolver;
use Typo3RectorPrefix20210420\Symplify\SmartFileSystem\SmartFileInfo;
final class MessageSkipVoter implements \Typo3RectorPrefix20210420\Symplify\Skipper\Contract\SkipVoterInterface
{
    /**
     * @var SkippedMessagesResolver
     */
    private $skippedMessagesResolver;
    /**
     * @var FileInfoMatcher
     */
    private $fileInfoMatcher;
    public function __construct(\Typo3RectorPrefix20210420\Symplify\Skipper\SkipCriteriaResolver\SkippedMessagesResolver $skippedMessagesResolver, \Typo3RectorPrefix20210420\Symplify\Skipper\Matcher\FileInfoMatcher $fileInfoMatcher)
    {
        $this->skippedMessagesResolver = $skippedMessagesResolver;
        $this->fileInfoMatcher = $fileInfoMatcher;
    }
    /**
     * @param string|object $element
     */
    public function match($element) : bool
    {
        if (\is_object($element)) {
            return \false;
        }
        return \substr_count($element, ' ') > 0;
    }
    /**
     * @param string $element
     */
    public function shouldSkip($element, \Typo3RectorPrefix20210420\Symplify\SmartFileSystem\SmartFileInfo $smartFileInfo) : bool
    {
        $skippedMessages = $this->skippedMessagesResolver->resolve();
        if (!\array_key_exists($element, $skippedMessages)) {
            return \false;
        }
        // skip regardless the path
        $skippedPaths = $skippedMessages[$element];
        if ($skippedPaths === null) {
            return \true;
        }
        return $this->fileInfoMatcher->doesFileInfoMatchPatterns($smartFileInfo, $skippedPaths);
    }
}
