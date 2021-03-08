<?php

namespace Typo3RectorPrefix20210308\Jean85;

use Typo3RectorPrefix20210308\PackageVersions\Versions;
class PrettyVersions
{
    const SHORT_COMMIT_LENGTH = 7;
    public static function getVersion(string $packageName) : \Typo3RectorPrefix20210308\Jean85\Version
    {
        return new \Typo3RectorPrefix20210308\Jean85\Version($packageName, \Typo3RectorPrefix20210308\PackageVersions\Versions::getVersion($packageName));
    }
    public static function getRootPackageName() : string
    {
        return \Typo3RectorPrefix20210308\PackageVersions\Versions::ROOT_PACKAGE_NAME;
    }
    public static function getRootPackageVersion() : \Typo3RectorPrefix20210308\Jean85\Version
    {
        return self::getVersion(\Typo3RectorPrefix20210308\PackageVersions\Versions::ROOT_PACKAGE_NAME);
    }
}
