<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210311\Symplify\EasyTesting;

use Typo3RectorPrefix20210311\Nette\Utils\Strings;
use Typo3RectorPrefix20210311\Symplify\EasyTesting\ValueObject\Prefix;
use Typo3RectorPrefix20210311\Symplify\EasyTesting\ValueObject\SplitLine;
use Typo3RectorPrefix20210311\Symplify\SmartFileSystem\SmartFileInfo;
/**
 * @see \Symplify\EasyTesting\Tests\MissingSkipPrefixResolver\MissingSkipPrefixResolverTest
 */
final class MissplacedSkipPrefixResolver
{
    /**
     * @param SmartFileInfo[] $fixtureFileInfos
     * @return array<string, SmartFileInfo[]>
     */
    public function resolve(array $fixtureFileInfos) : array
    {
        $invalidFileInfos = ['incorrect_skips' => [], 'missing_skips' => []];
        foreach ($fixtureFileInfos as $fixtureFileInfo) {
            $hasNameSkipStart = $this->hasNameSkipStart($fixtureFileInfo);
            $fileContents = $fixtureFileInfo->getContents();
            $hasSplitLine = (bool) \Typo3RectorPrefix20210311\Nette\Utils\Strings::match($fileContents, \Typo3RectorPrefix20210311\Symplify\EasyTesting\ValueObject\SplitLine::SPLIT_LINE_REGEX);
            if ($hasNameSkipStart && $hasSplitLine) {
                $invalidFileInfos['incorrect_skips'][] = $fixtureFileInfo;
                continue;
            }
            if (!$hasNameSkipStart && !$hasSplitLine) {
                $invalidFileInfos['missing_skips'][] = $fixtureFileInfo;
                continue;
            }
        }
        return $invalidFileInfos;
    }
    private function hasNameSkipStart(\Typo3RectorPrefix20210311\Symplify\SmartFileSystem\SmartFileInfo $fixtureFileInfo) : bool
    {
        return (bool) \Typo3RectorPrefix20210311\Nette\Utils\Strings::match($fixtureFileInfo->getBasenameWithoutSuffix(), \Typo3RectorPrefix20210311\Symplify\EasyTesting\ValueObject\Prefix::SKIP_PREFIX_REGEX);
    }
}
