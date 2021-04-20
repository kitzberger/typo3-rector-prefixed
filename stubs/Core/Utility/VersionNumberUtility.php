<?php

declare (strict_types=1);


if (\class_exists(\TYPO3\CMS\Core\Utility\VersionNumberUtility::class)) {
    return;
}
final class VersionNumberUtility
{
    public static function convertVersionNumberToInteger($verNumberStr) : int
    {
        return 1;
    }
}
