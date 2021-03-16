<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210316\Jean85;

use Typo3RectorPrefix20210316\Composer\InstalledVersions;
use Typo3RectorPrefix20210316\Jean85\Exception\ProvidedPackageException;
use Typo3RectorPrefix20210316\Jean85\Exception\ReplacedPackageException;
use Typo3RectorPrefix20210316\Jean85\Exception\VersionMissingExceptionInterface;
class PrettyVersions
{
    /**
     * @throws VersionMissingExceptionInterface When a package is provided ({@see ProvidedPackageException}) or replaced ({@see ReplacedPackageException})
     */
    public static function getVersion(string $packageName) : \Typo3RectorPrefix20210316\Jean85\Version
    {
        if (isset(\Typo3RectorPrefix20210316\Composer\InstalledVersions::getRawData()['versions'][$packageName]['provided'])) {
            throw \Typo3RectorPrefix20210316\Jean85\Exception\ProvidedPackageException::create($packageName);
        }
        if (isset(\Typo3RectorPrefix20210316\Composer\InstalledVersions::getRawData()['versions'][$packageName]['replaced'])) {
            throw \Typo3RectorPrefix20210316\Jean85\Exception\ReplacedPackageException::create($packageName);
        }
        return new \Typo3RectorPrefix20210316\Jean85\Version($packageName, \Typo3RectorPrefix20210316\Composer\InstalledVersions::getPrettyVersion($packageName), \Typo3RectorPrefix20210316\Composer\InstalledVersions::getReference($packageName));
    }
    public static function getRootPackageName() : string
    {
        return \Typo3RectorPrefix20210316\Composer\InstalledVersions::getRootPackage()['name'];
    }
    public static function getRootPackageVersion() : \Typo3RectorPrefix20210316\Jean85\Version
    {
        return new \Typo3RectorPrefix20210316\Jean85\Version(self::getRootPackageName(), \Typo3RectorPrefix20210316\Composer\InstalledVersions::getRootPackage()['pretty_version'], \Typo3RectorPrefix20210316\Composer\InstalledVersions::getRootPackage()['reference']);
    }
}
