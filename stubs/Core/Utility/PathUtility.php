<?php

declare (strict_types=1);


if (\class_exists(\TYPO3\CMS\Core\Utility\PathUtility::class)) {
    return;
}
final class PathUtility
{
    public static function stripPathSitePrefix($path)
    {
        return $path;
    }
    public static function getAbsoluteWebPath($path)
    {
        return $path;
    }
}
