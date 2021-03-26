<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210326\Symplify\EasyTesting\FixtureSplitter;

use Typo3RectorPrefix20210326\Nette\Utils\Strings;
use Typo3RectorPrefix20210326\Symplify\EasyTesting\ValueObject\FixtureSplit\TrioContent;
use Typo3RectorPrefix20210326\Symplify\EasyTesting\ValueObject\SplitLine;
use Typo3RectorPrefix20210326\Symplify\SmartFileSystem\SmartFileInfo;
use Typo3RectorPrefix20210326\Symplify\SymplifyKernel\Exception\ShouldNotHappenException;
final class TrioFixtureSplitter
{
    public function splitFileInfo(\Typo3RectorPrefix20210326\Symplify\SmartFileSystem\SmartFileInfo $smartFileInfo) : \Typo3RectorPrefix20210326\Symplify\EasyTesting\ValueObject\FixtureSplit\TrioContent
    {
        $parts = \Typo3RectorPrefix20210326\Nette\Utils\Strings::split($smartFileInfo->getContents(), \Typo3RectorPrefix20210326\Symplify\EasyTesting\ValueObject\SplitLine::SPLIT_LINE_REGEX);
        $this->ensureHasThreeParts($parts, $smartFileInfo);
        return new \Typo3RectorPrefix20210326\Symplify\EasyTesting\ValueObject\FixtureSplit\TrioContent($parts[0], $parts[1], $parts[2]);
    }
    /**
     * @param mixed[] $parts
     */
    private function ensureHasThreeParts(array $parts, \Typo3RectorPrefix20210326\Symplify\SmartFileSystem\SmartFileInfo $smartFileInfo) : void
    {
        if (\count($parts) === 3) {
            return;
        }
        $message = \sprintf('The fixture "%s" should have 3 parts. %d found', $smartFileInfo->getRelativeFilePathFromCwd(), \count($parts));
        throw new \Typo3RectorPrefix20210326\Symplify\SymplifyKernel\Exception\ShouldNotHappenException($message);
    }
}
