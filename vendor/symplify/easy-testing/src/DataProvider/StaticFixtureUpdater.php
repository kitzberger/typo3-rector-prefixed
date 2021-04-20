<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210420\Symplify\EasyTesting\DataProvider;

use Typo3RectorPrefix20210420\Symplify\SmartFileSystem\SmartFileInfo;
use Typo3RectorPrefix20210420\Symplify\SmartFileSystem\SmartFileSystem;
final class StaticFixtureUpdater
{
    public static function updateFixtureContent(\Typo3RectorPrefix20210420\Symplify\SmartFileSystem\SmartFileInfo $originalFileInfo, string $changedContent, \Typo3RectorPrefix20210420\Symplify\SmartFileSystem\SmartFileInfo $fixtureFileInfo) : void
    {
        if (!\getenv('UPDATE_TESTS') && !\getenv('UT')) {
            return;
        }
        $newOriginalContent = self::resolveNewFixtureContent($originalFileInfo, $changedContent);
        self::getSmartFileSystem()->dumpFile($fixtureFileInfo->getRealPath(), $newOriginalContent);
    }
    public static function updateExpectedFixtureContent(string $newOriginalContent, \Typo3RectorPrefix20210420\Symplify\SmartFileSystem\SmartFileInfo $expectedFixtureFileInfo) : void
    {
        if (!\getenv('UPDATE_TESTS') && !\getenv('UT')) {
            return;
        }
        self::getSmartFileSystem()->dumpFile($expectedFixtureFileInfo->getRealPath(), $newOriginalContent);
    }
    private static function getSmartFileSystem() : \Typo3RectorPrefix20210420\Symplify\SmartFileSystem\SmartFileSystem
    {
        return new \Typo3RectorPrefix20210420\Symplify\SmartFileSystem\SmartFileSystem();
    }
    private static function resolveNewFixtureContent(\Typo3RectorPrefix20210420\Symplify\SmartFileSystem\SmartFileInfo $originalFileInfo, string $changedContent) : string
    {
        if ($originalFileInfo->getContents() === $changedContent) {
            return $originalFileInfo->getContents();
        }
        return $originalFileInfo->getContents() . '-----' . \PHP_EOL . $changedContent;
    }
}
